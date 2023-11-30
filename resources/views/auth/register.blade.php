@extends('layouts.main', ['pageTitle' => 'Rgister Page'])

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="action" action="{{ route('register.process') }}" method="post">
    @csrf
    <label for="title">Username:</label>
    <input type="text" name="username" required>
    <br>
    <label for="content">Password:</label>
    <input type="password" name="password" required>
    <br>
	<label for="content">Password again:</label>
    <input type="password" name="password_confirmation" required>
    <br>
    <button type="submit">Enter</button>
</form>
@endsection
