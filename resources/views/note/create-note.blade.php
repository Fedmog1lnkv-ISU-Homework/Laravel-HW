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

<form class="action" action="{{ route('note.add.process') }}" method="post">
    @csrf
    <label for="title">Заголовок:</label>
    <input type="text" name="title" value="{{ old('title') }}" required>
    <br>
    <label for="content">Содержание:</label>
    <textarea name="content" required>{{ old('content') }}</textarea>
    <br>
	<div class="line" id="is_publish_at_time_line">
		<label for="is_publish_at_time">Опубликовать по времени:</label>
		<input type="checkbox" name="is_publish_at_time" value=" {{true}} " id="is_publish_at_time">
	</div>
	<div class="line disabled" id="publisher_time_line">
        <label for="publisher_time">Выберите дату и время:</label>
        <input type="datetime-local" name="publisher_time" value="{{ old('publisher_time') }}" id="publisher_time">
    </div>

    <button type="submit">Создать заметку</button>
</form>
@endsection


@section('js')
<script src="{{ asset('js/create_note.js') }}"></script>

@endsection