<?php

namespace App\Http\Controllers;

use App\Models\Packets;
use Illuminate\Http\Request;

class DashboardPacketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.paket.index', [
            'title' => 'List Paket',
            'packets' => Packets::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.paket.create', [
            'title' => 'Tambah Paket',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'price' => 'required'
        ]);

        Packets::create($validatedData);

        return redirect('/dashboard/paket')->with('success', 'Packet has ben Added!');
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
    public function edit($slug)
    {
        $packet = Packets::where('slug', $slug)->first();
        return view('dashboard.paket.edit', [
            'title' => 'Edit Paket',
            'packet' => $packet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'price' => 'required'
        ]);

        $category = Packets::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($validatedData);

        return redirect('/dashboard/paket')->with('success', 'Paket has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $packet = Packets::where('slug', $slug)->first();
        $packet->delete();
        return redirect('/dashboard/paket')->with('success', 'Paket has ben Deleted!');
    }

    public function trashed()
    {
        $trashed = Packets::onlyTrashed()->get();
        return view('dashboard.paket.trashed', [
            'title' => 'List Trashed Paket',
            'trashed' => $trashed
        ]);
    }

    public function restore($slug)
    {
        $category = Packets::withTrashed()->where('slug', $slug)->firstOrFail();
        $category->restore();
        return redirect('/dashboard/paket')->with('success', 'Packet Restore Success');
    }
}
