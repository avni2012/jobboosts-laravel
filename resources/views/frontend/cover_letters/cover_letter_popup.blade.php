<div class="modal fade" id="coverLetterPopup" tabindex="-1" role="dialog" aria-hidden="true" data-id="">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h4 class="mb-0 text-center">Add your details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-register">
                    <div>
                        <div><b>Please fill details given below for proceeding</b>
                            <br>
                            <b>Please Note: You won't be able to change it in future</b>
                            {{--to <label id="template_name" name="template_name"></label> template--}}
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active cover-letter-detail-form" id="candidate" role="tabpanel">
                            <form class="mt-4" method="POST" action="{{ route('add-cover-letter-details') }}">
                                @csrf
                                <input type="hidden" id="t_id" value="">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="Email2">Email (Used for Cover Letter)</label><span class="text-danger">*</span>
                                        <input type="email" class="form-control" id="resume_email" placeholder="Enter Your Email Address" name="resume_email" value="{{old('resume_email')}}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="password2">Full Name (Used for Cover Letter)</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="resume_fullname" placeholder="Enter Your Full Name" name="resume_fullname" value="{{old('resume_fullname')}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <button class="btn btn-primary d-block w-100" type="submit">Complete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>