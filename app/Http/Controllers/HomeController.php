<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brandsForMan = $this->brand->where('type', 'man')->orderBy('name')->get();
        $brandsForWoman = $this->brand->where('type', 'woman')->orderBy('name')->get();
        return view('web.home', compact('brandsForMan', 'brandsForWoman'));
    }
}
