<?php

class model_adminQuestions extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getQuestions()
    {
        $query = "select * from tbl_questions where parent=0 order by id desc ";
        $questions = $this->doSelect($query);
        foreach ($questions as $key => $row) {
            $user_id = $row['user_id'];
            $user = $this->getUser($user_id);
            $questions[$key]['user'] = $user;

            $time = $row['time'];
            $shamsi = self::shamsi($time)[0];
            $questions[$key]['time'] = $shamsi;
        }
        return $questions;
    }

    function getUser($user_id)
    {
        $query = "select * from tbl_users where id=?";
        $param = [$user_id];
        return $this->doSelect($query, $param, 1);
    }

    function getShowStatus()
    {
        $query = "select * from show_status";
        return $this->doSelect($query);
    }

    function changeStatus($question_id, $data)
    {
        if ($data['status'] == 1) {
            $status = 1;
        } else {
            $status = 2;
        }
        $query = "update tbl_questions set status=? where id=?";
        $param = [$status, $question_id];
        $this->doQuery($query, $param);
    }

    function getAnswers($question_id)
    {
        $query = "select * from tbl_questions where parent=?";
        $param = [$question_id];
        $answers = $this->doSelect($query, $param);
        foreach ($answers as $key => $row) {
            $user_id = $row['user_id'];
            $user = $this->getUser($user_id);
            $answers[$key]['user'] = $user;

            $time = $row['time'];
            @$shamsi = self::shamsi($time)[0];
            $answers[$key]['time'] = $shamsi;
        }
        $question = $this->getQuestionInfo($question_id);
        return [$answers, $question];
    }

    function getQuestionInfo($question_id)
    {
        $query = "select * from tbl_questions where id=?";
        $param = [$question_id];
        return $this->doSelect($query, $param,1);
    }
}