<div class="container-fluid">
    <div class="block-header">
        <h2></h2>
        <div class="card">
      <div class="header">
        <h2 style="display: inline-block;">&nbsp;&nbsp; KBS - DASHBOARD</h2>
        <a href="<?php echo base_url() ?>banking/dashboard"  > <button type="button" class="btn bg-red waves-effect pull-right"> VIRTUAL BANKING <i class="material-icons">arrow_forward</i></button></a>
      </div>
    </div>        
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <a href="<?php echo base_url() ?>admin/reports/pending_donation_list"  >
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-deep-orange hover-expand-effect" style="cursor: pointer!important;">
                <div class="icon">
                    <i class="material-icons">pending_actions</i>
                </div>
                <div class="content">
                    <div class="text">PENDING DONATIONS WEB</div>
                    <div class="number count-to" data-from="0" data-to="<?= $pend_donweb; ?>" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo base_url() ?>admin/user/user_list/a"  >
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect" style="cursor: pointer!important;">
                <div class="icon">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">NEW USERS</div>
                    <div class="number count-to" data-from="0" data-to="<?= $all_users; ?>" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo base_url() ?>admin/user/user_list/a"  >
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect" style="cursor: pointer!important;">
                <div class="icon">
                    <i class="material-icons">people</i>
                </div>
                <div class="content">
                    <div class="text">ACTIVE USERS</div>
                    <div class="number count-to" data-from="0" data-to="<?= $active_users; ?>" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo base_url() ?>admin/user/user_list/a"  >
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer!important;">
                <div class="icon">
                    <i class="material-icons">block</i>
                </div>
                <div class="content">
                    <div class="text">INACTIVE USERS</div>
                    <div class="number count-to" data-from="0" data-to="<?= $deactive_users; ?>" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo base_url() ?>admin/user/user_list/a"  >
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect" style="cursor: pointer!important;">
                <div class="icon">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="content">
                    <div class="text">NEW VISITORS</div>
                    <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </a>
    <a href="<?php echo base_url() ?>admin/room_request/room_list"  >
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-brown hover-expand-effect" style="cursor: pointer!important;">
                <div class="icon">
                    <i class="material-icons">event</i>
                </div>
                <div class="content">
                    <div class="text">ROOM REQUEST</div>
                    <div class="number count-to" data-from="0" data-to="<?= $room_req; ?>" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
      </a>
      <a href="<?php echo base_url() ?>admin/suvadi/suvadi_list"  >
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-blue-grey hover-expand-effect" style="cursor: pointer!important;">
                <div class="icon">
                    <i class="material-icons">description</i>
                </div>
                <div class="content">
                    <div class="text">SUVADI</div>
                    <div class="number count-to" data-from="0" data-to="<?= $suvadi; ?>" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </a>
     <a href="<?php echo base_url() ?>admin/announcement/announcement_list"  >
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-lime hover-expand-effect" style="cursor: pointer!important;">
                <div class="icon">
                    <i class="material-icons">campaign</i>
                </div>
                <div class="content">
                    <div class="text">ANNOUNCEMENTS</div>
                    <div class="number count-to" data-from="0" data-to="<?= $announcement; ?>" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
