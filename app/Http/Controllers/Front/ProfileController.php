<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 08.11.2018
 * Time: 02:01
 */

namespace App\Http\Controllers;

use App\Http\Resources\Category;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
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
        $categories = Category::search($request->input('q'))
                ->with('author', 'likes')
                ->withCount('comments', 'thumbnail', 'likes')
                ->latest()
                ->paginate(20);

        return view('front.profile.index', compact('categories'));
    }
}