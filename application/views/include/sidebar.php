<?php $cur_tab = $this->uri->segment(2) == '' ? 'dashboard' : $this->uri->segment(2); ?>
<?php $sub_tab = $this->uri->segment(3) == '' ? 'dashboard' : $this->uri->segment(3); ?>
<?php $param = $this->uri->segment(4) == '' ? 'dashboard' : $this->uri->segment(4); ?>

<?php $pages = array("push_notify", "app_menus", "top_banner", "splash_gallery", "youtube_url", "sub_amount", "settings", 'contacts');

?>

<style>
  .ribbon {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute;
    z-index: 1;
    pointer-events: none;
  }

  .ribbon::before,
  .ribbon::after {
    position: absolute;
    z-index: -1;
    content: '';
    display: block;
    border: 5px solid #1e0d5f;
  }

  .ribbon span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 15px 0;
    background-color: #3A1BAE;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    color: #fff;
    font: 700 18px/1 'Lato', sans-serif;
    text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
    text-transform: uppercase;
    text-align: center;
    pointer-events: all;
  }

  /* top left*/
  .ribbon-top-left {
    top: -1px;
    left: -10px;
  }

  .ribbon-top-left::before,
  .ribbon-top-left::after {
    border-top-color: transparent;
    border-left-color: transparent;
  }

  .ribbon-top-left::before {
    top: 0;
    right: 0;
  }

  .ribbon-top-left::after {
    bottom: 0;
    left: 0;
  }

  .ribbon-top-left span {
    right: -25px;
    top: 30px;
    transform: rotate(-45deg);
  }

  .sidebar .menu .list .header {
    background: #bb7ffd !important;
    color: #fff !important;
    font-size: 14px !important;
    font-weight: 500;
  }

  /* Auto height sidebar settings */
  #leftsidebar.sidebar {
    min-height: 100vh !important;
    height: auto !important;
    display: flex !important;
    flex-direction: column !important;
  }

  #leftsidebar .menu {
    flex: 1 !important;
    overflow-y: auto !important;
    overflow-x: hidden !important;
  }

  #leftsidebar .legal {
    margin-top: auto !important;
  }
