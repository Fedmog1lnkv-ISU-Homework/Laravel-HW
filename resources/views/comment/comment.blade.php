<div class="comment">
    <span class="comment_author"> {{ $comment['username'] }} </span>
    <span class="comment_text"> {{ $comment['text'] }} </span>
    <span class="comment_date"> {{ $comment['created_at'] }} </span>

	@isset($deleteable)
	<form action="{{ route('comment.delete') }}" method="POST">
		@csrf
		@method('DELETE')
		<input type="hidden" name="id" value="{{ $comment['id'] }}" />
		<button type="submit" class="delete">Удалить</button>
	</form>
	@endisset
</div>
