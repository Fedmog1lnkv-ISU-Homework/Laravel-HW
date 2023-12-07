<div class="note" id="{{ $note['id'] }}">
    
    <div class="author">
        Автор: {{ $note['username'] }}
    </div>
	
	<div class="title">
        {{ $note['title'] }}
    </div>
    <div class="content">
        {{ $note['content'] }}
    </div>

    @isset($note['publisher_time'])
        <div class="created_at">
            {{ $note['publisher_time'] }}
        </div>
    @endisset

	@isset($updatable)
		@if ($updatable)
			<div class="options">
				<a href="{{ route('note.update.page', $note['id']) }}">
					<button class="update">Редактировать</button>
				</a>
			
				<form action="{{ route('note.delete') }}" method="POST">
					@csrf
					@method('DELETE')
					<input type="hidden" name="id" value="{{ $note['id'] }}" />
					<button type="submit" class="delete">Удалить</button>
				</form>

				@if ($note['is_removed_from_publication'])
					<form action="{{ route('note.return') }}" method="POST">
						@csrf
						@method('PUT')
						<input type="hidden" name="id" value="{{ $note['id'] }}" />
						<button type="submit" class="return">Вернуть публикацию</button>
					</form>
				@else
					<form action="{{ route('note.remove') }}" method="POST">
						@csrf
						@method('PUT')
						<input type="hidden" name="id" value="{{ $note['id'] }}" />
						<button type="submit" class="remove">Снять с публикации</button>
					</form>
				@endif
				
			</div>
		@endif
	@endisset

	@isset($comment_moderable)
	<div class="comment-container", id="comments-{{ $note['id'] }}">
		<div class="count-line">
			<span class="icon">
				комментарии
			</span>
			<span class="count">
			</span>
		</div>

		<button class="show-comments", onclick="make_comments_visibale(event, {{ $note['id'] }})">показать комментарии</button>
		<div class="comments hidden">
			@foreach ($comments[$note['id']] as $comment)
				@include('comment.comment', ['deleteable' => true, 'comment' => $comment])
			@endforeach
		</div>
	</div>
	@endisset

	@isset($commentable)
		<div class="comment-container", id="comments-{{ $note['id'] }}">
			<div class="count-line">
				<span class="icon">
					комментарии
				</span>
				<span class="count">
				</span>
			</div>

			<div class="comments-add" id="comment-form-{{ $note['id'] }}">
				<textarea name="text" required class="comment-text"></textarea>
				<button class="show-comments", onclick="submitComment(event, {{ $note['id'] }})">оправить комментарий</button>
			</div>
		
			<button class="show-comments", onclick="show_comments(event, {{ $note['id'] }})">показать комментарии</button>
		</div>
	@endisset
</div>

