<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Procurement;
use App\Models\Location;
use App\Models\Categories;
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

    public function users() {
        $userCount = User::count();
        return view('home', compact('userCount'));
  }

}
