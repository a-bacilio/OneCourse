<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\OnlineVideo;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.resource.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createvideo()
    {
        return view('admin.resource.createvideo');
    }
    public function createimage()
    {
        return view('admin.resource.createimage');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storevideo(Request $request)
    {
        $request->validate([
            'name' => ['required','min:1','max:100'],
            'url' => ['required', 'url'],
            'iframe' => ['required'],
        ]);
        $resource = Resource::create([
            'name'=>$request['name'],
            'type'=>'video',
        ]);
        OnlineVideo::create([
            'name'=>$request['name'],
            'url'=>$request['url'],
            'iframe'=>$request['iframe'],
            'resource_id'=>$resource->id,
        ]);

        return redirect()->route('admin.resource.index');
    }
    public function storeimage(Request $request)
    {

        $request->validate([
            'name' => ['required','min:1','max:100'],
            'image' => ['required', 'image']
        ]);

        $image=$request->file('image');

        $extension = $image->getClientOriginalExtension();
        $resource = Resource::create([
            'name'=>$request['name'],
            'type'=>'image',
        ]);
        $image->move(public_path().'/storage/cursos', $resource->id.".".$extension);

        Image::create([
            'name'=>$request['name'],
            'url'=>'storage/cursos/'.$resource->id.".".$extension,
            'resource_id'=>$resource->id,
        ]);

        return redirect()->route('admin.resource.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $resource=Resource::find($request["id"]);
        if($resource->type=="image"){
            File::delete($resource->image->url);
        }
        Resource::destroy($request["id"]);
        return redirect()->route('admin.resource.index');
    }
}
