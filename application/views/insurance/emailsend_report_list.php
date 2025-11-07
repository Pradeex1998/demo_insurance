<!-- Shared plugin CSS moved to layout.php -->

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">&nbsp;&nbsp; <?php echo $title; ?></h2>
                <button type="button" data-toggle="modal" data-target="#emailModal" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Add</button>
            </div>
        </div>

        <div class="card">
            <div class="body table-responsive">
                <table id="datatable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">S.No</th>
                            <th style="text-align: center;">Email</th>
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
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="emailForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Email</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">    
                        <div class="row clearfix">
                            <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                <input type="email" name="email" id="email" class="form-control" required maxlength="255">
                                <label class="form-label required">Email Address</label>
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
                "url": "<?= base_url('admin/master/emailtosend_datatable_json') ?>",
                "type": "POST",
            },
        });
    }

   

    //---------------------------------------------------
    </script>

    <script>
        $(document).ready(function() {
            // Reset the form when the modal is opened
            $('#emailModal').on('shown.bs.modal', function() {
                $('#emailForm')[0].reset(); // Reset the form fields
                $('#status').val('').change(); // Reset the dropdown
            });

            // Handle email form submission
            $('#emailForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= base_url('admin/master/save_email') ?>",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(res) {
                        $('#emailModal').modal('hide');
                        $('#datatable').DataTable().ajax.reload(null, false);

                        // Show success alert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Email added successfully!',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        // Show error alert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to add email. Please try again.',
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
                        $.post("<?= base_url('admin/master/delete_email') ?>", { id }, function() {
                            $('#datatable').DataTable().ajax.reload(null, false);

                            // Show success alert
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Email has been deleted.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }).fail(function() {
                            // Show error alert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to delete email. Please try again.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        });
                    }
                });
            });
        });
    </script>

    <script>
    function add_agency() {
        window.location.href = "<?php echo base_url() . 'admin/loginid/loginid_form/a'; ?>";
    }
    </script>