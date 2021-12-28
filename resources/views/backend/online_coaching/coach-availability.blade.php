<table class="table table-bordered coach-available">
  <tbody>
    <tr>
      <th>#</th>
      <th>Session Name</th>
      <th>Username</th>
      <th>Session Date</th>
      <th>Session Time</th>
      <th>Status</th>
    </tr>
    @if(!empty($coach_details))
      @php $i = 1; @endphp
      @foreach($coach_details as $coach)
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $coach['session_name'] }}</td>
          <td>{{ $coach['users']['name'] }}</td>
          <td>{{ $coach['session_name'] }}</td>
          <td>{{ $coach['session_time'] }}</td>
          <td>
            @if($coach['status'] == 1)
              <span class="text-secondary">Requested</span>
            @elseif($coach['status'] == 2)
              <span class="text-primary">Accepted</span>
            @elseif($coach['status'] == 3)
              <span class="text-success">Completed</span>
            @elseif($coach['status'] == 4)
              <span class="text-danger">Rescheduled</span>
            @endif
          </td>
        </tr>
        @php $i++; @endphp 
      @endforeach
    @endif
  </tbody>
</table>