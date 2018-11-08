<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 08.11.18
 * Time: 8:25
 */

namespace App\Repositories;

use App\Entity\Answer;
use App\Entity\Category;
use App\Entity\Question;

/**
 * Class QuestionRepository
 * @package App\Repositories
 */
class QuestionRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /** @var Answer  */
    protected $answer;

    /** @var Category  */
    protected $category;


    /**
     * QuestionRepository constructor.
     * @param Question $question
     * @param Answer $answer
     * @param Category $category
     */
    public function __construct(Question $question, Answer $answer, Category $category)
    {
        $this->model = $question;
        $this->answer = $answer;
        $this->category = $category;
    }
}