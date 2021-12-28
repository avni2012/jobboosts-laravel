@extends('layouts.frontend.master')

@section('title', 'Dashboard Candidate Sessions')

@section('css')
@endsection
@section('style')
<style type="text/css">
  .label {
  color: white;
  padding: 8px;
  font-family: Arial;
}
.success {background-color: #4CAF50;} 
.info {background-color: #2196F3;} 
</style>
@endsection

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box mb-0">
          <div class="row">
            <div class="col-md-8">
              <div class="section-title-02 mb-4">
                <h4></h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="comparisonpln col-md-12">
              <table>
                <thead>
                  <tr>
                    <th>Session Name</th>
                    <th>Session Sequence No</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!empty($user_sessions))
                    @forelse($user_sessions as $session)
                    <tr>
                      <td>{{ $session->session_name }}</td>
                      <td>{{ $session->session_sequence_no }}</td>
                      <td>
                        @if(!empty($scheduled_sessions))
                          @if($scheduled_sessions->id == $session->id)
                            <a href="{{ route('dashboard-user-sesion-coaches',[$session->id]) }}" class="btn btn-md btn-primary">Schedule</a>
                          @else
                          @endif
                        @endif
                        @if($session->status == 3)
                          <span class="label success">Completed</span>
                        @endif
                      </td>
                    </tr>
                    @empty
                      <p>No any session found.</p>
                    @endforelse
                  @endif  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection

