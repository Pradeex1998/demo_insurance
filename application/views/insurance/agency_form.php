<!-- Shared plugin CSS moved to layout.php -->

<div class="container-fluid">
    <!-- <div class="block-header">
        <h2><?php echo $title;?></h2>
    </div> -->
    <form id="agency-form" method="post" enctype="multipart/form-data">
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
                        <?php if ($mode == 'v'): ?>
                            <button type="button" id="edit-ins" class="btn bg-blue waves-effect pull-right" style="margin-right: 6px;"><i class="material-icons">edit</i></button>
                        <?php endif; ?>
                    </div>
                    <div class="body" id="contact_div">
                        <div class="row clearfix">
                            <div class="col-sm-10">
                                <label class="form-address">Agent Details</label>
                            </div>
                        </div>
                        <input id="id" name="id" type="text" maxlength="250" class="form-control" required="" style="display:none" />
                        <br>

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="name" name="name" type="text" maxlength="250" class="form-control"
                                            required
                                            oninvalid="this.setCustomValidity('Please enter only alphabetic characters and numbers')"
                                            oninput="this.setCustomValidity('')"
                                            onkeypress="return /[A-Za-z\s]/.test(event.key)" />
                                        <label class="form-label required">Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="mobile_no" name="mobile_no" type="tel" maxlength="10" class="form-control"
                                            pattern="[0-9]{10}"
                                            oninvalid="this.setCustomValidity('Please enter a valid 10-digit mobile number')"
                                            oninput="this.setCustomValidity('')" />
                                        <label class="form-label">Mobile No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="whatsapp_no" name="whatsapp_no" type="tel" maxlength="10" class="form-control"
                                            pattern="[0-9]{10}"
                                            oninvalid="this.setCustomValidity('Please enter a valid 10-digit WhatsApp number')"
                                            oninput="this.setCustomValidity('')" />
                                        <label class="form-label">Whatsapp No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="city" name="city" type="text" maxlength="250" class="form-control"
                                            required
                                            oninvalid="this.setCustomValidity('Please enter only alphabetic characters and numbers')"
                                            oninput="this.setCustomValidity('')"
                                            onkeypress="return /[A-Za-z\s]/.test(event.key)" />
                                        <label class="form-label required">City</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="email" name="email" type="email" maxlength="250" class="form-control"/>
                                        <label class="form-label">Email Id</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="address" name="address" type="text" maxlength="250"
                                            class="form-control" />
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <select id="status" name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <select id="branch_id" name="branch_id" class="form-control select2">
                                        <option value="">-- Select Branch --</option>
                                        <?php if (!empty($branch_data)): ?>
                                            <?php foreach ($branch_data as $branch): ?>
                                                <option value="<?= htmlspecialchars($branch['id']) ?>" <?php if($this->session->userdata('userdata')['branch_id'] == $branch['id']) echo 'selected'; ?>>
                                                    <?= htmlspecialchars($branch['branch_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-10">
                                <label class="form-address">Bank Details</label>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <!-- Account Holder Name -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="account_name" name="account_name" type="text" maxlength="250" class="form-control" />
                                        <label class="form-label">Account Holder Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Number -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="account_number" name="account_number" type="text" maxlength="18" class="form-control"
                                            pattern="\d{9,18}" 
                                            oninvalid="this.setCustomValidity('Please enter a valid account number (9-18 digits)')"
                                            oninput="this.setCustomValidity('')" />
                                        <label class="form-label">Account Number</label>
                                    </div>
                                </div>
                            </div>

                            <!-- IFSC Code -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="ifsc_code" name="ifsc_code" type="text" maxlength="11" class="form-control" 
                                            pattern="^[A-Z]{4}0[A-Z0-9]{6}$" 
                                            oninvalid="this.setCustomValidity('Please enter a valid IFSC code (e.g., HDFC0001234)')"
                                            oninput="this.setCustomValidity('')" />
                                        <label class="form-label">IFSC Code</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <!-- Gpay Name -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="gpay_name" name="gpay_name" type="text" maxlength="250" class="form-control" />
                                        <label class="form-label">Google Pay Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Google Pay Number -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="gpay_number" name="gpay_number" type="text" maxlength="10" class="form-control" 
                                            pattern="\d{10}" 
                                            oninvalid="this.setCustomValidity('Please enter a valid 10-digit mobile number')"
                                            oninput="this.setCustomValidity('')" />
                                        <label class="form-label">Google Pay Number</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Branch Name -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="branch" name="branch" type="text" maxlength="100" class="form-control" 
                                            oninvalid="this.setCustomValidity('Please enter the branch name')"
                                            oninput="this.setCustomValidity('')" />
                                        <label class="form-label">Branch Name</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-10">
                                <label class="form-address">Login ID Details</label>
                            </div>
                        </div>

                        <?php if (!empty($loginid_data)) : ?>
                            <div class="table-responsive">
                                <table class="table table-bordered login-commission-table input">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center" style="display:none">ID</th>
                                            <th class="text-center" style="display:none">Login ID</th>
                                            <th class="text-center">OD Premium %</th>
                                            <th class="text-center">TP Premium %</th>
                                            <th class="text-center">Net Premium %</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($loginid_data as $login): 
                                            // Reset commissions in add mode
                                            $od_premium = ($mode === 'a') ? $login['agent_odpremium'] : $login['od_premium'];
                                            $tp_premium = ($mode === 'a') ? $login['agent_tppremium'] : $login['tp_premium'];
                                            $net_premium = ($mode === 'a') ? $login['agent_netpremium'] : $login['net_premium'];

                                            // Ensure login_id fallback
                                            $login_id_value = !empty($login['login_id']) ? $login['login_id'] : $login['login_id'];
                                            $comm_id_value = $login['comm_id'];
                                        ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($login['name']); ?></td>

                                            <!-- Hidden Commission ID (comm_id[]) -->
                                            <td style="display:none">
                                                <input 
                                                    id="comm_id<?php echo $login['login_id']; ?>"  
                                                    name="comm_id[<?php echo $login['login_id']; ?>]" 
                                                    type="hidden" 
                                                    value="<?php echo $comm_id_value; ?>" />
                                            </td>

                                            <!-- Hidden Login ID (login_id[]) -->
                                            <td style="display:none">
                                                <input 
                                                    id="login_id<?php echo $login['login_id']; ?>" 
                                                    name="login_id[<?php echo $login['login_id']; ?>]" 
                                                    type="hidden" 
                                                    value="<?php echo $login_id_value; ?>" />
                                            </td>

                                            <!-- OD Premium -->
                                            <td>
                                                <input 
                                                    id="od_premium_<?php echo $login['login_id']; ?>" 
                                                    name="od_premium[<?php echo $login['login_id']; ?>]" 
                                                    type="number" 
                                                    step="0.01"
                                                    value="<?php echo $od_premium; ?>" 
                                                    class="form-control od" />
                                            </td>

                                            <!-- TP Premium -->
                                            <td>
                                                <input 
                                                    id="tp_premium_<?php echo $login['login_id']; ?>" 
                                                    name="tp_premium[<?php echo $login['login_id']; ?>]" 
                                                    type="number" 
                                                    step="0.01"
                                                    value="<?php echo $tp_premium; ?>" 
                                                    class="form-control tp" />
                                            </td>

                                            <!-- Net Premium -->
                                            <td>
                                                <input 
                                                    id="net_premium_<?php echo $login['login_id']; ?>" 
                                                    name="net_premium[<?php echo $login['login_id']; ?>]" 
                                                    type="number" 
                                                    step="0.01"
                                                    value="<?php echo $net_premium; ?>" 
                                                    class="form-control net" />
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        <?php else: ?>
                            <p>No data available.</p>
                        <?php endif; ?>
                        
                        <br>
                        <div class="row clearfix">
                            <div class="col-sm-3" id="droparea">
                                <div class="form-group">
                                    <div id="dzuploadphoto" class="fallback dropzone">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">add_a_photo</i>
                                            </div>
                                            <h4>Drop Agent Image here or click to upload Image.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div id="carousel_div" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <input type="hidden" id="image_path" name="image" value="">
                                                <img id="image_display" class="carousel-image"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button id="submit_btn" type="submit" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i>Submit</button>
                                </div>
                            </div>
                        </div>

                    </div> <!-- body-->
                </div> <!-- card-->
            </div><!-- col-->
        </div> <!-- clearfix main-->
    </form>
    <?php if($this->session->userdata('role') == 1): ?>
    <div class="card">
        <div class="header">
            <h2>Agent wise Login ID Change History</h2>
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

<script>
$("#submit_btn").click(function(event) {
    event.preventDefault();
    var mode = <?php echo json_encode($mode); ?>;

    var file_name = '';
    const acceptedFiles = myDropzone.getAcceptedFiles();
    for (let i = 0; i < acceptedFiles.length; i++) {
        myDropzone.processFile(acceptedFiles[i]);
        file_name = acceptedFiles[i].name;
    }

    if (mode == 'e' && acceptedFiles.length == 0) {
        file_name = $("#image_path").val();
    }

    let isNetValid = true;
    let missingRow = null;
    let invalidInput = null;

    $(".net").each(function() {
        const val = $(this).val().trim();
        if (val === "" || parseFloat(val) <= 0) {
            isNetValid = false;
            missingRow = $(this).closest('tr').find('td:first').text().trim(); // get name
            invalidInput = $(this); // store reference to the invalid input
            return false;
        }
    });

    

    if ($("#agency-form").valid()) {

        if (!isNetValid) {
            if (invalidInput) {
                invalidInput.focus();
            }
            
            Swal.fire({
                icon: 'error',
                title: 'All Login ID Net Premium Required',
                text: 'Please fill Net Premium for "' + missingRow + '"',   
            });
            return;
        }

        var post_url = '<?php echo base_url(); ?>admin/agency/submit_agency/' + mode;

        var id = $("#id").val();
        var formData = $("#agency-form").serialize();
        // const parsedData = parseFormDataString(formData);
        // console.log(parsedData);
        // return false; // Prevent default form submission

        $.ajax({
            url: post_url,
            type: 'post',
            data: formData + '&image=' + file_name + '&id=' + id,
            async: true,
            success: function(response) {
                if (response) {
                    var obj = JSON.parse(response);
                    if (obj['status'] == '1') {
                        var redirectUrl = "<?php echo base_url().'admin/agency/agency_list';?>";
                        Swal.fire({
                            icon: 'success',
                            title: 'Agent submitted successfully',
                            timer: 2300,  
                            timerProgressBar: true,
                            willClose: () => {  
                                window.location.href = redirectUrl;
                            }
                        });


                    } else {
                        alert(obj['message']);
                    }
                }
            }
        });
    }
});

function parseFormDataString(queryString) {
    const params = new URLSearchParams(queryString);
    const result = {};

    for (const [key, value] of params.entries()) {
        const arrayMatch = key.match(/^(\w+)\[(\d+)\]$/);  // matches comm_id[1], etc.
        if (arrayMatch) {
            const [, baseKey, index] = arrayMatch;
            if (!result[baseKey]) {
                result[baseKey] = {};
            }
            result[baseKey][index] = value;
        } else {
            result[key] = value;
        }
    }

    return result;
}

</script>


<script>
var baseUrl = "<?php echo base_url(); ?>";
$(document).ready(function() {
    $('.select2').select2();
    var dropZoneUrl = '<?php echo base_url().'admin/agency/upload_photos';?>';
    dropZone(dropZoneUrl);

    var setValueUrl = '<?php echo base_url('admin/common/get_data_from_id'); ?>';
    var mode = <?php echo json_encode($mode); ?>;
    var table_name = 'ins_agency';
    var id = <?php echo json_encode($id); ?>;
    setValues(setValueUrl, mode, table_name, id);

    $(document).on('input', '.od, .tp', function () {
        var $row = $(this).closest('tr');
        var $od = $row.find('.od');
        var $tp = $row.find('.tp');
        var $net = $row.find('.net');

        var od = parseFloat($od.val()) || 0;
        var tp = parseFloat($tp.val()) || 0;

        if (od > 0 && tp > 0) {
            $net.val("0.00").attr('readonly', true);
        } else {
            $net.attr('readonly', false);
        }
    });

    $("#edit-ins").click(function() {
        var id = $("#id").val();
        window.location.href = '<?php echo base_url('admin/agency/agency_form/e/'); ?>' + id;
    });

    $(document).on('input', '.net', function () {
        var $row = $(this).closest('tr');
        var $od = $row.find('.od');
        var $tp = $row.find('.tp');
        var $net = $row.find('.net');

        var net = parseFloat($net.val()) || 0;

        if (net > 0) {
            $od.val("0.00").attr('readonly', true);
            $tp.val("0.00").attr('readonly', true);
        } else {
            $od.attr('readonly', false);
            $tp.attr('readonly', false);
        }
    });

    
    if(mode == 'v'){
        $('.login-commission-table input').prop('disabled', true);
    }

    // Only initialize if admin
    <?php if($this->session->userdata('role') == 1): ?>
    $('#loginid-history-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "paging": true,
        "searching": false,
        "ajax": {
            "url": "<?= base_url('admin/agency/agency_history_datatable/' . (isset($id) ? $id : 0)) ?>",
            "type": "GET"
        },
        "columns": [
            { "data": 0, "name": "sno" },
            { "data": 1, "name": "updated_at" },
            { "data": 2, "name": "field_name" },
            { "data": 3, "name": "old_value" },
            { "data": 4, "name": "new_value" },
            { "data": 5, "name": "updated_by" }
        ],
        "order": [[0, 'desc']]
    });
    <?php endif; ?>
});
</script>

<?php if($this->session->userdata('role') != 1): ?>
<style>
    #branch_id {
        pointer-events: none;
        background-color: #eee;
        color: #555;
    }
    /* For select2 styling */
    .select2-container--default .select2-selection--single {
        background-color: #eee !important;
        color: #555 !important;
        pointer-events: none !important;
    }
</style>
<script>
    $(document).ready(function() {
        $('#branch_id').on('mousedown', function(e) {
            e.preventDefault();
        });
        // For select2, also block keyboard
        $('#branch_id').on('keydown', function(e) {
            e.preventDefault();
        });
    });
</script>
<?php endif; ?>