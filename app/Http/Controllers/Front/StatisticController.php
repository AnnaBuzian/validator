<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 08.11.2018
 * Time: 02:01
 */

namespace App\Http\Controllers;

use App\Http\Resources\Category;
use App\Repositories\QueueRepository;

/**
 * Class StatisticController
 * @package App\Http\Controllers
 */
class StatisticController extends Controller
{
    /** @var QueueRepository  */
    private $queueRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(QueueRepository $repository)
    {
        $this->queueRepository = $repository;

        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();

        return view('front.statistic.index', compact('categories'));
    }
}