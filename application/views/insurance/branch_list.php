<!-- Shared plugin CSS moved to layout.php -->

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">&nbsp;&nbsp; <?php echo $title; ?></h2>
                <button type="button" data-toggle="modal" data-target="#branchModal" class="btn bg-green waves-effect pull-right addBtn"><i class="material-icons">add</i> Add</button>
            </div>
        </div>

        <div class="card">
            <div class="body table-responsive">
                <table id="datatable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">S.No</th>
                            <th style="text-align: center;">Branch</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Updated By</th>
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
    <div class="modal fade" id="branchModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="branchForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Branch</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">    
                        <div class="row clearfix">
                            <div class="col-sm-12">
                            <input type="hidden" name="id" id="id" class="form-control">
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="text" name="branch_name" id="branch_name" class="form-control" required maxlength="255">
                                <label class="form-label required">Branch Name</label>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row clearfix" style="margin-top: 15px;">
                            <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                <select name="status" id="status" class="form-control show-tick" required>
                                    <option value="">-- Select Status --</option>
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
                    targets: [0, 2, 3, 4],
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
                "url": "<?= base_url('admin/master/branch_datatable_json') ?>",
                "type": "POST",
            },
        });
    }

   

    //---------------------------------------------------
    </script>

    <script>
        $(document).ready(function() {
            // Reset the form when the modal is opened
            // $('.addBtn').on('click', function() {
            //     $('#branchForm')[0].reset(); // Reset the form fields
            //     $('#status').val('').change(); // Reset the dropdown
            // });

            $('#branchForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= base_url('admin/master/submit_branch') ?>",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(res) {
                        $('#branchModal').modal('hide');
                        $('#datatable').DataTable().ajax.reload(null, false);

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Branch added successfully!',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to add branch. Please try again.',
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
                    url: "<?= base_url('admin/master/get_branch_byid') ?>/" + id,
                    type: "GET",
                    dataType: "json", // Ensures automatic parsing
                    success: function(response) {
                        if (response.status === "1" && Array.isArray(response.data) && response.data.length > 0) {
                            const branch = response.data[0];
                            $('#id').val(branch.id);
                            $('#branch_name').val(branch.branch_name);
                            $('#status').val(branch.status).change();
                            $('#branchModal .modal-title').text('Edit Branch');
                            $('#branchForm button[type="submit"]').text('Update');
                            $('#branchModal').modal('show');
                            $('.form-line').addClass('focused');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Invalid branch data received.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to fetch branch details. Please try again.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });


            // Reset modal for Add Branch
            $('.addBtn').on('click', function() {
                $('#id').val('');
                $('#branchForm')[0].reset();
                $('#status').val('').change();
                $('#branchModal .modal-title').text('Add Branch');
                $('#branchForm button[type="submit"]').text('Save');
                $('.form-line').removeClass('focused');
            });
        });
    </script>

    <script>
    function add_agency() {
        window.location.href = "<?php echo base_url() . 'admin/loginid/loginid_form/a'; ?>";
    }
    </script>