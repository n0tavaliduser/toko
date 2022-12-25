<?php

namespace App\Http\Controllers;

use App\Models\diskon;
use App\Http\Requests\StorediskonRequest;
use App\Http\Requests\UpdatediskonRequest;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorediskonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorediskonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function show(diskon $diskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function edit(diskon $diskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatediskonRequest  $request
     * @param  \App\Models\diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatediskonRequest $request, diskon $diskon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function destroy(diskon $diskon)
    {
        //
    }
}
