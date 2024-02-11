<?php

namespace App\Http\Controllers;

use App\Models\Packets;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with(['user', 'packet'])->get();
        return view('dashboard.sales.index', [
            'title' =>  'Data Penjualan',
            'sales' => $sales
        ]);
    }

    public function create()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $packets = Packets::all();
        return view('dashboard.sales.create', [
            'title' => 'Tambah Paket',
            'user' => $user,
            'packets' => $packets
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|min:5|max:255',
            'phone' => 'required|min:10|max:12',
            'address'  => 'required',
            'packet_id'  => 'required',
            'image' => 'required|image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Sales::create($validatedData);

        return redirect('/dashboard/sales/list-sales')->with('success', 'Registrasi Customer Success!');
    }

    public function edit($slug)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $packets = Packets::all();
        $sale = Sales::where('slug', $slug)->first();
        return view('dashboard.sales.edit', [
            'sale' => $sale,
            'user' => $user,
            'packets' => $packets,
            'title' => 'Edit Data Customer'
        ]);
    }

    public function update(Request $request, $slug)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|min:5|max:255',
            'phone' => 'required|min:10|max:12',
            'address'  => 'required',
            'packet_id'  => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $dataUpdate = Sales::where('slug', $slug)->first();
        $dataUpdate->slug = null;
        $dataUpdate->update($validatedData);

        return redirect('/dashboard/sales/list-sales')->with('success', 'Data Customer Updated Succes!');
    }

    public function listSale()
    {
        $sales = Sales::with(['user', 'packet'])->where('user_id', Auth::user()->id)->get();
        return view('dashboard.sales.list-sale', [
            'title' =>  'List Penjualan',
            'sales' => $sales
        ]);
    }

    public function verifikasi($slug)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $packets = Packets::all();
        $sale = Sales::where('slug', $slug)->first();
        return view('dashboard.sales.verifikasi', [
            'sale' => $sale,
            'user' => $user,
            'packets' => $packets,
            'title' => 'Edit Data Verifikasi'
        ]);
    }

    public function verified(Request $request, $slug)
    {
        // dd($request->all());

        $dataUpdate = Sales::where('slug', $slug)->first();
        $dataUpdate->status = $request->status;
        $dataUpdate->save();

        return redirect('/dashboard/sales')->with('success', 'Data Approved!');
    }
}
