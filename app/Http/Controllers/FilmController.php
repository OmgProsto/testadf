<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $films = Film::all();

        return response()->view('index', [
            'films' => $films
        ]);
    }

    public function create(Request $request)
    {
        $film = new Film([
           'title' => $request->input('title'),
           'actor' => $request->input('actor')
        ]);

        $film->save();

        return response()->json([
            'title' => $request->input('title'),
            'actor' => $request->input('actor')
        ]);
    }

    public function delete(Request $request)
    {
        $film = Film::find($request->id);

        $film->delete();

        return response()->json([
            'title' => 'ok'
        ]);
    }
}