</style>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">

  <!-- <div class="ribbon ribbon-top-left"><span>Testing</span></div> -->




  <!-- User Info -->
  <div class="user-info">
    <div class="image">
      <img src="<?= base_url() ?>assets/images/logo.jpg" width="48" height="48" alt="User" style="border: 0px solid white;outline: 2px solid white;" />
    </div>

    <div class="info-container">  
      <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= strtoupper($this->session->userdata('name')); ?></div>
      <div class="email"><?= $this->session->userdata('email'); ?></div>
      <div class="btn-group user-helper-dropdown">
        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
        <ul class="dropdown-menu pull-right">
          <li id=""><a href="javascript:void(0);?>"><i class="material-icons">person</i>Profile</a></li>
          <li role="seperator" class="divider"></li>
          <li id=""><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
          <li id=""><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
          <li id=""><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
          <li role="seperator" class="divider"></li>
          <li id=""><a href="<?= base_url('auth/logout/banking'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
        </ul>
      </div>
    </div>
    <!-- <div class="info-logo">
      <img src="<?= base_url() ?>assets/images/logo.jpg" width="80" alt="Logo"/>
    </div> -->
  </div>






  <!-- #User Info -->
  <!-- Menu -->
  <div class="menu">
    <ul class="list">


      <!-- ////////////////////////Insurance ///////////////////////// -->
      <li class="header ">Demo Insurance</li>

        <?php if (check_menu_access('agency')): ?>
        <li id="agency">
          <a href="<?= base_url('admin/agency/agency_list'); ?>">
            <i class="material-icons">supervised_user_circle</i>
            <span>Agent</span>
          </a>
        </li>
        <?php endif; ?>

        <?php if (check_menu_access('insurance')): ?>
        <li id="insurance">
          <a href="<?= base_url('admin/insurance/insurance_list/'); ?>">
            <i class="material-icons">volunteer_activism </i>
            <!-- <span>Contribution</span> -->
            <span>Insurance Record</span>
          </a>
        </li>
        <?php endif; ?>

      <?php if (check_menu_access('reports')): ?>
      <li id="reports">
        <a href="javascript:void(0);" class="menu-toggle">
          <i class="material-icons">book</i>
          <span>Reports</span>
        </a>
        <ul class="ml-menu">
          <?php if (can_view('reports', 'payout_report')): ?>
          <li id="payout_report">
            <a href="<?= base_url('admin/reports/payout_report/'); ?>">
              <i class="material-icons">assessment </i>
              <span>Payout Report</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if (can_view('reports', 'agentwise_consolidated_report')): ?>
          <li id="agentwise_consolidated_report">
            <a href="<?= base_url('admin/reports/agentwise_consolidated_report/'); ?>">
              <i class="material-icons">table_chart</i>
              <span>Agent wise Cons.Report</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if (can_view('reports', 'agentwise_report')): ?>
          <li id="agentwise_report">
            <a href="<?= base_url('admin/reports/agentwise_report/'); ?>">
              <i class="material-icons">bar_chart</i>
              <span>Agent wise Report</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if (can_view('reports', 'creditcard_wise_report')): ?>
          <li id="creditcard_wise_report">
            <a href="<?= base_url('admin/reports/creditcard_wise_report/'); ?>">
              <i class="material-icons">card_membership</i>
              <span>Credit Card Wise Report</span>
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </li>
      <?php endif; ?>




        <?php if (check_menu_access('loginid')): ?>
        <li id="loginid">
          <a href="<?= base_url('admin/loginid/loginid_list/w'); ?>">
            <i class="material-icons">password </i>
            <span>Company Login ID</span>
          </a>
        </li>
        <?php endif; ?>

      <?php if (check_menu_access('master')): ?>
      <li id="master">
        <a href="javascript:void(0);" class="menu-toggle">
          <i class="material-icons">category</i>
          <span>Masters</span>
        </a>
        <ul class="ml-menu">
          <?php if (can_view('master', 'state_list')): ?>
          <li id="state_list">
            <a href="<?= base_url('admin/master/state_list'); ?>">
              <i class="material-icons">public</i>
              <span>State</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if (can_view('master', 'district_list')): ?>
          <li id="district_list">
            <a href="<?= base_url('admin/master/district_list'); ?>">
              <i class="material-icons">location_city</i>
              <span>District</span>
            </a>
          </li>
          <?php endif; ?>
          
          <?php if (can_view('master', 'rto_list')): ?>
          <li id="rto_list">
            <a href="<?= base_url('admin/master/rto_list'); ?>">
              <i class="material-icons">how_to_reg</i>

              <span>RTO</span>
            </a>
          </li>
          <?php endif; ?>

          <?php if (can_view('master', 'agent_code_list')): ?>
          <li id="agent_code_list">
            <a href="<?= base_url('admin/master/agent_code_list'); ?>">
              <i class="material-icons">person_search</i>
              <span>Agent Code</span>
            </a>
          </li>
          <?php endif; ?>
          
          <?php if (can_view('master', 'branch_list')): ?>
          <li id="branch_list">
            <a href="<?= base_url('admin/master/branch_list/'); ?>">
              <i class="material-icons">account_tree</i>
              <span>Branch</span>
            </a>
          </li>
          <?php if (can_view('master', 'staff_list')): ?>
          <li id="staff_list">
            <a href="<?= base_url('admin/master/staff_list/'); ?>">
              <i class="material-icons">supervisor_account</i>
              <span>Staff</span>
            </a>
          </li>
          <?php endif; ?>
          <?php endif; ?>
          <?php if (can_view('master', 'insurance_company_list')): ?>
          <li id="insurance_company_list">
            <a href="<?= base_url('admin/master/insurance_company_list/'); ?>">
              <i class="material-icons">business</i>
              <span>Insurance Company</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if (can_view('master', 'rto_company_list')): ?>
          <li id="rto_company_list">
            <a href="<?= base_url('admin/master/rto_company_list/'); ?>">
              <i class="material-icons">directions_car</i>
              <span>RTO Company</span>
            </a>
          </li>
          <?php endif; ?>

          <?php if (can_view('master', 'credit_card_list')): ?>
          <li id="credit_card_list">
            <a href="<?= base_url('admin/master/credit_card_list/'); ?>">
              <i class="material-icons">credit_card</i>
              <span>Credit Card</span>
            </a>
          </li>
          <?php endif; ?>
          
          <?php if (can_view('master', 'emailtosend_report_list')): ?>
          <li id="emailtosend_report_list">
            <a href="<?= base_url('admin/master/emailtosend_report_list/'); ?>">
              <i class="material-icons">email</i>
              <span>Email Settings</span>
            </a>
          </li>
          <?php endif; ?>
          
        </ul>
      </li>
      <?php endif; ?>

        <?php if (check_menu_access('user')): ?>
        <li id="user">
          <a href="<?= base_url('admin/user/user_list/w'); ?>">
            <i class="material-icons">group </i>
            <span>Users</span>
          </a>
        </li>
        <?php endif; ?>

    </ul>
  </div>
  <!-- #Menu -->
  <!-- Footer -->
  <div class="legal">
    <div class="copyright">
      <a href="javascript:void(0);"><?= $this->general_settings['copyright'] ?></a>
    </div>
  </div>
  <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<style>
  .sidebar .menu .list a {
    padding: 5px 13px !important;
  }

  .sidebar .menu .list .ml-menu li a {
    padding-left: 55px !important;
    padding-top: 7px !important;
    padding-bottom: 7px !important;
  }
</style>
<script>
  $("#<?= $cur_tab; ?>").addClass('active');
  $("#<?= $sub_tab; ?>").addClass('active');
</script>