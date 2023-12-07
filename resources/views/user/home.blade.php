@extends('layouts.main', ['pageTitle' => 'Home Page'])

@section('content')
    <div class="user">
        <div class="username">{{ $user['username'] }}</div>
		<div class="registered_date">{{ $user['created_at'] }}</div>

		<div class="options">
	
			<a href="{{ route('auth.logout') }}">
				<button type="button" class="logout">Выйти</button>
			</a>
		</div>
    </div>

	@include('note.notes-block', ['notes' => $notes, 'comments' => $comments, 'updatable' => true, 'comment_moderable' => true])
@endsection

@section('js')
	<script src="{{ asset('js/comments.js') }}"></script>
@endsection
