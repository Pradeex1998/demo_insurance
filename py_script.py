import sys
import json
import pdfplumber
import re
from google import genai
import time


FIELDS = [
    "date_of_issue",
    "insured_name",
    "product_type",
    "policy_number",
    "type",
    "registration_number",
    "weight",
    "year_of_manufacture",
    "make",
    "model",
    "ncb",
    "start_date",
    "end_date",
    "brokerage_name",
    "login_code",
    "carrying_capacity",
    "chassis_number",
    "total_od_premium",
    "total_tp_premium",
    "net_premium",
    "gross_premium",
    "cubic_capacity"
]

INSURANCE_COMPANIES = [
    "Go Digit General Insurance Ltd",
    "THE NEW INDIA ASSURANCE CO. LTD",
    "Zurich Kotak General Insurance Company (India) Limited",
    "SBI General Insurance Company Limited",
    "TATA AIG General Insurance Company Limited",
    "IFFCO-TOKIO General Insurance Co. Ltd",
    "UniversalSompoGeneralInsuranceCompanyLimited",
    "Universal Sompo General Insurance Company Limited",
    "RoyalSundaramGeneralInsuranceCo.Limited",
    "Future Generali India Insurance Company Limited",
    "Reliance General Insurance Company Limited",
    "Magma HDI General Insurance Co. Ltd",
    "Magma General Insurance Limited",
    "RahejaQBEGeneralInsuranceCompanyLimited",
    "SHRIRAM GENERAL INSURANCE COMPANY LIMITED",
    "ICICI Lombard",
    "UNITED INDIA INSURANCE COMPANY LIMITED",
    "Bajaj Allianz General Insurance Company Ltd",
    "Cholamandalam MS General Insurance Company Ltd",
    "National Insurance Company Limited",
]

NCB_INSTRUCTION = """Look for text like “NCB” or “No Claim Bonus”.  
If a percentage and amount are both found, return as “<percentage>|<amount>”.  
Example: “20%|-86.32”.  
If only one is found, return just that value.  
If not found, return an empty string.
\n"""


