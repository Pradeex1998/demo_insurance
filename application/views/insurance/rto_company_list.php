<!-- Shared plugin CSS moved to layout.php -->

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">&nbsp;&nbsp; <?php echo $title; ?></h2>
                <button type="button" data-toggle="modal" data-target="#companyModal" class="btn bg-green waves-effect pull-right addBtn"><i class="material-icons">add</i> Add</button>
            </div>
        </div>

        <div class="card">
            <div class="body table-responsive">
                <table id="datatable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">S.No</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Insurance Company</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Created By</th>
                            <th style="text-align: center;">Updated By</th>
                            <th style="text-align: center;">Created At</th>
                            <th style="text-align: center;">Updated At</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="companyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="rtoCompanyForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add RTO Company</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">    
                        <div class="row clearfix">
                            <div class="col-sm-12">
                            <input type="hidden" name="id" id="id" class="form-control">
                            <div class="form-group">
                                <label class="form-label required" for="name">Name</label>
                                <div class="form-line">
                                <input type="text" name="name" id="name" class="form-control" required pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'')" autocomplete="off">
                                </div>
                            </div>
                            </div>
                        </div>

                        

                        <div class="row clearfix" style="margin-top: 15px;">
                            <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                <select name="inscompany_id" id="inscompany_id" class="form-control show-tick" required>
                                    <option value="">-- Select Insurance Company --</option>
                                    <?php if (!empty($insurance_company_list)) { foreach ($insurance_company_list as $item) { ?>
                                        <option value="<?= htmlspecialchars($item['id']) ?>"><?= htmlspecialchars($item['name']) ?></option>
                                    <?php } } ?>
                                </select>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row clearfix" style="margin-top: 15px;">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="state_id">State</label>
                                    <div class="form-line">
                                        <select name="state_id" id="state_id" class="form-control show-tick">
                                            <option value="">-- All States --</option>
                                            <?php if (!empty($states)) { foreach ($states as $st) { ?>
                                                <option value="<?= htmlspecialchars($st['id']) ?>"><?= htmlspecialchars($st['name']) ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="district_id">District</label>
                                    <div class="form-line">
                                        <select name="district_id" id="district_id" class="form-control show-tick" disabled>
                                            <option value="">-- All Districts --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix" style="margin-top: 5px;">
                            <div class="col-sm-12">
                                <label class="form-label">RTOs</label>
                                <div id="rtoCheckboxContainer" class="row" style="max-height: 260px; overflow:auto; border: 1px solid #ddd; padding:10px; border-radius:4px;">
                                    <div class="col-sm-12" style="margin-bottom:10px; padding-bottom:8px; border-bottom: 1px solid #ddd;">
                                        <input type="checkbox" id="rto_all" class="filled-in chk-col-green" value="all">
                                        <label for="rto_all" style="margin-left:0; font-weight:bold;">All RTOs</label>
                                    </div>
                                    <!-- RTO checkboxes will be rendered here -->
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix" style="margin-top: 15px;">
                            <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label required" for="status">Status</label>
                                <div class="form-line">
                                <select name="status" id="status" class="form-control show-tick" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success waves-effect">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Shared plugin JS moved to layout.php; keep page-specific scripts only -->
     
    <style>
    /* ensure labels don’t overlap or get hidden */
    #companyModal .form-group > label { display:block; margin-bottom:6px; font-weight:600; }
    #companyModal .form-line { margin-top:0; }
    </style>

    


    <script>
    $(document).ready(function() {

        // $('#branch_id, #form_10be').select2({
        //   placeholder: "- Select Branch -"
        // });

        datatable('datatable');

        $('#search').on('click', function() {
            table.ajax.reload();
        });

        $('#clear').on('click', function() {
            window.location.reload();
        });

        $('body').on('keyup click', '.search-input-text', function() {
            var i = $(this).attr('data-column');
            var v = $(this).val();
            table.columns(i).search(v).draw();
        });

        $('.search-input-select').on('change', function() {
            var i = $(this).attr('data-column');
            var v = $(this).val();
            table.columns(i).search(v).draw();
        });

    });

    function datatable(tableId) {
        var table = $('#'+ tableId).DataTable({
            "autoWidth": false,
            "serverSide": true,
            "ordering": true,
            "scrollX": true,
            "scrollCollapse": true,
            "order": [
                [0, 'desc']
            ],
            "columnDefs": [{
                    targets: [0, 3, 4, 5, 6, 7],
                    className: 'text-center'
                },
                {
                    targets: '_all',
                    className: 'align-middle text-nowrap'
                }
            ],
            "aLengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "ajax": {
                "url": "<?= base_url('admin/master/rto_company_datatable_json') ?>",
                "type": "POST",
            },
        });
    }

   

    //---------------------------------------------------
    </script>

    <script>
        $(document).ready(function() {
            // utilities for selects (supporting bootstrap-select if present)
            function refreshSelect($el) {
                if ($.fn.selectpicker) { $el.selectpicker('refresh'); }
            }
            function setSelectValue($el, value) {
                if ($.fn.selectpicker) { $el.selectpicker('val', value); }
                else { $el.val(value); }
                $el.trigger('change');
            }
            function setSelectSilently($el, value) {
                if ($.fn.selectpicker) { $el.selectpicker('val', value); }
                else { $el.val(value); }
                // do not trigger change here
            }
            // helper: render RTO items
            function renderRtoCheckboxes(rtos, selectedIds) {
                var $container = $('#rtoCheckboxContainer');
                // clear existing (except the header with All toggle)
                $container.find('.rto-checkbox').closest('.col-sm-4').remove();
                selectedIds = selectedIds || [];
                (rtos || []).forEach(function(r){
                    var id = 'rto_' + r.id;
                    var isChecked = selectedIds.indexOf(String(r.id)) !== -1;
                    var $col = $('<div/>', { class: 'col-sm-4', style: 'margin-bottom:6px;' });
                    var $input = $('<input/>', { type: 'checkbox', id: id, class: 'filled-in chk-col-green rto-checkbox', value: r.id });
                    if (isChecked) { $input.prop('checked', true); }
                    var labelText = (r.rto_code || '').toString();
                    var $label = $('<label/>', { for: id, style: 'margin-left:0;' }).text(labelText);
                    $col.append($input).append($label);
                    $container.append($col);
                });
                // update All checkbox state
                var total = $('#rtoCheckboxContainer .rto-checkbox').length;
                var checked = $('#rtoCheckboxContainer .rto-checkbox:checked').length;
                $('#rto_all').prop('checked', total > 0 && total === checked);
            }

            function fetchDistricts(stateId, cb) {
                $('#district_id').prop('disabled', true).html('<option value="">-- All Districts --</option>');
                refreshSelect($('#district_id'));
                if (!stateId) { return; }
                $.get("<?= base_url('admin/master/districts_by_state') ?>/" + stateId, function(res){
                    try { res = (typeof res === 'string') ? JSON.parse(res) : res; } catch(e) { res = { status: '0', data: [] }; }
                    if (res.status === '1') {
                        var opts = '<option value="">-- All Districts --</option>';
                        res.data.forEach(function(d){ opts += '<option value="' + d.id + '\">' + d.name.replace(/</g,'&lt;') + '</option>'; });
                        $('#district_id').html(opts).prop('disabled', false);
                        refreshSelect($('#district_id'));
                        if (typeof cb === 'function') { cb(); }
                    }
                });
            }

            function fetchRtos(stateId, districtId, selectedIds) {
                $.post("<?= base_url('admin/master/rtos_by_location') ?>", { state_id: stateId || '', district_id: districtId || '' }, function(res){
                    try { res = (typeof res === 'string') ? JSON.parse(res) : res; } catch(e) { res = { status: '0', data: [] }; }
                    var list = (res.status === '1') ? res.data : [];
                    renderRtoCheckboxes(list, selectedIds);
                });
            }

            // initial load of RTOs (all)
            fetchRtos('', '', []);
            // Reset the form when the modal is opened
            // $('.addBtn').on('click', function() {
            //     $('#branchForm')[0].reset(); // Reset the form fields
            //     $('#status').val('').change(); // Reset the dropdown
            // });

            // Handle "All" checkbox click
            $(document).on('change', '#rto_all', function() {
                var isChecked = $(this).prop('checked');
                $('#rtoCheckboxContainer .rto-checkbox').prop('checked', isChecked);
            });

            // Handle individual RTO checkbox clicks - update "All" checkbox state
            $(document).on('change', '.rto-checkbox', function() {
                var totalCheckboxes = $('#rtoCheckboxContainer .rto-checkbox').length;
                var checkedCheckboxes = $('#rtoCheckboxContainer .rto-checkbox:checked').length;
                
                if (checkedCheckboxes === totalCheckboxes && totalCheckboxes > 0) {
                    $('#rto_all').prop('checked', true);
                } else {
                    $('#rto_all').prop('checked', false);
                }
            });

            // Dependent selects
            $(document).on('change', '#state_id', function(){
                var stateId = $(this).val();
                // reset district
                setSelectValue($('#district_id'), '');
                fetchDistricts(stateId);
                // keep currently selected rtos (for edit) if any
                var selected = $('#rtoCheckboxContainer .rto-checkbox:checked').map(function(){return $(this).val();}).get();
                fetchRtos(stateId, '', selected);
            });
            $(document).on('change', '#district_id', function(){
                var stateId = $('#state_id').val();
                var districtId = $(this).val();
                var selected = $('#rtoCheckboxContainer .rto-checkbox:checked').map(function(){return $(this).val();}).get();
                fetchRtos(stateId, districtId, selected);
            });

            $('#rtoCompanyForm').on('submit', function(e) {
                e.preventDefault();
                // collect RTO ids (exclude the "All" checkbox)
                var rtoIds = [];
                $('#rtoCheckboxContainer .rto-checkbox:checked').each(function(){
                    rtoIds.push($(this).val());
                });
                // collect single selected insurance company
                var insCompanyId = $('#inscompany_id').val() || '';
                var formData = $(this).serializeArray();
                formData.push({name: 'rto_ids', value: rtoIds.join(',')});
                // override inscompany_id with single value
                // remove any existing inscompany_id entries first
                formData = formData.filter(function(f){ return f.name !== 'inscompany_id'; });
                formData.push({name: 'inscompany_id', value: insCompanyId});
                $.ajax({
                    url: "<?= base_url('admin/master/submit_rto_company') ?>",
                    type: "POST",
                    data: $.param(formData),
                    success: function(res) {
                        $('#companyModal').modal('hide');
                        $('#datatable').DataTable().ajax.reload(null, false);

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'RTO Company saved!',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to save RTO Company. Please try again.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });

            // Handle delete button click
            $(document).on('click', '.deleteBtn', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post("<?= base_url('admin/master/delete_branch') ?>", { id }, function() {
                            $('#datatable').DataTable().ajax.reload(null, false);

                            // Show success alert
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Branch has been deleted.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }).fail(function() {
                            // Show error alert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to delete branch. Please try again.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        });
                    }
                });
            });

            // Edit button click handler
            $(document).on('click', '.editBtn', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: "<?= base_url('admin/master/get_rto_company_byid') ?>/" + id,
                    type: "GET",
                    dataType: "json", // Ensures automatic parsing
                    success: function(response) {
                        if (response.status === "1" && Array.isArray(response.data) && response.data.length > 0) {
                            const row = response.data[0];
                            $('#id').val(row.id);
                            const selectedRtos = (row.rto_ids || '').split(',').map(function(x){return x.trim();}).filter(Boolean);
                            // Set name
                            $('#name').val(row.name);
                            // Set single insurance company selection
                            setSelectValue($('#inscompany_id'), row.inscompany_id);
                            // If we have saved RTOs, infer state/district from the first one and preselect
                            if (selectedRtos.length > 0) {
                                $.get("<?= base_url('admin/master/rto_meta') ?>/" + encodeURIComponent(selectedRtos[0]), function(metaRes){
                                    try { metaRes = (typeof metaRes === 'string') ? JSON.parse(metaRes) : metaRes; } catch(e) { metaRes = { status: '0', data: {} }; }
                                    if (metaRes.status === '1' && metaRes.data) {
                                        var stId = metaRes.data.state_id || '';
                                        var dtId = metaRes.data.district_id || '';
                                        // set state silently and load districts, then set district silently
                                        setSelectSilently($('#state_id'), stId);
                                        refreshSelect($('#state_id'));
                                        fetchDistricts(stId, function(){
                                            setSelectSilently($('#district_id'), dtId);
                                            refreshSelect($('#district_id'));
                                            fetchRtos(stId, dtId, selectedRtos);
                                            // Update "All" checkbox after render
                                            var totalCheckboxes = $('#rtoCheckboxContainer .rto-checkbox').length;
                                            var checkedCheckboxes = $('#rtoCheckboxContainer .rto-checkbox:checked').length;
                                            $('#rto_all').prop('checked', (checkedCheckboxes === totalCheckboxes && totalCheckboxes > 0));
                                        });
                                    } else {
                                        // fallback: no meta, show all with selected
                                        setSelectSilently($('#state_id'), '');
                                        $('#district_id').html('<option value="">-- All Districts --</option>').prop('disabled', true);
                                        refreshSelect($('#district_id'));
                                        fetchRtos('', '', selectedRtos);
                                    }
                                });
                            } else {
                                // no saved RTOs: reset filters and load all
                                setSelectSilently($('#state_id'), '');
                                $('#district_id').html('<option value="">-- All Districts --</option>').prop('disabled', true);
                                refreshSelect($('#district_id'));
                                fetchRtos('', '', selectedRtos);
                            }
                            // Update "All" checkbox state based on selected RTOs
                            var totalCheckboxes = $('#rtoCheckboxContainer .rto-checkbox').length;
                            var checkedCheckboxes = $('#rtoCheckboxContainer .rto-checkbox:checked').length;
                            $('#rto_all').prop('checked', (checkedCheckboxes === totalCheckboxes && totalCheckboxes > 0));
                            $('#status').val(row.status).change();
                            $('#companyModal .modal-title').text('Edit RTO Company');
                            $('#rtoCompanyForm button[type="submit"]').text('Update');
                            $('#companyModal').modal('show');
                            $('.form-line').addClass('focused');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Invalid RTO Company data received.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to fetch RTO Company details. Please try again.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });


            // Reset modal for Add RTO
            $('.addBtn').on('click', function() {
                $('#id').val('');
                $('#rtoCompanyForm')[0].reset();
                $('#companyModal .modal-title').text('Add RTO Company');
                $('#rtoCompanyForm button[type="submit"]').text('Save');
                $('.form-line').removeClass('focused');
                // Clear inputs and checkboxes
                $('#name').val('');
                setSelectValue($('#inscompany_id'), '');
                setSelectValue($('#state_id'), '');
                $('#district_id').html('<option value="">-- All Districts --</option>').prop('disabled', true);
                refreshSelect($('#district_id'));
                fetchRtos('', '', []);
                $('#rto_all').prop('checked', false); // Reset "All" checkbox
            });
        });
    </script>

    <script>
    function add_agency() {
        window.location.href = "<?php echo base_url() . 'admin/loginid/loginid_form/a'; ?>";
    }
    </script>