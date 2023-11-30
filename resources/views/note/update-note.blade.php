@extends('layouts.main', ['pageTitle' => 'Create Note Page'])

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

<form class="action" action="{{ route('note.update.process') }}" method="post">
    @csrf
	@method('PUT')
	<input type="hidden" name="id" value="{{ $note['id'] }}" />
    <label for="title">Заголовок:</label>
    <input type="text" name="title" value="{{ $note['title'] }}" required>
    <br>
    <label for="content">Содержание:</label>
    <textarea name="content" required>{{ $note['content'] }}</textarea>
    <br>
    <button type="submit">Редактировать заметку</button>
</form>
@endsection
