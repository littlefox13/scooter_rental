<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Scooters</title>

    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>

</head>

<body>

<div class="mw6 center pa3 sans-serif">

    <h1 class="mb4">Rental points</h1>

    <form action="{{ url('rental_points')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Task Name -->
        <div class="form-group">
            <label for="rental-point-address" class="col-sm-3 control-label">Address</label>

            <div class="col-sm-6">
                <input type="text" name="address" id="rental-point-address" class="form-control" value="{{ old('rental_points') }}">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-btn fa-plus"></i>Add rental point
                </button>
            </div>
        </div>
    </form>

    @foreach($managers as $manager)

        <div class="pa2 mb3 striped--near-white">

            <header class="b mb2">{{ $manager->id }}</header>

            <p class="pl2">

            <p class="mb2">Name: {{ $manager->name }}</p>

            <form action="{{ url('rental_point/update/'.$manager->id)}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
                <div class="form-group">
                    <label for="rental-point-address" class="col-sm-3 control-label">New name:</label>

                    <div class="col-sm-6">
                        <input type="text" name="address" id="rental-point-address" class="form-control" value="{{ $manager->name }}">
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Update rental point address
                        </button>
                    </div>
                </div>
            </form>

            <form action="{{ url('rental_point/'.$manager->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Удалить
                </button>
            </form>

        </div>
    @endforeach
</div>



</div>

</body>

</html>
