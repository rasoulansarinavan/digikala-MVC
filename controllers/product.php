<?php

class product extends Controller
{
    function __construct()
    {
    }

    function index($id)

    {
        $productInfo = $this->model->getProduct($id);
        $images = $this->model->getImages($id);
        $data = ['productInfo' => $productInfo, 'images' => $images];
        $this->getView('product/index', $data);
    }

    function tabs($id, $category_id)
    {
        $number = $_POST['number'];

        if ($number == 0) {

            $productInfo = $this->model->getProduct($id);
            $introduction = $productInfo['introduction'];
            $review = $this->model->getReviews($id);

            $data = ['introduction' => $introduction, 'review' => $review];
            $this->getView('product/tab1', $data, 1, 1);

        }
        if ($number == 1) {
            $features = $this->model->getFeatures($id, $category_id);
            $data = ['features' => $features];
            $this->getView('product/tab2', $data, 1, 1);
        }
        if ($number == 2) {
            $comment_param = $this->model->get_comment_param($id, $category_id);
            $comment_param_new = $comment_param[0];
            $scores_total = $comment_param[1];
            $comments_number = $comment_param[2];
            $comments = $this->model->getComments($id);
            $data = ['comment_param_new' => $comment_param_new, 'comments' => $comments, 'scores_total' => $scores_total, 'comments_number' => $comments_number];
            $this->getView('product/tab3', $data, 1, 1);
        }
        if ($number == 3) {
            $questions = $this->model->getQuestions($id);
            $product_id = $id;
            $data = ['questions' => $questions, 'product_id' => $product_id];
            $this->getView('product/tab4', $data, 1, 1);
        }

    }

    function addToBaket($product_id)
    {
        $this->model->addToBaket($product_id, $_POST);
    }

    function addToFavorites($product_id)
    {
        $this->model->addToFavorites($product_id);
    }

    function comment()
    {
        $this->getView('product/comment');
    }

    function sendAnswer($question_id)
    {
        $this->model->sendAnswer($question_id, $_POST);
    }

    function sendQuestion($product_id)
    {
        $this->model->sendQuestion($product_id, $_POST);
    }
}
