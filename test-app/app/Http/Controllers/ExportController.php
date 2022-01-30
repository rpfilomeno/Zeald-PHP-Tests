<?php

namespace App\Http\Controllers;

use LSS\Array2XML;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
 
    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function statsTeam($code, $format='json')
    {
        $data = DB::table('roster')
        ->join('player_totals', 'roster.id','=','player_totals.player_id')
        ->select('roster.team_code', 'roster.name', 'roster.pos', 
        DB::raw('player_totals.3pt'), 
        DB::raw('player_totals.3pt_attempted'), 
        DB::raw('player_totals.3pt / player_totals.3pt_attempted as 3pt_average'))
        -> where('roster.team_code','like', '%'.$code.'%' )
        ->orderByDesc('player_totals.3pt_attempted')
        ->orderByDesc('3pt_average')
        ->get();

        if($format == 'json') return response()->json($data);
        echo $this->xmlformat($data);

    }


    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function statsPos($pos, $format='json')
    {
        $data =  DB::table('roster')
            ->join('player_totals', 'roster.id','=','player_totals.player_id')
            ->select('roster.team_code', 'roster.name', 'roster.pos', 
            DB::raw('player_totals.3pt'), 
            DB::raw('player_totals.3pt_attempted'), 
            DB::raw('player_totals.3pt / player_totals.3pt_attempted as 3pt_average'))
            -> where('roster.pos','like', '%'.$pos.'%' )
            ->orderByDesc('player_totals.3pt_attempted')
            ->orderByDesc('3pt_average')
            ->get();

        if($format == 'json') return response()->json($data);
        echo $this->xmlformat($data);

    }


    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function statsPlayer($name, $format='json')
    {
        $data = DB::table('roster')
            ->join('player_totals', 'roster.id','=','player_totals.player_id')
            ->select('roster.team_code', 'roster.name', 'roster.pos', 
            DB::raw('player_totals.3pt'), 
            DB::raw('player_totals.3pt_attempted'), 
            DB::raw('player_totals.3pt / player_totals.3pt_attempted as 3pt_average'))
            -> where('roster.name','like', '%'.$name.'%' )
            ->orderByDesc('player_totals.3pt_attempted')
            ->orderByDesc('3pt_average')
            ->get();

        if($format == 'json') return response()->json($data);
        echo $this->xmlformat($data);

    }


    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function playerPlayer($name, $format='json')
    {
        $data = DB::table('roster')
            ->where('roster.name','like', '%'.$name.'%' )
            ->get();

        if($format == 'json') return response()->json($data);
        echo $this->xmlformat($data);

    }


     /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function playerTeam($code, $format='json')
    {
        $data = DB::table('roster')
            ->where('roster.team_code','like', '%'.$code.'%' )
            ->get();


        if($format == 'json') return response()->json($data);
        echo $this->xmlformat($data);

    }


    public function xmlformat($data) {
        
        header('Content-type: text/xml');
                
        
        $keyMap = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        $xmlData = [];
        foreach ($data->all() as $row) {
            $xmlRow = [];
            foreach ($row as $key => $value) {
                $key = preg_replace_callback('(\d)', function($matches) use ($keyMap) {
                    return $keyMap[$matches[0]] . '_';
                }, $key);
                $xmlRow[$key] = $value;
            }
            $xmlData[] = $xmlRow;
        }
        $xml = Array2XML::createXML('data', [
            'entry' => $xmlData
        ]);
        return $xml->saveXML();

    }
 
}
