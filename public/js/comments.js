var recordElements = document.querySelectorAll('.note');
var route = '/comments/count/'
recordElements.forEach(function (element) {
	console.log(element.id)
	var xhr = new XMLHttpRequest();
	xhr.open('GET', route + element.id, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			var data = JSON.parse(xhr.responseText);
			console.log(data);
			var comments_block = element.querySelector('.comment-container');
			comments_block.querySelector('.count-line').querySelector('.count').textContent = data['count']
		}

	};
	xhr.send();
});
console.log('Update comments count')

function make_comments_visibale(event, note_id) {
	event.preventDefault()
	const container = document.getElementById(note_id);
	const comments = container.querySelector('.comments')
	comments.classList.toggle('hidden')
}

function update_comments(note_id) {
	const container = document.getElementById('comments-' + note_id)

	var formData = new FormData();
	formData.append('note_id', note_id);

	var xhr = new XMLHttpRequest();
	xhr.open("GET", "/comments/" + note_id, true);
	
	const comments_block = document.createElement('div');
	comments_block.className = 'comments';
	comments_block.id = 'comments_block_' + note_id;
	container.appendChild(comments_block);

	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				var data = JSON.parse(xhr.responseText);
				console.log(data);
				for (var i in data) {
					console.log(data[i]);
					const comment = document.createElement('div');
					comment.className = 'comment';
					const comment_text = document.createElement('span');
					const comment_author = document.createElement('span');
					const comment_date = document.createElement('span');

					comment_text.textContent = data[i]['text']
					comment_author.textContent = data[i]['username']

					const rawDate = data[i]['created_at'];
					const formattedDate = new Date(rawDate).toISOString().replace('T', ' ').substring(0, 19);

					comment_date.textContent = formattedDate;

					comment_text.className = 'comment_text'
					comment_author.className = 'comment_author'
					comment_date.className = 'comment_date'

					comment.appendChild(comment_author)
					comment.appendChild(comment_text)
					comment.appendChild(comment_date)

					comments_block.appendChild(comment);
				}
			} else {
				// Обработка ошибки
				console.error('Ошибка при отправке комментария:', xhr.statusText);
			}

		}
	};

	xhr.send(formData);
}

function show_comments(event, note_id) {
	if (event) {
		event.preventDefault();
	}
	
	const container = document.getElementById('comments-' + note_id)
	const check_comments = container.querySelector('.comments')
	if (check_comments) {
		check_comments.remove()
		event.target.innerText = "показать комментарии"
		return;
	}

	event.target.innerText = "скрыть комментарии"
	var formData = new FormData();
	formData.append('note_id', note_id);

	var xhr = new XMLHttpRequest();
	xhr.open("GET", "/comments/" + note_id, true);
	
	const comments_block = document.createElement('div');
	comments_block.className = 'comments';
	comments_block.id = 'comments_block_' + note_id;
	container.appendChild(comments_block);

	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				var data = JSON.parse(xhr.responseText);
				console.log(data);
				for (var i in data) {
					console.log(data[i]);
					const comment = document.createElement('div');
					comment.className = 'comment';
					const comment_text = document.createElement('span');
					const comment_author = document.createElement('span');
					const comment_date = document.createElement('span');

					comment_text.textContent = data[i]['text']
					comment_author.textContent = data[i]['username']

					const rawDate = data[i]['created_at'];
					const formattedDate = new Date(rawDate).toISOString().replace('T', ' ').substring(0, 19);

					comment_date.textContent = formattedDate;

					comment_text.className = 'comment_text'
					comment_author.className = 'comment_author'
					comment_date.className = 'comment_date'

					comment.appendChild(comment_author)
					comment.appendChild(comment_text)
					comment.appendChild(comment_date)

					comments_block.appendChild(comment);
				}
			} else {
				// Обработка ошибки
				console.error('Ошибка при отправке комментария:', xhr.statusText);
			}

		}
	};

	xhr.send(formData);
}


