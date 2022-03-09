<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function socialIndex()
    {
        $languages = Language::all();
        return view('social.index', compact(['languages']));
    }
    public function socialSave()
    {

    }
}
