<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hobbie;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hobbies = Hobbie::orderBy('id', 'desc')->get();
        return view('home', [
            'hobbies' => $hobbies
        ]);

    }
}
