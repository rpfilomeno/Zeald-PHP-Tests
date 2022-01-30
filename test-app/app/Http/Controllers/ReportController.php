<?php

namespace App\Http\Controllers;


use App\Models\Team;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function viewReport() {
        return view('report',[
            'listTeams' => Team::all(),

            'listTop3pts' =>  DB::table('roster')
            ->join('player_totals', 'roster.id','=','player_totals.player_id')
            ->select('roster.team_code', 'roster.name', 'roster.pos', 
            DB::raw('player_totals.3pt as fg1'), 
            DB::raw('player_totals.3pt_attempted as fg2'), 
            DB::raw('player_totals.3pt / player_totals.3pt_attempted as fg3'))
            ->orderByDesc('fg2')
            ->orderByDesc('fg3')
            ->get(),

            'listTeam3pts'=>DB::table(
            function($query) {
                $query->select('roster.team_code',DB::raw('player_totals.3pt / player_totals.3pt_attempted as fg3'))
                ->from('roster')
                ->join('player_totals', 'roster.id','=','player_totals.player_id');
            })->selectRaw('team_code, AVG(fg3) as team3pt')
            ->groupBy('team_code')
            ->orderByDesc('team3pt')
            ->get()
       
        ]);
    }
}
