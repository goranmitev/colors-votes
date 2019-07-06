<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $colors = DB::table('colors')->get();

        return view('home', [
            'colors' => $colors
        ]);
    }

    public function getVotes(Request $request) {

        $records = DB::table('votes')
                ->where('color', '=', $request->color)
                ->get();
        $votes = 0;

        foreach ($records as $record) {
            $votes += $record->votes;
        }

        return response()->json($votes);
    }
}
