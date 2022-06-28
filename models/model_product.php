<?php

class model_product extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getProduct($id)
    {
        $query = "select * from tbl_product where  id=?";
        $param = [$id];
        $result = $this->doSelect($query, $param, 1);


        $price_total = $this->calculateDiscount($result['price'], $result['discount']);
        $result['price_total'] = $price_total;


        $time_special = $result['time_end'];
        date_default_timezone_set('Asia/Tehran');
        $date = date('Y/m/d H:i:s', $time_special);
        $result['time_special'] = $date;

        $colors_id = $result['colors'];
        $colors_id_explode = explode(',', $colors_id);
        $colors_id_filter = array_filter($colors_id_explode);

        $all_colors = [];
        foreach ($colors_id_filter as $color) {
            $colors = $this->getColors($color);
            array_push($all_colors, $colors);
        }
        $guarantee = $this->getGuarantee($result['guarantee']);
        $result['colors'] = $all_colors;
        $result['guaranteeTitle'] = $guarantee;

        $favorite = $this->addToFavorites($id);
        $result['favorite'] = $favorite;

        return $result;
    }

    function getColors($color)
    {
        $query = "select * from tbl_colors where id=?";
        $param = [$color];
        return $this->doSelect($query, $param, 1);
    }


    function getGuarantee($id)
    {
        $query = "select * from tbl_guarantee where id=?";
        $param = [$id];
        return $this->doSelect($query, $param, 1);
    }

    function getReviews($id)
    {
        $query = "select * from tbl_review where  idproduct=?";
        $param = [$id];
        return $this->doSelect($query, $param);
    }

    function getFeatures($product_id, $category_id)
    {
        $query = "select * from tbl_attr where category_id=? and parent=0";
        $param = [$category_id];
        $result = $this->doSelect($query, $param);
        foreach ($result as $key => $row) {
            $query2 = "
            SELECT tbl_attr.title,tbl_product_attr.value
            FROM tbl_attr
            LEFT JOIN tbl_product_attr
            ON tbl_attr.id = tbl_product_attr.attr_id  and tbl_product_attr.product_id=?  where tbl_attr.parent=?";
            $param2 = [$product_id, $row['id']];
            $result2 = $this->doSelect($query2, $param2);
            $result[$key]['children'] = $result2;
        }
        return $result;
    }

    function get_comment_param($product_id, $category_id)
    {
        $query = "select * from tbl_comment_param where $category_id=?";
        $param = [$category_id];
        $result = $this->doSelect($query, $param);
        $comments = $this->getComments($product_id);
        $scores_total = [];
        foreach ($comments as $comment) {
            $param_item = $comment['param'];
            $param_item = unserialize($param_item);
            foreach ($param_item as $key => $value) {
                if (!isset($scores_total[$key])) {
                    $scores_total[$key] = 0;
                }
                $scores_total[$key] = $scores_total[$key] + $value;
            }
        }

        $comments_number = sizeof($comments);
        foreach ($scores_total as $key => $value) {
            $val = $value / $comments_number;
            $scores_total[$key] = $val;
        }

        return [$result, $scores_total, $comments_number];
    }

    function getComments($product_id)
    {
        $query = "select * from tbl_comment where product_id=?";
        $param = [$product_id];
        return $this->doSelect($query, $param);
    }

    function getQuestions($product_id)
    {
        $query = "select *from tbl_questions where product_id=? and parent=0 and status=1";
        $param = [$product_id];
        $questions = $this->doSelect($query, $param);
        foreach ($questions as $key => $row) {
            $query = "select *from tbl_questions where parent=? and status=1";
            $param = [$row['id']];
            $answers = $this->doSelect($query, $param);
            $questions[$key]['answers'] = $answers;
        }
        return $questions;
    }

    function getImages($product_id)
    {
        $query = "select * from tbl_image where product_id=?";
        $param = [$product_id];
        return $this->doSelect($query, $param);
    }

    function addToBaket($product_id, $data)
    {
        $color_selected = $data['color_selected'];
        $guarantee_id = $data['guarantee_id'];
        $cookie = self::setBasketCookie();
        $query = "select *from tbl_basket where cookie=? and product_id=? and color_id=? and guarantee_id=?";
        $param = [$cookie, $product_id, $color_selected, $guarantee_id];
        $product = $this->doSelect($query, $param, 1);
        if (isset($product['cookie'])) {
            $query = "update tbl_basket set number=number+1 where cookie=? and product_id=? and color_id=? and guarantee_id=?";
        } else {
            $query = "insert into tbl_basket (cookie,product_id,number ,color_id,guarantee_id) values (?,?,1,?,?)";
        }
        $param = [$cookie, $product_id, $color_selected, $guarantee_id];
        $this->doQuery($query, $param);
    }

    function addToFavorites($product_id)
    {
        self::sessionInit();
        $user = self::sessionGet('user_id');

        $query = "select * from tbl_favorites where product_id=? and user_id=?";
        $param = [$product_id, $user];

        $favoriteItem = $this->doSelect($query, $param, 1);

        if (!isset($favoriteItem['id'])) {
            $query = "insert into tbl_favorites (product_id,user_id)
values (?,?)";

        } else {
            $query = "delete from  tbl_favorites where product_id=? and user_id=?";
        }
        $param = [$product_id, $user];
        $this->doQuery($query, $param);
        return $favoriteItem;
    }

    function sendAnswer($question_id, $data)
    {
        $time = time();
        self::sessionInit();
        $user_id = self::sessionGet('user_id');
        $product_id = $data['product_id'];

        $answer = $data['answer'];
        $query = "insert into tbl_questions (context,user_id,product_id,parent,time,status) values (?,?,?,?,?,2)";
        $param = [$answer, $user_id, $product_id, $question_id, $time];
        $this->doquery($query, $param);

    }

    function sendQuestion($product_id, $data)
    {
        $time = time();
        self::sessionInit();
        $user_id = self::sessionGet('user_id');

        $question = $data['question'];
        $query = "insert into tbl_questions (context,user_id,product_id,parent,time,status)values (?,?,?,0,?,2)";
        $param = [$question, $user_id, $product_id, $time];
        $this->doQuery($query, $param);
    }
}