</a>
   





    <div class="row" style="margin-bottom: 15px;">
     <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                   <a href="<?php echo base_url() ?>admin/reports/donation_list"  style="color: black;"> <h2 class="blue">Donation Count</h2></a>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="givewp-grid" style="display: grid; gap: 12px; margin-top: 12px;">

                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #f9f6b6;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">Today</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $todaydonation['todaycount']; ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($todaydonation['todaytotal'],0);?>
                            </div></div></div></div></div>
                                
                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #dcffce;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">This Week</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $thisweekdonation['thisweekcount']; ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($thisweekdonation['thisweektotal'],0);?>
                            </div></div></div></div></div>
                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #ced4ff;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">This Month</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $thismonthdonation['thismonthcount']; ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($thismonthdonation['thismonthtotal'],0);?>
                            </div></div></div></div></div>

                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #fcceff;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">This Quarter</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $thisquarterdonation['thisquartercount']; ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($thisquarterdonation['thisquartertotal'],0);?>
                            </div></div></div></div></div>


                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #ebd7ab;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">Last Month</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $lastsixmonthsdonation['lastsixmonthscount']; ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($lastsixmonthsdonation['lastsixmonthstotal'],0);?>
                            </div></div></div></div></div>
                                <div class="givewp-card" style="grid-column: span 6 / auto;background: #e1ceff;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">This Year</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $thisyeardonation['thisyearcount']; ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($thisyeardonation['thisyeartotal'],0);?>
                            </div></div></div></div></div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                   <a href="<?php echo base_url() ?>admin/reports/subscription_list"  style="color: black;">  <h2 class="blue">Gnanathiruvadi Total Subscription Count</h2></a>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="givewp-grid" style="display: grid; gap: 12px; margin-top: 12px;">

                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #f9f6b6;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">Today</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $todaysubscription['todaysubcount'] ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($todaysubscription['todaysubtotal'],0);?>
                            </div></div></div></div></div>
                                
                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #dcffce;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">This Week</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $thisweeksubscription['thisweeksubcount'] ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($thisweeksubscription['thisweeksubtotal'],0);?>
                            </div></div></div></div></div>
                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #ced4ff;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">This Month</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $thismonthsubscription['thismonthsubcount'] ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($thismonthsubscription['thismonthsubtotal'],0);?>
                            </div></div></div></div></div>

                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #fcceff;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">This Quarter</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $thisquartersubscription['thisquartersubcount'] ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($thisquartersubscription['thisquartersubtotal'],0);?>
                            </div></div></div></div></div>


                            <div class="givewp-card" style="grid-column: span 6 / auto;background: #ebd7ab;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">Last Month</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $lastsixmonthssubscription['lastsixmonthssubcount'] ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($lastsixmonthssubscription['lastsixmonthssubtotal'],0);?>
                            </div></div></div></div></div>
                                <div class="givewp-card" style="grid-column: span 6 / auto;background: #e1ceff;"><div class="content"><div class="givewp-mini-chart"><div class="header"><div class="title">This Year</div></div><div class="content" style="text-align: center;"><div class="amount"><?php echo $thisyearsubscription['thisyearsubcount'] ?></div><div class="amount" style="color: gray;font-weight: 100;">|</div><div class="amount"><?php 
                                echo '₹';echo number_format($thisyearsubscription['thisyearsubtotal'],0);?>
                            </div></div></div></div></div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <!-- #END# Widgets -->
        <div class="row" style="margin-bottom: 15px;">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <a href="<?php echo base_url() ?>admin/reports/donation_list"  style="color: black;"> <h2 class="blue">Donation List</h2></a>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="substable">
            <tbody><tr >
                <th>Date</th>
                <th>Receipt Id</th>
                <th>Name</th>
                <th>Mobile No.</th>
                <th>Amount</th>
                
            </tr>
                <?php   
                
        foreach ($donation_list as $value) {

            ?>
            <tr style="text-align: center;">
                <td>
                <?php echo date('d-m-Y',strtotime($value['created_datetime'])); ?>
                </td>   
                <td>
                 <?php echo $value['receipt_no']; ?>
                </td>
                <td style="text-align:left;">   
                <?php echo $value['donor_name']; ?>
                </td>
                <td>
                <?php echo $value['mobile_no']; ?>
                </td>   
                <td style="text-align:right;">
                 <?php echo $value['amount']; ?>
                </td>
                
                <?php
             }
        ?>
                
                            </tr>
            </tbody></table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <a href="<?php echo base_url() ?>admin/reports/subscription_list"  style="color: black;">  <h2 class="blue">Gnanathiruvadi Subscription List</h2></a>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="substable">
            <tbody><tr >
                <th>Date</th>
                <th>Order Id</th>
                <th>Name</th>
                <th>Mobile No.</th>
                <th>Amount</th>
                
            </tr>
                <?php   
                
        foreach ($subscription_list as $value) {
            ?>
            <tr style="text-align: center;">
                <td>
                <?php echo date('d-m-Y',strtotime($value['created_datetime'])); ?>
                </td>   
                <td>
                 <?php echo $value['receipt_no']; ?>
                </td>
                <td style="text-align:left;">   
                <?php echo $value['name']; ?>
                </td>
                <td>
                <?php echo $value['mobile_no']; ?>
                </td>   
                <td style="text-align:right;">
                 <?php echo $value['amount']; ?>
                </td>
                
                <?php
             }
            ?>
                
            </tr>
            </tbody></table>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
   
     <div class="row" style="margin-bottom: 15px;">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                   <a href="<?php echo base_url() ?>admin/razorpay_trans/razorpay_donation_list"  style="color: black;">  <h2 class="blue">Razorpay Donation List</h2></a>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="substable">
            <tbody><tr >
                <th>Date</th>
                <th>Payment ID</th>
                <th>Name</th>
                <th>Mobile No.</th>
                 <th>Email</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Status</th>
                
            </tr>
                <?php   
                
        foreach ($razorpaydon_list as $value) {

            ?>
            <tr style="text-align: center;">
                <td>
                <?php echo date('d-m-Y',strtotime($value['date'])); ?>
                </td>   
                <td style="text-align:left;">
                 <?php echo $value['id']; ?>
                </td>
                <td style="text-align:left;">   
                <?php echo $value['name']; ?>
                </td>
                <td>
                <?php echo $value['mobile']; ?>
                </td>  
                 <td style="text-align:left;">
                <?php echo $value['email']; ?>
                </td> 
                 <td style="text-align:right;">
                <?php echo '&#8377; '.($value['amount']/100).".00"; ?>
                </td>   
                <td >
                 <?php $type = 'Mobile';
                if($value['order_id'] !='')
                {
                    $type = 'Website';
                } 
                 echo $type; ?>
                </td>
                <td >
                 <?php $status = '';
                if($value['status'] == 'created')
                {
                    $status = '<span style="color:#FF5733;text-align:center;font-weight:bold">Created</span>';
                }
                else if($value['status'] == 'authorized')
                {
                    $status = '<span style="color:#092C85;text-align:center;font-weight:bold">Authorized</span>';
                }
                else if($value['status'] == 'captured')
                {
                    $status = '<span style="color:#098512;text-align:center;font-weight:bold">Captured</span>';
                }
                else if($value['status'] == 'refunded')
                {
                    $status = '<span style="color:#DDEF06;text-align:center;font-weight:bold">Refunded</span>';
                }
                else if($value['status'] == 'failed')
                {
                    $status = '<span style="color:#EF0D06;text-align:center;font-weight:bold">Failed</span>';
                }
                 echo $status; ?>
                </td>
                
                <?php
             }
        ?>
                
                            </tr>
            </tbody></table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    
