<!-- Bootstrap Material Datetime Picker Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
    rel="stylesheet" />

<!-- Wait Me Css -->
<link href="<?= base_url() ?>public/plugins/waitme/waitMe.css" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<!-- Dropzone Css -->
<link href="<?= base_url() ?>public/plugins/dropzone/dropzone.css" rel="stylesheet">


<div class="container-fluid">
    <!-- <div class="block-header">
        <h2><?php echo $title;?></h2>
    </div> -->
    <form id="loginid-form" method="post" enctype="multipart/form-data">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <a href="javascript:history.go(-1)"><span style="vertical-align: bottom"
                                class="material-icons">arrow_back_ios</span>
                            <h2>
                                <?php echo $title;?>
                            </h2>
                        </a>    
                    </div>
                    <div class="body" id="contact_div">
                        <div class="row clearfix">
                            <div class="col-sm-10">
                                <label class="form-address">Login ID Details</label>
                            </div>
                        </div>
                        <input id="id" name="id" type="text" maxlength="250" class="form-control" required="" style="display: none;" />
                        <br>

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="name" name="name" type="text" maxlength="250" class="form-control"
                                            required
                                            oninvalid="this.setCustomValidity('Please enter only alphabetic characters and numbers')"
                                            oninput="this.setCustomValidity('')"
                                            onkeypress="return /[A-Za-z0-9\s]/.test(event.key)"/>
                                        <label class="form-label required">Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select id="rto_company_id" name="rto_company_id" class="form-control" required
                                                oninvalid="this.setCustomValidity('Please select an RTO Company')"
                                                oninput="this.setCustomValidity('')">
                                                <option value="">-- Select RTO Company --</option>
                                                <?php if (!empty($rto_companies)) { foreach ($rto_companies as $rc) { ?>
                                                    <option value="<?= htmlspecialchars($rc['id']); ?>"><?= htmlspecialchars($rc['company_name']); ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="vehicle_type" name="vehicle_type" class="form-control" required>
                                            <option value="">-- Select Vehicle Type --</option>
                                            <?php if (!empty($vehicle_types)) { foreach ($vehicle_types as $vt) { ?>
                                                <option value="<?= htmlspecialchars($vt); ?>"><?= htmlspecialchars($vt); ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="fuel_type" name="fuel_type" class="form-control" required>
                                            <option value="">-- Select Fuel Type --</option>
                                            <?php if (!empty($fuel_types)) { foreach ($fuel_types as $ft) { ?>
                                                <option value="<?= htmlspecialchars($ft); ?>"><?= htmlspecialchars($ft); ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="policy_type" name="policy_type" class="form-control" required>
                                            <option value="">-- Select Policy Type --</option>
                                            <?php if (!empty($policy_types)) { foreach ($policy_types as $pt) { ?>
                                                <option value="<?= htmlspecialchars($pt); ?>"><?= htmlspecialchars($pt); ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" id="seating_capacity_wrap" style="display:none;">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="seating_capacity" name="seating_capacity" type="number" min="1" class="form-control" />
                                        <label class="form-label" id="seating_capacity_label">Seating Capacity</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="agent_code" name="agent_code" class="form-control">
                                            <option value="">-- Select Agent Code --</option>
                                            <?php if (!empty($agent_code)) { foreach ($agent_code as $ac) { ?>
                                                <option value="<?= htmlspecialchars($ac['name']); ?>"><?= htmlspecialchars($ac['name']); ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="vehicle_make" name="vehicle_make" type="text" class="form-control" maxlength="100" />
                                        <label class="form-label">Vehicle Make</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="vehicle_model" name="vehicle_model" type="text" class="form-control" maxlength="100" />
                                        <label class="form-label">Vehicle Model</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="od_premium" name="od_premium" type="number" maxlength="250" class="form-control" value="0.00" step="0.01"/>
                                        <label class="form-label">Company OD Payout %</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="tp_premium" name="tp_premium" type="number" maxlength="250" class="form-control" value="0.00" step="0.01"/>
                                        <label class="form-label">Company TP Payout %</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="net_premium" name="net_premium" type="number" min="0" maxlength="250" class="form-control" required value="0.00" step="0.01"
                                            oninvalid="this.setCustomValidity('Please enter Company NET Payout % (or set both OD and TP Payout %)')"
                                            oninput="this.setCustomValidity(''); if (!this.readOnly && this.value < 1) { var od = parseFloat($('#od_premium').val() || 0); var tp = parseFloat($('#tp_premium').val() || 0); if (od <= 0 && tp <= 0) { this.value = ''; } }"/>
                                        <label class="form-label required">Company NET Payout %</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label class="form-address">Agent Payout</label>
                            </div>
                        </div>
                        <br>

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="agent_odpremium" name="agent_odpremium" type="number" maxlength="250" class="form-control" value="0.00" step="0.01"/>
                                        <label class="form-label">OD Payout %</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="agent_tppremium" name="agent_tppremium" type="number" maxlength="250" class="form-control" value="0.00" step="0.01"/>
                                        <label class="form-label">TP Payout %</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="agent_netpremium" name="agent_netpremium" type="number" min="1" maxlength="250" class="form-control" required value="" step="0.01"
                                            oninvalid="this.setCustomValidity('Please enter Agent Net Payout % (must be at least 1) or set both OD and TP Payout %')"
                                            oninput="this.setCustomValidity(''); if (!this.readOnly && this.value < 1) { var od = parseFloat($('#agent_odpremium').val() || 0); var tp = parseFloat($('#agent_tppremium').val() || 0); if (od <= 0 && tp <= 0) { this.value = ''; } }"/>
                                        <label class="form-label required">Net Payout %</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <select id="status" name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button id="submit_btn" type="submit"
                                        class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i>
                                        Submit</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- body-->
                </div> <!-- card-->
            </div><!-- col-->
        </div> <!-- clearfix main-->
    </form>
    <!-- Always render the history table and script for debugging -->
    <?php if($this->session->userdata('role') == 1 && $id): ?>
    <div class="card">
        <div class="header">
            <h2>Login ID Change History</h2>
        </div>
        <div class="body table-responsive">
            <table id="loginid-history-table" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Field</th>
                        <th>Old Value</th>
                        <th>New Value</th>
                        <th>Updated By</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div> <!-- container-->

<!-- Debug: Check jQuery, DataTable, and table existence -->
 <?php if($this->session->userdata('role') == 1 && $id): ?>
<script>
$(function() {
    $('#loginid-history-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "paging": true,
        "searching": false,
        "ajax": {
            "url": "<?= base_url('admin/loginid/loginid_history_datatable_json/'. (isset($id) ? $id : 0)) ?>",
            "type": "POST"
        },
        "columns": [
            { "data": "sno"},
            { "data": "updated_date" },
            { "data": "field_name" },
            { "data": "old_value" },
            { "data": "new_value" },
            { "data": "updated_by" }
        ],
        "order": [[0, 'desc']]
    });
});
</script>
<?php endif; ?>

<!-- Shared plugin JS moved to layout.php; keep page-specific scripts only -->
 



<script>
$("#submit_btn").click(function(event) {
    event.preventDefault();

    if(!confirm("Are you sure you want to submit the form?")) return false;
    var mode = <?php echo json_encode($mode); ?>;
    

    if ($("#loginid-form").valid()) {

        var post_url = '<?php echo base_url(); ?>admin/loginid/submit_loginid/' + mode;

        var id = $("#id").val();
        var formData = $("#loginid-form").serialize();

        $.ajax({
            url: post_url,
            type: 'post',
            data: formData + '&id=' + id,
            async: true,
            success: function(response) {
                if (response) {
                    var obj = JSON.parse(response);
                    if (obj['status'] == '1') {
                        const redirectUrl = '<?php echo base_url().'admin/loginid/loginid_list'; ?>';
                        Swal.fire({
                            icon: 'success',
                            title: 'Record Submitted successfully',
                            timer: 2300,  
                            timerProgressBar: true,
                            willClose: () => {  
                                window.location.href = redirectUrl;
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: obj['message'],
                            timer: 2300,  
                            timerProgressBar: true,
                            willClose: () => {  
                                window.location.href = redirectUrl;
                            }
                        });
                    }
                }
            }
        });
    }
});
</script>


<script>
var baseUrl = "<?php echo base_url(); ?>";
$(document).ready(function() {

    var setValueUrl = '<?php echo base_url('admin/common/get_data_from_id'); ?>';
    var mode = <?php echo json_encode($mode); ?>;
    var table_name = 'ins_loginid';
    var id = <?php echo json_encode($id); ?>;
    setValues(setValueUrl, mode, table_name, id);

    // Initialize payout fields to 0.00 if in add mode (after setValues completes)
    setTimeout(function() {
        if (!id || id == 0) {
            if (!$('#od_premium').val() || $('#od_premium').val() === '') {
                $('#od_premium').val('0.00');
            }
            if (!$('#tp_premium').val() || $('#tp_premium').val() === '') {
                $('#tp_premium').val('0.00');
            }
            // Check if OD+TP are set, if so net can be 0.00
            var od = parseFloat($('#od_premium').val() || 0);
            var tp = parseFloat($('#tp_premium').val() || 0);
            var netVal = $('#net_premium').val();
            if (!netVal || netVal === '' || parseFloat(netVal) < 1) {
                if (od > 0 && tp > 0) {
                    // OD+TP entered, net should be 0.00 and readonly
                    $('#net_premium').val('0.00').attr('readonly', true).removeAttr('required').attr('min', '0');
                    $('#net_premium').attr('oninput', '').removeAttr('oninvalid');
                } else {
                    // No OD+TP or OD+TP not both set, net defaults to 0.00 (will be validated on input)
                    if (!netVal || netVal === '') {
                        $('#net_premium').val('0.00');
                    }
                    $('#net_premium').attr('required', 'required').attr('min', '1');
                    $('#net_premium').attr('oninvalid', "this.setCustomValidity('Please enter Company NET Payout % (or set both OD and TP Payout %)')");
                }
            }
            if (!$('#agent_odpremium').val() || $('#agent_odpremium').val() === '') {
                $('#agent_odpremium').val('0.00');
            }
            if (!$('#agent_tppremium').val() || $('#agent_tppremium').val() === '') {
                $('#agent_tppremium').val('0.00');
            }
            var agent_od_init = parseFloat($('#agent_odpremium').val() || 0);
            var agent_tp_init = parseFloat($('#agent_tppremium').val() || 0);
            var agent_net_init = $('#agent_netpremium').val();
            if (!agent_net_init || agent_net_init === '' || parseFloat(agent_net_init) < 1) {
                if (agent_od_init > 0 && agent_tp_init > 0) {
                    // Agent OD+TP entered, agent net should be 0.00 and readonly
                    $('#agent_netpremium').val('0.00').attr('readonly', true).removeAttr('required').attr('min', '0');
                    $('#agent_netpremium').attr('oninput', '').removeAttr('oninvalid');
                } else {
                    $('#agent_netpremium').val('').attr('required', 'required').attr('min', '1');
                    $('#agent_netpremium').attr('oninvalid', "this.setCustomValidity('Please enter Agent Net Payout % (must be at least 1) or set both OD and TP Payout %')");
                }
            }
        }
    }, 500);

    $('#od_premium, #tp_premium').on('input', function() {
        var od  = parseFloat($('#od_premium').val()) || 0;
        var tp  = parseFloat($('#tp_premium').val()) || 0;
        var net = parseFloat($('#net_premium').val()) || 0

        if (od > 0 && tp > 0) {
            $('#net_premium').val("0.00").attr('readonly', true).removeAttr('required').attr('min', '0');
            // Remove the oninput validation when readonly
            $('#net_premium').attr('oninput', '').removeAttr('oninvalid');
        } else {
            $('#net_premium').attr('readonly', false).attr('required', 'required').attr('min', '1');
            // Restore validation when not readonly
            var currentOninput = $('#net_premium').attr('oninput');
            if (!currentOninput || currentOninput.indexOf('readOnly') === -1) {
                $('#net_premium').attr('oninput', "this.setCustomValidity(''); if (!this.readOnly && this.value < 1) { var od = parseFloat($('#od_premium').val() || 0); var tp = parseFloat($('#tp_premium').val() || 0); if (od <= 0 && tp <= 0) { this.value = ''; } }");
            }
            $('#net_premium').attr('oninvalid', "this.setCustomValidity('Please enter Company NET Payout % (or set both OD and TP Payout %)')");
        }
    });

    $('#net_premium').on('input', function() {
        var od  = parseFloat($('#od_premium').val()) || 0;
        var tp  = parseFloat($('#tp_premium').val()) || 0;
        var net = parseFloat($('#net_premium').val()) || 0;

        if (net > 0) {
            $('#od_premium, #tp_premium').val("0.00").attr('readonly', true);
        } else {
            $('#od_premium, #tp_premium').attr('readonly', false);
        }
    });

    // Show seating capacity when School/Staff Bus
    function toggleSeating() {
        var vt = ($('#vehicle_type').val() || '').toUpperCase();
        if (vt === 'SCHOOL BUS' || vt === 'STAFF BUS') {
            $('#seating_capacity_wrap').show();
            $('#seating_capacity').attr('required', 'required');
        } else {
            $('#seating_capacity_wrap').hide();
            $('#seating_capacity').removeAttr('required').val('');
        }
    }
    $('#vehicle_type').on('change', toggleSeating);
    setTimeout(toggleSeating, 600);

    
   

    // Agent payout field interactions
    $('#agent_odpremium, #agent_tppremium').on('input', function() {
        var agent_od  = parseFloat($('#agent_odpremium').val()) || 0;
        var agent_tp  = parseFloat($('#agent_tppremium').val()) || 0;
        var agent_net = parseFloat($('#agent_netpremium').val()) || 0;

        if (agent_od > 0 && agent_tp > 0) {
            $('#agent_netpremium').val("0.00").attr('readonly', true).removeAttr('required').attr('min', '0');
            // Remove the oninput validation when readonly
            $('#agent_netpremium').attr('oninput', '').removeAttr('oninvalid');
        } else {
            $('#agent_netpremium').attr('readonly', false).attr('required', 'required').attr('min', '1');
            // Restore validation when not readonly
            $('#agent_netpremium').attr('oninput', "this.setCustomValidity(''); if (!this.readOnly && this.value < 1) { var od = parseFloat($('#agent_odpremium').val() || 0); var tp = parseFloat($('#agent_tppremium').val() || 0); if (od <= 0 && tp <= 0) { this.value = ''; } }");
            $('#agent_netpremium').attr('oninvalid', "this.setCustomValidity('Please enter Agent Net Payout % (must be at least 1) or set both OD and TP Payout %')");
        }
    });

    $('#agent_netpremium').on('input', function() {
        var agent_od  = parseFloat($('#agent_odpremium').val()) || 0;
        var agent_tp  = parseFloat($('#agent_tppremium').val()) || 0;
        var agent_net = parseFloat($('#agent_netpremium').val()) || 0;

        if (agent_net > 0) {
            $('#agent_odpremium, #agent_tppremium').val("0.00").attr('readonly', true);
        } else {
            $('#agent_odpremium, #agent_tppremium').attr('readonly', false);
        }
    });


    
});

</script>