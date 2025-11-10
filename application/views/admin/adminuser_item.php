<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Custom CSS for Permission Table -->
<style>
    #user_permissions_table {
        border-collapse: collapse;
        width: 100%;
    }
    
    #user_permissions_table th,
    #user_permissions_table td {
        border: 1px solid #dee2e6;
        padding: 12px 8px;
        text-align: left;
        vertical-align: middle;
    }
    
    #user_permissions_table th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #495057;
    }
    
    #user_permissions_table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .form-group {
        margin-bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .material {
        margin: 0;
    }
    
    /* Form alignment fixes only */
    .form-group {
        margin-bottom: 0;
    }
    
    .form-line {
        margin-bottom: 0;
    }
    
    /* Ensure consistent spacing */
    .row.clearfix {
        margin-bottom: 15px;
    }
    
    .row.clearfix:last-child {
        margin-bottom: 0;
    }
</style>

<div class="container-fluid">
    <!-- <div class="block-header">
        <h2><?php echo $title;?></h2>
    </div> -->
    <form id="form_appuser" method="post"  enctype="multipart/form-data" >
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">                    
                    <div class="header">
                        <a href="javascript:history.go(-1)"><span style="vertical-align: bottom" class="material-icons">arrow_back_ios</span>
                        <h2>
                            <?php echo $title;?>
                            <!-- <small>Different sizes and widths</small> -->
                        </h2></a>                        
                    </div>                    
                    <div class="body" id="contact_div">
                        <!-- <h2 class="card-inside-title">Event Type</h2> -->
                        <div class="row clearfix">
                            <div class="col-sm-10">
                                <label class="form-address">INFORMATION</label>
                            </div>
                        </div>
                        <input id="id" name="id" type="hidden" value="<?php echo isset($user_details['id']) ? $user_details['id'] : ''; ?>"/>
                        <br>

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input id="name" name="name" type="text" maxlength="250" class="form-control" required="" value="<?php echo isset($user_details['name']) ? $user_details['name'] : ''; ?>" />
                                        <label class="form-label">First Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input id="lastname" name="lastname" type="text" maxlength="250" class="form-control" value="<?php echo isset($user_details['lastname']) ? $user_details['lastname'] : ''; ?>"/>
                                        <label class="form-label">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input id="mobile_no" name="mobile_no" type="text" maxlength="250" class="form-control" required="" value="<?php echo isset($user_details['mobile_no']) ? $user_details['mobile_no'] : ''; ?>" />
                                        <label class="form-label">Mobile Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input id="email" name="email" type="email" maxlength="250" required="" class="form-control" value="<?php echo isset($user_details['email']) ? $user_details['email'] : ''; ?>"/>
                                        <label class="form-label">E-Mail (Login id)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input id="password" name="password" type="password" maxlength="250" class="form-control" placeholder="Leave blank to keep current password"/>
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="status" name="status" class="form-control">
                                        <option value="active" <?php echo (isset($user_details['status']) && $user_details['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                        <option value="inactive" <?php echo (isset($user_details['status']) && $user_details['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="branch_id" name="branch_id" class="form-control" required>
                                        <option value="">-- Select Branch --</option>   
                                            <?php foreach ($branches as $item) : ?>
                                                <option value="<?php echo $item['id']; ?>" <?php echo (isset($user_details['branch_id']) && $user_details['branch_id'] == $item['id']) ? 'selected' : ''; ?>>
                                                <?php echo $item['branch_name']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select id="role_id" name="role_id" class="form-control" required>
                                        <option value="">-- Select User Role --</option>   
                                        <?php if(isset($roles) && is_array($roles)) : ?>
                                            <?php foreach ($roles as $role) : ?>
                                                <option value="<?php echo $role['id']; ?>" <?php echo (isset($user_details['role_id']) && $user_details['role_id'] == $role['id']) ? 'selected' : ''; ?>>
                                                    <?php echo $role['role']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4" id="agency_group" style="display:none;">
                                <div class="form-group">
                                    <select id="agency_id" name="agency_id" class="form-control">
                                        <option value="">-- Select Agent --</option>
                                        <?php if (isset($agencies) && is_array($agencies)) : ?>
                                            <?php 
                                            foreach ($agencies as $agency) : 
                                                $isSelected = (isset($user_details['agency_id']) && $user_details['agency_id'] == $agency['id']);
                                            ?>
                                                <option value="<?php echo $agency['id']; ?>"
                                                    <?php echo $isSelected ? 'selected' : ''; ?>>
                                                    <?php echo $agency['name'] ?? ($agency['agency_name'] ?? ''); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line focused">
                                        <input id="address" name="address" type="text" maxlength="250" class="form-control" value="<?php echo isset($user_details['address']) ? $user_details['address'] : ''; ?>"/>
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>Menu & Submenu Permissions</h2>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table id="user_permissions_table" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">S.No</th>
                                                        <th width="35%">Menu</th>
                                                        <th width="45%">Submenu</th>
                                                        <th width="15%">Permission</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;">#</td>
                                                        <td style="text-align: center;"><strong>All</strong></td>
                                                        <td style="text-align: center;"><strong>All</strong></td>
                                                        <td style="text-align: center;">
                                                            <div class="form-group" style="text-align: center;">
                                                                <input type="checkbox" id="check_all_permissions" class="material">
                                                                <label for="check_all_permissions"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                    // Define menu and submenu structure based on sidebar
                                                    $menuPermissions = [
                                                        ['menu' => 'agency', 'submenu' => 'agency_list', 'menu_label' => 'Agent', 'submenu_label' => 'Agent List'],
                                                        ['menu' => 'insurance', 'submenu' => 'insurance_list', 'menu_label' => 'Insurance', 'submenu_label' => 'Insurance Record'],
                                                        ['menu' => 'reports', 'submenu' => 'payout_report', 'menu_label' => 'Reports', 'submenu_label' => 'Payout Report'],
                                                        ['menu' => 'reports', 'submenu' => 'agentwise_consolidated_report', 'menu_label' => 'Reports', 'submenu_label' => 'Agent wise Cons.Report'],
                                                        ['menu' => 'reports', 'submenu' => 'agentwise_report', 'menu_label' => 'Reports', 'submenu_label' => 'Agent wise Report'],
                                                        ['menu' => 'reports', 'submenu' => 'creditcard_wise_report', 'menu_label' => 'Reports', 'submenu_label' => 'Credit Card Wise Report'],
                                                        ['menu' => 'loginid', 'submenu' => 'loginid_list', 'menu_label' => 'Company Login ID', 'submenu_label' => 'Login ID List'],
                                                        ['menu' => 'master', 'submenu' => 'state_list', 'menu_label' => 'Masters', 'submenu_label' => 'State'],
                                                        ['menu' => 'master', 'submenu' => 'district_list', 'menu_label' => 'Masters', 'submenu_label' => 'District'],
                                                        ['menu' => 'master', 'submenu' => 'rto_list', 'menu_label' => 'Masters', 'submenu_label' => 'RTO'],
                                                        ['menu' => 'master', 'submenu' => 'agent_code_list', 'menu_label' => 'Masters', 'submenu_label' => 'Agent Code'],
                                                        ['menu' => 'master', 'submenu' => 'branch_list', 'menu_label' => 'Masters', 'submenu_label' => 'Branch'],
                                                        ['menu' => 'master', 'submenu' => 'staff_list', 'menu_label' => 'Masters', 'submenu_label' => 'Staff'],
                                                        ['menu' => 'master', 'submenu' => 'insurance_company_list', 'menu_label' => 'Masters', 'submenu_label' => 'Insurance Company'],
                                                        ['menu' => 'master', 'submenu' => 'rto_company_list', 'menu_label' => 'Masters', 'submenu_label' => 'RTO Company'],
                                                        ['menu' => 'master', 'submenu' => 'emailtosend_report_list', 'menu_label' => 'Masters', 'submenu_label' => 'Email Settings'],
                                                        ['menu' => 'master', 'submenu' => 'credit_card_list', 'menu_label' => 'Masters', 'submenu_label' => 'Credit Card'],
                                                        ['menu' => 'user', 'submenu' => 'user_list', 'menu_label' => 'Users', 'submenu_label' => 'User List']
                                                    ];
                                                    
                                                    // Group permissions by menu
                                                    $groupedPermissions = [];
                                                    foreach($menuPermissions as $permission) {
                                                        $groupedPermissions[$permission['menu']][] = $permission;
                                                    }
                                                    
                                                    $counter = 1;
                                                    $currentMenu = '';
                                                    $menuRowCounts = [];
                                                    
                                                    // Calculate row counts for each menu
                                                    foreach($groupedPermissions as $menu => $permissions) {
                                                        $menuRowCounts[$menu] = count($permissions);
                                                    }
                                                    
                                                    foreach($groupedPermissions as $menu => $permissions): 
                                                        $isFirstRow = true;
                                                        foreach($permissions as $permission): 
                                                            $permissionKey = $permission['menu'] . '_' . $permission['submenu'];
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $counter++; ?></td>
                                                        <?php if($isFirstRow): ?>
                                                        <td rowspan="<?php echo $menuRowCounts[$menu]; ?>" style="font-weight: bold; background-color: #f8f9fa; text-align: left; vertical-align: middle; border: 1px solid #dee2e6;">
                                                            <?php echo $permission['menu_label']; ?>
                                                        </td>
                                                        <?php endif; ?>
                                                        <td style="text-align: left;">
                                                            <?php echo $permission['submenu_label']; ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <!-- Hidden inputs for menu and submenu - always present -->
                                                            <input type="hidden" name="permissions[<?php echo $permissionKey; ?>][menu]" value="<?php echo $permission['menu']; ?>">
                                                            <input type="hidden" name="permissions[<?php echo $permissionKey; ?>][submenu]" value="<?php echo $permission['submenu']; ?>">
                                                            
                                                            <div class="form-group" style="text-align: center;">
                                                                <input type="checkbox" 
                                                                       id="permission_<?php echo $permissionKey; ?>" 
                                                                       name="permissions[<?php echo $permissionKey; ?>][permission]" 
                                                                       value="1" 
                                                                       class="material permission-checkbox"
                                                                       <?php echo (isset($user_permissions[$permission['menu']][$permission['submenu']]['permission']) && $user_permissions[$permission['menu']][$permission['submenu']]['permission'] == 1) ? 'checked' : ''; ?>>
                                                                <label for="permission_<?php echo $permissionKey; ?>"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                            $isFirstRow = false;
                                                        endforeach; 
                                                    endforeach; 
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group" style="display: flex; justify-content: flex-end;">
                                    <button id="submit_btn" type="submit" class="btn bg-green waves-effect">
                                        <i class="material-icons"><?php echo (isset($user_details['id']) && $user_details['id'] != '') ? 'edit' : 'add'; ?></i> 
                                        <?php echo (isset($user_details['id']) && $user_details['id'] != '') ? 'Update User' : 'Submit User'; ?>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div> <!-- body-->
                </div> <!-- card-->
            </div><!-- col-->
        </div> <!-- clearfix main-->
    </form>
</div> <!-- container-->




<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var mode = <?php echo json_encode($mode); ?>;

    $(document).ready(function() {
        // Handle "Check All" functionality for permissions
        $('#check_all_permissions').click(function() {
            var isChecked = $(this).is(':checked');
            $('.permission-checkbox').prop('checked', isChecked);
        });

        // Handle individual checkbox changes to update "Check All" status
        $('.permission-checkbox').change(function() {
            updateCheckAllStatus('.permission-checkbox', '#check_all_permissions');
        });

        // Function to update "Check All" checkbox status
        function updateCheckAllStatus(checkboxClass, checkAllId) {
            var totalCheckboxes = $(checkboxClass).length;
            var checkedCheckboxes = $(checkboxClass + ':checked').length;
            
            if (totalCheckboxes === checkedCheckboxes) {
                $(checkAllId).prop('checked', true);
            } else {
                $(checkAllId).prop('checked', false);
            }
        }

        // Initialize check all status on page load
        updateCheckAllStatus('.permission-checkbox', '#check_all_permissions');

        // Handle role change to show/hide agency dropdown
        $('#role_id').change(function() {
            var selectedRole = $(this).val();
            var roleText = $(this).find('option:selected').text().trim().toLowerCase();
            
            if (roleText.includes('agent')) {
                $('#agency_group').show();
                $('#agency_id').prop('required', true);
            } else {
                $('#agency_group').hide();
                $('#agency_id').prop('required', false);
                $('#agency_id').val('');
            }
        });

        // Initialize agency dropdown visibility on page load
        var currentRole = $('#role_id').val();
        var currentRoleText = $('#role_id').find('option:selected').text().trim().toLowerCase();
        var currentAgencyId = $('#agency_id').val();
        
        // Show agency dropdown if role is agent OR if user already has agency_id set (edit mode)
        if (currentRoleText.includes('agent') || (currentAgencyId && currentAgencyId !== '')) {
            $('#agency_group').show();
            $('#agency_id').prop('required', true);
        }

        // Handle form submission
        $('#form_appuser').submit(function(e) {
            e.preventDefault();
            
            // Validate agency selection for agent role
            var selectedRole = $('#role_id').find('option:selected').text().trim().toLowerCase();
            var agencyValue = $('#agency_id').val();
            var isAgencyVisible = $('#agency_group').is(':visible');
            
            if (selectedRole.includes('agent') && isAgencyVisible && (!agencyValue || agencyValue === '')) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Agent Required!',
                    text: 'Please select an agency for agent role.',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                return false;
            }
            
            var formData = new FormData(this);
            
            $.ajax({
                url: '<?= base_url("admin/user/submit_adminuser") ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == '1') {
                        var message = '<?php echo (isset($user_details['id']) && $user_details['id'] != '') ? 'User updated successfully!' : 'User saved successfully!'; ?>';
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: message,
                            showConfirmButton: true,
                            confirmButtonText: 'OK',
                            timer: 2000,
                            timerProgressBar: true
                        }).then((result) => {
                            // Redirect regardless of how the alert was closed
                            window.location.href = '<?= base_url("admin/user/user_list/w") ?>';
                        });
                        
                        // Fallback redirect after 3 seconds
                        setTimeout(function() {
                            window.location.href = '<?= base_url("admin/user/user_list/w") ?>';
                        }, 3000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                            showConfirmButton: true,
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log('XHR:', xhr);
                    console.log('Status:', status);
                    console.log('Error:', error);
                    console.log('Response Text:', xhr.responseText);
                    
                    var errorMessage = 'An error occurred while saving the user.';
                    if (xhr.responseText) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            if (response.message) {
                                errorMessage = response.message;
                            }
                        } catch (e) {
                            errorMessage = 'Server Error: ' + xhr.responseText;
                        }
                    }
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: errorMessage,
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>


