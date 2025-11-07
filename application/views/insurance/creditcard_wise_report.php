<!-- Shared plugin CSS moved to layout.php -->

<style>
    .text-wrap {
        word-wrap: break-word !important;  /* Ensure long words break and wrap */
        white-space: normal !important;    /* Allow wrapping of text */
        overflow-wrap: break-word !important; /* Ensure long words break across lines */
    }

    .dropdown-menu.dropdown-menu-left {
        left: auto !important;
        right: 0 !important;
    }

    .btn-group.drop-left .dropdown-menu {
        left: auto;
        right: 0;
    }
</style>

<style>
    .loader {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        display: none;
    }

    .spinner {
        border: 8px solid #f3f3f3; /* Light gray */
        border-top: 8px solid #3498db; /* Blue color */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                <h2 style="display: inline-block;">&nbsp;&nbsp; <?php echo $title; ?></h2>

                <div class="pull-right">
                    <!-- Export Excel -->
                    <div class="btn-group drop-left" style="margin-left: 5px; margin-right: 5px;">
                        <button type="button" class="btn bg-orange" id="export_excel">
                            <i class="material-icons">grid_on</i> Export Excel
                        </button>
                    </div>
                </div>

            </div>
        </div>        

        <div class="card" style="overflow-x:auto;">
            <div class="body table-responsive">
                <div class="topfilter">
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input id="datepicker" name="datepicker" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <?php if ($user_role != 3): ?>
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <select id="agency_id" name="agency_id" class="form-control">
                                    <option value="">-- Select Agent --</option>
                                        <?php foreach ($agencies as $item) : ?>
                                            <option value="<?php echo $item['id']; ?>"> <?php echo $item['name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <select id="credit_card_id" name="credit_card_id" class="form-control">
                                    <option value="">-- Select Credit Card --</option>
                                        <?php foreach ($credit_cards as $item) : ?>
                                            <option value="<?php echo $item['id']; ?>"> <?php echo $item['bank'] . ' - ' . $item['name_on_card'] . ' (' . $item['last4'] . ')'; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" id="clear" class="btn bg-red waves-effect"><i class="material-icons">clear</i></button>
                        </div>
                    </div>
                </div>

                <table id="creditcardTable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">S.No</th>
                            <th style="text-align: center;">Issue Date</th>
                            <th style="text-align: center;">Insured Name / Policy Number</th>
                            <th style="text-align: center;">Payment Details</th>
                            <th style="text-align: center;">Net Premium</th>
                            <th style="text-align: center;">Gross Premium</th>
                            <th style="text-align: center;">Payout %</th>
                            <th style="text-align: center;">Net Payout</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                        </tr>
                    </tfoot>
                    <tbody></tbody>                    
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('#agency_id, #credit_card_id').select2();

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

        var table = datatable('creditcardTable');

        $('#datepicker, #agency_id, #credit_card_id').on('change', function() {
            table.ajax.reload();
        });

        $('#clear').on('click', function() {
            $('#datepicker').data('daterangepicker').setStartDate(moment().startOf('month'));
            $('#datepicker').data('daterangepicker').setEndDate(moment().endOf('month'));
            $('#agency_id, #credit_card_id').val('').trigger('change');
            table.search('').columns().search('').draw();
            table.ajax.reload(); 
        });
    });
</script>

<script>
    function datatable(tableId) {
        return $('#' + tableId).DataTable({
            autoWidth: true,
            serverSide: true,
            ordering: true,
            scrollX: true,
            scrollCollapse: true,
            order: [[0, 'desc']],
            columnDefs: [
                { targets: [0], className: 'text-center text-nowrap' },
                { targets: [5, 6, 7], className: 'text-right text-nowrap' },
                { targets: '_all', className: 'align-middle text-nowrap' }
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            ajax: {
                url: "<?= base_url('admin/reports/creditcard_wise_report_datatable_json') ?>",
                type: "POST",
                data: function(d) {
                    d.agency_id = $('#agency_id').val();
                    d.credit_card_id = $('#credit_card_id').val();
                    d.datepicker = $('#datepicker').val();
                }
            },
            footerCallback: function(row, data, start, end, display) {
                var api = this.api();
                var intVal = function(i) {
                    return typeof i === 'string' ? 
                        parseFloat(i.replace(/<[^>]+>/g, '').replace(/[\$,]/g, '').replace(/[^0-9.-]/g, '')) || 0 : 
                        (typeof i === 'number' ? i : 0);
                };
                [5, 6, 7].forEach(function(colIndex) {
                    var total = api.column(colIndex, { page: 'current' }).data().reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                    $(api.column(colIndex).footer()).html('<b>' + new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' }).format(total) + '</b>');
                });
            }
        });
    }

    

    $("#export_excel").click(function (event) {
        event.preventDefault();
        exportTableToExcel("creditcardTable", "credit_card");
    });

    function exportTableToExcel(tableID, filePrefix) {
        const table = document.getElementById(tableID);
        if (!table) {
            alert("Table not found!");
            return;
        }

        const rows = table.querySelectorAll("thead tr, tbody tr");
        let csvContent = "";

        rows.forEach(row => {
            let rowData = [];
            row.querySelectorAll("th, td").forEach(cell => {
                rowData.push(cell.innerText.trim()); // get only visible text
            });
            csvContent += rowData.join(",") + "\n";
        });

        // Create CSV blob and download link
        const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
        const link = document.createElement("a");
        const dateTime = new Date().toISOString().slice(0,19).replace(/[:T]/g, "-");
        link.href = URL.createObjectURL(blob);
        link.download = `${filePrefix}_${dateTime}.csv`;
        link.click();
    }



    
</script>

