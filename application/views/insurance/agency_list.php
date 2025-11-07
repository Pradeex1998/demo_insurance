
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">&nbsp;&nbsp; <?php echo $title; ?></h2>
                <button type="button" onclick="add_agency()" class="btn bg-green waves-effect pull-right"><i
                        class="material-icons">add</i> Add</button>
            </div>
        </div>

        <div class="card" style="overflow-x:auto;">
            <div class="body table-responsive">
                <table id="datatable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">S.No</th>
                            <th style="text-align: center;">Agent Id</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Mobile No</th>
                            <th style="text-align: center;">Whatsapp No</th>
                            <th style="text-align: center;">Email Id</th>
                            <th style="text-align: center;">City</th>
                            <th style="text-align: center;">Address</th>
                            <th style="text-align: center;">Last update</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        </section>
    </div>

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
                    targets: [0, 1, 3,4,8,9,10],
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
                "url": "<?= base_url('admin/agency/agency_list_datatable_json') ?>",
                "type": "POST",
            },
        });
    }
    //---------------------------------------------------
    </script>

    <script>
    function add_agency() {
        window.location.href = "<?php echo base_url() . 'admin/agency/agency_form/a'; ?>";
    }
    </script>