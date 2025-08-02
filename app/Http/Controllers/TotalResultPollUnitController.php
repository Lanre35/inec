<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalGovernmentArea;
use App\Models\AnnouncedPollingUnitResult;
use App\Models\PollingUnit;
use App\Models\Ward;
use Illuminate\Validation\Rules\Unique;

use function Laravel\Prompts\select;

class TotalResultPollUnitController extends Controller
{
    public function index()
    {
        $lga = LocalGovernmentArea::all();
        return view('total-result-polling-unit', compact('lga'));
    }

    public function show(Request $request)
    {
        $d = LocalGovernmentArea::where('lga_id', $request->local_government_area)->first();
        $p = AnnouncedPollingUnitResult::groupBy('party_abbreviation')
                ->selectRaw('party_abbreviation, sum(party_score) as party_score')
                ->where('lga_id', $d->lga_id)
                ->get();
        // $p = PollingUnit::where('lga_id', $d->uniqueid)
        //     ->get();


        // $arr = [];

        // foreach ($p as $pollingUnit) {
        //     $rr = AnnouncedPollingUnitResult::groupBy('party_abbreviation')
        //         ->selectRaw('party_abbreviation, sum(party_score) as party_score')
        //         ->where('polling_unit_uniqueid', $pollingUnit->uniqueid)
        //         ->get();

        //     array_push($arr, $rr);
        // }




        // $loc = LocalGovernmentArea::where('uniqueid', $request->local_government_area)->first();

        // $wds = Ward::where('lga_id', $loc->uniqueid)->get();

        // $results = [];
        // $ww = [];
        // foreach ($wds as $d) {
        //     $pols = PollingUnit::where('ward_id', $d->uniqueid)
        //         ->get();


        //         foreach ($pols as $pollingUnit) {
        //             $rr = AnnouncedPollingUnitResult::groupBy('party_abbreviation')
        //                 ->selectRaw('party_abbreviation, sum(party_score) as party_score')
        //                 ->where('polling_unit_uniqueid', $pollingUnit->uniqueid)
        //                 ->get();

        //             array_push($results, $rr);

        //         }

        // }





        dd($p,$d);
    }


}
