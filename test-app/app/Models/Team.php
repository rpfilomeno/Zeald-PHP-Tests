<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    public $timestamps = false;
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $fillable = ['code','name'];

}
