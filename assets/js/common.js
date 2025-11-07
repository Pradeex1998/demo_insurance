function handleFormView(response, mode) {
    response = JSON.parse(response);
    if (response.success) {
        var data = response.data;
        $.each(data, function(key, value) {
            var $element = $("#" + key);
            
            // console.log(key, value)
            if(key == 'image' && value != '') {
                var fileName = value.split('/').pop();
                $("#image_path").val(fileName);
                var fullUrl = baseUrl + 'uploads/' + value;
                $("#image_display").attr("src", fullUrl).css({
                    "max-width": "30%",
                    "border-radius": "10px",
                    "border": "5px solid #d5d5d5"
                });
            }
            
            if ($element.is('input') || $element.is('textarea')) {
                $(".form-line").addClass('focused');
                $element.val(value);
            } else if ($element.is('select')) {
                $element.val(value).change();
            } else if ($element.is('input[type="checkbox"]')) {
                $element.prop('checked', value);
            }

            if (mode === 'v') {
                if ($element.is('input') || $element.is('textarea') || $element.is('select')) {
                    $element.prop('disabled', true);
                    $("#submit_btn").prop('disabled', true);
                    $("#droparea").hide();
                }
            } else {
                $element.prop('disabled', false);
            }
        });

        if (!data.image) {
            $("#image_display").attr('src', '').hide();
            $("#hidden_image_path").val('');
        }
    } else {
        alert('Error fetching data: ' + (response.message || 'Unknown error'));
    }
}

function setValues(url, mode, table_name, id, callback) {
    if (id) { 
        $.ajax({
            url: url, 
            type: 'GET',
            data: {
                "table_name": table_name,
                "id": id
            },
            async: true,
            success: function(response) {
                handleFormView(response, mode);
                if (typeof callback === "function") { 
                    var parsedData = typeof response === "string" ? JSON.parse(response) : response;
                    callback(parsedData);
                }
            }
        });
    } else {
        if (typeof callback === "function") {
            callback(null);
        }
    }
}


function dropZone(url) {
    Dropzone.autoDiscover = false;
    myDropzone = new Dropzone("div#dzuploadphoto", {
        url: url,
        autoProcessQueue: false,
        paramName: "photos",
        maxFilesize: 5, // MB
        maxFiles: 1,
        uploadMultiple: false,
        acceptedFiles: "image/*",
        init: function() {
            var drop = this;    
            
            this.on("addedfile", function(file) {
                var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove</button>");
                file.previewElement.appendChild(removeButton);
                removeButton.addEventListener("click", function() {
                    drop.removeFile(file);
                });
            });
            
            this.on("sending", function(file, xhr, formData) {
            });
            
            this.on("success", function(file, response) {
                if (response.success) {
                    $("#image_display").attr("src", response.imageUrl).show();
                    $("#hidden_image_path").val(response.imageUrl);
                }
            });
            
            this.on("error", function(file, errorMessage, xhr) {
                alert(errorMessage);
                drop.removeFile(file);
            });
        }
    });
}


function swalAlert(type, title, message, redirectUrl = null) {
    Swal.fire({
        icon: type,
        title: title,
        text: message,
        timer: 3000,  
        showConfirmButton: true,  
        willClose: () => {
            if (redirectUrl) {
                window.location.href = redirectUrl;
            }
        }
    });
}

function exportTableToExcel(tableId, filename = 'export') {
    // Clone the table so we don't modify the UI
    var originalTable = document.getElementById(tableId);
    var table = originalTable.cloneNode(true);

    // Clean up ₹ and formatting
    var rows = table.querySelectorAll('tr');
    rows.forEach(row => {
        var cells = row.querySelectorAll('td, th');
        cells.forEach(cell => {
            var cellValue = cell.innerText || cell.textContent;
            if (cellValue.includes("₹")) {
                cellValue = cellValue.replace(/[^0-9.]/g, ''); // keep only numbers/decimal
                cell.textContent = cellValue;
            }
        });
    });

    // Create workbook
    var workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });

    // Filename with timestamp
    var dateTime = new Date().toISOString().slice(0,19).replace(/[:T]/g, "-");
    var finalFileName = `${filename}_${dateTime}.xlsx`;

    // Save file
    XLSX.writeFile(workbook, finalFileName);
}








