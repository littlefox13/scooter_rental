@extends('main_layout')
@section('title', 'Report')
@section('content')

    @php

    @endphp

    <div class="mw6 center pa3 sans-serif">

        <h1 class="mb4">Reports</h1>

        <form action="{{ url('report/show') }}" method="POST">
            @csrf
            @method('POST')
            <input hidden type="text" name="type"  class="form-control" value="manager">
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> managers
            </button>
        </form>

        <form action="{{ url('report/show') }}" method="POST">
            @csrf
            <input hidden type="text" name="type"  class="form-control" value="rental_point">
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> rental points
            </button>
        </form>

        <form action="{{ url('report/show') }}" method="POST">
            @csrf
            <input hidden type="text" name="type"  class="form-control" value="scooter">
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> scooters
            </button>
        </form>

        <form action="{{ url('report/show') }}" method="POST">
            @csrf
            <input hidden type="text" name="type"  class="form-control" value="user">
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> users
            </button>
        </form>

        @if (isset($data) )
            <table>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        desc
                    </th>
                    <th>
                        cost
                    </th>
                </tr>
            @foreach($data as $d)
                    <tr>
                        <td>
                            {{ $d['id'] }}
                        </td>
                        <td>
                            {{ $d['name'] }}
                        </td>
                        <td>
                            {{ $d['sum'] }}
                        </td>
                    </tr>


            @endforeach
            </table>

        @endif

@endsection
