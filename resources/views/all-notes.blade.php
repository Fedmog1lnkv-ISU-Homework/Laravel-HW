@extends('layouts.app', ['pageTitle' => 'All Notes Page'])

@section('content')
    <table class="notes-table">
        <thead>
            <tr>
                <th>Заголовок</th>
                <th>Содержание</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note['title'] }}</td>
                    <td>{{ $note['content'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
