<!-- JQuery DataTable Css -->
<link href="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">  
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<!-- Exportable Table -->

<!-- Bootstrap Material Datetime Picker Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

<!-- Wait Me Css -->
<link href="<?= base_url() ?>public/plugins/waitme/waitMe.css" rel="stylesheet" />

<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2 style="display: inline-block;">&nbsp;&nbsp; <?php echo $title.' User'; ?></h2>
        <button type="button" onclick="add_user()" class="btn bg-green waves-effect pull-right"><i class="material-icons">add</i> Add User</button>
      </div>
    </div>    

    <div class="card">
      <div class="body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th style="text-align: center;">S. No</th>
              <th style="text-align: center;">Name</th>
              <th style="text-align: center;">Branch</th>
              <th style="text-align: center;">Email/ Mobile</th>
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


  
 <!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/user/adminuser_datatable_json')?>",
    "order": [[3,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "sno", "className": "text-center", 'searchable':false, 'orderable':false},
    { "targets": 1, "name": "name", "className": "text-left", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "branch_name", "className": "text-left", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "email", "className": "text-left", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "address", "className": "text-left", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "updated_date", "className": "text-center", 'searchable':false, 'orderable':true},
    { "targets": 6, "name": "status", "className": "text-center", 'searchable':false, 'orderable':true},
    { "targets": 7, "name": "updated_at", "className": "text-center", 'searchable':false, 'orderable':false},
    ],
    "fnDrawCallback": function (oSettings) {
      //alert( 'DataTables has redrawn the table' );
    }
  });

  //---------------------------------------------------
  function app_filter()
  {
    var _form = $("#adminuser_search").serialize();
    $.ajax({
      data: _form,
      type: 'post',
      url: '<?php echo base_url();?>admin/adminuser/search',
      async: true,
      success: function(output){
        table.ajax.reload( null, false );
      }
    });
  }

  function add_user()
  {
    window.location.href = "<?php echo base_url().'admin/user/adminuser_view/a';?>";
  }
  
</script>