COMPANY_PROMPTS = {
    "National Insurance Company Limited": (
        "Extract the following fields from the National Insurance policy schedule below with extreme precision. "
        "Use null for missing values. Enforce formats: date_of_issue -> 'YYYY-MM-DD', start_date -> 'YYYY-MM-DD', end_date -> 'YYYY-MM-DD'. Follow rules:\n"
        "- date_of_issue: Prefer 'Date of issue:' (bilingual lines). If missing, use 'Invoice Date:' or 'Printed on'. Convert to 'YYYY-MM-DD'.\n"
        "- insured_name: The text after 'Insured Name'. This is the policyholder.\n"
        "- product_type: Fixed string 'CommercialVehiclePackagePolicy'.\n"
        "- policy_number: The value after 'PolicyNumber' (look for the value in quotes like 'OG-26-9906-1812-00003139').\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the main vehicle category and subcategory, combining them with a '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only.\n"
        "- registration_number: The value labeled 'Registration No.'. Remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990').\n"
        "- weight: Extract the GVW (Gross Vehicle Weight). When the format is '1478/2805' or similar, extract the second number (e.g., 2805). Return as a number.\n"
        "- year_of_manufacture: The numeric value labeled 'Mfg year'.\n"
        "- make: The value from the 'Make' field.\n"
        "- model: The value from the 'Model' field.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: The date after 'From:' under 'PeriodOfInsurance'. Format as a string.\n"
        "- end_date: The date after 'To:' under 'PeriodOfInsurance'. Format as a string.\n"
        "- total_od_premium: The numeric value immediately following the first occurrence of 'कुल Total ₹'. "
        "  This represents the Own Damage (OD) premium. Remove commas and convert to number.\n"
        "- total_tp_premium: The numeric value after the next occurrence of 'कुल Total' (without ₹). "
        "  This represents the Third Party (TP) premium. Remove commas and convert to number.\n"
        "- net_premium: 0 \n"
        "- gross_premium: The numeric value labeled 'Total Amount'. Remove commas and convert to a number.\n"
        "- login_code: null. This specific field is not found in the document.\n"
        "- brokerage_name: The text after 'BrokerName:'. This is the name of the broker.\n"
        "- carrying_capacity: The numeric value from 'SeatCap' (Seating Capacity). Extract only the number.\n"
        "- chassis_number: The value labeled 'Vehicle/Trailer Chassis No'.\n"
        "- cubic_capacity: Extract the engine capacity (CC) from the section labeled 'CC/KW' or from a combined format like 'CC / GVW'. When the format is '1478/2805', only extract the first number (e.g., 1478). Return as a number.\n"
        "Return a valid JSON object using only the exact keys listed above. Do not add any other keys or commentary."
        "\nDocument:\n"
    ),
    "Bajaj Allianz General Insurance Company Ltd": (
        "Extract the following fields from the insurance document below with extreme precision. "
        "Use null for any missing values. Follow the specific instructions for each field:\n"
        "- date_of_issue: The date after 'Policy issued on'. Format as a string.\n"
        "- insured_name: The text after 'Insured Name'. This is the policyholder.\n"
        "- product_type: Fixed string 'CommercialVehiclePackagePolicy'.\n"
        "- policy_number: The value after 'PolicyNumber' (look for the value in quotes like 'OG-26-9906-1812-00003139').\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the main vehicle category and subcategory, combining them with a '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only.\n"
        "- registration_number: The value labeled 'Registration No.'. Remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990').\n"
        "- weight: Fixed integer 0, as it is not present in this document type.\n"
        "- year_of_manufacture: The numeric value labeled 'Mfg year'.\n"
        "- make: The value from the 'Make' field.\n"
        "- model: The value from the 'Model' field.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: The date after 'From:' under 'PeriodOfInsurance'. Format as a string.\n"
        "- end_date: The date after 'To:' under 'PeriodOfInsurance'. Format as a string.\n"
        "- total_od_premium: The numeric value labeled 'TotalOwnDamagePremium:' under 'SCHEDULE OF PREMIUM'. Remove commas and convert to number.\n"
        "- total_tp_premium: The numeric value labeled 'TotalLiabilityPremium:' under 'SCHEDULE OF PREMIUM'. Remove commas and convert to number.\n"
        "- net_premium: The numeric value labeled 'NetPremium'. Remove commas and convert to a number.\n"
        "- gross_premium: The numeric value labeled 'FinalPremiumRs.' or 'TOTAL PREMIUM PAYABLE'. Remove commas and convert to a number.\n"
        "- login_code: null. This specific field is not found in the document.\n"
        "- brokerage_name: The text after 'BrokerName:'. This is the name of the broker.\n"
        "- carrying_capacity: The numeric value from 'SeatCap' (Seating Capacity). Extract only the number.\n"
        "- chassis_number: The value labeled 'Vehicle/Trailer Chassis No'.\n"
        "- cubic_capacity: The numeric value from 'CC/KW'. Extract only the number.\n"
        "Return a valid JSON object using only the exact keys listed above. Do not add any other keys or commentary."
        "\nDocument:\n"
    ),
    "RoyalSundaramGeneralInsuranceCo.Limited": (
        "Extract the following fields from the insurance document below. "
        "Be very precise. Use null for missing values:\n"
        "- date_of_issue: text after 'Date of Issue' or 'Document Date'\n"
        "- insured_name: full name of the insured\n"
        "- product_type: insurance product name\n"
        "- policy_number: text after 'Policy No.'\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the main vehicle category and subcategory from policy description, combining them with a '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only.\n"
        "- registration_number: vehicle registration number only; remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990')\n"
        "- weight: numeric value after 'Gross Vehicle Weight (Kgs)', remove commas and spaces\n"
        "- year_of_manufacture: vehicle manufacturing year\n"
        "- make: Extract the value from 'Make' field.\n"
        "- model: Extract the value from 'Model' field.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: Insurance Start Date\n"
        "- end_date: Insurance Expiry Date\n"
        "- total_od_premium: value labeled 'Gross OD(A)'\n"
        "- total_tp_premium: numeric value labeled 'TOTAL LIABILITY PREMIUM(B)', remove commas\n"
        "- net_premium: value labeled 'Total Premium (A+B)'\n"
        "- gross_premium: value labeled 'TOTAL PREMIUM PAYABLE'\n"
        "- login_code: text after 'Underwritten By'\n"
        "- brokerage_name: text after 'Brokerage code' or 'Agent Details'\n"
        "- carrying_capacity: seat capacity\n"
        "- chassis_number: vehicle chassis number\n"
        "- cubic_capacity: vehicle cubic capacity\n"
        "Return a JSON object with only the keys listed below, using null if any field is missing.\n"
        "Document:\n"
    ),

    "IFFCO-TOKIO General Insurance Co. Ltd": (
        "Extract the following fields from the insurance document below. "
        "Be very precise. Use null for missing values:\n"
        "- date_of_issue: text after 'Date of Issue' or 'Document Date'\n"
        "- insured_name: full name of the insured\n"
        "- product_type: insurance product name\n"
        "- policy_number: text after 'Policy No.'\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the main vehicle category and subcategory from policy description, combining them with a '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only.\n"
        "- registration_number: vehicle registration number only; remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990')\n"
        "- weight: value labeled as 'Vehicle Weight' or 'GVW'\n"
        "- year_of_manufacture: vehicle manufacturing year\n"
        "- make: Extract the value from 'Make' field.\n"
        "- model: Extract the value from 'Model' field.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: Insurance Start Date\n"
        "- end_date: Insurance Expiry Date\n"
        "- total_od_premium: value labeled 'Gross OD(A)'\n"
        "- total_tp_premium: value labeled 'Gross TP(B)'\n"
        "- net_premium: value labeled 'Premium(A+B)'\n"
        "- gross_premium: value labeled 'Total Premium' or 'Receipt Amount'\n"
        "- login_code: text after 'Underwritten By' or 'Executive ID'\n"
        "- brokerage_name: text after 'Brokerage code' or 'Agent Details'\n"
        "- carrying_capacity: seat capacity\n"
        "- chassis_number: vehicle chassis number\n"
        "- cubic_capacity: vehicle cubic capacity\n"
        "Return a JSON object with only the keys listed below, using null if any field is missing.\n"
        "Document:\n"
    ),

    "ICICI Lombard": (
        "Extract the following fields from the ICICI Lombard Risk Assumption/Policy Schedule document below. "
        "Be very precise. Use null for missing values. The text may be fragmented due to OCR:\n"
        "- date_of_issue: the date after 'Date:' or 'Policy Issued on' (e.g., 'Sep 13, 2025')\n"
        "- insured_name: the text after 'Name of the Insured :' or 'Name of the Insured'\n"
        "- product_type: use the product header like 'Passenger Carrying Vehicles Package Policy'\n"
        "- policy_number: the text after 'Policy No. :' or 'Policy No.' (e.g., '3004/407871828/00/B00')\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the vehicle usage or class (prefer 'Vehicle Usage' if present, else 'Vehicle SubClass' or policy header) and combine main category with subcategory using '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only.\n"
        "- registration_number: the text after 'Vehicle Registration No.' or 'Registration No.'. Remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990').\n"
        "- weight: numeric GVW if present; if missing in document, use null\n"
        "- year_of_manufacture: from 'Mfg Yr' or the 'Mfg Yr' column; if not present, use the registration year\n"
        "- make: Extract the value from 'Vehicle Make' field (e.g., 'TATA MOTORS').\n"
        "- model: Extract the value from 'Model' field (e.g., 'LP 712 STARBUS PRIME').\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: the start of 'Period of Insurance' (e.g., 'Sep 16, 2025')\n"
        "- end_date: the end of 'Period of Insurance' (e.g., 'Sep 15, 2026')\n"
        "- total_od_premium: the numeric value after 'Total Own Damage Premium(A)'\n"
        "- total_tp_premium: the numeric value after 'Total Liability Premium(B)'\n"
        "- net_premium: the numeric value after 'Total Package Premium(A+B)'\n"
        "- gross_premium: the numeric value after 'Total Premium Payable'\n"
        "- login_code: the 'Agent Code' or 'Executive ID' if present\n"
        "- brokerage_name: the 'Agent Name' or 'Broker Name' if present\n"
        "- carrying_capacity: the numeric value in 'Seating Capacity' or 'Seating'\n"
        "- chassis_number: the text after 'Chassis No.'\n"
        "- cubic_capacity: the numeric value after 'CC' or 'Cubic Capacity'; if not present, use null\n"
        "Return a JSON object with only the keys listed below, using null if any field is missing.\n"
        "Document:\n"
    ),

    "TATA AIG General Insurance Company Limited": (
        "Extract the following fields from the insurance document below. "
        "Be very precise. Use null for missing values:\n"
        "- date_of_issue: text after 'Receipt' or adjacent to 'Receipt No.'\n"
        "- insured_name: full name of the insured\n"
        "- product_type: insurance product name\n"
        "- policy_number: text after 'Policy No.'\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the vehicle type from product header or policy description, combining main category with subcategory using '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only.\n"
        "- registration_number: vehicle registration number only, not chassis number. Remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990').\n"
        "- weight: value labeled as 'Vehicle Weight' or 'GVW'\n"
        "- year_of_manufacture: vehicle manufacturing year\n"
        "- make: Extract the value from 'Make' field in vehicle details.\n"
        "- model: Extract the value from 'Model' field in vehicle details.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: Insurance Start Date from 'Period of Insurance'\n"
        "- end_date: Insurance Expiry Date from 'Period of Insurance'\n"
        "- total_od_premium: value labeled 'Own Damage Premium' or 'Total OD Premium'\n"
        "- total_tp_premium: value labeled 'Third Party Premium', 'Liability Premium', or 'Total TP Premium'\n"
        "- net_premium: value labeled 'Net Premium'\n"
        "- gross_premium: value labeled 'Gross Premium' or 'Total Premium'\n"
        "- login_code: text after 'Executive ID' or 'Underwritten By'\n"
        "- brokerage_name: text after 'Agent Details' or 'Broker Name'\n"
        "- carrying_capacity: value labeled as 'Seating Capacity'\n"
        "- chassis_number: from vehicle specifications\n"
        "- cubic_capacity: from vehicle specifications\n"
        "Return a JSON object with only the keys listed below, using null if any field is missing.\n"
        "Document:\n"
    ),

    "SBI GENERAL INSURANCE COMPANY LIMITED": (
        "Extract the following fields from the insurance document below. "
        "Be very precise. Use null for missing values:\n"
        "- date_of_issue: text after 'Policy Issue Date' or 'Document Date'\n"
        "- insured_name: full name of the insured\n"
        "- product_type: insurance product name\n"
        "- policy_number: text after 'Policy No.'\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the vehicle type from product header or policy description, combining main category with subcategory using '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only.\n"
        "- registration_number: vehicle registration number only, not chassis number. Remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990').\n"
        "- weight: value labeled as 'Vehicle Weight'\n"
        "- year_of_manufacture: vehicle manufacturing year\n"
        "- make: Extract the value from 'Make' field in vehicle details.\n"
        "- model: Extract the value from 'Model' field in vehicle details.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: Insurance Start Date from 'Period of Insurance'\n"
        "- end_date: Insurance Expiry Date from 'Period of Insurance'\n"
        "- total_od_premium: value labeled 'Own Damage Premium' or 'Total OD Premium'\n"
        "- total_tp_premium: value labeled 'Third Party Premium', 'Liability Premium', or 'Total TP Premium'\n"
        "- net_premium: value labeled 'Net Premium'\n"
        "- gross_premium: value labeled 'Gross Premium' or 'Total Premium'\n"
        "- login_code: text after 'Executive ID' or 'Underwritten By'\n"
        "- brokerage_name: text after 'Agent Details' or 'Broker Name'\n"
        "- carrying_capacity: value labeled as 'Seating Capacity'\n"
        "- chassis_number: from vehicle specifications\n"
        "- cubic_capacity: from vehicle specifications\n"
        "Return a JSON object with only the keys listed below, using null if any field is missing.\n"
        "Document:\n"
    ),

    "Go Digit General Insurance Ltd": (
        "Extract the following fields from the insurance document below. "
        "Be very precise. Use null for missing values:\n"
        "- date_of_issue: text after 'Policy Issue Date' or 'Document Date'\n"
        "- insured_name: full name of the insured (e.g., 'MR XYZ')\n"
        "- product_type: insurance product name\n"
        "- policy_number: text after 'Policy No.'\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the vehicle type from product header or policy description, combining main category with subcategory using '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only.\n"
        "- registration_number: vehicle registration number only, not chassis number. Remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990').\n"
        "- weight: value labeled as 'Gross Vehicle Weight' (include units if available, e.g., '2995 Kg')\n"
        "- year_of_manufacture: vehicle manufacturing year\n"
        "- make: Extract the value from 'Make' field in vehicle details.\n"
        "- model: Extract the value from 'Model' field in vehicle details.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: Insurance Start Date from 'Period of Insurance'\n"
        "- end_date: Insurance Expiry Date from 'Period of Insurance'\n"
        "- total_od_premium: extract the numeric value immediately following labels containing any of ['Own Damage', 'OD', 'T Po reta ml iO umD']. Use only the first number after this label.\n"
        "- total_tp_premium: extract the numeric value immediately following labels containing any of ['Third Party', 'Liability', 'TP', 'T Po reta ml iA umct']. Use only the first number after this label.\n"
        "- net_premium: value labeled 'Net Premium'\n"
        "- gross_premium: value labeled 'Gross Premium' or 'Total Premium'\n"
        "- login_code: text after 'Executive ID' or 'Underwritten By'\n"
        "- brokerage_name: text after 'Agent Details' or 'Broker Name'\n"
        "- carrying_capacity: seat capacity (e.g., '3 + 1')\n"
        "- chassis_number: from vehicle specifications\n"
        "- cubic_capacity: from vehicle specifications\n"
        "Return a JSON object with only the keys listed below, using null if any field is missing.\n"
        "Document:\n"
    ),

    "SHRIRAM GENERAL INSURANCE COMPANY LIMITED": (
        "Extract the following fields from the insurance document. "
        "Be very precise. Use null for missing values:\n"
        "- date_of_issue: text after 'Policy Issue Date' or 'Document Date'\n"
        "- insured_name: full name after 'Insured's Code/ Name'\n"
        "- product_type: insurance product name (e.g., 'MOTOR COMMERCIAL VEHICLE (LIABILITY ONLY POLICY)')\n"
        "- policy_number: text after 'Policy No.'\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract the vehicle type from product header and combine main category with subcategory using '/' (e.g., convert 'PCCV-3 wheelers-carrying passengers' to 'PCCV/3 wheelers-carrying passengers' or 'GCV/school bus'). If only one part is available, use that part only.\n"
        "- registration_number: text after 'REGISTRATION'. Remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990').\n"
        "- weight: null (not available in Shriram format)\n"
        "- year_of_manufacture: vehicle details (e.g., '2007')\n"
        "- make: Extract the value from 'Make' field in vehicle details.\n"
        "- model: Extract the value from 'Model' field in vehicle details.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: Insurance Start Date from 'Period of Insurance'\n"
        "- end_date: Insurance Expiry Date from 'Period of Insurance'\n"
        "- total_od_premium: 'Gross OD(A)' from 'SCHEDULE OF PREMIUM'\n"
        "- total_tp_premium: 'Gross TP(B)' from 'SCHEDULE OF PREMIUM'\n"
        "- net_premium: 'Premium(A+B)' from 'SCHEDULE OF PREMIUM'\n"
        "- gross_premium: 'Total(Rounded Off)' or 'Receipt Amount'\n"
        "- login_code: Executive ID (e.g., 'NAN000002950')\n"
        "- brokerage_name: text after 'Agent Details' (e.g., 'MYRRA INSURANCE PROMOTERS PRIVATE LIMITED')\n"
        "- carrying_capacity: seat capacity (e.g., '3 + 1')\n"
        "- chassis_number: from vehicle specifications\n"
        "- cubic_capacity: from vehicle specifications\n"
        "Return a JSON object with all fields, using null for missing values.\n"
        "Document:\n"
    ),
    "UNITED INDIA INSURANCE COMPANY LIMITED": (
        "Extract the following fields from the insurance document. "
        "Be very precise. Use null for missing values:\n"
        "- date_of_issue: text after 'Date of Issue:' or 'Receipt Date:'\n" 
        "- insured_name: text after 'Name of the Insured'\n"
        "- policy_number: text after 'Policy No.'\n"
        "- registration_number: text after 'Registration Number' or 'Regn. No.'. Remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990').\n"
        "- weight: value after 'Gross Vehicle' or 'GVW'\n"
        "- year_of_manufacture: vehicle details\n"
        "- make: Extract the value from 'Make' field.\n"
        "- model: Extract the value from 'Model' field.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: Insurance Start Date & Time\n"
        "- end_date: Insurance Expiry Date & Time\n"
        "- total_od_premium: 'Gross OD(A)'\n"
        "- total_tp_premium: 'extract the numeric value that appears **after the label 'Gross TP(B)'** and **before the label 'Sub Total (Deductions)'**.'\n"
        "- net_premium: 'Premium(A+B)'\n"
        "- gross_premium: 'Total(Rounded Off)' or 'Receipt Amount'\n"
        "- login_code: text after 'Underwritten By'\n"
        "- brokerage_name: text after 'Brokerage code'\n"
        "- product_type: text after 'Product Type' or 'Type of Policy', use null if missing\n"
        "- type: Format the vehicle type with a slash separator like 'GCV/school bus'. Extract text after 'Vehicle Type' or 'Type', combining main category with subcategory using '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only. Use null if missing.\n"
        "- carrying_capacity: text after 'Carrying Capacity' or 'GVW', use null if missing\n"
        "- chassis_number: text after 'Chassis No.' or 'Chassis Number', use null if missing\n"
        "- cubic_capacity: extract the number **before the '/'** in the line after the label 'Cubic Capacity/Seating', use null if missing\n"
        "- seating_capacity: extract the number **after the '/'** in the line after the label 'Cubic Capacity/Seating', use null if missing\n"
        "Return a JSON object with all fields below:\n"
    ),
    "Reliance General Insurance Company Limited": (
        "Extract the following fields from the insurance document below with extreme precision. "
        "Use null for missing values. Follow these exact rules:\n"
        "- date_of_issue: the date shown with labels like 'Tax Invoice No. & Date', 'Policy Issued On', or the first date near policy header. Convert to 'YYYY-MM-DD'.\n"
        "- insured_name: text after 'Insured Name'. If multiple lines, take the first full line of the insured party.\n"
        "- product_type: use the policy heading such as 'A Policy for Act Liability Insurance'. Trim quotes.\n"
        "- policy_number: the value after 'Policy Number'.\n"
        "- type: combine vehicle category and usage (e.g., 'Bus / School Bus'). If only one descriptor exists, return that.\n"
        "- registration_number: value after 'Registration No.'. Remove spaces, dashes, and special characters; uppercase result.\n"
        "- weight: value from 'Gross Vehicle Weight' or similar; remove units. If absent, null.\n"
        "- year_of_manufacture: value from 'Mfg. Month & Year' or 'Year of Manufacture'. Extract the year (e.g., '2004').\n"
        "- make: value from 'Make'.\n"
        "- model: value from 'Model'.\n"
        f"{NCB_INSTRUCTION}"
        "- start_date: start of 'Period of Insurance'. Convert to 'YYYY-MM-DD'.\n"
        "- end_date: end of 'Period of Insurance'. Convert to 'YYYY-MM-DD'.\n"
        "- total_od_premium: numeric Total Own Damage premium (if shown as 0, return 0). Remove commas.\n"
        "- total_tp_premium: numeric Total Liability premium. Remove commas.\n"
        "- net_premium: net premium before taxes (if available). Remove commas.\n"
        "- gross_premium: total premium payable including taxes. Remove commas.\n"
        "- login_code: value after 'Intermediary Code' or 'login_code'. If blank, null.\n"
        "- brokerage_name: value after 'Brokerage Name', 'Intermediary Name', or similar broker label.\n"
        "- carrying_capacity: seat capacity (e.g., '58'). Extract numeric portion.\n"
        "- chassis_number: value after 'Chassis No.'.\n"
        "- cubic_capacity: value after 'CC / HP' or similar cubic capacity label. Extract numeric portion.\n"
        "Return a JSON object with exactly these keys and null for missing items.\n"
        "Document:\n"
    ),
}


