# esf <br>
###2020/07/27
>server:<br>
>updated page:<br>
>>edit.blade.php:/client/esf-ffd/resources/views/rfq<br>
>>navbar.blade.php:/client/esf-ffd/resources/views/layouts<br>
>>all.min.css:/client/esf-ffd/public/plugins/fontawesome-free/css<br>
>>workorder.css<br>
###2020/08/03
>server:<br>
>updated page:<br>
>>welcome.blade.php:/client/esf-ffd/resources/views<br>
###2020/08/11
>New SFTP<br>
>/client/esf-fdd-dev<br>
>updated page:<br>
>>welcome.blade.php:/client/esf-fdd-dev/resources/views<br>
###2020/08/13
>color esf-red<br>
>updated page:<br>
#####Home
>>welcome.blade.php:/client/esf-fdd-dev/resources/views<br>
#####RFQ
>>/client/esf-fdd-dev/resources/views/rfq<br>
>>edit.blade.php:http://esf-fdd-dev.vela.hk/rfq/create<br>
>>listing.blade.php:http://esf-fdd-dev.vela.hk/rfq/listing<br>

#####Work Orders
>>/client/esf-fdd-dev/resources/views/workorder<br>
>>edit.blade.php:http://esf-fdd-dev.vela.hk/workorder/create<br>
>>listing.blade.php:http://esf-fdd-dev.vela.hk/workorder/listing<br>

###2020/08/21
#####Log in
>>/client/esf-fdd-dev/resources/views/auth<br>
>>login.blade.php:https://esf-fdd-dev.vela.hk/login<br>

###2020/08/24
#####Change Color
#####<img src="http://esf-ffd.vela.hk/dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3 responsive mr-2" width="50" style="opacity: .8">
>>/client/esf-fdd-dev/resources/views/contractor<br>
>>/client/esf-fdd-dev/resources/views/special_event<br>
>>/client/esf-fdd-dev/resources/views/job_nature<br>
>>/client/esf-fdd-dev/resources/views/financial_year<br>
>>/client/esf-fdd-dev/resources/views/attachment_classification<br>
>>/client/esf-fdd-dev/resources/views/attachment_classification<br>
###2020/09/14
#####Change Color (footer)
>>/client/esf-fdd-dev/resources/views/layouts<br>
>>app.blade.php<br>
>>Find "English Schools Foundation"<br>
>>Add class="esf-red"<br>
###2020/09/17
#####Change login btn color
#####Log in
>>/client/esf-fdd-dev/resources/views/auth<br>
>>login.blade.php:https://esf-fdd-dev.vela.hk/login<br>
```
<style>
.btn-primary:{
  background-color: #7d002f !important;
  border-color:  #7d002f !important;
}
.btn-primary:hover{
  color:#fff;
  background-color:#300010 !important;
  border-color:#300010 !important;
  }

</style>

```
>>css<br>
```
 style="background-color: #7d002f;border-color:  #7d002f;"
```
###2021/05/24
#####Add message alert
>>welcome.blade.php
>>/client/esf-fdd-dev/resources/views/dashboard
	<!-- Feedback Forum -->
	<div class="modal fade" tabindex="-1" role="alert" id="feedbackMsg">
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
        <a href="https://esf-fdd-dev.vela.hk/message/chatbox" class="btn btn-primary" style="text-decoration: none;">Check out</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Feedback Forum -->
<script>
    //chris add
    //#feedbackNum
    var feedback = $("#feedbackNum");
    var feedbackMsg = $("#feedbackMsg");
    if (feedback.text() >=1) {
      feedbackMsg.addClass("alert");
      feedbackMsg.addClass("show");
      feedbackMsg.modal('show');

      var msgNum = document.createElement("strong");
      msgNum.innerHTML = feedback.text();
      document.getElementById('msgNum').appendChild(msgNum);
    
    } else {
      feedbackMsg.removeClass("alert");
      feedbackMsg.removeClass("show");
    }
</script>
>>sidebar.blade.php
>>/client/esf-fdd-dev/resources/views/layouts
## add id
``
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
``