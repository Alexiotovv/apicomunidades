<?php

namespace App\Http\Controllers;

use App\Models\homes;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('templates.home');
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
    public function show(homes $homes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(homes $homes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, homes $homes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(homes $homes)
    {
        //
    }
}
