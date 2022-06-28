<?php

class adminQuestions extends Controller
{
    function __construct()
    {
        parent::__construct();
        $level = Model::getUserLevel();
        if ($level != 1) {
            header('location:' . BASE . 'adminLogin/index');
        }
    }

    function index()
    {
        $status = $this->model->getShowStatus();
        $questions = $this->model->getQuestions();
        $data = ['questions' => $questions, 'status' => $status];
        $this->getView('admin/questions/index', $data, 1, 1);
    }

    function changeStatus($question_id)
    {
        $this->model->changeStatus($question_id, $_POST);
    }

    function answers($question_id)
    {
        $status = $this->model->getShowStatus();
        $answersTotal = $this->model->getAnswers($question_id);
        $answers = $answersTotal[0];
        $question = $answersTotal[1];
        $data = ['status' => $status, 'answers' => $answers, 'question' => $question];
        $this->getView('admin/questions/answers', $data, 1, 1);
    }
}