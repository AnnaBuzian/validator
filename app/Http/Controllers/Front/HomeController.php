<?php

namespace App\Http\Controllers;


use App\Entity\Category;
use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('queues')->get();

        return view('home', [
            'categories' => CategoryResource::collection($categories)
        ]);
    }
}
