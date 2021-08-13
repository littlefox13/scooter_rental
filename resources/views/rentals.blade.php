@extends('main_layout')
@section('title', 'Rentals')
@section('content')
    <pre>

    </pre>
    <div class="mw6 center pa3 sans-serif">

        <h1 class="mb4">Rentals</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a class="btn btn-success" href="{{ route('rentals.create') }}">Add rental</a>

        <table>
            <tr>
                <th>
                    id
                </th>
                <th>
                    scooter
                </th>
                <th>
                    user
                </th>
                <th>
                    rental point
                </th>
                <th>
                    rental status
                </th>
                <th>
                    collateral
                </th>
                <th>
                    cost
                </th>
                <th>
                    date
                </th>
                <th>
                    action
                </th>
            </tr>

            @foreach($rentals as $rental)
                <tr>
                    <td>
                        {{ $rental->id }}
                    </td>
                    <td>
                        {{ $scooters[$rental->scooter_id]['description'] }}
                    </td>
                    <td>
                        {{ $users[$rental->user_id]['name'] }}
                    </td>
                    <td>
                        {{ $rental_points[$rental->rental_point_id]['address'] }}
                    </td>
                    <td>
                        {{ $rental_statuses[$rental->rental_status_id]['description'] }}
                    </td>
                    <td>
                        {{ $rental->collateral_data }}
                    </td>
                    <td>
                        {{ $rental->cost }}
                    </td>
                    <td>
                        @if($rental->rental_status_id == 3)
                            <p class="mb2">reserved to: </p>
                        @endif
                        {{ Carbon\Carbon::createFromTimestamp($rental->reservation_time)->toDateTimeString() }}
                    </td>
                    <td>
                        @if($rental->rental_status_id == 1)
                            <form action="{{ route('rentals.update',$rental->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input type="text" name="cost" class="form-control" value="">
                                <input hidden type="text" name="action" id="booking_rental" class="form-control" value="end">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> end
                                </button>
                            </form>
                        @endif
                        @if($rental->rental_status_id == 3)

                            <form action="{{ route('rentals.update',$rental->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input hidden type="text" name="action" id="booking_rental" class="form-control" value="start">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> start
                                </button>
                            </form>
                            <form action="{{ route('rentals.update',$rental->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <input hidden type="text" name="action" id="booking_rental" class="form-control" value="end">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> abort reservation
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach




        </table>

        @foreach($rentals as $rental)
            <div class="pa2 mb3 striped--near-white">

                <header class="b mb2">{{ $rental->id }}</header>

                <p class="pl2">

                <p class="mb2">scooter: {{ $scooters[$rental->scooter_id]['description'] }}</p>

                 <p class="mb2">user: {{ $users[$rental->user_id]['name'] }}</p>

                <p class="mb2">rental_point: {{ $rental_points[$rental->rental_point_id]['address'] }}</p>



                @if($rental->rental_status_id == 1)
                    Rental started: {{ Carbon\Carbon::createFromTimestamp($rental->reservation_time)->toDateTimeString() }}
                    <form action="{{ route('rentals.update',$rental->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <label class="col-sm-3 control-label">Cost</label>
                        <input type="text" name="cost" class="form-control" value="">
                        <input hidden type="text" name="action" id="booking_rental" class="form-control" value="end">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> end
                        </button>
                    </form>
                @endif

                @if($rental->rental_status_id == 2)
                    @if ($rental->cost)
                        <p class="mb2">Rental ended: {{ Carbon\Carbon::createFromTimestamp($rental->reservation_time)->toDateTimeString() }}</p>
                        <p class="mb2">Cost: {{ $rental->cost }}</p>
                    @else
                        <p class="mb2">Rental reservation: {{ Carbon\Carbon::createFromTimestamp($rental->reservation_time)->toDateTimeString() }}</p>
                        <p class="mb2">reservation abort</p>
                    @endif
                @endif

                @if($rental->rental_status_id == 3)

                    <p class="mb2">reserved to: {{ Carbon\Carbon::createFromTimestamp($rental->reservation_time)->toDateTimeString() }}</p>
                    <form action="{{ route('rentals.update',$rental->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <input hidden type="text" name="action" id="booking_rental" class="form-control" value="start">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> начать
                        </button>
                    </form>
                    <form action="{{ route('rentals.update',$rental->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <input hidden type="text" name="action" id="booking_rental" class="form-control" value="end">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> abort reservation
                        </button>
                    </form>
                @endif

            </div>
        @endforeach
    </div>



    </div>
@endsection
