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
        if ($request->has('search')) {
            $pollingUnitResult = AnnouncedPollingUnitResult::where('polling_unit_uniqueid', $request->search)->get();
            return view('polling-unit', ['pollingUnitResult' => $pollingUnitResult]);
            // return redirect('/')->with($pollingUnitResult);
            // dd($pollingUnitResult);
        }

    }
}
