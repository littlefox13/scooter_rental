@extends('main_layout')
@section('title', 'Create rental')
@section('content')

    <div class="mw6 center pa3 sans-serif">

        <h1 class="mb4">Booking rental</h1>

        <form action="{{ route('booking.store')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <label for="rental-scooter" class="col-sm-3 control-label">Scooter</label>

            <div class="col-sm-6">
                <select name="scooter_id">
                    @foreach ($scooters as $scooter)
                        <option value="{{ $scooter['id'] }}">{{ $scooter['description'] }}</option>
                    @endforeach
                </select>
            </div>

            <label for="rental-point" class="col-sm-3 control-label">Rental point</label>
            <div class="col-sm-6">
                <select name="rental_point_id">
                    @foreach ($rental_points as $rental_point)
                        <option value="{{ $rental_point['id'] }}">{{ $rental_point['address'] }}</option>
                    @endforeach
                </select>
            </div>

            <label for="localdate">Дата и время: </label>
            <div class="col-sm-6">
                <input type="datetime-local" name="reservation_time" id="localdate" />
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Booking now!
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
