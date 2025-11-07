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
                    <!-- Share PDF -->
                    <div class="btn-group drop-left" style="margin-left: 5px; margin-right: 5px;">
                        <button type="button" class="btn bg-blue dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">picture_as_pdf</i> PDF
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="export_pdf('download')">Download PDF</a></li>
                            <li><a href="#" onclick="sharePdfOnWhatsApp()">Share PDF on WhatsApp</a></li>
                            <li><a href="#" onclick="sharePdfOnEmail()">Share PDF via Email</a></li>
                        </ul>
                    </div>

                    <!-- Share Excel -->
                    <div class="btn-group drop-left" style="margin-left: 5px; margin-right: 5px;">
                        <button type="button" class="btn bg-orange dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">grid_on</i> Excel
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="export_excel('download')">Download Excel</a></li>
                            <li><a href="#" onclick="shareExcelOnWhatsApp()">Share Excel on WhatsApp</a></li>
                            <li><a href="#" onclick="shareExcelOnEmail()">Share Excel via Email</a></li>
                        </ul>
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

                        <div class="col-sm-2">
                            <div class="form-group form-float">
                                <select id="login_id" name="loginid" class="form-control">
                                    <option value="">-- Select Login ID --</option>
                                        <?php foreach ($loginids as $item) : ?>
                                            <option value="<?php echo $item['id']; ?>"> <?php echo $item['name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-2">
                            <button type="button" id="clear" class="btn bg-red waves-effect"><i class="material-icons">clear</i></button>
                        </div>
                    </div>
                </div>

                <table id="payoutTable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">S.No</th>                     
                            <th style="text-align: center;">Issue Date</th>
                            <th style="text-align: center;">Insured Name</th>
                            <th style="text-align: center;">Policy No</th>
                            <th style="text-align: center;">Registration No</th>     
                            <th style="text-align: center;">Company</th>  
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

<div id="loader" class="loader" style="display:none;">
    <div class="spinner"></div>
</div>

<!-- Shared plugin JS moved to layout.php; keep page-specific scripts only -->
 

<script>
    $(document).ready(function() {

        $('#login_id, #agency_id').select2();

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

        var table = datatable('payoutTable');

        $('#datepicker, #agency_id, #login_id').on('change', function() {
            table.ajax.reload();
        });

        $('#clear').on('click', function() {
            $('#datepicker').data('daterangepicker').setStartDate(moment().startOf('month'));
            $('#datepicker').data('daterangepicker').setEndDate(moment().endOf('month'));
            $('#agency_id').val('').trigger('change');
            $('#login_id option').eq(0).prop('selected', true).trigger('change');
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
                { targets: [6, 7, 8, 9], className: 'text-right text-nowrap' },
                { targets: '_all', className: 'align-middle text-nowrap' }
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            ajax: {
                url: "<?= base_url('admin/reports/payout_report_datatable_json') ?>",
                type: "POST",
                data: function(d) {
                    d.agency_id = $('#agency_id').val();
                    d.loginid = $('#login_id').val();
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
                [6, 7, 9].forEach(function(colIndex) {
                    var total = api.column(colIndex, { page: 'current' }).data().reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                    $(api.column(colIndex).footer()).html('<b>' + new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR' }).format(total) + '</b>');
                });
            }
        });
    }

    async function export_pdf(exportType) {
        var agency_id = $('#agency_id').val();
        if (!agency_id) {
            await Swal.fire({
                icon: 'warning',
                title: 'Agent Missing',
                text: 'Please select an agency to export the report.',
                confirmButtonText: 'OK'
            });
            return null;
        }

        var table = $('#payoutTable').DataTable();
        if (table.data().count() === 0) {
            await Swal.fire({
                icon: 'info',
                title: 'No Data',
                text: 'There is no data available to export.',
                confirmButtonText: 'OK'
            });
            return null;
        }

        var datepicker = $('#datepicker').val();
        var login_id = $('#login_id').val();

        if (exportType === 'share') {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "<?php echo base_url('admin/reports/export_payout_pdf'); ?>",
                    type: "GET",
                    data: {
                        agency_id: agency_id,
                        datepicker: datepicker,
                        login_id: login_id,
                        export_type: exportType
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.file_path) {
                            resolve(response.file_path);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Export Failed',
                                text: 'Could not generate the file. Try again later.'
                            });
                            resolve(null);
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while exporting the report.'
                        });
                        console.error(xhr.responseText);
                        reject(error);
                    }
                });
            });

        } else if (exportType === 'download') {
            const url = "<?php echo base_url('admin/reports/export_payout_pdf'); ?>";
            window.location.href = `${url}?agency_id=${encodeURIComponent(agency_id)}&datepicker=${encodeURIComponent(datepicker)}&login_id=${encodeURIComponent(login_id)}&export_type=${encodeURIComponent(exportType)}`;
            resolve(); 
        }
    }

    async function export_excel(exportType) {
        var agency_id = $('#agency_id').val();
        if (!agency_id) {
            await Swal.fire({
                icon: 'warning',
                title: 'Agent Missing',
                text: 'Please select an agency to export the report.',
                confirmButtonText: 'OK'
            });
            return null;
        }

        var table = $('#payoutTable').DataTable();
        if (table.data().count() === 0) {
            await Swal.fire({
                icon: 'info',
                title: 'No Data',
                text: 'There is no data available to export.',
                confirmButtonText: 'OK'
            });
            return null;
        }
        
        var datepicker = $('#datepicker').val();
        var login_id = $('#login_id').val();
        
        if (exportType === 'share') {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "<?php echo base_url('admin/reports/export_payout_excel'); ?>",
                    type: "GET",
                    data: {
                        agency_id: agency_id,
                        datepicker: datepicker,
                        login_id: login_id,
                        export_type: exportType
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.file_path && response.status != 0) {
                            resolve(response.file_path);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Export Failed',
                                text: 'Could not generate the file. Try again later.'
                            });
                            resolve(null);
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while exporting the report.'
                        });
                        console.error(xhr.responseText);
                        reject(error);
                    }
                });
            });

        } else if (exportType === 'download') {
            var url = "<?php echo base_url('admin/reports/export_payout_excel'); ?>";
            url += "?agency_id=" + agency_id + "&datepicker=" + encodeURIComponent(datepicker) + "&login_id=" + login_id + "&export_type=" + exportType;
            
            window.location.href = url;
        }
    }