<style type="text/css">
        .givewp-grid {
    display: grid;
    grid-template-columns: repeat(12,1fr);
}
.givewp-card {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 3px 6px rgb(68 68 68 / 5%), 0 3px 6px rgb(68 68 68 / 5%);
    display: flex;
    flex-direction: column;
}
.givewp-card>.content {
    display: flex;
    flex: 1;
    flex-direction: column;
    padding: 0;
    position: relative;
}
.givewp-mini-chart {
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: space-evenly;
    padding: 16px 0 16px 16px;
    width: calc(100% - 32px);
}
.givewp-mini-chart>.header {
    align-items: center;
    display: flex;
    justify-content: space-between;
    padding-bottom: 8px;
}
.givewp-mini-chart>.header>.title {
    color: #82878c;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}
.givewp-mini-chart>.content {
    align-items: center;
    display: flex;
    justify-content: space-between;
}
.givewp-mini-chart>.content>.amount {
    font-size: 25px;
    font-weight: 600;
}
.substable {
    border-collapse: collapse;
}
.substable tr, .substable td, .substable th {
    border: solid blue 1px;
}
.substable th {
    text-align: center;
    }
    </style>
    <style type="text/css">
        .box .box-header {
    background: white;
    color: #34383c;
    font-size: 16px;
    background: #fff;
    border-bottom: 1px solid #f6f9fc !important;
    height: 40px;
}
.box .box-header h2 {
    float: left;
    padding: 10px 0px;
    margin: 0px 0px 0px 20px;
}
h2 {
    font-size: 16px;
    line-height: 16px;
    font-weight: bold;
   
   
}
.box .box-content {
    padding: 20px;
    background: white;
}
        .givewp-grid {
    display: grid;
    grid-template-columns: repeat(12,1fr);
}
.givewp-card {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 3px 6px rgb(68 68 68 / 5%), 0 3px 6px rgb(68 68 68 / 5%);
    display: flex;
    flex-direction: column;
}
.givewp-card>.content {
    display: flex;
    flex: 1;
    flex-direction: column;
    padding: 0;
    position: relative;
}
.givewp-mini-chart {
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: space-evenly;
    padding: 16px 0 16px 16px;
    width: calc(100% - 32px);
}
.givewp-mini-chart>.header {
    align-items: center;
    display: flex;
    justify-content: space-between;
    padding-bottom: 8px;
}
.givewp-mini-chart>.header>.title {
    color: #82878c;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}
.givewp-mini-chart>.content {
    align-items: center;
    display: flex;
    justify-content: space-between;
}
.givewp-mini-chart>.content>.amount {
    font-size: 25px;
    font-weight: 600;
}
.substable {
    border-collapse: collapse;
}
.substable tr, .substable td, .substable th {
    border: solid blue 1px;
}
.substable th {
    text-align: center;
    }
    </style>
    <!-- #END# Browser Usage -->
    <!-- #END# Browser Usage -->
</div>


<!-- ======================= Scripts for this page ============================== -->
<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-countto/jquery.countTo.js"></script>
<!-- Morris Plugin Js -->
<script src="<?= base_url()?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url()?>public/plugins/morrisjs/morris.js"></script>
<!-- ChartJs -->
<script src="<?= base_url()?>public/plugins/chartjs/Chart.bundle.js"></script>
<!-- Flot Charts Plugin Js -->
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.js"></script>
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="<?= base_url()?>public/plugins/flot-charts/jquery.flot.time.js"></script>
<!-- Sparkline Chart Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-sparkline/jquery.sparkline.js"></script>
<!-- Custom Js -->
<script src="<?= base_url()?>public/js/pages/index.js"></script>
