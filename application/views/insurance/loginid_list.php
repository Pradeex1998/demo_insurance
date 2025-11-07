<!-- JQuery DataTable Css -->
<link href="<?= base_url() ?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<!-- Exportable Table -->

<!-- Bootstrap Material Datetime Picker Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
    rel="stylesheet" />

<!-- Wait Me Css -->
<link href="<?= base_url() ?>public/plugins/waitme/waitMe.css" rel="stylesheet" />

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">&nbsp;&nbsp; <?php echo $title; ?></h2>
                <button type="button" onclick="add_agency()" class="btn bg-green waves-effect pull-right">
                    <i class="material-icons">add</i> Add</button>
            </div>
        </div>

        <div class="card" style="overflow-x:auto;">
            <div class="body table-responsive">
                <table id="datatable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">S.No</th>
                            <th style="text-align: center;">Sl.Id</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">RTO Company</th>
                            <th style="text-align: center;">Vehicle Type</th>
                            <th style="text-align: center;">Fuel Type</th>
                            <th style="text-align: center;">Policy Type</th>
                            <th style="text-align: center;">Seating</th>
                            <th style="text-align: center;">Agent Code</th>
                            <th style="text-align: center;">Vehicle Make</th>
                            <th style="text-align: center;">Vehicle Model</th>
                            <th style="text-align: center;">Company OD Payout%</th>
                            <th style="text-align: center;">Company TP Payout%</th>
                            <th style="text-align: center;">Company NET Payout%</th>
                            <th style="text-align: center;">Agent OD Payout%</th>
                            <th style="text-align: center;">Agent TP Payout%</th>
                            <th style="text-align: center;">Agent NET Payout%</th>
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
                    [1, 'desc']
                ],
            "columnDefs": [
                {
                    targets: [0, 1, 4,5,6,7,8,9,10,11, 12,13,14, 15, 16, 17, 18, 19],
                    className: 'text-center'
                },
                {
                    targets: [19],
                    orderable: false
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
                "url": "<?= base_url('admin/loginid/loginid_list_datatable_json') ?>",
                "type": "POST",
            },
        });
    }
    //---------------------------------------------------
    </script>

    <script>
    function add_agency() {
        window.location.href = "<?php echo base_url() . 'admin/loginid/loginid_form/a'; ?>";
    }
    </script>