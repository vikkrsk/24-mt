<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;


class UnitController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        return view('unit/index', [
                'units' => unit::all(),
                'i' => $i
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = new Unit;

        $unit->unit = $request->unit;

        $unit->save();

        return redirect('unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.

    * @param \App\Models\Unit $unit
    * @param $id int
    * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
        */
    public function edit(Unit $unit, $id)
    {
        $data = Unit::Where('id', $id)->FirstorFail();
        $i=1;
        $units = unit::all();


        return view('unit/index', ['data' =>$data,
            'units' => $units,
            'i' => $i]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @param $id int
     * @param $value mixed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit, $id)
    {
        $value = $request->unit;
        $data=unit::where('id', $id)
        ->update(['unit' => $value]);

        return redirect('unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Unit $unit
     * @param $id int
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit, $id)
    {
        $iddata = Unit::Where('id', $id)->FirstorFail();
        $data=unit::where('id', $iddata->id)->delete();

        return redirect('unit');
    }
}
