@extends('main_layout')
@section('title', 'Report')
@section('content')

    <div class="mw6 center pa3 sans-serif">

        <h1 class="mb4">User edit</h1>

        <form action="{{ route('user.update', $user->id)}}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            <p class="mb2">
                <input type="text" name="name"  class="form-control" value="{{ $user->name }}">
            </p>
            <p class="mb2">
                <input type="text" name="email"  class="form-control" value="{{ $user->email }}">
            </p>
            <p class="mb2">
                <select name="role_id">
                    @foreach ($roles as $role)
                        @if ($user->role_id == $role['id'])
                            <option value="{{ $role['id'] }}" selected>{{ $role['description'] }}</option>
                        @else
                            <option value="{{ $role['id'] }}">{{ $role['description'] }}</option>
                        @endif
                    @endforeach
                </select>
            </p>
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> update
            </button>
        </form>

    </div>

@endsection
