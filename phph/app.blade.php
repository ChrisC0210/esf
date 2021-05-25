
<!DOCTYPE html>
<html lang="<?=str_replace('_', '-', app()->getLocale())?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=config('app.name')?></title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=asset('plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?=asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
  <link id="bsdp-css" href="<?=asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="<?=asset('plugins/daterangepicker/daterangepicker.css')?>">
        <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?=asset('plugins/select2/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?=asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
  
  <!-- summernote -->
  <link rel="stylesheet" href="<?=asset('plugins/summernote/summernote-bs4.css')?>">
   
  <link href="<?=asset('plugins/kartik-v-bootstrap-fileinput/css/fileinput.css')?>" media="all" rel="stylesheet" type="text/css"/>
  <link href="<?=asset('css/steps.css')?>" media="all" rel="stylesheet" type="text/css"/>
  <link href="<?=asset('dist/css/all.min.css')?>" media="all" rel="stylesheet" type="text/css"/>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=asset('dist/css/adminlte.min.css')?>">
  <link href="<?=asset('plugins/kartik-v-bootstrap-fileinput/themes/explorer-fas/theme.css')?>" media="all" rel="stylesheet" type="text/css"/>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
@include('layouts.navbar')

@include('layouts.sidebar')

  @yield('content')
  <div class="modal fade show" id="system-loading-page" style="display: none; padding-right: 17px; background-color:rgba(0,0,0,0.5);" aria-modal="true">
    <div class="modal-dialog modal-lg" align="center">
      <div class="modal-content d-flex justify-content-center align-items-center" align="center" style="margin-top:50%;box-shadow:none;background:none;border:none;">
        <button class="btn btn-default" type="button" disabled="" style="padding:20px 40px;">
          <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
      </div>
    </div>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="/" class="esf-red">English Schools Foundation</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=asset('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=asset('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?=asset('plugins/chart.js/Chart.min.js')?>"></script>
<!-- Select2 -->
<script src="<?=asset('/plugins/select2/js/select2.full.min.js')?>"></script>
<!-- DataTables -->
<script src="<?=asset('plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?=asset('plugins/sorting/natural.js')?>"></script>

<script src="<?=asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=asset('plugins/bootstrap-datepicker/locales/bootstrap-datepicker.en-GB.min.js')?>" charset="UTF-8"></script>
<script src="<?=asset('plugins/daterangepicker/daterangepicker.js')?>"></script>
<script src="<?=asset('plugins/moment/moment.min.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
   <script src="<?=asset('plugins/kartik-v-bootstrap-fileinput/js/plugins/piexif.js')?>" type="text/javascript"></script>
    <script src="<?=asset('plugins/kartik-v-bootstrap-fileinput/js/plugins/sortable.js')?>" type="text/javascript"></script>
    <script src="<?=asset('plugins/kartik-v-bootstrap-fileinput/js/fileinput.js')?>" type="text/javascript"></script>
    
    <script src="<?=asset('plugins/kartik-v-bootstrap-fileinput/js/locales/es.js')?>" type="text/javascript"></script>
    <script src="<?=asset('plugins/kartik-v-bootstrap-fileinput/themes/fas/theme.js')?>" type="text/javascript"></script>
    <script src="<?=asset('plugins/kartik-v-bootstrap-fileinput/themes/explorer-fas/theme.js')?>" type="text/javascript"></script>
    <script src="<?=asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>" type="text/javascript"></script>
    
</head>

<!-- for Work Order -->
<link rel="stylesheet" href="<?=asset('css/bootstrap-multiselect.css')?>">
<script type="text/javascript" src="<?=asset('js/bootstrap-multiselect.js')?>"></script>

<link rel="stylesheet" href="<?=asset('css/bootstrap4-toggle.min.css')?>">
<script type="text/javascript" src="<?=asset('js/bootstrap4-toggle.min.js')?>"></script>

<link rel="stylesheet" href="<?=asset('css/workorder.css')?>">
<script type="text/javascript" src="<?=asset('js/custom.js')?>"></script>
<script type="text/javascript" src="<?=asset('js/rfq.js')?>"></script>
<script type="text/javascript" src="<?=asset('js/font-awesome-all.js')?>"></script>

<!-- AdminLTE App -->
<script src="<?=asset('dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=asset('dist/js/demo.js')?>"></script>
<script src="<?=asset('plugins/summernote/summernote-bs4.min.js')?>"></script>
<script type="text/javascript" src="<?=asset('js/accounting.js')?>"></script>

<script>
    
      $('.datepicker*').datepicker({
          format: 'yyyy-mm-dd',
          language: "zh-TW"
      });

$('.select2*').select2();
    
    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'HH:mm'
    });
       $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    $('#email_alert_btn').click( function(e) {
    
               $.ajax({
            type:"GET",
            url:'{!! route('user::update_email_alert') !!}',
            dataType: "html",
            async: false,
            data:{
                is_email_alert: $("#email_alert_btn").prop('checked')
                
            }, success:function(data){
               

          
            }
        });
    });

    
</script>
@stack('scripts')
</body>
</html>

@if(!Auth::guard('web')->user()->isSuperAdmin() && !Auth::guard('web')->user()->isSuperSuperAdmin())
{!! (new \App\Http\Controllers\SystemAlertController)->AllAlert() !!}
@endif