def call_gemini(prompt, retries=7, delay=10):
    client = genai.Client(api_key="AIzaSyCNIiP32rH3swQ0XFj0MbtBEvBP9cElY10") #old key
    # client = genai.Client(api_key="AIzaSyCmHs-ohLfh3kDLVV6DFCtWRZOZg8fT33k") #new key
    chat = client.chats.create(model="gemini-2.0-flash")
    
    full_prompt = (
        "You are an expert insurance document parser. "
        "Extract only the requested fields as JSON.\n\n"
        f"{prompt}"
    )

    for attempt in range(retries):
        try:
            response = chat.send_message(full_prompt)
            return response.text
        except Exception as e:
            error_text = str(e)
            retriable = any(code in error_text for code in ("503", "429", "RESOURCE_EXHAUSTED"))
            if retriable:
                sys.stderr.write(
                    f"Model unavailable ({error_text}). Retrying in {delay} seconds... "
                    f"({attempt+1}/{retries})\n"
                )
                time.sleep(delay * (attempt + 1))
            else:
                raise e
    return json.dumps({"status": "error", "message": "Model unavailable after retries."})


def detect_insurance_company(text):
    for company in INSURANCE_COMPANIES:
        if company.lower() in text.lower():
            return company
    return None

def trim_text_for_token_limit(text, max_chars=15000):
    return text[:max_chars] if len(text) > max_chars else text

