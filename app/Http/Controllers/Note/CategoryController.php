<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function get(Request $request)
    {
        $categories = DB::table('categories')
        ->where('name', 'RLIKE', $request->search)
        ->select(['id', 'name'])->get();
        $ctgr = [];
        foreach ($categories as $key) {
            $ctgr[] = [
                'id' => $key->id,
                'text' => $key->name
            ];
        }

        return response()->json([
            "data" => $ctgr
        ], 200);
    }
}
