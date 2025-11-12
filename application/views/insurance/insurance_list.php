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

                        <?php if ($this->session->userdata('role') == 1): ?>
                        <div class="col-sm-2">
                            <div class="form-group form-float">
                                <select id="branch_id" name="branch_id[]" class="form-control select2" multiple data-placeholder="Select Branch">
                                    <?php if (!empty($branch_data)): ?>
                                        <?php foreach ($branch_data as $branch): ?>
                                            <option value="<?= htmlspecialchars($branch['id']) ?>">
                                                <?= htmlspecialchars($branch['branch_name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->session->userdata('role') != 3): ?>
                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <select id="agency_id" name="agency_id[]" class="form-control" multiple data-placeholder="Select Agent">
                                        <?php foreach ($agencies as $item) : ?>
                                            <option value="<?php echo $item['id']; ?>"> <?php echo $item['name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="col-sm-3">
                            <div class="form-group form-float">
                                <select id="login_id" name="loginid[]" class="form-control" multiple data-placeholder="Select Login ID">
                                        <?php foreach ($loginids as $item) : ?>
                                            <option value="<?php echo $item['id']; ?>"> <?php echo $item['name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- <?php if ($this->session->userdata('role') != 3): ?>

                        <div class="col-sm-2">
                            <div class="form-group form-float">
                                <select id="upload_status" name="upload_status" class="form-control">
                                    <option value="">-- Select Upload Status --</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Approved</option>
                                </select>
                            </div>
                        </div>
                        <?php endif ?> -->
                        
                        <div class="col-sm-2">
                            <button type="button" id="search" class="btn bg-blue waves-effect"><i class="material-icons">search</i></button>
                            <button type="button" id="clear" class="btn bg-red waves-effect"><i class="material-icons">clear</i></button>
                        </div>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th colspan="28" style="text-align: center;"></th>
                            <th colspan="3" style="text-align: center;">In Payout %</th>
                            <th colspan="5" style="text-align: center;"></th>
                            <th colspan="3" style="text-align: center;">Out Payout %</th>
                            <th colspan="6" style="text-align: center;"></th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">S.No</th>
                            <th style="text-align: center;">Staff Name</th>
                            <th style="text-align: center;">Insured Name</th>
                            <th style="text-align: center;">Policy Number</th>
                            <th style="text-align: center;">Registration No</th>
                            <th style="text-align: center;">Login ID</th>
                            <th style="text-align: center;">Agent Name</th>
                            <th style="text-align: center;">Contact No</th> 
                            <th style="text-align: center;">Mail Id</th>
                            <th style="text-align: center;">Date</th>
                            <th style="text-align: center;">Company</th>
                            <th style="text-align: center;">Product Type</th>
                            <th style="text-align: center;">Pro Code</th>
                            <th style="text-align: center;">GVW Range</th>
                            <th style="text-align: center;">New</th>
                            <th style="text-align: center;">Vehicle Age</th>
                            <th style="text-align: center;">GVW</th>
                            <th style="text-align: center;">Year</th>
                            <th style="text-align: center;">Model</th>
                            <th style="text-align: center;">Start Date</th>
                            <th style="text-align: center;">End Date</th>
                            <th style="text-align: center;">Brokerage Name</th>
                            <th style="text-align: center;">Login Code</th>
                            <th style="text-align: center;">Carrying Capacity</th>
                            <th style="text-align: center;">OD Premium</th>
                            <th style="text-align: center;">TP Premium</th>
                            <th style="text-align: center;">Net Premium</th>
                            <th style="text-align: center;">Gross Premium</th>

                            <!-- Company % -->
                            <th style="text-align: center;">OD%</th>
                            <th style="text-align: center;">TP%</th>
                            <th style="text-align: center;">Net%</th>
                            <!-- Company Other Details -->
                            <th style="text-align: center;">OD Payout</th>
                            <th style="text-align: center;">TP Payout</th>
                            <th style="text-align: center;">Net Payout</th>
                            <th style="text-align: center;">Total Company Payout</th>
                            <th style="text-align: center;">Payment Mode</th>

                            <!-- Agent % -->
                            <th style="text-align: center;">OD%</th>
                            <th style="text-align: center;">TP%</th>
                            <th style="text-align: center;">Net%</th>
                            <!-- Agent Other Details -->
                            <th style="text-align: center;">OD Payout</th>
                            <th style="text-align: center;">TP Payout</th>
                            <th style="text-align: center;">Net Payout</th>
                            <th style="text-align: center;">Agent Commission</th>
                            <th style="text-align: center;">Payment Type</th>
                            <th style="text-align: center;">Agent Paid</th>
                            <th style="text-align: center;">Balance To Agent</th>

                            <!-- Agent Account Balance % -->
                            <th style="text-align: center;">Company Payment Amount</th>
                            <th style="text-align: center;">Agent Payable</th>

                            <th style="text-align: center;">Amt.From Agent</th>
                            <th style="text-align: center;">Balance</th>
                            <th style="text-align: center;">Net</th>

                            <th style="text-align: center;">Updated Date</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
    
                                <!-- Company % -->
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <!-- Company Other Details -->
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
    
                                <!-- Agent % -->
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <!-- Agent Other Details -->
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
    
                                <!-- Agent Account Balance % -->
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
                    
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        </section>
    </div>

    <script>
    $(document).ready(function() {

        $('#upload_status, #login_id, #agency_id, #branch_id').select2({ placeholder: 'Select Branch', allowClear: true });

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
            $('#agency_id').val(null).trigger('change');
            $('#branch_id').val(null).trigger('change');
            $('#login_id').val(null).trigger('change');
            $('#upload_status').val('').trigger('change');
            table.search('').columns().search('').draw();
            table.ajax.reload(); 
        });

        $('#datatable tbody').on('dblclick', 'tr', function () {
            var table = $('#datatable').DataTable();
            var data = table.row(this).data();
            var pdfFile = data[data.length - 1]; // PDF filename is the last column

            if (pdfFile) {
                var pdfUrl = "<?= base_url('uploads/pdfs/'); ?>" + pdfFile;
                window.open(pdfUrl, '_blank');
            } else {
                alert('PDF file not found for this record.');
            }
        });

        // Custom filter for error rows (light red background)
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex, rowData, counter) {
            var showOnlyError = $('#toggleShowAll').is(':checked');
            if (!showOnlyError) return true;
            // In payout % columns: 28,29,30; Out payout %: 36,37,38
            var inPayoutIndices = [28, 29, 30];
            var outPayoutIndices = [36, 37, 38];
            var inAllZero = inPayoutIndices.every(function(idx) {
                var val = data[idx];
                if (typeof val === 'string') {
                    val = val.replace(/<[^>]+>/g, '').replace(/,/g, '').trim();
                }
                return val === '' || val === '0' || val === '0.00' || parseFloat(val) === 0;
            });
            var outAllZero = outPayoutIndices.every(function(idx) {
                var val = data[idx];
                if (typeof val === 'string') {
                    val = val.replace(/<[^>]+>/g, '').replace(/,/g, '').trim();
                }
                return val === '' || val === '0' || val === '0.00' || parseFloat(val) === 0;
            });
            return inAllZero || outAllZero;
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
                // Center align for specific columns (update indices if columns inserted at the end)
                {
                    targets: [0, 15, 17,23, 28,29,30,32,26,36,37,38,48,51,52,53], // shifted by +4
                    className: 'text-center text-nowrap'
                },
                // Right align for specific columns (update indices if columns inserted at the end)
                {
                    targets: [24,25,26,27,31,32,33,34,39,40,41,42,44,45,46,47,48,49,50], // shifted by +4
                    className: 'text-right text-nowrap'
                },
                // Default alignment for all columns
                {
                    targets: '_all',
                    className: 'align-middle text-nowrap'
                },
                // Hide columns 28-50 (24+4 to 46+4) for staff/agency
                {
                    targets: Array.from({length: 23}, (_, i) => i + 28), // 24+4=28
                    visible: !(userRole == 4 || userRole == 3)
                },
                // { targets: [53], visible: false }
            ],
            "aLengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "ajax": {
                "url": "<?= base_url('admin/insurance/insurance_list_datatable_json') ?>",
                "type": "POST",
                data: function(d) {
                    d.agency_id = $('#agency_id').val();
                    d.loginid = $('#login_id').val();
                    d.upload_status = $('#upload_status').val();
                    d.datepicker = $('#datepicker').val();
                    d.branch_id = $('#branch_id').val();
                }
            },
           "createdRow": function(row, data, dataIndex) {
                // var checkCols = [1,2,3,4,5,6,7,9,15,16,17,18];
                // var hasEmpty = checkCols.some(function(idx) {
                //     var val = data[idx];
                //     // Remove HTML tags if any
                //     if (typeof val === 'string') val = val.replace(/<[^>]+>/g, '').trim();

                //     // Treat empty, 0.00, 0, null, undefined as empty
                //     return val === '' || val === '0.00' || val === 0 || val === null || val === undefined;
                // });

                // // Exclude highlighting if column index 11 has the specific value
                // var col11 = data[11];
                // if (typeof col11 === 'string') col11 = col11.replace(/<[^>]+>/g, '').trim();

                // // Highlight the row if it has empty fields and col11 is NOT either of the two specified values
                // if (
                //     hasEmpty && 
                //     col11 !== 'Digit Commercial Vehicle Liability Only Policy' &&
                //     col11 !== 'Digit Commercial Vehicle Insurance'
                // ) {
                //     $(row).css('background-color', '#FFD580');
                // }

                // Payment Mode highlight
                var companyPaymentModeIndex = 35; 
                var paymentMode = data[companyPaymentModeIndex];
                if (typeof paymentMode === 'string') {
                    paymentMode = paymentMode.replace(/<[^>]+>/g, '').trim();
                }
                if (paymentMode.toLowerCase() === 'credit') {
                    $(row).css('background-color', '#ffe6cc');
                }

                // Payout columns highlight
                // In Payout % columns: 28, 29, 30
                var inPayoutIndices = [28, 29, 30];
                var inAllZero = inPayoutIndices.every(function(idx) {
                    var val = data[idx];
                    if (typeof val === 'string') {
                        val = val.replace(/<[^>]+>/g, '').replace(/,/g, '').trim();
                    }
                    return val === '' || val === '0' || val === '0.00' || parseFloat(val) === 0;
                });

                // Out Payout % columns: 36, 37, 38
                var outPayoutIndices = [36, 37, 38];
                var outAllZero = outPayoutIndices.every(function(idx) {
                    var val = data[idx];
                    if (typeof val === 'string') {
                        val = val.replace(/<[^>]+>/g, '').replace(/,/g, '').trim();
                    }
                    return val === '' || val === '0' || val === '0.00' || parseFloat(val) === 0;
                });

                // If either inAllZero or outAllZero, highlight row red
                if (inAllZero || outAllZero) {
                    $(row).css('background-color', '#ffcccc'); // Light red
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
                var columns = [24, 25, 26, 27, 31, 32, 33, 34, 39, 40, 41, 42, 44, 45, 46, 47, 48, 49, 50];

                columns.forEach(function(colIndex) {
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

        return dt;
    }
    
    //---------------------------------------------------
    </script>


    <script>
    function add_insurance() {
        window.location.href = "<?php echo base_url() . 'admin/insurance/insurance_form/a'; ?>";
    }
    
    function export_excel() {
        const originalTable = document.getElementById("datatable");

        const tableClone = originalTable.cloneNode(true);
        Array.from(tableClone.rows).forEach(row => {
            row.deleteCell(-1); 
        });
        const wb = XLSX.utils.table_to_book(tableClone, {
            sheet: "Sheet 1",
            raw: true
        });
        XLSX.writeFile(wb, "INSURANCE_RECORD_" + new Date().toISOString().slice(0, 10) + ".xlsx");
    }

    </script>