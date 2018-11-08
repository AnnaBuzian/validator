<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 08.11.18
 * Time: 9:11
 */

namespace App\Repositories;


use App\Entity\Answer;
use App\Entity\Category;
use App\Entity\Queue;

class QueueRepository
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
     * @param Queue $queue
     * @param Answer $answer
     * @param Category $category
     */
    public function __construct(Queue $queue, Answer $answer, Category $category)
    {
        $this->model = $queue;
        $this->answer = $answer;
        $this->category = $category;
    }

}