
<?php
namespace App\Http\Controllers;
use Auth;
?>

@extends('layouts.app')
@section('content')
<style lang="">
    @media (min-width: 576px){
    .modal-dialog {
      max-width: 740px;
      margin: 1.75rem auto;
      margin-top: 150px;
      }
      .modal-content{
      height: 300px;
      }
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <img src="<?=asset('dist/img/logo.png')?>" alt="Logo" class="brand-image img-circle elevation-3 responsive" width="50" style="opacity: .8">
                    <h1 class="esf-red" style="vertical-align:middle;display:inline-block;margin-left:5px">
                    Welcome</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=route('home')?>">Home</a></li>
                        <li class="breadcrumb-item active ">Welcome</li>
      
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-md-12">
        {!! DashboardController::template_1() !!}
        {!! DashboardController::template_3() !!}
        {!! DashboardController::template_5() !!}
        {!! DashboardController::template_7() !!}
        {!! DashboardController::template_8() !!}
        {!! DashboardController::template_9() !!}
        {!! DashboardController::template_12() !!}

        @if(false)
        {!! DashboardController::template_2() !!}
        {!! DashboardController::template_4() !!}
        {!! DashboardController::template_6() !!}
        {!! DashboardController::template_10() !!}
        {!! DashboardController::template_11() !!}
        @endif
  </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
	<!-- Feedback Forum -->
	<div class="modal" tabindex="-1" role="alert" id="feedbackMsg">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Welcome Back 🎉</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="color: #333;">
					<div>
						You have 
						<span id="msgNum"></span>
						unread message on <a style="color: #333;" href="https://esf-fdd-dev.vela.hk/message/chatbox">Feedback Forum</a>.
					</div>
				</div>
				<div class="modal-footer">
        <a href="https://esf-fdd-dev.vela.hk/message/chatbox" class="btn btn-primary col-12" style="background-color: #7d002f;border-color: #7d002f;text-decoration: none;">Check out</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Feedback Forum -->
@push('scripts')
<script src="<?=asset('plugins/chart.js/Chart.min.js')?>"></script>
<script>
  $(function () {
    <?//= DashboardController::getLoadScript(2) ?>
    <?//= DashboardController::getLoadScript(4) ?>
    <?//= DashboardController::getLoadScript(6) ?>
    <?= DashboardController::getLoadScript(7) ?>
    <?= DashboardController::getLoadScript(9) ?>
    <?//= DashboardController::getLoadScript(10) ?>
    <?//= DashboardController::getLoadScript(11) ?>
  })
</script>
<script>
	//chris add
	//#feedbackNum
	var feedback = $("#feedbackNum");
	var feedbackMsg = $("#feedbackMsg");
	if (feedback.text() >=1) {
		var msgNum = document.createElement("strong");
    msgNum.innerHTML = feedback.text();
    document.getElementById('msgNum').appendChild(msgNum);
    //
    setTimeout(function(){
		feedbackMsg.modal('show');
    $(feedbackMsg).fadeIn(10);
    $(feedbackMsg).fadeOut(6000);
    $('.modal-backdrop').fadeOut(6000);
    ('body').removeClass('modal-open');
  }, 500).modal('hide');
	} else {
		feedbackMsg.removeClass("alert");
		feedbackMsg.removeClass("show");
	}
</script>
@endpush


@endsection
