@extends('layouts.main', ['pageTitle' => 'All Notes Page'])

@section('content')
	@include('note.notes-block', ['notes' => $notes, 'updatable' => false, 'commentable' => true])

	@section('js')
	<script src="{{ asset('js/comments.js') }}"></script>
	<script>
		function submitComment(event, note_id) {
			event.preventDefault();

			console.log('new comment')
			const form = document.getElementById('comment-form-' + note_id)
			console.log(note_id)
			const text = form.querySelector('[name="text"]').value
			form.querySelector('[name="text"]').value = ""
			console.log(text)

			var formData = new FormData();
			formData.append('note_id', note_id);
			formData.append('text', text);

			var xhr = new XMLHttpRequest();
			xhr.open("POST", "{{ route('comment.add') }}", true);
			xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4) {
					if (xhr.status === 200) {
						var data = JSON.parse(xhr.responseText);
						const container = document.getElementById('comments-' + note_id)
						const comments_count = document.getElementById('comments-' + note_id).querySelector('.count-line').querySelector('.count')
						var count = parseInt(comments_count.textContent)
						comments_count.textContent = count + 1
						if (container) {
							const check_comments = container.querySelector('.comments')
							if (check_comments) {
								console.log(data)
								const comment = document.createElement('div');
								comment.className = 'comment';
								const comment_text = document.createElement('span');
								const comment_author = document.createElement('span');
								const comment_date = document.createElement('span');

								comment_text.textContent = data['text']
								comment_author.textContent = data['username']

								const rawDate = data['created_at'];
								const formattedDate = new Date(rawDate).toISOString().replace('T', ' ').substring(0, 19);

								comment_date.textContent = formattedDate;

								comment_text.className = 'comment_text'
								comment_author.className = 'comment_author'
								comment_date.className = 'comment_date'

								update_comments(note_id)
							}
						}
						
					} else {

						console.error('Ошибка при отправке комментария:', xhr.statusText);
					}
				}
			};

			xhr.send(formData);
		}
	</script>
	@endsection
@endsection

