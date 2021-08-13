@extends('main_layout')
@section('title', 'Scooters')
@section('content')
    <pre>
        {{$test}}
    </pre>
<div class="mw6 center pa3 sans-serif">

    <h1 class="mb4">Scooters</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('scooters.store')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Task Name -->
        <div class="form-group">
            <label for="scooter-description" class="col-sm-3 control-label">Description</label>

            <div class="col-sm-6">
                <input type="text" name="description" id="scooter-description" class="form-control" value="{{ old('scooters') }}">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-btn fa-plus"></i>Add scooter
                </button>
            </div>
        </div>
    </form>

    @foreach($scooters as $scooter)

        <div class="pa2 mb3 striped--near-white">

            <header class="b mb2">{{ $scooter->id }}</header>

            <p class="pl2">

            <p class="mb2">description: {{ $scooter->description }}</p>

            <form action="{{ route('scooters.update', $scooter->id)}}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')

            <!-- Task Name -->
                <div class="form-group">
                    <label for="scooter-description" class="col-sm-3 control-label">New Description:</label>

                    <div class="col-sm-6">
                        <input type="text" name="description" id="scooter-description" class="form-control" value="{{ $scooter->description }}">
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Update scooter name
                        </button>
                    </div>
                </div>
            </form>

            <form action="{{ route('scooters.destroy',$scooter->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Удалить
                </button>
            </form>

        </div>
    @endforeach
</div>



</div>
@endsection
