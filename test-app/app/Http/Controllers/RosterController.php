<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class RosterController extends Controller
{
    //

    public function viewRosters() {
        return view('report',['listTeams' => Team::all()]);
    }
}