</script>

<script>
async function sharePdfOnWhatsApp() {
    const file_path = await export_pdf('share');
    if (!file_path) return;

    const message = "Please check this policy copy:\n" + file_path;
    const desktopUrl = "whatsapp://send?text=" + encodeURIComponent(message);
    const webUrl = "https://web.whatsapp.com/send?text=" + encodeURIComponent(message);

    const timeout = setTimeout(() => {
        window.open(webUrl, '_blank');
    }, 1500);

    window.location.href = desktopUrl;

    const cancelFallback = () => {
        clearTimeout(timeout);
        document.removeEventListener('visibilitychange', cancelFallback);
        window.removeEventListener('blur', cancelFallback);
    };

    document.addEventListener('visibilitychange', cancelFallback);
    window.addEventListener('blur', cancelFallback);
}


async function shareExcelOnWhatsApp() {
	const file_path = await export_excel('share');
	if (!file_path) return;

	const message = "Please check this payout report:\n" + file_path;
	const desktopUrl = "whatsapp://send?text=" + encodeURIComponent(message);
	const webUrl = "https://web.whatsapp.com/send?text=" + encodeURIComponent(message);

	const timeout = setTimeout(() => {
		window.open(webUrl, '_blank');
	}, 1500);

	window.location.href = desktopUrl;

	const cancelFallback = () => {
		clearTimeout(timeout);
		document.removeEventListener('visibilitychange', cancelFallback);
		window.removeEventListener('blur', cancelFallback);
	};

	document.addEventListener('visibilitychange', cancelFallback);
	window.addEventListener('blur', cancelFallback);
}




async function sharePdfOnEmail() {
    const file_path = await export_pdf('share');
    if (!file_path) {
        return;
    }

    $.ajax({
        url: '<?php echo base_url('admin/reports/share_file'); ?>',
        type: 'POST',
        data: {
            file_type: 'pdf',
            file_path: file_path, 
        },
        beforeSend: function() {
            $('#loader').show();
        },
        success: function (response) {
            var res = JSON.parse(response);
            if(res.success > 0){
                $('#loader').hide();
                Swal.fire({
                    icon: 'success',
                    title: 'Email Sent',
                    text: res.info || 'PDF sent successfully!',
                    confirmButtonText: 'OK'
                });
            } else {
                $('#loader').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Email not Sent',
                    text: res.info || 'Please add email settings.',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function (xhr) {
            alert('Failed to send email.');
        }
    });
}



async function shareExcelOnEmail() {
    const file_path = await export_excel('share');
    if (!file_path) {
        return;
    }

    $.ajax({
        url: '<?php echo base_url('admin/reports/share_file'); ?>',
        type: 'POST',
        data: {
            file_type: 'excel',
            file_path: file_path, 
        },
        beforeSend: function() {
            $('#loader').show();
        },
        success: function (res) {
            console.log(res);
            if(res.success > 0){  // Success if res.success > 0
                $('#loader').hide();
                Swal.fire({
                    icon: 'success',
                    title: 'Email Sent',
                    text: res.info || 'Excel sent successfully!',
                    confirmButtonText: 'OK'
                });
            } else {
                $('#loader').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Email not Sent',
                    text: res.info || 'Please add email settings.',
                    confirmButtonText: 'OK'
                });
            }
        },

        error: function (xhr) {
            alert('Failed to send email.');
        }
    });
}



</script>