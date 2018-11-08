<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 08.11.2018
 * Time: 04:33
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Entity\Answer;
use App\Http\Resources\Answer as AnswerResource;
use App\Entity\Category;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

/**
 * Class FileController
 * @package App\Http\Controllers\Admin
 */
class FileController extends Controller
{
    /** @var  */
    private $url;


    /**
     * FileController constructor.
     */
    public function __construct()
    {
        $this->url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        parent::__construct();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::get();
        $answers = Answer::get();

        return view('admin.file.upload', [
            'categories' => CategoryResource::collection($categories),
            'answers' => AnswerResource::collection($answers)
        ]);
    }


    /**
     *
     */
    public function upload()
    {
        
    }

    public function uploadFileToS3(Request $request)
    {
        $image = $request->file('image');
    }
}