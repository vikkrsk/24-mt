<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerFormRequest;
use App\Models\manager;
use Illuminate\Http\Request;
use App\Models\Client;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $allclients array
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $managers = manager::OrderBy('last_name', 'desc')->get();
        $allclients = client::all();
        return view('manager.index', compact(['managers', 'allclients']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerFormRequest $request)
    {
        $manager = new manager();
        $manager->last_name = $request->last_name;
        $manager->first_name = $request->first_name;
        $manager->email = $request->email;
        $manager->clients_id = $request->clients_id;
        $manager->save();

        return redirect('manager');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(manager $manager)
    {
        //
    }
}
