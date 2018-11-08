<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 08.11.2018
 * Time: 01:11
 */

namespace App\Http\Controllers;


use App\Entity\Question;
use App\Entity\Queue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Question as QuestionResource;
use Illuminate\Support\Facades\Storage;

/**
 * Class CheckingController
 * @package App\Http\Controllers
 */
class CheckingController extends Controller
{
    /**
     * CheckingController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function start(Request $request)
    {
        /** @var Queue $queue */
        $queue = Queue::where('category_id', $request->input('category_id'))->with('category')->get();

        $questions = QuestionResource::collection(Question::with('answers')->orderBy('created_at'));
        $contentImage = Storage::get($queue->pathToFile);

        return view('front.start', [
            'queue' => $queue,
            'questions' => $questions,
            'contentImage' => $contentImage
        ]);
    }


    /**
     *
     */
    public function finish()
    {

    }
}