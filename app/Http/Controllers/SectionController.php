<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index=Section::all();
        return response()->json($index);
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
        $validatedData = $request->validate([
        'class_id' => 'required',
        'section_name' => 'required',
        ]);

        $insert=Section::create([
            'class_id'=>$request->class_id,
            'section_name'=>$request->section_name,
        ]);
        return response()->json($insert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Section::find($id);
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validatedData = $request->validate([
        'class_id' => 'required',
        'section_name' => 'required',
        ]);

        $update=Section::findorfail($id);
        $done=$update->update([
            'class_id'=>$request->class_id,
            'section_name'=>$request->section_name
        ]);

        return response()->json($done);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delte=Section::findorfail($id);
        $dlt=$delte->delete();
        return response()->json('done');
    }
}
