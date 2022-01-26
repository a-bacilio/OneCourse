<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class HomeController extends Controller
{
    public function index(){
        return redirect()->route('admin.information.edit');
    }
}