def extract_json_from_response(ai_response):
    # Try to extract JSON from code block first
    matches = re.findall(r"```(?:json)?\s*([\s\S]*?)\s*```", ai_response)
    candidate = matches[0] if matches else ai_response

    start = candidate.find('{')
    end = candidate.rfind('}')
    json_str = candidate[start:end+1] if start != -1 and end != -1 and end > start else candidate

    # Clean numeric commas
    json_str = re.sub(r'(\d),(\d{3})([.,])', r'\1\2\3', json_str)
    json_str = re.sub(r'(\d+),(\d+)', r'\1\2', json_str)

    try:
        data = json.loads(json_str)
    except Exception:
        return {f: None for f in FIELDS}

    # Ensure all fields are present
    for f in FIELDS:
        if f not in data:
            data[f] = None

    return data

def process_pdf(pdf_path):
    try:
        with pdfplumber.open(pdf_path) as pdf:
            text = ""
            table_data = []
            for page in pdf.pages:
                page_text = page.extract_text()
                if page_text:
                    text += page_text
                tables = page.extract_tables()
                for table in tables:
                    table_data.extend(table)

        trimmed_text = trim_text_for_token_limit(text)
        company = detect_insurance_company(trimmed_text)

        if company and company in COMPANY_PROMPTS:
            prompt = COMPANY_PROMPTS[company] + trimmed_text
        else:
            prompt = (
                "Extract the following fields from the insurance document below. "
                "Rules: For 'registration_number', remove all spaces, dashes, and special characters and uppercase the result (e.g., 'TN31E9990'). "
                "For 'type', format the vehicle type with a slash separator like 'GCV/school bus', combining main category with subcategory using '/' (e.g., 'GCV/school bus', 'LCV/goods carrier'). If only one part is available, use that part only. "
                "For 'make' and 'model', extract them as separate fields from 'Make' and 'Model' fields respectively. "
                "For numeric fields, remove commas. "
                f"{NCB_INSTRUCTION}"
                "Return the result as a JSON object with these keys (use null if not found):\n"
                f"{FIELDS}\n\nDocument:\n{trimmed_text}"
            )

        ai_response = call_gemini(prompt)
        extracted = extract_json_from_response(ai_response)

        return json.dumps({
            'fields': extracted,
            'text': text
        })

    except Exception as e:
        return json.dumps({'error': str(e)})

if __name__ == "__main__":
    try:
        if len(sys.argv) < 2:
            print(json.dumps({'error': 'No PDF path provided'}))
            sys.exit(1)

        pdf_path = sys.argv[1]
        print(process_pdf(pdf_path))
    except Exception as e:
        # Ensure any unexpected errors are returned as valid JSON
        print(json.dumps({'error': f'Unexpected error: {str(e)}'}))
        sys.exit(1)