<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.lesson.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lesson.create');
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
            'description' => ['required', 'min:1', 'max:500'],
        ]);
        Lesson::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return redirect()->route('admin.lesson.index');
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
        $lesson_id = $id;
        $lesson = Lesson::find($id);
        return view("admin.lesson.edit", compact(['lesson_id', 'lesson']));
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
            'description' => ['required', 'min:1', 'max:500'],
        ]);


        if (Lesson::find($request['id'])->section !== null) {
            $lessons = Lesson::find($request['id'])->section->lessons;
        }

        Lesson::find($request['id'])->update([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        if (Lesson::find($request['id'])->section !== null) {
            foreach ($lessons as $lesson) {
                $lesson->touch();
            }
        }

        return redirect()->route('admin.lesson.index');
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
        if ($request['id'] == $request['ids']) {
            Lesson::destroy($request['id']);
        };
        return redirect()->route('admin.lesson.index');
    }
}
