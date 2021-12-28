@extends('layouts.frontend.master')

@section('title', 'Email Cover Letter')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

<section class="space-ptb">
  <div class="container">
    <div class="row emailspace">
      <div class="col-md-6 my-auto text-xs-center">
        <h2 class="mb-4">What is an Email Cover Letter?</h2>
        <p class="mb-4 lead">There should be no confusion on what an email cover letter is. It is not your cover note pasted into an email . It is the email you send introducing yourself and containing your formal application, including your full-length cover letter.
        <br>
        The purpose is essentially to explain to the hiring manager how you found the job and why you’re applying, as well as to briefly introduce you and your qualifications.
        <br>
        Your email cover letter needs to be shorter and more casual in tone (depending on the context) than a standard cover letter. Ultimately though, both the email cover note and the cover note are written with the same goal in mind: to highlight your qualifications and convince the hiring manager to take a deeper look at your application.
        </p>
      </div>
      <div class="col-md-6">
        <div class="text-center">
          <img class="img-fluid mt-lg-4 mt-3" src="{{ asset('/frontend/images/email-cover-letter/Email-Cover-Letter-Sample.png') }}" alt="">
        </div>
      </div>
    </div>

    <div class="row emailspace">
      <div class="col-md-6">
        <div class="text-center">
          <img class="img-fluid mt-lg-4 mt-3" src="{{ asset('/frontend/images/email-cover-letter/How-to-Write-an-Email-Cover-Letter.png') }}" alt="">
        </div>
      </div>
      <div class="col-md-6 my-auto text-xs-center">
        <h2 class="mb-4">How to Write an Email Cover Letter</h2>
        <p class="mb-4 lead">Writing an email cover letter so you can impress recruiters and impress them to have a look at your application needs some effort. Writing an email cover letter is an essential part of the job application process.
        <br>
        A strong email cover letter must grab the attention of hiring managers, convince them to give your application the attention it deserves, and help you land more interviews. But a bad one could ruin your chances of receiving a call back.
        <br>
        So how do you make sure your email cover letter is the best it can possibly be?
        </p>
      </div>
    </div>

    <div class="row emailmrsp">
      
      <div class="col-md-6 my-auto text-xs-center">
        <h2 class="mb-4">Email Cover Letter Sample</h2>
        <p class="mb-4 lead">Here’s a winning email cover letter sample from a candidate applying to a marketing position:
        </p>
        <a class="btn btn-primary" href="{{ route('email-cover-letter-examples') }}" ><i class="fa fa-angle-right" aria-hidden="true"></i>Browse email cover letter examples</a>
      </div>
      <div class="col-md-6">
        <div class="text-center">
          <img class="img-fluid mt-lg-4 mt-3" src="{{ asset('/frontend/images/email-cover-letter/email-cover-sample.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Millions of jobs -->


<section class="space-ptb bg-primary email-clsv">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="section-title-02 text-center text-white">
          <h2 class="text-white">Email Cover Letter Format & Writing Tips</h2>
          <p>Here are our top tips for formatting and writing an effective email cover letter:</p>
        </div>
      </div>
    </div>
    <div class="row bg-holder-pattern mr-md-0 ml-md-0" style="background-image: url('{{ asset('/frontend/images/step/pattern-01.png') }}');">
      <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
        <div class="feature-step text-center">
          <div class="feature-info-icon">
            <span>01</span>
          </div>
          <div class=" text-white">
            <h5>To the point</h5>
            <p class="mb-0">One critical thing to remember when writing an email cover letter is to make it informative but short.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
        <div class="feature-step text-center">
          <div class="feature-info-icon">
            <span>02</span>
          </div>
          <div class=" text-white">
            <h5>Easy to read</h5>
            <p class="mb-0">The average recruiter spends between five and seven seconds looking at a job application.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
        <div class="feature-step text-center">
          <div class="feature-info-icon">
            <span>03</span>
          </div>
          <div class=" text-white">
            <h5>Strong subject line</h5>
            <p class="mb-0">Using a good, eye-catching email subject line is crucial for a successful job application.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
        <div class="feature-step text-center">
          <div class="feature-info-icon">
            <span>04</span>
          </div>
          <div class=" text-white">
            <h5>Personalize</h5>
            <p class="mb-0">Studies have shown that people are much more attentive when they hear their name.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-xs-12 mb-4 mb-md-0">
        <div class="feature-step text-center">
          <div class="feature-info-icon">
            <span>05</span>
          </div>
          <div class=" text-white">
            <h5>Memorable</h5>
            <p class="mb-0">The final paragraph of your email cover letter should set the next step of the hiring process in motion</p>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="emailsam-btn">
        <a class="btn btn-success" href="email-cover-letter-tips.html" ><i class="fa fa-angle-right" aria-hidden="true"></i>View Details</a>
      </div>
    </div>
  </div>
</section>



<section class="space-ptb email-take">
  <div class="container">
    <div class="row">
      <div class="col-md-6 my-auto text-xs-center">
        <h2 class="mb-4">Key Takeaways</h2>
        <p class="mb-4 lead">A brief and convincing email cover letter is crucial if you hope to make a strong first impression.</p>
        <p>Specifically, it should:</p>
        <ol>
          <li>Confidently introduce you to the hiring manager</li>
          <li>Let them know why you’re applying</li>
          <li>Showcase your experience</li>
          <li>End with a request that sets you up for a formal interview</li>
        </ol>
      </div>
      
      <div class="col-md-6 my-auto text-xs-center">
        <h2 class="mb-4">Tips for sending an application via email</h2>
        <p class="mb-4 lead">Use the following tips to write a professional email that makes a positive impression on employers:</p>
        <ol>
          <li>Find an actual person to address in your email.</li>
          <li>Use the right email address.</li>
          <li>Add the recipient's email address last.</li>
          <li>Keep your message short.</li>
          <li>Check your attachments' names.</li>
          <li>Consider converting attachments to PDF.</li>
        </ol>
      </div>

    </div>

  </div>
</section>

@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection

