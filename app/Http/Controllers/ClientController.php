<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\manager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        return view('client.index', [
            'clients' => client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $name mixed
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $client = new Client;

        $client->name = $request->name;

        $client->save();

        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\client
     * @return Response
     */
    public function show()
    {
        return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id int
     * @param \App\Models\client $client
     * @return Response
     */
    public function edit(client $client, $id)
    {
        $data = client::Where('id', $id)->FirstorFail();
        $i = 1;
        $clients = client::all();

        return view('client.index', ['data' => $data,
            'clients' => $clients,
            'i' => $i]);
    }

    /**
     * Update the specified resource in storage.
     * @param $id int
     * @param \Illuminate\Http\Request $request string
     * @param \App\Models\client $client
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, client $client, $id)
    {
        $value = $request->name;
        $data = client::where('id', $id)->update(['name' => $value]);

        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\client $client
     * @param $id int
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(client $client, $id)
    {
        $iddata = client::Where('id', $id)->FirstorFail();
        client::where('id', $iddata->id)->delete();

        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\manager $managers
     * @param \App\Models\client $allclients
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function managers()
    {
        $managers = manager::with('client')->OrderBy('last_name', 'desc')->get();
        $allclients = client::all();
        return view('manager.index', compact(['managers', 'allclients']));

    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\manager $managers
     * @param \App\Models\client $allclients
     * @param $id int
     */
    public function getManager(Client $client, $id)
    {

        $client = Client::where('id', $id)->FirstorFail();

        $managers = manager::where('clients_id', $client->id)->OrderBy('last_name', 'desc')->get();

        $allclients = client::all();
        return view('client.client_managers', compact(['managers', 'allclients', 'client']));

    }
}
