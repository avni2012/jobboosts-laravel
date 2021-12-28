@extends('layouts.frontend.master')

@section('title', 'Reset')

@section('css')
@endsection

@section('style')
@endsection

@section('content')


<!-- Reset Password START -->
<!-- <div class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    > -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content model-round">
            <div class="modal-body mx-2 p-0">
               <!--  <div class="model-close">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="py-5 col-md-6 mt-20 m-auto">
                    <div class="text-center mb-3">
                        <h5 class="modal-title w-100 font-weight-bold mb-4">Reset Password</h5>
                        <p class="mb-5 f-18px opacity-70">Please enter the new password.</p>
                        <form method="POST" name="reset_password" id="reset_password" action="{{ route('password.update') }}" data-parsley-validate>
                        @csrf
                        {{--<input type="hidden" name="token" value="{{ $token }}">--}}
                            <div class="md-form mb-5">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required readonly="">
                                @error('email')
                                    <span class="invalid-feedback " role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                        
                            </div>
                            <div class="md-form mb-5">
                                <label for="password">New password</label>
                                <input id="password" type="password" class="form-control" name="password" required value="{{ old('password') }}">
                                @error('password')
                                    <span class="invalid-feedback " role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                      
                            </div>
                            <div class="md-form mb-5">
                                <label for="password-confirm">Confirm password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <span class="invalid-feedback " role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-75 m-auto">
                                <button type="submit" form="reset_password" class="btn btn-primary w-100 py-2">Done</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
<!-- Reset Password END -->
@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection