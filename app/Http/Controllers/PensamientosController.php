<?php

namespace App\Http\Controllers;

use App\Pensamientos;
use Illuminate\Http\Request;
use Auth;

class PensamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(){
        return  Pensamientos::where('user_id',Auth::user()->id)->get();
    }
    public function index()
    {
        return  Pensamientos::where('user_id',Auth::user()->id)->get();
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
        $p = new Pensamientos();
         
        $p->description = $request->description;
        $p->user_id = Auth::user()->id ;
        $p->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pensamientos  $pensamientos
     * @return \Illuminate\Http\Response
     */
    public function show(Pensamientos $pensamientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pensamientos  $pensamientos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pensamientos $pensamientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pensamientos  $pensamientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request->id;
        $pensamiento = Pensamientos::find($request->id);
        $pensamiento->description = $request->description;
        $pensamiento->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pensamientos  $pensamientos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pensamiento = Pensamientos::find($id);
        $pensamiento->delete();
    }
}
