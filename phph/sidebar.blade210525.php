<?php 
$userId = NULL;
$login_user = Auth::guard('web')->user();
if($login_user){
  $userId = $login_user->id;
} 
// $disableSet = 'onclick="return false;" style="cursor:not-allowed;"';
$disableSet = '';

use App\Http\Controllers\item\isr\RFQController as ISR_RFQController;
?>
  <!-- Main Sidebar Container -->
  <style>
    textarea { 
      resize:none; 
    } 

    .custom-selection .dropdown-menu {
      max-height: 150px !important;
    }
  </style>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="<?=asset('dist/img/logo.png')?>"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ESF</span>
    </a>

    <!-- Sidebar -->
    <?php $login_user = Auth::guard('web')->user(); ?>
    <div class="sidebar">
      @auth
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=asset('dist/img/user.png')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$login_user->name?></a>
          
        </div>
      </div>
      @endauth

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="margin-left:-4px;padding-bottom:30px;">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <? /*
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route('dashboard::index')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
        
            </ul>
          </li>
          */?>

          @if($login_user->menu_group_1)
          <li align="left" class="nav-header" style="padding-left:20px;font-size:16px;color:white;font-weight:bold;white-space:nowrap;">
            Operations<br>(Works, Finance & Payments)
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                RFQ
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"><?=$rfq_count?></span>
                <? /*<!--<span class="right badge badge-danger" style="right:5em"><?=$rfq_count_acting?></span>-->*/?>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <? if (Auth::guard('web')->user()->can('RFQ-create')) {?>
              <li class="nav-item">
                <a href="<?=route('rfq::create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create RFQ</p>
                </a>
              </li>
                <? }?>
              <li class="nav-item">
                <a href="<?=route('rfq::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Work Order
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right" style="">
                  {{ app('App\Http\Controllers\WorkOrderController')::getCountAwaitWokrOrder() }}
                </span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(app('App\Http\Controllers\ApprovalAuthController')::isAuthToCreateWorkOrder())
              <li class="nav-item">
                <a href="<?=route('workorder::create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a href="<?=route('workorder::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Payment
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-danger right">
                {{ $invoice_count ?? '0' }}
                </span>

              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route('invoice::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?=route('invoice::export::step1')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('invoice::import_cheque::step1')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Cheque</p>
                </a>
              </li>
            </ul>
          </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Variation Order
                <i class="fas fa-angle-left right"></i>
         
                <span class="badge badge-warning right">
                {{ $vo_count ?? '0' }}
                </span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route('vo::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                SMT Memo
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ app('App\Http\Controllers\MemoController')::getCountAwaitMemo() }}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if((new \App\Memo)->canCreate())
                <a href="<?=route('memo::create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
                @endif
              </li>
              <li class="nav-item">
                <a href="<?=route('memo::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Budgeting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route('budget_tier1::listing', ['financial_year_id'=>2])?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Current financial year</p>
                </a>
              </li>
              <? /*
              <li class="nav-item">
                <a href="../charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
              */?>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Report 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route('report::dailyReportSummary' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Summary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::downloadWOmainTable' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Work Order Main Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::downloadInvoiceDetailTable' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Detail Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::downloadVariationTable' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Variation Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::downloadRFQreport' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RFQ Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::downloadAccountOutstandingPayment' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outstanding Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::downloadReportInput' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Query</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::downloadVoSumInput' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VO Sum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::downloadVoSummaryInput' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VO Summary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('workorder::report::budgetReportListing' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budgeting Report</p>
                </a>
              </li>
              @if(count(app('App\Http\Controllers\ReportController')::allowedDepartments())>0)
              <li class="nav-item">
                <a href="<?=route('report::management' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management Report</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          
          <hr>
          @endif
		  <li class="nav-item">
              <a href="<?=route('master::contractor::listing')?>" class="nav-link">
                <i class="fa fa-list nav-icon"></i>
                <p>Contractor List</p>
              </a>
          </li>
		  <li class="nav-item">
              <a href="<?=route('wo_policy')?>" class="nav-link">
                <i class="fa fa-book nav-icon"></i>
                <p>WO Policy</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user::reset_password', ['user_id'=>$userId]) }}" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Reset Password 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('message::chatbox') }}" class="nav-link">
              <i class="nav-icon fa fa-thumbs-up"></i>
              <p>
                Feedback Forum
                <span id="feedbackNum" class="badge badge-warning right" style="">
                {{ $unread_msg_count }}
                </span>
              </p>
            </a>
          </li>
          
        <!-- menu content start -->
        <? $item = 'isr'; $route_prefix = 'item::'.$item.'::'; ?>
        @if($login_user->menu_group_2)
        <!-- start of isr menu -->
        <li align="left" class="nav-header" style="padding-left:20px;font-size:16px;color:white;font-weight:bold;white-space:nowrap;">
            Projects<br>(Works, Finance & Payments)
        </li>
		<li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                RFQ
                <i class="fas fa-angle-left right"></i>
				        <span class="badge badge-info right" style="">
                  {{ (new ISR_RFQController)->getCountConfirmRFQ() }}
                </span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if((new ISR_RFQController)->can('RFQ-create'))
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'rfq::create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'rfq::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Work Order
                <i class="fas fa-angle-left right"></i>
				<span class="badge badge-info right" style="">
                  {{ app('App\Http\Controllers\item\\'.$item.'\WorkOrderController')::getCountAwaitWokrOrder() }}
                </span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(app('App\Http\Controllers\item\\'.$item.'\ApprovalAuthController')::isAuthToCreateWorkOrder())
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'workorder::create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'workorder::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Payment
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-danger right">
                {{ app('App\Http\Controllers\item\\'.$item.'\InvoiceController')::getConfirmCount() }}
                </span>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'invoice::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>

              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'invoice::export::step1')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'invoice::import_cheque::step1')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Cheque</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Variation Order
                <i class="fas fa-angle-left right"></i>
				<span class="badge badge-warning right">
                {{ app('App\Http\Controllers\item\\'.$item.'\VariationOrderController')::getConfirmCount() }}
                </span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'vo::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                AIP
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-success right"><?=$isr_aip_count?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route($route_prefix.'aip::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route($route_prefix.'aip::import')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route($route_prefix.'aip::exportDownload')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Subvention
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route($route_prefix.'subvention::create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route($route_prefix.'subvention::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Claim
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'claim::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Quotation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'quotation::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Budgeting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route($route_prefix.'budget_tier1::listing', ['financial_year_id'=>2])?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Current financial year</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Report 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(false)
              <li class="nav-item" hidden>
                <a href="<?=route($route_prefix.'report::dailyReportSummary' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Summary</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="<?=route($route_prefix.'workorder::report::downloadWOmainTable' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Work Order Main Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route($route_prefix.'workorder::report::downloadInvoiceDetailTable' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Detail Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route($route_prefix.'workorder::report::downloadVariationTable' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Variation Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route($route_prefix.'workorder::report::downloadAccountOutstandingPayment' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outstanding Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route($route_prefix.'workorder::report::downloadReportInput' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Query</p>
                </a>
              </li>
              <li class="nav-item" hidden>
                <a href="<?=route($route_prefix.'workorder::report::downloadVoSumInput' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VO Summary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route($route_prefix.'workorder::report::budgetReportListing' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budgeting Report</p>
                </a>
              </li>
              @if(count(app('App\Http\Controllers\item\isr\ReportController')::allowedDepartments())>0)
              <li class="nav-item">
                <a href="<?=route($route_prefix.'report::management' )?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management Report</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          <!-- end of isr menu -->
          @endif

          <? // @can('Admin-setting') ?>
         @if($login_user->is_super_admin || $login_user->is_super_super_admin)
          <li align="center" class="nav-header" style="font-size:14pt;font-weight:bold;">
            <li class="nav-item has-treeview item-menu">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa fa-list"></i>
                <p>SETTING</p>
                <i class="fas fa-angle-left right"></i>
              </a>
          <ul class="nav nav-treeview">

          <li align="left" class="nav-header" style="font-size:16px;color:white;font-weight:bold;">
            Main
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                System User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user::listing') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?=route('master::budget_classification::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Classification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('master::special_event::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Special Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('master::job_nature::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Nature</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('master::financial_year::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Financial Year</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('master::location_unit::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> ESF/Resi/ESL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('master::attachment_classification::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attachment Classification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('master::account_code::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account Code</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('master::ffm_code::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FFM Code</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=route('master::source_fund::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Source Fund</p>
                </a>
              </li>
              
             </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Main Authorization
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('approvalauth::main::editDefault') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Default User</p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{ route('approvalauth::main::editConfig') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Authorization Configure</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                SMT Memo Authorization
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('approvalauth::memo::editDefault') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Default User</p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{ route('approvalauth::memo::editConfig') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Authorization Configure</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Batch Action
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('batch::configInitiator') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Initiator Ownership</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('batch::configAdmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrator Ownership</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('batch::history') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ownership History</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                System Alert
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('alert::create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Alert</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('alert::listing') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
            </ul>
          </li>
          <? // @endcan ?>

		<? $item = 'isr'; $route_prefix = 'item::'.$item.'::'; ?>

          @if(true)
          <!-- start of isr setting menu -->
          <li align="left" class="nav-header" style="font-size:16px;color:white;font-weight:bold;">
            ISR
          </li>

          <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=route($route_prefix.'master::consultant::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultant</p>
                </a>
              </li>
              <?/*<li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::contractor::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contractor</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::job_nature::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Nature</p>
                </a>
              </li>*/?>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::budget_classification::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Budget Classification</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::special_event::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Special Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::financial_year::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Financial Year</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::location_unit::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> ESF/Resi/ESL</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::attachment_classification::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attachment Classification</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::account_code::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Account Code</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::ffm_code::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FFM Code</p>
                </a>
              </li>
              <li class="nav-item">
                <a <?=$disableSet?> href="<?=route($route_prefix.'master::source_fund::listing')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Source Fund</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Main Authorization
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route($route_prefix.'approvalauth::main::editDefault') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Default User</p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{ route($route_prefix.'approvalauth::main::editConfig') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Authorization Configure</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview item-menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                AIP Authorization
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route($route_prefix.'approvalauth::aip::editDefault') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Default User</p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{ route($route_prefix.'approvalauth::aip::editConfig') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Authorization Configure</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Batch Action
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route($route_prefix.'batch::configInitiator') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Initiator Ownership</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route($route_prefix.'batch::configAdmin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrator Ownership</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route($route_prefix.'batch::history') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ownership History</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- end of isr setting menu -->
          @endif

          @endif
          </ul>
          </li>
          </li>
        <!-- menu content end -->
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>