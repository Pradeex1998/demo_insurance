<!-- Shared plugin CSS moved to layout.php -->

<style>
    .text-wrap {
        word-wrap: break-word !important;  /* Ensure long words break and wrap */
        white-space: normal !important;    /* Allow wrapping of text */
        overflow-wrap: break-word !important; /* Ensure long words break across lines */
    }
    /* Ensure only DataTables' internal horizontal scrollbar is visible */
    
    .table-bordered tbody tr td, .table-bordered tbody tr th {
        padding: 5px;
    }
    .table tbody tr:hover {
        cursor: pointer;
        background-color: #d1d1d1ff !important; /* Light grey background on hover */
    }
    .policy-view-link {
        text-decoration: underline;
        text-underline-offset: 4px;
        color: #007bff;
    }
    .policy-view-link:hover {
        color: #0056b3;
    }
</style>



<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        <div class="header">
            <h2 style="display: inline-block;">&nbsp;&nbsp; <?php echo $title; ?></h2>
                <button type="button" onclick="export_excel()" class="btn bg-blue waves-effect pull-right" style="margin-left: 10px;margin-right: 10px;">
                    <i class="material-icons">download</i>
                </button>&nbsp;
            <button type="button" onclick="add_insurance()" class="btn bg-green waves-effect pull-right" style="margin-left: 10px;">
                <i class="material-icons">add</i> Add
            </button>
        </div>
        </div>

        

        <div class="card">
            <div class="body table-responsive">
                <div class="topfilter">
                    <div class="row clearfix">
                        <div class="col-sm-2">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="datepicker" name="datepicker" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-2">
                            <button type="button" id="search" class="btn bg-blue waves-effect"><i class="material-icons">search</i></button>
                            <button type="button" id="clear" class="btn bg-red waves-effect"><i class="material-icons">clear</i></button>
                        </div>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align:center;">ID</th>
                            <th style="text-align:center;">Date</th>
                            <th style="text-align:center;">Policy No</th>
                            <th style="text-align:center;">Vehicle No</th>
                            <th style="text-align:center;">Customer Name</th>
                            <th style="text-align:center;">Make</th>
                            <th style="text-align:center;">Model</th>
                            <th style="text-align:center;">Vehicle Type</th>
                            <th style="text-align:center;">RTO/Company</th>
                            <th style="text-align:center;">MFG Year</th>
                            <th style="text-align:center;">Age</th>
                            <th style="text-align:center;">GVW</th>
                            <th style="text-align:center;">NCB</th>
                            <th style="text-align:center;">Policy Type</th>
                            <th style="text-align:center;">Start Date</th>
                            <th style="text-align:center;">End Date</th>
                            <th style="text-align:center;">Company Name</th>
                            <th style="text-align:center;">Agent Code</th>
                            <th style="text-align:center;">Payment Mode</th>
                            <th style="text-align:center;">OD</th>
                            <th style="text-align:center;">TP</th>
                            <th style="text-align:center;">Net</th>
                            <th style="text-align:center;">Premium</th>
                            <th style="text-align:center;">Reward</th>
                            <th style="text-align:center;">Customer/Agent</th>
                            <th style="text-align:center;">Contact No</th>
                            <th style="text-align:center;">Company Grid</th>
                            <th style="text-align:center;">Company Grid 2</th>
                            <th style="text-align:center;">TDS</th>
                            <th style="text-align:center;">Staff</th>
                            <th style="text-align:center;">Verified Status</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Created By</th>
                            <th style="text-align:center;">Updated By</th>
                            <th style="text-align:center;">Created At</th>
                            <th style="text-align:center;">Updated At</th>
                            <th style="text-align:center;">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                            <tr>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"></th>
                            </tr>
                        </tfoot>
                    
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        </section>
    </div>


    <!-- Shared plugin JS moved to layout.php; keep page-specific scripts only -->
     


    <script>
    $(document).ready(function() {

        $('#datepicker').daterangepicker({
            opens: 'right',
            startDate: moment().startOf('month'),
            endDate: moment().endOf('month'),
            showDropdowns: true,  
            alwaysShowCalendars: true,
            showCustomRangeLabel: true, 
            locale: {
                format: 'DD/MM/YYYY'
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'This Week': [moment().startOf('week'), moment().endOf('week')],
                'Last Week': [moment().subtract(1, 'weeks').startOf('week'), moment().subtract(1, 'weeks').endOf('week')],
                'This Month': [moment().startOf('month'), moment().endOf('month')], 
                'Last Month': [moment().subtract(1, 'months').startOf('month'), moment().subtract(1, 'months').endOf('month')],
                'Last 6 Months': [moment().subtract(6, 'months').startOf('month'), moment().endOf('month')],
            }
        });

        var table = datatable('datatable');

        $('#search').on('click', function() {
            table.ajax.reload();
        });

        $('#clear').on('click', function() {
            $('#datepicker').data('daterangepicker').setStartDate(moment().startOf('month'));
            $('#datepicker').data('daterangepicker').setEndDate(moment().endOf('month'));
            table.search('').columns().search('').draw();
            table.ajax.reload(); 
        });
    });

    function datatable(tableId) {
        // alert($('#loginid').val())
        var userRole = "<?= $this->session->userdata('role'); ?>";
        var dt = $('#'+ tableId).DataTable({
            "autoWidth": true,
            "serverSide": true,
            "ordering": true,
            "scrollX": true,
            "scrollCollapse": true,
            "order": [
                [0, 'desc']
            ],
            "columnDefs": [
                {
                    targets: [0, 1, 9, 10, 14, 23, 25, 26, 27, 28, 34, 35, 36], 
                    className: 'text-center text-nowrap'
                },
                {
                    targets: [19, 20, 21, 22],
                    className: 'text-right text-nowrap'
                },
                {
                    targets: '_all',
                    className: 'align-middle text-nowrap'
                },
            ],
            "aLengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "ajax": {
                "url": "<?= base_url('admin/insurance_policy/insurance_policy_list_json') ?>",
                "type": "POST",
                data: function(d) {
                    d.datepicker = $('#datepicker').val();
                }
            },
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api();

                var intVal = function(i) {
                    if (typeof i === 'string') {
                        var plainText = i.replace(/<[^>]+>/g, ''); // Remove HTML tags
                        return plainText.replace(/[\$,]/g, '').replace(/[^0-9.-]/g, '') * 1 || 0;
                    }
                    return typeof i === 'number' ? i : 0;
                };

                // Columns that need totals
                var totalColumns = [19, 20, 21, 22]; // OD, TP, Net, Premium

                totalColumns.forEach(function(colIndex) {
                    var total = api.column(colIndex, { page: 'current' }).data().reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    // Format total as Indian currency (₹)
                    var formattedTotal = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' }).format(total);

                    // Update the footer with formatted total
                    $(api.column(colIndex).footer()).html('<b>' + formattedTotal + '</b>');
                });
            }
        });

        $('#'+ tableId + ' tbody').on('dblclick', 'tr', function () {
            var rowData = dt.row(this).data();
            if (!rowData) return;
            // rowData[2] is the policy link, e.g., '<a href=".../v/4" ...>...</a>'
            var policyLink = rowData[2];
            var id = null;
            if (typeof policyLink === "string") {
                var match = policyLink.match(/\/v\/(\d+)/);
                if (match) {
                    id = match[1];
                }
            }
            if (!id) id = rowData[0];

            var url = "<?= base_url('admin/insurance_policy/open_pdf_by_id/'); ?>" + id;
            window.open(url, '_blank');
        });

        return dt;
    }
    
    //---------------------------------------------------
    </script>


    <script>
    function add_insurance() {
        window.location.href = "<?php echo base_url() . 'admin/insurance_policy/insurance_policy_form/a'; ?>";
    }
    
    function export_excel() {
        const originalTable = document.getElementById("datatable");
        const tableClone = originalTable.cloneNode(true);
        Array.from(tableClone.tHead.rows).forEach(row => {
            if (row.cells.length > 0) row.deleteCell(row.cells.length - 1);
        });
        Array.from(tableClone.tBodies[0].rows).forEach(row => {
            if (row.cells.length > 0) row.deleteCell(row.cells.length - 1);
        });
        if (tableClone.tFoot) {
            Array.from(tableClone.tFoot.rows).forEach(row => {
                if (row.cells.length > 0) row.deleteCell(row.cells.length - 1);
            });
        }
        const wb = XLSX.utils.table_to_book(tableClone, {
            sheet: "Sheet 1",
            raw: true
        });
        XLSX.writeFile(wb, "Insurance_policy_record_" + new Date().toISOString().slice(0, 10) + ".xlsx");
    }

    </script>