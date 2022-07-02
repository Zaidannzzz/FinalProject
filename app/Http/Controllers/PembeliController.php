<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dataPelanggan'] = pembeli::orderBy('created_at', 'ASC')->get();
        return view('pembeli.index', $data);
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
    public function store(Request $request)
    {
        $store = pembeli::create($request->all());
        if (!$store) {
            return redirect()->route('indexPelanggan')->with('error', 'Data Added Failed.');
        }
        return redirect()->route('indexPelanggan')->with('success', 'Data Added Success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit'] = pembeli::find($id);
        if (!$data['edit']) {
            return redirect()->route('indexPelanggan')->with('error', 'Data Pelanggan Not Found.');
        }

        return view('pembeli.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = pembeli::updateOrCreate(['id' => $id], $request->all());
        if (!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexPelanggan')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = pembeli::find($id);
        if (!$destroy) {
            return redirect()->route('indexPelanggan')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if (!$destroy) {
            return redirect()->route('indexPelanggan')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexPelanggan')->with('success', 'Data Has Been Deleted.');
    }
}
