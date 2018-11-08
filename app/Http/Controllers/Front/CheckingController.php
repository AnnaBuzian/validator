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
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Question as QuestionResource;
use App\Http\Resources\Queue as QueueResource;
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
        $this->middleware('auth');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function start(Request $request)
    {
        /** @var Queue $queue */
        $queue = Queue::where('category_id', $request->input('category_id'))
            ->with('category')
            ->orderBy('created_at')
            ->first();

        $url = Storage::disk('s3')->temporaryUrl(
            $queue->pathToFile, Carbon::now()->addMinutes(5)
        );

        $questions = Question::with('answers')->orderBy('created_at')->get();

        return view('front.start', [
            'queue' => $queue,
            'questions' => QuestionResource::collection($questions),
            'url' => $url
        ]);
    }


    /**
     *
     */
    public function finish()
    {

    }
}