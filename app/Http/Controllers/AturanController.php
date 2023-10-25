<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use Illuminate\Http\Request;

class AturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aturan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Aturan $aturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aturan $aturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aturan $aturan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aturan $aturan)
    {
        //
    }
}
