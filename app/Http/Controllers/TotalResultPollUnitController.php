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
    }


}
