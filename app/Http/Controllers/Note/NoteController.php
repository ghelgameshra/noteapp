<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function get()
    {
        $notes = DB::table('notes')->join('categories', 'notes.category_id', 'categories.id')->select(['notes.id', 'notes.summary', 'categories.name AS category_name'])->get();

        return response()->json([
            "data" => $notes
        ], 200);
    }

    public function show($id): NoteResource
    {
        $note = Note::where('id', $id)->first();
        return new NoteResource($note);
    }

    public function create(NoteRequest $request)
    {
        $data = $request->validated();

        $note = new Note($data);
        $note->category_id = $data['category'];
        $note->save();
    }
}
