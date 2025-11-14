<!-- Shared plugin CSS moved to layout.php -->



<div class="container-fluid">
    <style>
        /* Ensure top-aligned labels for selects (labels that are direct children of form-group) */
        #contact_div .form-group > label.form-label {
            display: block;
            margin-bottom: 6px;
        }
        /* Normalize floating labels inside .form-line to behave like top labels */
        #contact_div .form-line {
            position: relative;
            padding-top: 18px;
        }
        #contact_div .form-line > label.form-label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            font-size: 12px;
            line-height: 1.2;
            transform: none;
            opacity: 1;
        }
        /* Ensure consistent spacing between fields */
        #contact_div .form-group {
            margin-bottom: 15px;
        }
        /* Make Select2 match input heights and full width */
        #agent_split_section .select2-container,
        #company_split_section .select2-container {
            width: 100% !important;
        }
        #contact_div .select2-container {
            width: 100% !important;
        }
        #contact_div .select2-container .select2-selection--single {
            height: 34px;
        }
        #contact_div .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 34px;
        }
        #contact_div .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 34px;
        }
        /* Minor tweak so inputs with floating label don't add extra top space */
        /* Error label styling */
        #contact_div label.error {
            color: #f44336;
            display: none;
            margin-top: 4px;
            font-size: 12px;
        }
       
    </style>
    <!-- <div class="block-header">
        <h2><?php echo $title;?></h2>
    </div> -->
    <form id="ins-form" method="post" enctype="multipart/form-data" novalidate>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header" style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
                        <a href="#" onclick="goBack(event)" style="display: flex; align-items: center; text-decoration: none; margin-right: 20px;">
                            <span style="vertical-align: bottom;" class="material-icons">arrow_back_ios</span>
                            <h2 style="margin: 0 0 0 8px; display: inline-block;">
                                <?php echo $title;?>
                            </h2>
                        </a>
                        <div style="margin-left: auto; display: flex; gap: 8px;">
                            <?php if ($mode !== 'a'): ?>
                                <button type="button" id="pdf-ins" class="btn bg-grey waves-effect" style="margin: 0; display: flex; align-items: center;">
                                    <i class="material-icons">picture_as_pdf</i>
                                </button>
                            <?php endif; ?>
                            <?php if ($mode === 'v'): ?>
                                <button type="button" id="edit-ins" class="btn bg-blue waves-effect" style="margin: 0; display: flex; align-items: center;">
                                    <i class="material-icons">edit</i>
                                </button>
                            <?php endif; ?>
                            <?php if ($mode !== 'a'): ?>
                                <button type="button" id="del-ins" class="btn bg-red waves-effect" style="margin: 0; display: flex; align-items: center;">
                                    <i class="material-icons">delete</i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="body" id="contact_div">
                        <div class="row clearfix">
                            <div class="col-sm-10">
                                <label class="form-address">Insurance Record</label>
                            </div>
                        </div>
                        <input id="id" name="id" type="text" maxlength="250" class="form-control" style="display: none;" />
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group form-float">
                                    <label class="form-label">Staff</label>
                                    <select id="staff_id" name="staff_id" class="form-control" required>
                                        <option value="">-- Select Staff --</option>
                                        <?php if (isset($staffs) && !empty($staffs)) : ?>
                                            <?php foreach ($staffs as $item) : ?>
                                                <option value="<?php echo $item['id']; ?>">
                                                    <?php echo $item['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">No staff found</option>
                                        <?php endif; ?>
                                    </select>
                                    <label class="error" for="staff_id" style="display:none;"></label>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group form-float">
                                    <label class="form-label">Agent</label>
                                    <select id="agent_id" name="agent_id" class="form-control" required>
                                        <option value="">-- Select Agent --</option>
                                        <?php if (isset($agents) && !empty($agents)) : ?>
                                            <?php foreach ($agents as $item) : ?>
                                                <option value="<?php echo $item['id']; ?>">
                                                    <?php echo $item['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">No agents found</option>
                                        <?php endif; ?>
                                    </select>
                                    <label class="error" for="agent_id" style="display:none;"></label>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group form-float"> 
                                    <label class="form-label">Login ID</label>
                                    <select id="login_id" name="login_id" class="form-control" required>
                                        <option value="">-- Select Login ID --</option>
                                        <?php if (isset($login_ids) && !empty($login_ids)) : ?>
                                            <?php foreach ($login_ids as $item) : ?>
                                                <option value="<?php echo $item['id']; ?>">
                                                    <?php echo $item['name']; ?> -- <?php echo $item['agent_code_name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">No Login IDs found</option>
                                        <?php endif; ?>
                                    </select>
                                    <label class="error" for="login_id" style="display:none;"></label>
                                </div>
                            </div>

                            <!-- <div class="col-sm-6 col-md-3">
                                <div class="form-group form-float">
                                    <label class="form-label">Agent Code</label>
                                    <select id="agent_code_id" name="agent_code_id" class="form-control" required>
                                        <option value="">-- Select Agent Code --</option>
                                        <?php if (isset($agent_codes) && !empty($agent_codes)) : ?>
                                            <?php foreach ($agent_codes as $item) : ?>
                                                <option value="<?php echo $item['id']; ?>">
                                                    <?php echo $item['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">No agent codes found</option>
                                        <?php endif; ?>
                                    </select>
                                    <label class="error" for="agent_code_id" style="display:none;"></label>
                                </div>
                            </div> -->
                        </div>

                        <div class="row clearfix">

                            <div class="col-sm-4 col-md-3">
                                <div class="form-group form-float">
                                    <label class="form-label">Paid Type</label>
                                    <select id="paid_type" name="paid_type" class="form-control" required>
                                        <option selected value="">-- Select Payment --</option>
                                        <option value="agent_paid">Agent Paid</option>
                                        <option value="company_paid">Company Paid</option>
                                        <option value="agent_company_paid">Agent & Company Paid</option>
                                    </select>
                                    <label class="error" for="paid_type" style="display:none;"></label>
                                </div>
                            </div>

                            <div class="col-sm-3 col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input
                                            id="received_account"
                                            name="received_account"
                                            type="text"
                                            class="form-control"
                                            pattern="[A-Za-z0-9]+"
                                            title="Only letters and numbers allowed"
                                            <?php if ($mode == 'v') echo 'readonly'; ?>
                                        />
                                        <label class="form-label">Received Account</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Custom Date Field -->
                            <div class="col-sm-3 col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line" id="received_date_line">
                                        <input
                                            id="received_date"
                                            name="received_date"
                                            type="date"
                                            class="form-control"
                                            autocomplete="off"
                                            <?php if ($mode == 'v') echo 'readonly'; ?>
                                        />
                                        <label class="form-label">Received Date</label>
                                    </div>
                                </div>
                            </div>

                            <?php if ($mode != 'a') : ?>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <label class="form-label">Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="active" <?= (isset($status) && $status == 'active') ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive" <?= (isset($status) && $status == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                    <label class="error" for="status" style="display:none;"></label>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="row clearfix" id="agent_split_section" style="display:none;">
                            <div class="col-sm-4 col-md-3">
                                <div class="form-group form-float">
                                    <label class="form-label">Agent Payment Mode</label>
                                    <select id="agent_payment_mode" name="agent_payment_mode" class="form-control">
                                        <option value="">-- Payment Mode --</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Credit">Credit Card</option>
                                        <option value="Cut & Pay">Cut &amp; Pay</option>
                                        <option value="Online">Online</option>
                                        <option value="UPI">UPI</option>
                                    </select>
                                    <label class="error" for="agent_payment_mode" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="agent_amount" name="agent_amount" type="number" class="form-control" min="0" step="0.01" <?php if ($mode == 'v') echo 'readonly'; ?> />
                                        <label class="form-label">Agent Amount</label>
                                    </div>
                                    <label class="error" for="agent_amount" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-3" id="agent_chequeno_wrap" style="display:none;">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="agent_chequeno" name="agent_chequeno" type="text" class="form-control" <?php if ($mode == 'v') echo 'readonly'; ?> />
                                        <label class="form-label">Agent Cheque No</label>
                                    </div>
                                    <label class="error" for="agent_chequeno" style="display:none;"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix" id="company_split_section" style="display:none;">
                            <div class="col-sm-4 col-md-3">
                                <div class="form-group form-float">
                                    <label class="form-label">Company Payment Mode</label>
                                    <select id="company_payment_mode" name="company_payment_mode" class="form-control">
                                        <option value="">-- Payment Mode --</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Credit">Credit Card</option>
                                        <option value="Cut & Pay">Cut &amp; Pay</option>
                                        <option value="Online">Online</option>
                                        <option value="UPI">UPI</option>
                                    </select>
                                    <label class="error" for="company_payment_mode" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_amount" name="company_amount" type="number" class="form-control" min="0" step="0.01" <?php if ($mode == 'v') echo 'readonly'; ?> />
                                        <label class="form-label">Company Amount</label>
                                    </div>
                                    <label class="error" for="company_amount" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-3" id="company_chequeno_wrap" style="display:none;">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_chequeno" name="company_chequeno" type="text" class="form-control" <?php if ($mode == 'v') echo 'readonly'; ?> />
                                        <label class="form-label">Company Cheque No</label>
                                    </div>
                                    <label class="error" for="company_chequeno" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-3" id="company_issuer_name_wrap" style="display:none;">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_issuer_name" name="company_issuer_name" type="text" class="form-control" <?php if ($mode == 'v') echo 'readonly'; ?> />
                                        <label class="form-label">Company Issuer Name</label>
                                    </div>
                                    <label class="error" for="company_issuer_name" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3" id="company_credit_card_wrap" style="display:none;">
                                <div class="form-group form-float">
                                    <label class="form-label">Company Credit Card</label>
                                    <select id="company_credit_card_id" name="company_credit_card_id" class="form-control">
                                        <option value="">-- Select Credit Card --</option>
                                    </select>
                                    <label class="error" for="company_credit_card_id" style="display:none;"></label>
                                </div>
                            </div>
                        </div>

                        <?php if ($mode != 'a') : ?>

                        <div class="row clearfix" id="edit_div">

                            <!-- Child ID -->
                            <!-- <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="child_id" name="child_id" type="text" class="form-control" />
                                        <label class="form-label">Child ID</label>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Policy No -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="policy_no" name="policy_no" type="text" class="form-control" onblur="this.value = this.value.trim();" />
                                        <label class="form-label">Policy No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Vehicle No -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="vehicle_no" name="vehicle_no" type="text" class="form-control" />
                                        <label class="form-label">Vehicle No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Name -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="customer_name" name="customer_name" type="text" class="form-control" />
                                        <label class="form-label">Customer Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Make -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="make" name="make" type="text" class="form-control" />
                                        <label class="form-label">Make</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Model -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="model" name="model" type="text" class="form-control" />
                                        <label class="form-label">Model</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Vehicle Type -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="vehicle_type" name="vehicle_type" type="text" class="form-control" />
                                        <label class="form-label">Vehicle Type</label>
                                    </div>
                                </div>
                            </div>

                            

                           

                            <!-- MFG Year -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="mfg_year" name="mfg_year" type="text" class="form-control" />
                                        <label class="form-label">MFG Year</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Age -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="age" name="age" type="number" class="form-control" />
                                        <label class="form-label">Age</label>
                                    </div>
                                </div>
                            </div>

                            <!-- GVW -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="gvw" name="gvw" type="number" class="form-control" />
                                        <label class="form-label">GVW</label>
                                    </div>
                                </div>
                            </div>

                            <!-- NCB -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="ncb" name="ncb" type="text" class="form-control" />
                                        <label class="form-label">NCB</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Policy Type -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="policy_type" name="policy_type" type="text" class="form-control" />
                                        <label class="form-label">Policy Type</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Start Date -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="start_date" name="start_date" type="date" class="form-control" />
                                        <label class="form-label">Start Date</label>
                                    </div>
                                </div>
                            </div>

                            <!-- End Date -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="end_date" name="end_date" type="date" class="form-control" />
                                        <label class="form-label">End Date</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Company Name -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_name" name="company_name" type="text" class="form-control" />
                                        <label class="form-label">Company Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- OD -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="od" name="od" type="text" class="form-control" />
                                        <label class="form-label">OD</label>
                                    </div>
                                </div>
                            </div>

                            <!-- TP -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="tp" name="tp" type="text" class="form-control" />
                                        <label class="form-label">TP</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Net -->
                            <?php $user_role = $this->session->userdata('role'); ?>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="net" name="net" type="text" class="form-control" <?php if ($user_role != 1) echo 'readonly'; ?> />
                                        <label class="form-label">Net</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Premium -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="premium" name="premium" type="text" class="form-control" />
                                        <label class="form-label">Premium</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Reward -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="reward" name="reward" type="text" class="form-control" />
                                        <label class="form-label">Reward</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Company Grid -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_grid" name="company_grid" type="text" class="form-control" />
                                        <label class="form-label">Company Grid</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Company Grid 2 -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_grid2" name="company_grid2" type="text" class="form-control" />
                                        <label class="form-label">Company Grid 2</label>
                                    </div>
                                </div>
                            </div>

                            <!-- TDS -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="tds" name="tds" type="text" class="form-control" />
                                        <label class="form-label">TDS</label>
                                    </div>
                                </div>
                            </div>

                            <!-- RTO/Company ID -->
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group form-float">
                                    <label class="form-label">RTO Company</label>
                                    <select id="rto_company_id" name="rto_company_id" class="form-control">
                                        <option value="">-- Select RTO Company --</option>
                                        <?php if (isset($rto_companies) && !empty($rto_companies)) : ?>
                                            <?php foreach ($rto_companies as $item) : ?>
                                                <option value="<?php echo $item['id']; ?>">
                                                    <?php echo $item['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">No RTO companies found</option>
                                        <?php endif; ?>
                                    </select>
                                    <label class="error" for="rto_company_id" style="display:none;"></label>
                                </div>
                            </div>

                            <!-- Verified Status -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <label class="form-label">Verified Status</label>
                                    <select id="verified_status" name="verified_status" class="form-control">
                                        <option value="">-- Verified Status --</option>
                                        <option value="missing">Missing</option>
                                        <option value="shortfall">Shortfall</option>
                                        <option value="done">Done</option>
                                    </select>
                                    <label class="error" for="verified_status" style="display:none;"></label>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row clearfix">  
                            <?php if ($mode == 'a'): ?>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div id="pdf-dropzone" class="fallback dropzone">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">picture_as_pdf</i>
                                            </div>
                                            <h4>Drop Insurance PDF here or click to upload PDF.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div id="carousel_div" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <input type="hidden" id="hidden_image_path" name="image" value="">
                                                <!-- <img id="image_display" class="carousel-image" style="max-width: 30%; border-radius: 10px;border: 4px solid #d5d5d5;" /> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button id="submit_btn" type="submit" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Submit</button>
                                </div>
                            </div>
                        </div>

                    </div> <!-- body-->
                </div> <!-- card-->
            </div><!-- col-->
        </div> <!-- clearfix main-->
    </form>
</div> <!-- container-->




<script>
var mode = <?php echo json_encode($mode); ?>;
function startPageProgress() {
    if (window.NProgress) {
        NProgress.start();
    }
}
function donePageProgress() {
    if (window.NProgress) {
        NProgress.done();
    }
}
$(document).ready(function() {
    $('#agent_id, #login_id, #status, #payment_mode, #paid_type, #staff_id, #agent_code_id, #rto_company_id, #verified_status, #agent_payment_mode, #company_payment_mode, #company_credit_card_id').select2();
    function ensureSelect2FullWidth($elements) {
        $elements.each(function() {
            var instance = $(this).data('select2');
            if (instance && instance.$container) {
                instance.$container.css('width', '100%');
            }
        });
    }
    ensureSelect2FullWidth($('#agent_payment_mode, #company_payment_mode, #company_credit_card_id'));
    var id = <?php echo json_encode($id); ?>;
    var savedCompanyCreditCardId = null;
  
    var currentPdfPath = null;
    var $pdfButton = $('#pdf-ins');
    if ($pdfButton.length) {
        $pdfButton.prop('disabled', true).addClass('disabled');
        $pdfButton.on('click', function() {
            if (!currentPdfPath) {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'info',
                        title: 'No PDF linked',
                        text: 'Attach or upload a PDF to view it.',
                        timer: 1800,
                        showConfirmButton: false
                    });
                } else {
                    alert('No PDF linked to this policy yet.');
                }
                return;
            }
            setPdfView(currentPdfPath);
        });
    }

    function applyViewModeLock() {
        if (mode !== 'v') { return; }
        var $form = $('#ins-form');
        $form.find('input, select, textarea').not('[type="hidden"]').each(function() {
            var $el = $(this);
            $el.prop('disabled', true);
        });
        $form.find('select').each(function() {
            var $sel = $(this);
            $sel.prop('disabled', true).trigger('change.select2');
        });
        $form.find('button').not('#edit-ins, #pdf-ins, #del-ins').prop('disabled', true).addClass('disabled');
        $('#submit_btn').prop('disabled', true).addClass('disabled');
    }
    if (id) { $('#id').val(id); }
    if (mode === 'e' || mode === 'v') {
        $.ajax({
            url: '<?php echo base_url('admin/insurance_policy/get_policy_json/'); ?>' + id,
            type: 'GET',
            dataType: 'json',
            beforeSend: startPageProgress,
            success: function(resp){
                if (resp && resp.status === '1' && resp.data) {
                    var data = resp.data;
                    // console.log("data",data);
					['policy_no','vehicle_no','customer_name','make','model','vehicle_type','mfg_year','age','gvw','ncb','policy_type','start_date','end_date','company_name','od','tp','net','premium','reward','company_grid','company_grid2','tds','created_by','updated_by','created_at','updated_at','company_chequeno','company_issuer_name','agent_chequeno','received_account','received_date'].forEach(function(k){
                        if ($('#'+k).length && data[k] !== undefined) { $('#'+k).val(data[k]); }
                    });
                    if (data.staff_id !== undefined) $('#staff_id').val(data.staff_id).trigger('change');
                    if (data.agent_id !== undefined) $('#agent_id').val(data.agent_id).trigger('change');
                    if (data.login_id !== undefined) $('#login_id').val(data.login_id).trigger('change');
                    if (data.agent_code_id !== undefined) $('#agent_code_id').val(data.agent_code_id).trigger('change');
                    if (data.rto_company_id !== undefined) $('#rto_company_id').val(data.rto_company_id).trigger('change');
                    if (data.company_credit_card_id !== undefined && data.company_credit_card_id !== null && data.company_credit_card_id !== '') {
                        savedCompanyCreditCardId = data.company_credit_card_id;
                    } else {
                        savedCompanyCreditCardId = null;
                    }

                    if (data.agent_payment_mode !== undefined) {
                        $('#agent_payment_mode').val(data.agent_payment_mode);
                    }
                    if (data.company_payment_mode !== undefined) {
                        $('#company_payment_mode').val(data.company_payment_mode);
                    }
                    if (data.paid_type !== undefined) {
                        $('#paid_type').val(data.paid_type).trigger('change');
                    } else {
                        updatePaidTypeSections();
                    }
                    if (data.payment_mode !== undefined) {
                        $('#payment_mode').val(data.payment_mode).trigger('change');
                    }
                    if (data.agent_payment_mode !== undefined) {
                        $('#agent_payment_mode').trigger('change');
                        toggleAgentChequeFields();
                    }
                    if (data.company_payment_mode !== undefined) {
                        $('#company_payment_mode').trigger('change');
                    }
                    if (data.agent_amount !== undefined) { $('#agent_amount').val(data.agent_amount); }
					if (data.company_amount !== undefined) { $('#company_amount').val(data.company_amount); }
                    if (data.verified_status !== undefined) $('#verified_status').val(data.verified_status).trigger('change');
                    if (data.status !== undefined) $('#status').val(data.status).trigger('change');
                    if ($pdfButton.length) {
                        currentPdfPath = data.file_path || data.file_name || null;
                        if (currentPdfPath) {
                            $pdfButton.prop('disabled', false).removeClass('disabled');
                        } else {
                            $pdfButton.prop('disabled', true).addClass('disabled');
                        }
                    }
                }
            }
        }).always(donePageProgress);
    }


    $("#del-ins").click(function() {
        var id = $("#id").val();
        deleteInsurance(id);
    });

    $("#edit-ins").click(function() {
        var id = $("#id").val();
        window.location.href = '<?php echo base_url('admin/insurance_policy/insurance_policy_form/e/'); ?>' + id;
    });

    // if (window.location.hostname === "localhost" || window.location.hostname === "127.0.0.1") {
    //     $('select').each(function() { 
    //         $(this).val($(this).find('option:eq(1)').val()).change();
    //     });
    // }
    function loadActiveCreditCardsInto($sel, selectedId) {
        $.ajax({
            url: '<?php echo base_url('admin/master/active_credit_cards'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                if (res && res.status === '1') {
                    var selectedVal = (selectedId !== undefined && selectedId !== null && selectedId !== '') ? selectedId
                        : $sel.val();
                    $sel.empty().append('<option value="">-- Select Credit Card --</option>');
                    res.data.forEach(function(item){
                        var text = item.name + ' - ' + item.bank;
                        $sel.append($('<option>', { value: item.id, text: text }));
                    });
                    if (selectedVal !== undefined && selectedVal !== null && selectedVal !== '') {
                        $sel.val(String(selectedVal)).trigger('change');
                    } else {
                        $sel.val('').trigger('change');
                    }
                }
            }
        });
    }

    function toggleCompanyCreditCardSelect() {
        var modeVal = $('#company_payment_mode').val();
        if (modeVal === 'Credit' || modeVal === 'Credit Card') {
            $('#company_credit_card_wrap').show();
            $('#company_credit_card_id').attr('required', true);
            var currentVal = (savedCompanyCreditCardId !== null && savedCompanyCreditCardId !== undefined && savedCompanyCreditCardId !== '') ? savedCompanyCreditCardId
                : $('#company_credit_card_id').val();
            loadActiveCreditCardsInto($('#company_credit_card_id'), currentVal);
        } else {
            $('#company_credit_card_wrap').hide();
            $('#company_credit_card_id').removeAttr('required').val('').trigger('change');
            savedCompanyCreditCardId = null;
        }
    }
    function toggleAgentChequeFields() {
        var modeVal = $('#agent_payment_mode').val();
        if (modeVal === 'Cheque') {
            $('#agent_chequeno_wrap').show();
            $('#agent_chequeno').attr('required', true);
        } else {
            $('#agent_chequeno_wrap').hide();
            $('#agent_chequeno').removeAttr('required').val('');
            $('label.error[for="agent_chequeno"]').text('').hide();
            $('#agent_chequeno').removeClass('error');
        }
    }
    $('#agent_payment_mode').on('change', function() {
        toggleAgentChequeFields();
    });
    
    function toggleCompanyChequeFields() {
        var modeVal = $('#company_payment_mode').val();
        if (modeVal === 'Cheque') {
            $('#company_chequeno_wrap').show();
            $('#company_chequeno').attr('required', true);
            $('#company_issuer_name_wrap').show();
            $('#company_issuer_name').attr('required', true);
        } else {
            $('#company_chequeno_wrap').hide();
            $('#company_chequeno').removeAttr('required').val('');
            $('label.error[for="company_chequeno"]').text('').hide();
            $('#company_chequeno').removeClass('error');
            $('#company_issuer_name_wrap').hide();
            $('#company_issuer_name').removeAttr('required').val('');
            $('label.error[for="company_issuer_name"]').text('').hide();
            $('#company_issuer_name').removeClass('error');
        }
    }
    $('#company_payment_mode').on('change', function() {
        toggleCompanyCreditCardSelect();
        toggleCompanyChequeFields();
    });

    function updatePaidTypeSections() {
        var paidType = $('#paid_type').val();
		var showAgent = (paidType === 'agent_paid' || paidType === 'agent_company_paid');
		var showCompany = (paidType === 'company_paid' || paidType === 'agent_company_paid');

        if (showAgent) {
            $('#agent_split_section').show();
            $('#agent_payment_mode').attr('required', true);
            $('#agent_amount').attr('required', true);
            toggleAgentChequeFields();
            ensureSelect2FullWidth($('#agent_payment_mode'));
        } else {
            $('#agent_split_section').hide();
            $('#agent_payment_mode').removeAttr('required').val('').trigger('change');
            $('#agent_amount').removeAttr('required').val('');
            $('#agent_chequeno_wrap').hide();
            $('#agent_chequeno').removeAttr('required').val('');
        }

        if (showCompany) {
            $('#company_split_section').show();
            $('#company_payment_mode').attr('required', true);
            $('#company_amount').attr('required', true);
            toggleCompanyCreditCardSelect();
            toggleCompanyChequeFields();
            ensureSelect2FullWidth($('#company_payment_mode, #company_credit_card_id'));
        } else {
            $('#company_split_section').hide();
            $('#company_payment_mode').removeAttr('required').val('').trigger('change');
            $('#company_amount').removeAttr('required').val('');
            $('#company_credit_card_wrap').hide();
            $('#company_credit_card_id').removeAttr('required').val('').trigger('change');
        }
    }
    $('#paid_type').on('change', updatePaidTypeSections);
    updatePaidTypeSections();
    applyViewModeLock();

    if (mode === 'a') {
        $('#received_date_line').addClass('focused');
    }

    // Add 'focused' class to all form-line elements on page load
    $('.form-line').addClass('focused');

    // Ensure every control has an associated hidden error label (for jQuery Validate or custom usage)
    (function ensureErrorLabels() {
        $('#contact_div').find('input[id], select[id], textarea[id]').each(function() {
            var id = this.id;
            if (!id) return;
            var $group = $(this).closest('.form-group');
            if ($group.length === 0) {
                $group = $(this).parent();
            }
            if ($group.find('label.error[for="' + id + '"]').length === 0) {
                $('<label class="error" for="' + id + '" style="display:none;"></label>').appendTo($group);
            }
        });
    })();
    // Clear error label on user input/change
    $('#contact_div').on('input change', 'input[required], select[required], textarea[required]', function() {
        var id = this.id;
        if (!id) return;
        var $label = $('label.error[for="' + id + '"]');
        $label.text('').hide();
        if ($(this).is('select')) {
            var s2 = $(this).data('select2');
            if (s2 && s2.$container) {
                s2.$container.removeClass('select2-error');
            }
        } else {
            $(this).removeClass('error');
        }
    });
    
});


