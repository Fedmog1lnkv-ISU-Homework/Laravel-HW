@extends('layouts.main', ['pageTitle' => 'Login Page'])

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

<form class="action" action="{{ route('login.process') }}" method="post">
    @csrf
    <label for="title">Username:</label>
    <input type="text" name="username" required>
    <br>
    <label for="content">Password:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Enter</button>
	<a href="{{ route('register.page') }}">
		Register
	</a>
</form>
@endsection
