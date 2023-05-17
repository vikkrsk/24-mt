<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderFormRequest;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;

        return view('provider.index', [
            'providers' => provider::all(),
            'i' => $i
        ]);
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
    public function store(ProviderFormRequest $request)
    {
        $provider = new Provider;
        $provider->name = $request->name;
        $provider->k = $request->k;
        $provider->save();
        flash('Поставщика - '.$provider->name.' с коэффициентом - '.$provider->k.' добавлен');
        return redirect('provider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     * @param $id int
     */
    public function edit(Provider $provider, $id)
    {
        $data = provider::Where('id', $id)->FirstorFail();
        $i=1;
        $providers = provider::all();

        return view('provider.index', ['data' =>$data,
            'providers' => $providers,
            'i' => $i]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @param $id int
     * @return \Illuminate\Http\Response
     * @param $k decimal
     */
    public function update(ProviderFormRequest $request, Provider $provider, $id)
    {
        $value = $request->name;
        $k = $request->k;
        $data = provider::Where('id', $id)->FirstorFail();
        provider::where('id', $data->id)->update(['name' => $value, 'k' => $k]);
        flash('Данные поставщика - '.$value.' с коэффициентом - '.$k.' обновлены');
        return redirect('provider');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @param $id int
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider, $id)
    {
        $value = provider::Where('id', $id)->FirstorFail();
        provider::where('id', $value->id)->delete();
        flash('Поставщик - '.$value->name.' был удален', 'info');

        return redirect('provider');
    }
}
