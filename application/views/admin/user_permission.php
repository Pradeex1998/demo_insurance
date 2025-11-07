<!-- JQuery DataTable Css -->
<link href="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<!-- Exportable Table -->
<!-- Bootstrap Material Datetime Picker Css -->
<link
    href="<?= base_url() ?>public/plugins/bootstrap-material-datetime-picker/css/bootstrap-material-datetime-picker.css"
    rel="stylesheet" />
<!-- Wait Me Css -->
<link href="<?= base_url() ?>public/plugins/waitme/waitMe.css" rel="stylesheet" />

<style>
    #user_rights_table th:nth-child(4),
    #user_rights_table td:nth-child(4) {
        text-align: center;
    }
    #user_rights_table td:first-child {
        text-align: center;
    }

    [type="checkbox"] + label {
        height:0px !important;
    }
    #user_rights_table th {
        text-align: center;
    }

    #user_rights_table td {
        vertical-align: middle;
    }
    #user_rights_table {
        width: 100%;
        border-collapse: collapse; 
    }
    #user_rights_table td, #user_rights_table th {
        border: 1px solid #ddd; 
        padding: 8px;
    }
    </style>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="javascript:history.go(-1)"><span style="vertical-align: bottom" class="material-icons">arrow_back_ios</span>
                    <h2 style="display: inline-block;">User Permission</h2>
                </a> 
            </div>
        </div>

        <div class="card">
            <form action="<?= base_url('admin/user/save_permissions') ?>" method="post" id="permissionsForm">
                <div class="body table-responsive" style="overflow:auto">
                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
                    <?php
                        // Sample permissions array
                        $permissionsData = [
                            ['id' => 1, 'menu' => 'agency',     'submenu' => 'agency_list',         'menu_label' => 'Agent',           'submenu_label' => 'Agent List'],
                            ['id' => 2, 'menu' => 'insurance',  'submenu' => 'insurance_list',      'menu_label' => 'Insurance',        'submenu_label' => 'Insurance List'],
                            ['id' => 3, 'menu' => 'reports',    'submenu' => 'payoutreport_list',   'menu_label' => 'Reports',          'submenu_label' => 'Payout Report'],
                            ['id' => 4, 'menu' => 'loginid',    'submenu' => 'loginid_list',        'menu_label' => 'Login ID',         'submenu_label' => 'Login ID List'],
                            ['id' => 5, 'menu' => 'settings',   'submenu' => 'email_list',          'menu_label' => 'Email Settings',   'submenu_label' => 'Email Settings List'],
                            ['id' => 6, 'menu' => 'branch',     'submenu' => 'branch_list',         'menu_label' => 'Branch',           'submenu_label' => 'Branch List'],
                            ['id' => 7, 'menu' => 'user',       'submenu' => 'user_list',           'menu_label' => 'User',             'submenu_label' => 'User List']
                        ];
                        ?>

                        <table id="user_rights_table" class="table" width="50%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Menu</th>
                                    <th>Submenu</th>
                                    <th>Permission</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>All</td>
                                    <td>All</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="checkbox" id="check_all">
                                            <label for="check_all"></label>
                                        </div>
                                    </td>
                                </tr>
                                <?php foreach($permissionsData as $item): ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td>
                                        <input type="hidden" name="permissions[<?= $item['id'] ?>][menu]" value="<?= $item['menu'] ?>">
                                        <?= $item['menu_label'] ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="permissions[<?= $item['id'] ?>][submenu]" value="<?= $item['submenu'] ?>">
                                        <?= $item['submenu_label'] ?>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="checkbox"
                                                id="permission_<?= $item['id'] ?>"
                                                name="permissions[<?= $item['id'] ?>][permission]"
                                                value="1"
                                                class="material"
                                                <?= isset($permissions[$item['menu']][$item['submenu']]) && $permissions[$item['menu']][$item['submenu']] == 1 ? 'checked' : '' ?>>
                                            <label for="permission_<?= $item['id'] ?>"></label>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </from>

                    <div class="row">
                        <div class="col pull-right" style="right: 15px;position: relative;">
                            <div class="form-group">
                                <a href="<?= base_url('admin/user/user_list/w') ?>" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save Permissions</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>



<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script>
<!-- Moment Plugin Js -->
<script src="<?= base_url() ?>public/plugins/momentjs/moment.js"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?= base_url() ?>public/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
</script>
<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<script>
$(document).ready(function() {  
    $('#check_all').click(function() {
        var isChecked = $(this).is(':checked');
        $('#user_rights_table tbody tr').each(function() {
            $(this).find('td').eq(3).find('.material').prop('checked', isChecked);
        });
    });
});


</script>

<script>
    $(document).ready(function() {
        function checkAllCheckboxes(className, selector) {
        // Count total checkboxes excluding #permission_1
        var totalCheckboxes = $('.' + className).length;
        // Count checked checkboxes excluding #permission_1
        var checkedCheckboxes = $('.' + className + ':checked').length;

        if (totalCheckboxes === checkedCheckboxes) {
            $('#' + selector).prop('checked', true);
        } else {
            $('#' + selector).prop('checked', false);
        }
    }

       

        $(document).on('change', '.material', function() {
            checkAllCheckboxes('material', 'check_all');
        });

        checkAllCheckboxes('material', 'check_all');
    });
</script>


<script>
    <?php if ($is_material == 1): ?>
    $(document).ready(function() {
        var rowsToHide = [];
        rowsToHide.forEach(function(rowIndex) { 
            $('#user_rights_table tbody tr').eq(rowIndex).hide();
        });
    });
    <?php endif; ?>
</script>


