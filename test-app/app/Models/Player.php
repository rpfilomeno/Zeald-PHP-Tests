<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player_totals';

    public $timestamps = false;
    protected $primaryKey = 'player_id';
    public $incrementing = false;
    protected $fillable = ['player_id','age','games','games_started','minutes_played','field_goals','field_goals_attempted',
        '3pt','3pt_attempted','2pt','2pt_attempted', 'free_throws','free_throws_attempted','offensive_rebounds','defensive_rebounds',
        'assists','steals','blocks', 'turnovers', 'personal_fouls'];

}
