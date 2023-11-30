@extends('layouts.main', ['pageTitle' => 'All Notes Page'])

@section('content')
    @include('note.note-template', ['note' => $note])
@endsection