</script>

<script>
// Simple required-field validator that shows our red error labels instead of browser tooltips
function validateForm() {
    var isValid = true;
    // Only validate visible required fields (conditional sections manage required attrs already)
    $('#contact_div').find('input[required], select[required], textarea[required]').each(function() {
        var $field = $(this);
        var id = this.id;
        if (!id) { return; }
        // Skip fields not visible (hidden by section toggles)
        if (!$field.is(':visible')) { return; }
        var value = ($field.is('select')) ? ($field.val() || '') : $.trim($field.val() || '');
        var empty = (value === '' || value === null);
        var $label = $('label.error[for="' + id + '"]');
        if (empty) {
            isValid = false;
            $label.text('This field is required.').show();
            if ($field.is('select')) {
                var s2 = $field.data('select2');
                if (s2 && s2.$container) {
                    s2.$container.addClass('select2-error');
                }
            } else {
                $field.addClass('error');
            }
        } else {
            $label.text('').hide();
            if ($field.is('select')) {
                var s2c = $field.data('select2');
                if (s2c && s2c.$container) {
                    s2c.$container.removeClass('select2-error');
                }
            } else {
                $field.removeClass('error');
            }
        }
    });
    // Scroll to first visible error label if any
    if (!isValid) {
        var $firstErr = $('#contact_div label.error:visible').first();
        if ($firstErr.length) {
            $('html, body').animate({ scrollTop: $firstErr.offset().top - 100 }, 300);
        }
    }
    return isValid;
}
</script>

