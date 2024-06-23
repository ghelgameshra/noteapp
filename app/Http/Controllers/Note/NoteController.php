<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        if(str_contains($data['error_image'], "base64")){
            $data['error_image'] = str_replace(['<p>', '</p>', '<img', '>', 'data:image/png;base64,'], '', $data['error_image']);

            $fileNamePath = 'images/note/images' . now()->format('_Y_m_d_H_i_s') . '.png';

            try {
                Storage::put($fileNamePath, base64_decode($data['error_image']));
                $data['image_path'] = 'storage/' . $fileNamePath;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        $note = new Note($data);
        $note->category_id = $data['category'];
        $note->save();
    }
}
