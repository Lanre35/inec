<?php

namespace App\Http\Controllers;

use App\Models\AnnouncedPollingUnitResult;
use Illuminate\Http\Request;

class PollingUnitResultController extends Controller
{
    public function index()
    {
        return view('polling-unit');
    }


    public function show(Request $request)
    {
        // if ($request->has('search')) {
        //     // $pollingUnitResult = AnnouncedPollingUnitResult::where('polling_unit_uniqueid', $request->polling_unit_uniqueid)->get();
        //     // return view('polling-unit', ['pollingUnitResult' => $pollingUnitResult]);
        //     return response()->json($pollingUnitResult);
        //     // return redirect('/')->with($pollingUnitResult);
        //     // dd($pollingUnitResult);
        // }

        $validatedData = $request->validate([
            'polling_unit_uniqueid' => 'required|string|numeric', // Adjust the length as needed
        ]);

        $pollingUnitResult = AnnouncedPollingUnitResult::where('polling_unit_uniqueid', $validatedData['polling_unit_uniqueid'])->get();
        return response()->json($pollingUnitResult);
    }
}