<script>
$(document).ready(function() {
    var mode = <?php echo json_encode($mode); ?>;
    
    Dropzone.autoDiscover = false;

    if (mode === 'a' && !Dropzone.instances.length) {
        var dropzoneInstance = new Dropzone("#pdf-dropzone", {
			url: '<?php echo base_url('admin/insurance_policy/upload_policy_pdfs'); ?>',
            maxFilesize: 10, 
            maxFiles: 10,
            acceptedFiles: 'application/pdf',
            dictDefaultMessage: "Drop PDFs here",
            parallelUploads: 10,
            autoProcessQueue: false,
            uploadMultiple: true,
            paramName: 'files',
            init: function() {
                var myDropzone = this;

                myDropzone.on("sendingmultiple", function(files, xhr, formData) {
                    startPageProgress();
                    var formFields = $("#ins-form").serializeArray();
                    formFields.forEach(function(field) {
                        formData.append(field.name, field.value);
                    });
                });

                myDropzone.on("addedfile", function(file) {
                    console.log("File added:", file);
                });

                myDropzone.on("successmultiple", function(files, response) {
                    donePageProgress();
					try {
						// Handle both object and string responses
						var obj = typeof response === 'string' ? JSON.parse(response) : response;
						var messageHtml = obj.message || '';
						function buildPolicyTable(data, color) {
							var html = '<table style="width:100%; border-collapse: collapse;">' +
									'<thead><tr>' +
									'<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">S.No</th>' +
									'<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Policy Number</th>' +
									'</tr></thead><tbody>';
							data.forEach(function(item, index) {
								var policyNumber = item.policy_no || item.policy_number || item.policy || '';
								var safePolicyNumber = String(policyNumber).replace(/'/g, "\\'");
								html += '<tr>' +
										'<td style="border: 1px solid #ddd; padding: 8px; text-align:center;">' + (index + 1) + '</td>' +
										'<td style="border: 1px solid #ddd; padding: 8px; font-weight:bold; color:' + color + '; position:relative;">' +
											'<span>' + policyNumber + '</span>' +
											'<button type="button" onclick="copyToClipboard(\'' + safePolicyNumber + '\', this)" ' +
												'style="cursor:pointer; background:none; border:none; color:#6c757d; position:absolute; right:8px; top:50%; transform:translateY(-50%);">' +
												'<i class="material-icons" style="vertical-align: middle;">content_copy</i>' +
											'</button>' +
										'</td>' +
										'</tr>';
							});
							html += '</tbody></table>';
							return html;
						}
						function buildErrorTable(data) {
							var html = '<table style="width:100%; border-collapse: collapse;">' +
									'<thead><tr>' +
									'<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">S.No</th>' +
									'<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">File</th>' +
									'<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Error Message</th>' +
									'</tr></thead><tbody>';
							data.forEach(function(item, index) {
								html += '<tr>' +
										'<td style="border: 1px solid #ddd; padding: 8px; text-align:center;">' + (index + 1) + '</td>' +
										'<td style="border: 1px solid #ddd; padding: 8px;">' + (item.file || '-') + '</td>' +
										'<td style="border: 1px solid #ddd; padding: 8px;">' + (item.message || '-') + '</td>' +
										'</tr>';
							});
							html += '</tbody></table>';
							return html;
						}
						if (obj.result) {
							if (obj.result.success && obj.result.success.length > 0) {
								messageHtml += '<br><strong>Successfully added policy numbers:</strong><br>';
								messageHtml += buildPolicyTable(obj.result.success, 'green');
							}
							if (obj.result.duplicates && obj.result.duplicates.length > 0) {
								messageHtml += '<br><strong>Duplicate policy numbers skipped:</strong><br>';
								messageHtml += buildPolicyTable(obj.result.duplicates, 'orange');
							}
							if (obj.result.errors && obj.result.errors.length > 0) {
								messageHtml += '<br><strong>Errors:</strong><br>';
								messageHtml += buildErrorTable(obj.result.errors);
							}
						}
						Swal.fire({
							icon: obj.status === '1' ? 'success' : 'error',
							title: obj.status === '1' ? 'Processed' : 'Failed',
							html: messageHtml, 
							showConfirmButton: true,
							confirmButtonText: 'OK',
							width: '600px',
							scrollbarPadding: false,
						}).then(() => {
							var listUrl = '<?= base_url('admin/insurance_policy/insurance_policy_list'); ?>';
							window.location.href = listUrl;
						});
					} catch (e) {
						console.error("Invalid JSON response:", response);
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Invalid server response.'
						});
					}
                });

                myDropzone.on("errormultiple", function(files, response) {
                    donePageProgress();
                    console.error("Upload error:", response);
                    alert("Error uploading files: " + response.message);
                });

                $("#ins-form").on("submit", function(e) {
                    e.preventDefault();
                    if (validateForm()) {
                        console.log("Form valid. Mode:", mode);
						var queued = myDropzone.getQueuedFiles().length;
						if (queued === 0) {
							if (mode === 'a') {
								alert("Please upload at least one PDF file.");
								return;
							} else {
								// In edit mode with no files, perform update via AJAX
								updatePolicyAjax();
								return;
							}
						}
						if (mode === 'a') {
							myDropzone.processQueue(); // Server will save directly
						}
                    } else {
                        console.log("Form validation failed.");
                    }
                });
            }
        });
    }

    // If edit mode and no dropzone, bind direct update
    if (mode === 'e') {
        $("#ins-form").on("submit", function(e){
            e.preventDefault();
            if (!validateForm()) { 
                console.log("Form validation failed.");
                return; 
            }
            updatePolicyAjax();
        });
    }

    function updatePolicyAjax() {
        var formData = $("#ins-form").serialize();
        $.ajax({
            url: '<?php echo base_url('admin/insurance_policy/update_policy'); ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            beforeSend: startPageProgress,
            success: function(res) {
                if (res && res.status === '1') {
                    Swal.fire({ icon: 'success', title: 'Updated', timer: 1200, showConfirmButton: false })
                    .then(function(){ window.location.href = '<?php echo base_url('admin/insurance_policy/insurance_policy_list'); ?>'; });
                } else {
                    Swal.fire({ icon: 'error', title: 'Update failed', text: (res && res.message) ? res.message : 'Error' });
                }
            },
            error: function() {
                Swal.fire({ icon: 'error', title: 'Network error' });
            },
            complete: donePageProgress
        });
    }
    function submitForm(fileNames) {
        var post_url = '<?php echo base_url(); ?>admin/insurance/submit_insurance/' + <?php echo json_encode($mode); ?>;
        var receivedDate = $('#received_date').val();
        if (receivedDate) {
            $('#received_date').val(convertDMYtoYMD(receivedDate));
        }
        var formData = $("#ins-form").serialize();
        var id = $("#id").val();

        if (fileNames.length > 0) {
            formData += '&file_name=' + encodeURIComponent(fileNames.join(','));
        }

        formData += '&id=' + encodeURIComponent(id);

        $.ajax({
            url: post_url,
            type: 'POST',
            data: formData,
            beforeSend: startPageProgress,
            success: function(response) {
                try {
                    var obj = JSON.parse(response);
                } catch (e) {
                    console.error("Invalid JSON response:", response);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Invalid server response.'
                    });
                    return;
                }

                var messageHtml = obj.message || '';

                function buildPolicyTable(data, color) {
                    var html = '<table style="width:100%; border-collapse: collapse;">' +
                            '<thead><tr>' +
                            '<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">S.No</th>' +
                            '<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Policy Number</th>' +
                            '</tr></thead><tbody>';

                    data.forEach(function(item, index) {
								var policyNumber = item.policy_number;
								var safePolicyNumber = String(policyNumber).replace(/'/g, "\\'");
                        html += '<tr>' +
                                '<td style="border: 1px solid #ddd; padding: 8px; text-align:center;">' + (index + 1) + '</td>' +
										'<td style="border: 1px solid #ddd; padding: 8px; font-weight:bold; color:' + color + '; position:relative;">' +
											'<span style="float:center;">' + policyNumber + '</span>' +
											'<button type="button" onclick="copyToClipboard(\'' + safePolicyNumber + '\', this)" ' +
												'style="cursor:pointer; background:none; border:none; color:#6c757d; position:absolute; right:8px;">' +
                                        '<i class="material-icons" style="vertical-align: middle;">content_copy</i>' +
                                    '</button>' +
                                '</td>' +
                                '</tr>';
                    });

                    html += '</tbody></table>';
                    return html;
                }




                function buildErrorTable(data) {
                    var html = '<table style="width:100%; border-collapse: collapse;">' +
                            '<thead><tr>' +
                            '<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">S.No</th>' +
                            '<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">File</th>' +
                            '<th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Error Message</th>' +
                            '</tr></thead><tbody>';

                    data.forEach(function(item, index) {
                        html += '<tr>' +
                                '<td style="border: 1px solid #ddd; padding: 8px; text-align:center;">' + (index + 1) + '</td>' +
                                '<td style="border: 1px solid #ddd; padding: 8px;">' + item.file + '</td>' +
                                '<td style="border: 1px solid #ddd; padding: 8px;">' + item.message + '</td>' +
                                '</tr>';
                    });

                    html += '</tbody></table>';
                    return html;
                }


                if (obj.result) {
                    if (obj.result.success && obj.result.success.length > 0) {
                        messageHtml += '<br><strong>Successfully added policy numbers:</strong><br>';
                        messageHtml += buildPolicyTable(obj.result.success, 'green');
                    }

                    if (obj.result.duplicates && obj.result.duplicates.length > 0) {
                        messageHtml += '<br><strong>Duplicate policy numbers skipped:</strong><br>';
                        messageHtml += buildPolicyTable(obj.result.duplicates, 'orange');
                    }

                    if (obj.result.errors && obj.result.errors.length > 0) {
                        messageHtml += '<br><strong>Errors:</strong><br>';
                        messageHtml += buildErrorTable(obj.result.errors);
                    }
                }

                var redirectUrl = obj.status === '1' 
                    ? "<?php echo base_url().'admin/insurance/insurance_list'; ?>" 
                    : "<?php echo base_url().'admin/insurance/insurance_form/a'; ?>";

                Swal.fire({
                    icon: obj.status === '1' ? 'success' : 'error',
                    title: obj.status === '1' ? 'Insurance record submitted successfully' : 'Submission failed',
                    html: messageHtml, 
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                    width: '600px',
                    scrollbarPadding: false,
                }).then(() => {
                    window.location.href = redirectUrl;
                });
            },



            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'AJAX Error',
                    text: 'Something went wrong. Please try again.'
                });
            },
            complete: donePageProgress
        });
    }

});

