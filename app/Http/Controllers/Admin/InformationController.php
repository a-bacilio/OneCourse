<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function edit()
    {
        $information = Information::first();
        return view('admin.information.edit',compact('information'));
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
        $information = Information::first();
        switch($request['field']){
            case "welcome_title":
                    $request->validate([
                        'welcome_title'=>['required','min:6']
                    ]);
                    $information->update(['welcome_title'=>$request['welcome_title']]);
                    return redirect()->route('admin.information.edit');
                    break;
            case "welcome_text_1":
                $request->validate([
                    'welcome_text_1'=>['required','min:6']
                ]);
                $information->update(['welcome_text_1'=>$request['welcome_text_1']]);
                return redirect()->route('admin.information.edit');
                break;
            case "welcome_text_2":
                $request->validate([
                    'welcome_text_2'=>['required','min:6']
                ]);
                $information->update(['welcome_text_2'=>$request['welcome_text_2']]);
                return redirect()->route('admin.information.edit');
                break;
            case "welcome_video":
                $request->validate([
                    'welcome_video'=>['required','min:6']
                ]);
                $information->update(['welcome_video'=>$request['welcome_video']]);
                return redirect()->route('admin.information.edit');
                break;
            case "end_title":
                $request->validate([
                    'end_title'=>['required','min:6']
                ]);
                $information->update(['end_title'=>$request['end_title']]);
                return redirect()->route('admin.information.edit');
                break;
            case "end_text_1":
                $request->validate([
                    'end_text_1'=>['required','min:6']
                ]);
                $information->update(['end_text_1'=>$request['end_text_1']]);
                return redirect()->route('admin.information.edit');
                break;
            case "end_text_2":
                $request->validate([
                    'end_text_2'=>['required','min:6']
                ]);
                $information->update(['end_text_2'=>$request['end_text_2']]);
                return redirect()->route('admin.information.edit');
                break;

            case "logo":
                $request->validate([
                    'logo' => ['required', 'image']
                ]);
                $image=$request->file('logo');
                $image->move(public_path().'/img/logo', 'logo.png');
                return redirect()->route('admin.information.edit');
                break;
            case "black_logo":
                $request->validate([
                    'black_logo' => ['required', 'image']
                ]);
                $image=$request->file('black_logo');
                $image->move(public_path().'/img/logo', 'black_logo.png');
                return redirect()->route('admin.information.edit');
                break;
            case "white_logo":
                $request->validate([
                    'white_logo' => ['required', 'image']
                ]);
                $image=$request->file('white_logo');
                $image->move(public_path().'/img/logo', 'white_logo.png');
                return redirect()->route('admin.information.edit');
                break;
            case "consent_img_1":
                $request->validate([
                    'consent_img_1' => ['required', 'image']
                ]);
                $image=$request->file('consent_img_1');
                $image->move(public_path().'/img/consent', '1.png');
                return redirect()->route('admin.information.edit');
                break;
            case "consent_img_2":
                $request->validate([
                    'consent_img_2' => ['required', 'image']
                ]);
                $image=$request->file('consent_img_2');
                $image->move(public_path().'/img/consent', '2.png');
                return redirect()->route('admin.information.edit');
                break;
            case "consent_img_3":
                $request->validate([
                    'consent_img_3' => ['required', 'image']
                ]);
                $image=$request->file('consent_img_3');
                $image->move(public_path().'/img/consent', '3.png');
                return redirect()->route('admin.information.edit');
                break;
            case "certificate_img":
                $request->validate([
                    'certificate_img' => ['required', 'image']
                ]);
                $image=$request->file('certificate_img');
                $image->move(public_path().'/img/certificate', 'diploma.jpg');
                return redirect()->route('admin.information.edit');
                break;
            case "certificate_fontsize":
                $request->validate([
                    'certificate_fontsize'=>['required']
                ]);
                $information->update(['certificate_fontsize'=>$request['certificate_fontsize']]);
                return redirect()->route('admin.information.edit');
                break;
            case "certificate_pos_x":
                $request->validate([
                    'certificate_pos_x'=>['required']
                ]);
                $information->update(['certificate_pos_x'=>$request['certificate_pos_x']]);
                return redirect()->route('admin.information.edit');
                break;
            case "certificate_pos_y":
                $request->validate([
                    'certificate_pos_y'=>['required']
                ]);
                $information->update(['certificate_pos_y'=>$request['certificate_pos_y']]);
                return redirect()->route('admin.information.edit');
                break;
            default:
                return redirect()->route('admin.information.edit');
        }
        return redirect()->route('admin.information.edit');
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
