<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the data.
     */
    public function index()
    {
        $data = User::all();
        return view('karyawan.index', compact('data'));
    }

    public function create()
    {
        return view('Karyawan.create');
    }

    public function store(Request $request)
    {
        $data = User::create($request->all());
        return redirect()->route('karyawan.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $karyawan = User::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('karyawan.index');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('karyawan.index');
    }
}
