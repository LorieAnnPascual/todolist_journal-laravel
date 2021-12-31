<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Lists::all();
        return view('index', compact('list'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storedata = $request->validate([
            'date'=>'required',
            'time'=>'required',
            'todo'=>'required|max:255',
            'journal'=>'required|max:255'
            
        ]);
        $list = Lists::create($storedata);
        return redirect('/lists')->with('success', 'List has been saved.');
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
    public function edit($id)
    {
        $list = Lists::findOrFail($id);
        return view('edit', compact('list'));
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
        $updatedata = $request->validate([
            'date'=>'required',
            'time'=>'required',
            'todo'=>'required|max:255',
            'journal'=>'required|max:255'
        ]); 
        Lists::whereId($id)->update($updatedata);
        return redirect('/lists')->with('success', 'List has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = Lists::findOrFail($id);
        $list->delete();
        return redirect('/lists')->with('success', 'List has been deleted.');
    }
}
