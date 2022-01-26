<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Models\SusEvaluation;
use App\Models\CsuqEvaluation;
use App\Models\Information;
use App\Models\Lesson;
use App\Models\Resource;
use App\Models\Section;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::first();
        $user = User::find(Auth::user()->id);

        if($user->lesson_now<0){
            $user->update(['lesson_now'=>0]);
        }
        if($user->lesson_max<0){
            $user->update(['lesson_max'=>0]);
        }



        if ($course->lessons_count > 0) {
            $sections = Section::where('course_id', $course->id)->orderBy('updated_at', 'ASC')->get();
            $lessons = collect([]);
            foreach ($sections as $section) {
                $section_lessons = Lesson::where('section_id', $section->id)->orderBy('updated_at', 'ASC')->get();
                $lessons = $lessons->concat($section_lessons);
            }

            $resources = collect([]);
            foreach ($lessons as $lesson) {
                $lesson_resources = Resource::where('lesson_id', $lesson->id)->orderBy('updated_at', 'ASC')->get();
                $resources = $resources->concat($lesson_resources);
            }
            if ($user->lesson_now >= $course->lessons_count) {
                if($course->lessons_count>0){
                    $user->update(['lesson_now' => $course->lessons_count - 1]);
                }else{
                    $user->update(['lesson_now' => 0]);
                }
            }
            if ($user->lesson_max >= $course->lessons_count) {
                if($course->lessons_count>0){
                    $user->update(['lesson_max' => $course->lessons_count - 1]);
                }else{
                    $user->update(['lesson_max' => 0]);
                }
            }
            $lesson_now = $lessons[Auth::user()->lesson_now];

            return view('content.index', compact('course', 'sections', 'lessons', 'resources', 'lesson_now'));
        }else{
            $user->update(['lesson_now'=>0,'lesson_max'=>0]);
            return view('content.index', compact('course'));
        }
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
        //
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
    public function update(Request $request)
    {
        $course = Course::first();
        $user = User::find(Auth::user()->id);
        if ($request['buttonaction'] == 'next') {
            if ($user->lesson_now < $course->lessons_count - 1) {
                $user->update(['lesson_now' => $user->lesson_now + 1]);
            }
            if ($user->lesson_now > $user->lesson_max) {
                $user->update(['lesson_max' => $user->lesson_now]);
            }
        } else if ($request['buttonaction'] == 'previous') {
            if ($user->lesson_now > 0) {
                $user->update(['lesson_now' => $user->lesson_now - 1]);
            }
        }

        return redirect(route('content.index'));
    }

    public function updatespecific(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $course = Course::first();
        if ($request["lesson"] <= $user->lesson_max + 1 && $request["lesson"] < $course->lessons_count && $request["lesson"] >= 0) {
            $user->update(['lesson_now' => $request["lesson"]]);
            if ($user->lesson_now > $user->lesson_max) {
                $user->update(['lesson_max' => $user->lesson_now]);
            }
        }
        return redirect(route('content.index'));
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

    public function showevaluation()
    {
        $course = Course::first();
        $user = User::find(Auth::user()->id);
        $sections = Section::where('course_id', $course->id)->orderBy('updated_at', 'ASC')->get();
        $lessons = collect([]);
        foreach ($sections as $section) {
            $section_lessons = Lesson::where('section_id', $section->id)->orderBy('updated_at', 'ASC')->get();
            $lessons = $lessons->concat($section_lessons);
        }

        $resources = collect([]);
        foreach ($lessons as $lesson) {
            $lesson_resources = Resource::where('lesson_id', $lesson->id)->orderBy('updated_at', 'ASC')->get();
            $resources = $resources->concat($lesson_resources);
        }
        if ($user->lesson_now >= $course->lessons_count) {
            $user->update(['lesson_now' => $course->lessons_count - 1]);
        }
        if ($user->lesson_max >= $course->lessons_count) {
            $user->update(['lesson_max' => $course->lessons_count - 1]);
        }


        if (Auth::user()->lesson_max == $course->lessons_count - 1) {
            return view('content.evaluation', compact('course', 'sections', 'lessons'));
        } else {
            return redirect()->route('content.index');
        };
    }

    public function registerevaluation(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'sus1' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus2' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus3' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus4' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus5' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus6' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus7' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus8' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus9' => ['required', 'numeric', 'min:1', 'max:5'],
            'sus10' => ['required', 'numeric', 'min:1', 'max:5'],
            'csuq1' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq2' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq3' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq4' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq5' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq6' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq7' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq8' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq9' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq10' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq11' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq12' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq13' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq14' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq15' => ['required', 'numeric', 'min:1', 'max:7'],
            'csuq16' => ['required', 'numeric', 'min:1', 'max:7'],
        ]);


        if ($user->usability == 0) {
            SusEvaluation::create([
                'sus1' => $request['sus1'],
                'sus2' => $request['sus2'],
                'sus3' => $request['sus3'],
                'sus4' => $request['sus4'],
                'sus5' => $request['sus5'],
                'sus6' => $request['sus6'],
                'sus7' => $request['sus7'],
                'sus8' => $request['sus8'],
                'sus9' => $request['sus9'],
                'sus10' => $request['sus10'],
                'user_id' => Auth::user()->id,
            ]);

            CsuqEvaluation::create([
                'csuq1' => $request['csuq1'],
                'csuq2' => $request['csuq2'],
                'csuq3' => $request['csuq3'],
                'csuq4' => $request['csuq4'],
                'csuq5' => $request['csuq5'],
                'csuq6' => $request['csuq6'],
                'csuq7' => $request['csuq7'],
                'csuq8' => $request['csuq8'],
                'csuq9' => $request['csuq9'],
                'csuq10' => $request['csuq10'],
                'csuq11' => $request['csuq11'],
                'csuq12' => $request['csuq12'],
                'csuq13' => $request['csuq13'],
                'csuq14' => $request['csuq14'],
                'csuq15' => $request['csuq15'],
                'csuq16' => $request['csuq16'],
                'user_id' => Auth::user()->id,
            ]);

            $user->update(['usability' => 1]);
        }


        return redirect(route('content.showcertification'));
    }

    public function showcertification()
    {
        $course = Course::first();
        $information = Information::first();
        $user = User::find(Auth::user()->id);
        $sections = Section::where('course_id', $course->id)->orderBy('updated_at', 'ASC')->get();
        $lessons = collect([]);
        foreach ($sections as $section) {
            $section_lessons = Lesson::where('section_id', $section->id)->orderBy('updated_at', 'ASC')->get();
            $lessons = $lessons->concat($section_lessons);
        }

        $resources = collect([]);
        foreach ($lessons as $lesson) {
            $lesson_resources = Resource::where('lesson_id', $lesson->id)->orderBy('updated_at', 'ASC')->get();
            $resources = $resources->concat($lesson_resources);
        }
        if ($user->lesson_now >= $course->lessons_count) {
            $user->update(['lesson_now' => $course->lessons_count - 1]);
        }
        if ($user->lesson_max >= $course->lessons_count) {
            $user->update(['lesson_max' => $course->lessons_count - 1]);
        }

        return view('content.certification', compact('course', 'sections', 'lessons', 'information'));
    }

    public function generatecertification()
    {
        $information = Information::first();
        $user = User::find(Auth::user()->id);
        $dompdf = App::make("dompdf.wrapper");
        $dompdf->setPaper('a4', 'landscape');
        $dompdf->loadView("content.certificate", [
            "information" => $information,
            "user" => $user,
        ]);
        return $dompdf->download('prueba.pdf');
    }
}
