<div class="row available_day_block" id="available_day_block_{{ $index }}">
    <div class="col-md-11">
        <div class="info-box" style="background-color: lightblue">
            <div class="form-group col-md-5 ml-1">
                <label class="form-label">Day</label>
                <select class="form-control day" id="day_{{ $index }}" name="day_{{ $index }}">
                    <option value="">Select Day</option>
                    @foreach($weekdays as $weekday)
                        <option value="{{ $weekday }}">{{ $weekday }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3 ml-1 start_time_div">
                <label class="form-label">Start Time</label>
                <input class="form-control start_time" type="time" name="start_time_{{ $index }}">
            </div>
            <div class="form-group col-md-3 ml-1 end_time_div">
                <label class="form-label">Start Time</label>
                <input class="form-control end_time" type="time" name="end_time_{{ $index }}">
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <button type="button" class="btn btn-sm btn-danger" onclick="removeBlock(parseInt('{{ $index }}'))"><i class="fa fa-minus"></i> </button>
        {{--<button type="button" class="btn btn-sm btn-danger" onclick="removeBlock(1)"><i class="fa fa-minus"></i> </button>--}}
    </div>
</div>
<script src="{{asset('backend/developer/coach.js')}}"></script>