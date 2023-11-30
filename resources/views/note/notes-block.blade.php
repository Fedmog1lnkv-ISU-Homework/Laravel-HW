
<div class="notes-container">
	@foreach ($notes as $note)
		@if ($updatable)
			@include('note.note-template', ['note' => $note, 'updatable' => $updatable])
		@else
			@include('note.note-template', ['note' => $note])
		@endif
		
	@endforeach
</div>

