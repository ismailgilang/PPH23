<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gaji;
use App\Models\User;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = gaji::all();
        return view ('gaji.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::where('role', 'karyawan')->get();
        return view('gaji.create', compact('data'));
    }

    public function store(Request $request)
    {
        $data = gaji::create($request->all());
        return redirect()->route('gaji.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $gaji = gaji::findOrFail($id);
        return view('gaji.edit', compact('gaji'));
    }

    public function update(Request $request, $id)
    {
        $data = gaji::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('gaji.index');
    }

    public function destroy($id)
    {
        $data = gaji::findOrFail($id);
        $data->delete();
        return redirect()->route('gaji.index');
    }
}
