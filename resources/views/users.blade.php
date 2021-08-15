@extends('main_layout')
@section('title', 'Managers')
@section('content')

<div class="mw6 center pa3 sans-serif">

    <h1 class="mb4">Users</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach($users as $user)

        <div class="pa2 mb3 striped--near-white">

            <p class="pl2">

            <p class="mb2">Name: {{ $user->name }}</p>

            <p class="mb2">Email: {{ $user->email }}</p>

            <p class="mb2">Role: {{ $roles[$user->role_id]['description'] }}</p>

            <a href="{{ route('user.show',$user->id) }}">edit</a>

        </div>
    @endforeach
</div>

@endsection
