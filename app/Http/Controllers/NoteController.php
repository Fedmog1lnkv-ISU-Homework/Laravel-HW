<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class NoteController extends Controller
{
    public function showCreateForm()
    {
        return view('create-note');
    }

    public function storeNote(Request $request)
    {
        // Валидация формы
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('/create-note')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Создание заметки
        $note = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ];

        // Сохранение заметки в файл в формате JSON
        $filename = 'note_' . uniqid() . '.json';
        File::put(storage_path('notes/' . $filename), json_encode($note));

        return redirect('/create-note')->with('success', 'Заметка успешно создана!');
    }

    public function showAllNotes()
    {
        // Получение всех заметок из директории storage/notes
        $notes = [];
        $files = File::files(storage_path('notes'));

        foreach ($files as $file) {
            $content = File::get($file);
            $notes[] = json_decode($content, true);
        }

        return view('all-notes', ['notes' => $notes]);
    }
}
