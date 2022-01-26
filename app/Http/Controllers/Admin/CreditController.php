<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.credit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.credit.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credits = Credit::all();

        $request->validate([
            'name' => ['required', 'min:1'],
            'role' => ['required', 'min:1'],
            'description' => ['required', 'min:1'],
            'picture' => ['required', 'image']
        ]);

        $credit = Credit::create([
            'name' => $request['name'],
            'role' => $request['role'],
            'description' => $request['description'],
            'order'=>sizeof($credits)+1,
        ]);


        $image=$request->file('picture');
        $extension = $image->getClientOriginalExtension();

        $image->move(public_path().'/img/credits', $credit->id.".".$extension);

        $credit->update([
            'picture'=>'img/credits/'.$credit->id.".".$extension
        ]);

        return redirect()->route('admin.credit.index');
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
        $credit = Credit::find($id);
        return view("admin.credit.edit",compact('credit'));
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
            'name' => ['required', 'min:1'],
            'role' => ['required', 'min:1'],
            'description' => ['required', 'min:1'],
        ]);
        $credit = Credit::find($request['id']);


        if($request['picture']){
            $image=$request->file('picture');
            $extension = $image->getClientOriginalExtension();

            $image->move(public_path().'/img/credits', $credit->id.".".$extension);

            $credit->update([
                'picture'=>'img/credits/'.$credit->id.".".$extension
            ]);
        }
        $credit->update([
            'name' => $request['name'],
            'role' => $request['role'],
            'description' => $request['description'],
        ]);

        return redirect()->route('admin.credit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
