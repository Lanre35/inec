<?php

namespace App\Http\Controllers;

use App\Models\PollingUnit;
use App\Models\Ward;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LocalGovernmentArea;
use App\Models\AnnouncedPollingUnitResult;

class CreateNewPollUnitController extends Controller
{
//    public $subWard = null;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parties = Party::all();
        $lga = LocalGovernmentArea::all();
        $wards = Ward::all();
        $resultids = AnnouncedPollingUnitResult::all();

        // dd($wards[0],$lga[0]);
        return view('create-polling-unit',
            compact('parties', 'wards' ,'lga', 'resultids'));
    }

    public function getWard(Request $request)
    {
        $subWard = Ward::where('lga_id', $request->lga_id)->select('ward_name', 'lga_id','ward_id')->get();
//        $subWard = DB::select("SELECT ward_name, lga_name, ward_id FROM ward JOIN lga ON ward.lga_id = lga.lga_id WHERE ward.lga_id = ?", [$request->lga_id]);
        return response()->json($subWard);
    }

    public function getPollingUnit(Request $request)
    {   $subPol = PollingUnit::select('polling_unit_id', 'uniqueid', 'ward_id')
        ->where('polling_unit_id', $request->ward_id)
        ->get();
//        $subPol = DB::select("SELECT polling_unit_id,uniqueid,ward_id FROM polling_unit  where polling_unit_id = ?",[$request->ward_id]);
        return response()->json($subPol);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $val = $request->validate([
                    'lga' => 'required',
                    'wards' => 'required',
                    'party' => 'required',
                    'score' => 'required|numeric|digits_between:1,10',
                    'date' => 'required|date',
                    'uniqueid' => 'required',
                ]);

                $session = session('username');
                $ip_address = $_SERVER['REMOTE_ADDR'];

                $result = AnnouncedPollingUnitResult::create([
                    'party_abbreviation' => $request->party,
                    'party_score' => $request->score,
                    'date_entered' => $request->date,
                    'polling_unit_uniqueid' => $request->uniqueid,
                    'entered_by_user' => $session,
                    'user_ip_address' => $ip_address,
                ]);
        return redirect('create-polling-unit')->with('success', 'Polling Unit created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
