<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.marketing.index', [
            'title' => 'List Marketing',
            'users' => User::where('role_id', 2)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.marketing.create', [
            'title' => 'Tambah Akun Marketing'
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
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:25',
            'password' => 'required|min:8|max:255',
            'nip'    => 'numeric|min:5',
            'address'  => 'required'
        ]);

        // $user = User::create($request->all());

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/dashboard/marketing')->with('success', 'User has ben Created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('dashboard.marketing.show', [
            'title' => 'Detail Marketing',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('dashboard.marketing.edit', [
            'title' => 'Edit Akun Marketing',
            'user' => $user
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
            'name' => 'required|min:3|max:25',
            'password' => 'required|min:8|max:255',
            'nip'    => 'numeric|min:5',
            'address'  => 'required'
        ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);

        $userUpdate = User::where('slug', $slug)->first();
        $userUpdate->slug = null;
        $userUpdate->update($validatedData);

        return redirect('/dashboard/marketing')->with('success', 'User has ben Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('/dashboard/marketing')->with('success', 'User has ben Deleted!');
    }

    public function trashed()
    {
        $trashed = User::onlyTrashed()->get();
        return view('dashboard.marketing.trashed', [
            'title' => 'List Trashed Marketing',
            'trashed' => $trashed
        ]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->firstOrFail();
        $user->restore();
        return redirect('/dashboard/marketing')->with('success', 'Marketing Restore Success');
    }
}
