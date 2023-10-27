@extends('layouts.app', ['pageTitle' => 'Create Note Page'])

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

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="/create-note" method="post">
    @csrf
    <label for="title">Заголовок:</label>
    <input type="text" name="title" value="{{ old('title') }}" required>
    <br>
    <label for="content">Содержание:</label>
    <textarea name="content" required>{{ old('content') }}</textarea>
    <br>
    <button type="submit">Создать заметку</button>
</form>
@endsection
