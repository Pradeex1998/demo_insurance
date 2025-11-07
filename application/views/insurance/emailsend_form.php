<!-- Shared plugin CSS moved to layout.php -->

<style>
    .loader {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        display: none;
    }

    .spinner {
        border: 8px solid #f3f3f3; /* Light gray */
        border-top: 8px solid #3498db; /* Blue color */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>

<div class="container-fluid">
    <!-- <div class="block-header">
        <h2><?php echo $title;?></h2>
    </div> -->
    <form id="ins-form" method="post" enctype="multipart/form-data">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <a href="#" onclick="goBack(event)"><span style="vertical-align: bottom" class="material-icons">arrow_back_ios</span>
                            <h2>
                                <?php echo $title;?>
                            </h2>
                        </a>
                        <?php if ($mode == 'e'): ?>
                            <button type="button" id="del-ins" class="btn bg-red waves-effect pull-right"><i class="material-icons">delete</i></button>
                        <?php elseif ($mode == 'v'): ?>
                            
                            <button type="button" id="pdf-ins" class="btn bg-grey waves-effect pull-right" style="margin-left: 6px;"><i class="material-icons">picture_as_pdf</i></button>
                            <?php if ($mode == 'v' && !$this->insurance_model->is_approved($id)): ?>
                                <button type="button" id="approve-ins" class="btn bg-green waves-effect pull-right" style="margin-left: 6px;"><i class="material-icons">check_circle</i></button>
                            <?php endif; ?>
                            
                            <button type="button" id="del-ins" class="btn bg-red waves-effect pull-right"><i class="material-icons">delete</i></button>
                            <button type="button" id="edit-ins" class="btn bg-blue waves-effect pull-right" style="margin-right: 6px;"><i class="material-icons">edit</i></button>
                        <?php endif; ?>

                    </div>
                    <div class="body" id="contact_div">
                        <div class="row clearfix">
                            <div class="col-sm-10">
                                <label class="form-address">Insurance Record</label>
                            </div>
                        </div>
                        <input id="id" name="id" type="text" maxlength="250" class="form-control" style="display: none;" />
                        <input type="hidden" id="pdfText" name="pdf_text" />
                        <br>
                        <div class="row clearfix">
                            <?php if ($this->session->userdata('role') != 3): ?> 
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <select id="agency_id" name="agency_id" class="form-control" required>
                                        <option value="">-- Select Agent --</option>
                                        <?php if (isset($agencies) && !empty($agencies)) : ?>
                                            <?php foreach ($agencies as $item) : ?>
                                                <option value="<?php echo $item['id']; ?>">
                                                    <?php echo $item['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">No agencies found</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <select id="login_id" name="login_id" class="form-control" required>
                                        <option value="">-- Select Login Id --</option>
                                        <?php if (isset($loginid) && !empty($loginid)) : ?>
                                            <?php foreach ($loginid as $item) : ?>
                                                <option value="<?php echo $item['id']; ?>">
                                                    <?php echo $item['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">No Login ID found</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <select id="company_paymentmode" name="company_paymentmode" class="form-control" required>
                                        <option value="">-- Payment Mode --</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Online">Online</option>
                                        <option value="UPI">UPI</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <select id="paid_type" name="paid_type" class="form-control" required>
                                        <option selected value="">-- Select Payment --</option>
                                        <option value="Agent Paid">Agent Paid</option>
                                        <option value="Company Paid">Company Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="amount_from_agent" name="amount_from_agent" type="number" class="form-control" />
                                        <label class="form-label">Amount From Agent</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
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

                            <!-- Date -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input id="date" name="date" type="date" class="form-control" />
                                        <label class="form-label">Date</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Company -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company" name="company" type="text" class="form-control" />
                                        <label class="form-label">Company</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Insured Name -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="insured_name" name="insured_name" type="text" class="form-control" />
                                        <label class="form-label">Insured Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Type -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="product_type" name="product_type" type="text" class="form-control" />
                                        <label class="form-label">Product Type</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Policy Number -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="policy_number" name="policy_number" type="text" class="form-control" onblur="this.value = this.value.trim();"/>
                                        <label class="form-label">Policy Number</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Type -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="type" name="type" type="text" class="form-control" />
                                        <label class="form-label">Type</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Registration No -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="registration_no" name="registration_no" type="text" class="form-control" />
                                        <label class="form-label">Registration No</label>
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

                            <!-- Year -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="year" name="year" type="text" class="form-control" />
                                        <label class="form-label">Year</label>
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

                            <!-- OD Premium -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="od_premium" name="od_premium" type="text" class="form-control" />
                                        <label class="form-label">OD Premium</label>
                                    </div>
                                </div>
                            </div>

                            <!-- TP Premium -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="tp_premium" name="tp_premium" type="text" class="form-control" />
                                        <label class="form-label">TP Premium</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Net Premium -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="net_premium" name="net_premium" type="text" class="form-control" readonly  />
                                        <label class="form-label">Net Premium</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Gross Premium -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="gross_premium" name="gross_premium" type="text" class="form-control" />
                                        <label class="form-label">Gross Premium</label>
                                    </div>
                                </div>
                            </div>

                            <!-- OD Premium % -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_od" name="company_od" type="text" class="form-control" />
                                        <label class="form-label">OD %</label>
                                    </div>
                                </div>
                            </div>

                            <!-- TP Premium % -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_tp" name="company_tp" type="text" class="form-control" />
                                        <label class="form-label">TP %</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Net Premium % -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_net" name="company_net" type="text" class="form-control" />
                                        <label class="form-label">Net %</label>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                        <?php endif; ?>

                        <div class="row clearfix">  
                            <div class="col-sm-4">
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

<div id="loader" class="loader" style="display:none;">
    <div class="spinner"></div>
</div>



<!-- Shared plugin JS moved to layout.php; keep page-specific scripts only -->
 




<script>
var mode = <?php echo json_encode($mode); ?>;
$(document).ready(function() {
    $('#agency_id, #login_id, #status, #company_paymentmode, #paid_type').select2();
    var setValueUrl = '<?php echo base_url('admin/common/get_data_from_id'); ?>';
    var table_name = 'ins_insurance_record';
    var id = <?php echo json_encode($id); ?>;
    setValues(setValueUrl, mode, table_name, id, function(response) {
       if (response) {
           var data = response.data;
           if (mode == 'v') {
               $('#pdf-ins').on('click', function() {
                   setPdfView(data.file_name);
               });
           }
           
        //    var date = data.date;    
        //    if (date != '1970-01-01') {
        //        formattedDate = moment(date).format('DD-MM-YYYY');
        //        $('#date').val(formattedDate);
        //     } else {
        //        $('#date').val(null);
        //    }
       }

    });


    $("#del-ins").click(function() {
        var id = $("#id").val();
        deleteInsurance(id);
    });

    $("#edit-ins").click(function() {
        var id = $("#id").val();
        window.location.href = '<?php echo base_url('admin/insurance/insurance_form/e/'); ?>' + id;
    });

    $("#approve-ins").click(function() {
        var insuranceId = $("#id").val();
        var uploadStatus = 1;
        changeUploadStatus(insuranceId, uploadStatus);
    });

    // $('#date').datepicker({
    //     dateFormat: 'dd-m-yy',
    //     changeMonth: true,
    //     changeYear: true
    // });

    $('select').each(function() { 
        $(this).val($(this).find('option:eq(1)').val()).change();
    });
    
});


</script>


<script>
$(document).ready(function() {
    var mode = <?php echo json_encode($mode); ?>;
    
    Dropzone.autoDiscover = false;

    if (!Dropzone.instances.length) {
        var dropzoneInstance = new Dropzone("#pdf-dropzone", {
            url: '<?php echo base_url('admin/insurance/upload_pdf/'); ?>',
            maxFilesize: 10,
            maxFiles: 1,
            acceptedFiles: 'application/pdf',
            dictDefaultMessage: "Drop PDF here",
            autoProcessQueue: false, 
            init: function() {
                var myDropzone = this;

                myDropzone.on("addedfile", function(file) {
                    console.log("File added: ", file);
                });

                $("#ins-form").on("submit", function(event) {
                    event.preventDefault();

                    if ($(this).valid()) {
                        console.log("Form is valid. Checking for PDF upload...");

                        if (mode !== 'e') {
                            if (myDropzone.files.length === 0) {
                                alert("Please upload a PDF file.");
                                return; 
                            }
                            myDropzone.processQueue();

                            myDropzone.on("success", function(file, response) {
                                var fileName = response.file || '';
                                // console.log(fileName)
                                submitForm(fileName);
                            });

                            myDropzone.on("error", function(file, response) {
                                console.error("Error uploading PDF:", response);
                            });
                        } else {
                            console.log("Mode is 'e', skipping PDF upload check.");
                            submitForm("");
                        }
                    } else {
                        console.log("Form validation failed.");
                    }
                });
            }
        });
    }


    // Submit form via AJAX
    function submitForm(fileName) {
        var post_url = '<?php echo base_url(); ?>admin/insurance/submit_insurance/' + <?php echo json_encode($mode); ?>;
        var formData = $("#ins-form").serialize();
        var id = $("#id").val();
        var pdfText = $('#pdfText').val();

        if (mode === 'a') {
            formData += '&file_name=' + encodeURIComponent(fileName);
        }


        $.ajax({
            url: post_url,
            type: 'POST',
            data: formData + '&pdf_text=' + encodeURIComponent(pdfText) + '&id=' + id,
            beforeSend: function() {
                $('#loader').show();
                // NProgress.start();
            },
            success: function(response) {
                $('#loader').hide();
                // NProgress.done();

                var obj = JSON.parse(response);
                if (obj.status === '1') {
                    var redirectUrl = "<?php echo base_url().'admin/insurance/insurance_list';?>";
                    Swal.fire({
                        icon: 'success',
                        title: 'Insurance record submitted successfully',
                        timer: 2300,  
                        timerProgressBar: true,
                        willClose: () => {  
                            window.location.href = redirectUrl;
                        }
                    });
                } else {
                    var redirectUrl = "<?php echo base_url().'admin/insurance/insurance_form/a';?>";
                    Swal.fire({
                        icon: 'error',
                        title: obj.message,
                        timer: 2300,  
                        timerProgressBar: true,
                        willClose: () => {  
                            window.location.href = redirectUrl;
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                // NProgress.done();
                console.error("AJAX Error:", error);
            }
        });
    }

});

</script>



<script>
    function deleteInsurance(id) {
        var post_url = '<?php echo base_url(); ?>admin/insurance/delete_insurance/' + id;

        if (confirm("Are you sure you want to delete this insurance record?")) {
            $.ajax({
                url: post_url,
                type: 'POST', 
                success: function(response) {
                    var obj = JSON.parse(response);
                    if (obj.status === '1') {
                        var redirectUrl = "<?php echo base_url().'admin/insurance/insurance_list';?>";
                        Swal.fire({
                            icon: 'success',
                            title: 'Insurance record deleted successfully',
                            timer: 2300,  
                            timerProgressBar: true,
                            willClose: () => {  
                                window.location.href = redirectUrl;
                            }
                        });
                    } else {
                        alert(obj.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        }
    }

    function changeUploadStatus(insuranceId, uploadStatus) {
        var url = "<?php echo base_url('admin/insurance/insurance_changeuploadstatus/'); ?>" + insuranceId + "/" + uploadStatus;
        if (!confirm("Are you sure you want to change the status to approved?")) return;
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === '1') {
                    var redirectUrl = "<?php echo base_url().'admin/insurance/insurance_list';?>";
                    Swal.fire({
                        icon: 'success',
                        title: 'Upload status change successfully',
                        timer: 2300,  
                        timerProgressBar: true,
                        willClose: () => {  
                            window.location.href = redirectUrl;
                        }
                    });
                } else {
                    alert(res.message);
                }
            },
            error: function(xhr, status, error) {
                alert('Error occurred: ' + error);
            }
        });
    }

    function setPdfView(fileName) {
        var baseUrl = "<?php echo base_url('uploads/pdfs/'); ?>"; 
        var pdfUrl = baseUrl + fileName; 

        window.open(pdfUrl, '_blank');
    }

    function goBack(event) {
        event.preventDefault();
        history.back();
    }
</script> 

<script>
    $(document).ready(function () {
        function calculateNetPremium() {
            let od = parseFloat($('#od_premium').val()) || 0;
            let tp = parseFloat($('#tp_premium').val()) || 0;
            let net = od + tp;
            $('#net_premium').val(net.toFixed(2));
        }

        $('#od_premium, #tp_premium').on('input', calculateNetPremium);
    });
</script>
