<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.section.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.section.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:1', 'max:100'],
        ]);
        Section::create([
            'name' => $request['name'],
        ]);

        return redirect()->route('admin.section.index');
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
        $section_id = $id;
        $section = Section::find($id);
        return view("admin.section.edit", compact(['section_id', 'section']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required', 'min:1', 'max:100'],
        ]);

        if($sections = Section::find($request['id'])->course!==null){
            $sections = Section::find($request['id'])->course->sections;
        }

        Section::find($request['id'])->update([
            'name' => $request['name'],
        ]);

        if($sections){
            foreach($sections as $section){
                $section->touch();
            }
        }
        return redirect()->route('admin.section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'ids' => ['required']
        ]);
        if($request['id']==$request['ids']){
            Section::destroy($request['id']);
        };
        return redirect()->route('admin.section.index');
    }
}