function copyToClipboard(text, btn) {
    var tempInput = document.createElement("input");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    var originalContent = btn.innerHTML;
    btn.innerHTML = 'Copied!';
    btn.disabled = true;

    setTimeout(function() {
        btn.innerHTML = originalContent;
        btn.disabled = false;
    }, 2000);
}



</script>



<script>
    function deleteInsurance(id) {
        var post_url = '<?php echo base_url(); ?>admin/insurance_policy/delete_insurance_policy/' + id;

        if (!confirm("Are you sure you want to delete this insurance policy?")) {
            return;
        }

        $.ajax({
            url: post_url,
            type: 'POST',
            beforeSend: startPageProgress,
            success: function(response) {
                var obj = response;
                if (typeof response === 'string') {
                    try {
                        obj = JSON.parse(response);
                    } catch (e) {
                        console.error('Failed to parse delete response', e, response);
                        Swal.fire({
                            icon: 'error',
                            title: 'Delete failed',
                            text: 'Unexpected server response.'
                        });
                        return;
                    }
                }

                if (obj && obj.status === '1') {
                    var redirectUrl = "<?php echo base_url().'admin/insurance_policy/insurance_policy_list/';?>";
                    Swal.fire({
                        icon: 'success',
                        title: 'Insurance policy deleted successfully',
                        timer: 2300,
                        timerProgressBar: true,
                        willClose: () => { window.location.href = redirectUrl; }
                    });
                } else {
                    var message = (obj && obj.message) ? obj.message : 'Delete failed. Please try again.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Delete failed',
                        text: message
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Network error',
                    text: 'Unable to delete policy right now.'
                });
            },
            complete: donePageProgress
        });
    }

    function setPdfView(filePath) {
        if (!filePath) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'info',
                    title: 'No PDF linked',
                    text: 'Attach or upload a PDF to view it.',
                    timer: 1800,
                    showConfirmButton: false
                });
            } else {
                alert('No PDF linked to this policy yet.');
            }
            return;
        }
        var path = (filePath + '').trim();
        if (!path) { return; }
        if (!/^https?:\/\//i.test(path)) {
            path = path.replace(/^\/+/, '');
            if (path.indexOf('uploads/pdfs/') !== 0) {
                path = 'uploads/pdfs/' + path;
            }
            var baseUrl = "<?php echo base_url(); ?>";
            window.open(baseUrl + path, '_blank');
        } else {
            window.open(path, '_blank');
        }
    }

    function goBack(event) {
        event.preventDefault();
        history.back();
    }
</script> 

<script>
    $(document).ready(function () {
        function calculateNet() {
            let od = parseFloat($('#od').val()) || 0;
            let tp = parseFloat($('#tp').val()) || 0;
            let net = od + tp;
            $('#net').val(net.toFixed(2));
        }

        $('#od, #tp').on('input', calculateNet);
    });
</script>

<script>
function convertDMYtoYMD(dateStr) {
    // Expects 20-Jul-2025, returns 2025-07-20
    if (!dateStr) return '';
    var months = {
        Jan: '01', Feb: '02', Mar: '03', Apr: '04', May: '05', Jun: '06',
        Jul: '07', Aug: '08', Sep: '09', Oct: '10', Nov: '11', Dec: '12'
    };
    var parts = dateStr.split('-');
    if (parts.length !== 3) return dateStr;
    var day = parts[0];
    var month = months[parts[1]];
    var year = parts[2];
    if (!month) return dateStr;
    return year + '-' + month + '-' + day;
}


</script>
