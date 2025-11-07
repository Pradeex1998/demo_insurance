<!-- Shared plugin CSS moved to layout.php -->



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
                        <br>
                        <div class="row clearfix">
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
                                            <option value="">No Login Id found</option>
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
                                        <option value="Credit">Credit Card</option>
                                        <option value="CutPay">Cut & Pay</option>
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

                            <div id="credit_card_wrap" style="display:none;">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                    <select id="credit_card_id" name="credit_card_id" class="form-control">
                                            <option value="">-- Select Credit Card --</option>
                                        </select>
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <!-- Account Field -->
                        <div class="row clearfix">
                            <div class="col-sm-4">
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
                            <div class="col-sm-4">
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
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="active" <?= (isset($status) && $status == 'active') ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive" <?= (isset($status) && $status == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                            
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

                            <!-- Brokerage Name -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="brokerage_name" name="brokerage_name" type="text" class="form-control" />
                                        <label class="form-label">Brokerage Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Login Code -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="login_code" name="login_code" type="text" class="form-control" />
                                        <label class="form-label">Login Code</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Carrying Capacity -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="carrying_capacity" name="carrying_capacity" type="text" class="form-control" />
                                        <label class="form-label">Carrying Capacity</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Pro Code -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="pro_code" name="pro_code" type="text" class="form-control" />
                                        <label class="form-label">Pro Code</label>
                                    </div>
                                </div>
                            </div>

                            <!-- New -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="new" name="new" type="text" class="form-control" />
                                        <label class="form-label">New</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Vehicle Age -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="vehicle_age" name="vehicle_age" type="number" class="form-control" />
                                        <label class="form-label">Vehicle Age</label>
                                    </div>
                                </div>
                            </div>

                            <!-- GVW Range -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="gvw_range" name="gvw_range" type="text" class="form-control" />
                                        <label class="form-label">GVW Range</label>
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
                            <?php $user_role = $this->session->userdata('role'); ?>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input
                                            id="net_premium"
                                            name="net_premium"
                                            type="text"
                                            class="form-control"
                                            <?php if ($user_role != 1) echo 'readonly'; ?>
                                        />
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

                            <!-- In Payout Group Label -->
                            <div class="col-sm-12">
                                <label style="font-weight: bold; font-size: 15px; margin-bottom: 0;">In Payout</label>
                            </div>
                            <!-- In Payout OD % -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_od" name="company_od" type="text" class="form-control" />
                                        <label class="form-label">OD %</label>
                                    </div>
                                </div>
                            </div>
                            <!-- In Payout TP % -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_tp" name="company_tp" type="text" class="form-control" />
                                        <label class="form-label">TP %</label>
                                    </div>
                                </div>
                            </div>
                            <!-- In Payout Net % -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="company_net" name="company_net" type="text" class="form-control" />
                                        <label class="form-label">Net %</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12" style="margin-top:10px;">
                                <label style="font-weight: bold; font-size: 15px; margin-bottom: 0;">Out Payout</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="agent_od" name="agent_od" type="text" class="form-control" />
                                        <label class="form-label">OD %</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="agent_tp" name="agent_tp" type="text" class="form-control" />
                                        <label class="form-label">TP %</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="agent_net" name="agent_net" type="text" class="form-control" />
                                        <label class="form-label">Net %</label>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                        <!-- Note Textarea -->
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea id="note" name="note" class="form-control" rows="2"></textarea>
                                        <label class="form-label">Note</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row clearfix">  
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
$(document).ready(function() {
    $('#agency_id, #login_id, #status, #company_paymentmode, #paid_type, #credit_card_id').select2();
    // Ensure credit card select spans full width
    $('#credit_card_id').select2({ width: '100%' });
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

               // Set Received Account
               if (data.received_account !== undefined) {
                   $('#received_account').val(data.received_account);
               }

               // Set Received Date (format as dd-mm-yyyy for display)
               if (data.received_date !== undefined && data.received_date && data.received_date !== '0000-00-00') {
                   $('#received_date').val(data.received_date);
               } else {
                   $('#received_date').val('');
               }
           }

           // Preselect payment mode and credit card on edit/view
           if (data && (mode === 'e' || mode === 'v')) {
               if (data.company_paymentmode) {
                   $('#company_paymentmode').val(data.company_paymentmode).trigger('change');
               }
               var presetCardId = data.credit_card_id || '';
               if (data.company_paymentmode === 'Credit' || data.company_paymentmode === 'Credit Card') {
                   loadActiveCreditCards(presetCardId);
               }
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

    if (window.location.hostname === "localhost" || window.location.hostname === "127.0.0.1") {
        $('select').each(function() { 
            $(this).val($(this).find('option:eq(1)').val()).change();
        });
    }
    // Toggle Credit Card select by payment mode
    function toggleCreditCardSelect() {
        var modeVal = $('#company_paymentmode').val();
        if (modeVal === 'Credit' || modeVal === 'Credit Card') {
            $('#credit_card_wrap').show();
            $('#credit_card_id').attr('required', true);
            var currentVal = $('#credit_card_id').val();
            loadActiveCreditCards(currentVal);
        } else {
            $('#credit_card_wrap').hide();
            $('#credit_card_id').removeAttr('required');
            $('#credit_card_id').val('').trigger('change');
        }
    }
    $('#company_paymentmode').on('change', toggleCreditCardSelect);
    // initial
    toggleCreditCardSelect();

    function loadActiveCreditCards(selectedId) {
        $.ajax({
            url: '<?php echo base_url('admin/master/active_credit_cards'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                if (res && res.status === '1') {
                    var $sel = $('#credit_card_id');
                    var selectedVal = selectedId || $sel.val();
                    $sel.empty().append('<option value="">-- Select Credit Card --</option>');
                    res.data.forEach(function(item){
                        var text = item.name + ' - ' + item.bank;
                        $sel.append($('<option>', { value: item.id, text: text }));
                    });
                    if (selectedVal) {
                        $sel.val(selectedVal).trigger('change');
                    }
                }
            }
        });
    }

    if (mode === 'a') {
        $('#received_date_line').addClass('focused');
    }
    
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
            maxFiles: 10,
            acceptedFiles: 'application/pdf',
            dictDefaultMessage: "Drop PDFs here",
            parallelUploads: 10,
            autoProcessQueue: false,
            uploadMultiple: true,
            paramName: 'files',
            init: function() {
                var myDropzone = this;

                myDropzone.on("addedfile", function(file) {
                    console.log("File added:", file);
                });

                // 🔥 Move success and error handlers OUT of submit
                myDropzone.on("successmultiple", function(files, response) {
                    console.log("Upload success:", response);
                    // response should contain uploaded file names
                    var fileNames = response.fileNames || [];
                    submitForm(fileNames);
                });

                myDropzone.on("errormultiple", function(files, response) {
                    console.error("Upload error:", response);
                    alert("Error uploading files: " + response.message);
                });

                $("#ins-form").on("submit", function(e) {
                    e.preventDefault();
                    if ($(this).valid()) {
                        console.log("Form valid. Mode:", mode);
                        if (mode !== 'e') {
                            if (myDropzone.getQueuedFiles().length === 0) {
                                alert("Please upload at least one PDF file.");
                                return;
                            }
                            myDropzone.processQueue(); // Let Dropzone handle it
                        } else {
                            console.log("Mode 'e', skipping file upload.");
                            submitForm([]); // No files to upload
                        }
                    } else {
                        console.log("Form validation failed.");
                    }
                });
            }
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
                        html += '<tr>' +
                                '<td style="border: 1px solid #ddd; padding: 8px; text-align:center;">' + (index + 1) + '</td>' +
                                '<td style="border: 1px solid #ddd; padding: 8px; font-weight:bold; color:' + color + '; position:relative;">' +
                                    '<span style="float:center;">' + policyNumber + '</span>' +
                                    '<button onclick="copyToClipboard(\'' + policyNumber + '\', this)" ' +
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
            }
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
