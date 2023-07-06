<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function teams()
    {
        $table = DB::table('teams')->get();
        return view('teams', compact('table'));
    }

    public function insert(Request $r)
    {
        DB::table('teams')->insert([
            "name" => $r->name,
            "city" => $r->city
        ]);

        return redirect('/teams');
    }

    public function matches()
    {
        return view('matches');
    }

    public function single()
    {
        // $team = DB::table('team')->get();
        return view('single');
    }

    public function unique_code()
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 900);
    }

    public function saveSingleMatches(Request $r)
    {
        $id = mainController::unique_code();
        // dd($r->all());
        for ($i = 0; $i < 2; $i++) {
            DB::table('matches')->insert([
                "matches_id" => $id,
                "team" => $r->teams[$i],
                "goal" => $r->score[$i]
            ]);
        }

        return redirect('/matches');
    }

    public function saveMultipleMatches(Request $r)
    {
        // dd($r->all());
        for ($y = 0; $y < count($r->team); $y + 2) {
            $id = mainController::unique_code();
            for ($i = $y-1; $i < $y; $i++) {
                DB::table('matches')->insert([
                    "matches_id" => $id,
                    "team" => $r->teams[$i],
                    "goal" => $r->score[$i]
                ]);
            }
        }

        return redirect('/matches');
    }

    public function getTeams()
    {
        $teams = DB::table('teams')->get();

        return json_encode($teams);
    }

    public function multiple()
    {
        return view('multiple');
    }

    public function getMatches(Request $r){
        // dd($r->id);
        // $matches = DB::table('matches')->get();

        $matches = DB::table('matches')->select('matches_id')->where('team',$r->id)->get();
        $arr = [];
        foreach($matches as $m){
            $matchDone = DB::table('matches')->where('matches_id',$m->matches_id)->get();
            foreach($matchDone as $d){
                array_push($arr, $d->team);
            }
                
        }
        // dd($arr);
        // foreach($matches as $m){
        // }
        $teams = DB::table('teams')->whereNotIn('id',$arr)->get();
        return json_encode($teams);
    }
}
