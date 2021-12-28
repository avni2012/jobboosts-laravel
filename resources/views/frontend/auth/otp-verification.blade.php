<div class="form-group col-md-6">
	<label>OTP</label>
    <input type="number" class="form-control" id="otp" placeholder="Enter Your OTP" name="otp" min="0">
   	<div>Time left = <span id="timer"></span></div>
</div>
<div class="form-group col-md-6 mt-2" id="OTP_btn">
	<label></label>
    <button id="validate_otp" class="btn btn-primary d-block w-80" type="button">Validate</button>
    {{--<button id="resend_otp" class="btn btn-primary d-block w-80" type="button" style="display: none;">Resend OTP</button>--}}
</div>