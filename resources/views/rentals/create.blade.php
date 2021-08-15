@extends('main_layout')
@section('title', 'Create rental')
@section('content')

    <div class="mw6 center pa3 sans-serif">

        <h1 class="mb4">Create rental</h1>

        <form action="{{ route('rentals.store')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <label for="rental-scooter" class="col-sm-3 control-label">Scooter</label>

            <div class="col-sm-6">
                <select name="scooter_id">
                    @foreach ($scooters as $scooter)
                        <option value="{{ $scooter['id'] }}">{{ $scooter['description'] }}</option>
                    @endforeach
                </select>
            </div>

            <label for="rental-user" class="col-sm-3 control-label">User</label>
            <div class="col-sm-6">
                <select name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
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

            <label for="rental-collateral_data" class="col-sm-3 control-label">Collateral data</label>
            <div class="col-sm-6">
                <div class="col-sm-6">
                    <input type="text" name="collateral_data" id="rental-collateral_data" class="form-control" value="">
                </div>
            </div>

            <input hidden type="text" name="reservation_time" id="rental-collateral_data" class="form-control" value="0">
            <input hidden type="text" name="rental_status_id" id="rental-collateral_data" class="form-control" value="0">
            <input hidden type="text" name="action" id="rental-action" class="form-control" value="start">

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add rental
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
