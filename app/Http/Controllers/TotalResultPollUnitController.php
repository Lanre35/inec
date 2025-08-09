<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Ward;
use App\Models\PollingUnit;
use Illuminate\Http\Request;
use App\Models\LocalGovernmentArea;

use function Laravel\Prompts\error;
use function Laravel\Prompts\select;

use Illuminate\Validation\Rules\Unique;
use App\Models\AnnouncedPollingUnitResult;
// Removed: use Dotenv\Validator;

class TotalResultPollUnitController extends Controller
{
    public function index()
    {
        $lga = LocalGovernmentArea::all();
        return view('total-result-polling-unit', compact('lga'));
    }

    public function show(Request $request)
    {
        $lgaId = $request->local_government_area;
        $results = DB::select("SELECT party_abbreviation,
        SUM(party_score) as total_score FROM announced_pu_results join polling_unit
        where lga_id=$lgaId GROUP BY party_abbreviation");

        return response()->json($results);
    }
}
