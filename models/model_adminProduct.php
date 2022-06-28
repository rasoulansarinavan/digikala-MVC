<?php

class model_adminProduct extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getProducts()
    {
        $query = "select * from tbl_product";
        return $this->doSelect($query);
    }

    function getProductInfo($product_id)
    {
        $query = "select * from tbl_product where id=?";
        $param = [$product_id];
        $result = $this->doSelect($query, $param, 1);
        @$colors = $result['colors'];
        $colors = explode(',', $colors);
        return [$result, $colors];
    }

    function getCompareItem()
    {
        $query = "select * from tbl_compare_type";
        return $this->doSelect($query);
    }

    function getCategories()
    {
        $query = "select * from tbl_category";
        return $this->doSelect($query);
    }

    function getColors()
    {
        $query = "select * from tbl_colors";
        return $this->doSelect($query);
    }

    function getGuarantee()
    {
        $query = "select * from tbl_guarantee";
        return $this->doSelect($query);
    }

    function addProduct($data, $product_id, $file = [])
    {
        $title = $data['title'];
        $category_id = $data['category_id'];
        $discount = $data['discount'];
        $price = $data['price'];
        $number = $data['number'];
        $introduction = $data['introduction'];
        $compare_type = $data['compare_type'];
        $colors = '';
        if (isset($data['colors'])) {
            $colors = $data['colors'];
            $colors = join(',', $colors);
        }
        $guarantee = $data['guarantee'];

        if ($product_id == '') {
            $query = "insert into tbl_product(title,category_id,discount,price,number,introduction,colors,guarantee,compare_type)
values (?,?,?,?,?,?,?,?,?)";

            $param = [$title, $category_id, $discount, $price, $number, $introduction, $colors, $guarantee, $compare_type];
            $this->doQuery($query, $param);

            $product_id = parent::$conn->lastInsertId();

            $directory_gallery_large = 'public/images/product/' . $product_id . '/gallery/large';
            mkdir($directory_gallery_large, 0777, true);

            $directory_gallery_small = 'public/images/product/' . $product_id . '/gallery/small';
            mkdir($directory_gallery_small, 0777, true);

        } else {
            $query = "update tbl_product set title=?,category_id=?,discount=?,price=?,number=?,introduction=?,colors=?,guarantee=?,compare_type=? where id=?";

            $param = [$title, $category_id, $discount, $price, $number, $introduction, $colors, $guarantee, $compare_type, $product_id];
            $this->doQuery($query, $param);
        }
        /*==== image upload =====*/

        $file = $_FILES['image'];
        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_tmp_name = $file['tmp_name'];
        $file_error = $file['error'];
        $file_size = $file['size'];

        $directory = 'public/images/product/' . $product_id . '/';
        $new_name = 'product';

        $upload = 1;

        if ($file_type != 'image/jpg' and $file_type != 'image/jpeg' and $file_size > 208896) {
            $upload = 0;
        }
        if ($upload == 1) {

            /*==== default image upload =====*/

            $extension = PATHINFO($file_name, PATHINFO_EXTENSION);
            $target = $directory . $new_name . '.' . $extension;
            move_uploaded_file($file_tmp_name, $target);

            /*==== default image upload =====*/

            $product115 = $directory . $new_name . '_115.' . $extension;
            $product350 = $directory . $new_name . '_350.' . $extension;
            $product600 = $directory . $new_name . '_600.' . $extension;


            $this->create_thumbnail($target, $product115, 115, 115);
            $this->create_thumbnail($target, $product350, 350, 350);
            $this->create_thumbnail($target, $product600, 600, 600);

            /*==== image upload =====*/

        }
    }

    function getReviews($product_id)
    {
        $query = "select * from tbl_review where idproduct=?";
        $param = [$product_id];
        return $this->doSelect($query, $param);
    }

    function getReviewInfo($review_id)
    {
        $query = "select * from tbl_review where id=?";
        $param = [$review_id];
        return $this->doSelect($query, $param, 1);
    }

    function addReview($data, $product_id, $review_id)
    {
        $title = $data['title'];
        $review = $data['review'];

        if ($review_id == '') {
            $query = "insert into tbl_review (title,review,idproduct) values (?,?,?)";
            $param = [$title, $review, $product_id];
            $this->doQuery($query, $param);
        } else {
            $query = "update tbl_review set title=?,review=?,idproduct=? where id=?";
            $param = [$title, $review, $product_id, $review_id];
            $this->doQuery($query, $param);
        }
        header('location:' . BASE . 'adminProduct/review/' . $product_id);

    }

    function removeAjaxReview($id)
    {
        $query = "delete  from tbl_review where id=?";
        $param = [$id];
        $this->doQuery($query, $param);
    }

    function removeAjaxProduct($id)
    {
        $query = "delete  from tbl_product where id=?";
        $param = [$id];
        $this->doQuery($query, $param);

        $query2 = "delete  from tbl_review where idproduct=?";
        $param2 = [$id];
        $this->doQuery($query2, $param2);
    }

    function getProductAttributes($product_id)
    {
        $productInfo = $this->getProductInfo($product_id);
        $productInfo = $productInfo[0];
        $category_id = $productInfo['category_id'];

        $query = "select tbl_attr.*,tbl_product_attr.value from tbl_attr left join tbl_product_attr
on tbl_attr.id=tbl_product_attr.attr_id and tbl_product_attr.product_id=? where category_id=? and parent!=0";
        $param = [$product_id, $category_id];
        return $this->doSelect($query, $param);
    }

    function editAttribute($data, $product_id)
    {
        $attributes_id = $data['id'];
        foreach ($attributes_id as $id) {
            $query = "delete from tbl_product_attr where attr_id=?";
            $param = [$id];
            $this->doQuery($query, $param);


            $query = "insert into tbl_product_attr (product_id,attr_id,value) values (?,?,?)";
            $param = [$product_id, $id, $data['value' . $id]];
            $this->doQuery($query, $param);
        }
    }

    function getGalleryImage($product_id)
    {
        $query = "select * from tbl_image where product_id=?";
        $param = [$product_id];
        return $this->doSelect($query, $param);
    }

    function addGalleryImage($product_id, $file)
    {
        /*==== image upload =====*/

        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_tmp_name = $file['tmp_name'];
        $file_error = $file['error'];
        $file_size = $file['size'];

        $directory = 'public/images/product/' . $product_id . '/' . 'gallery/';
        $new_name = time();

        $upload = 1;

        if ($file_type != 'image/jpg' and $file_type != 'image/jpeg' and $file_size > 208896) {
            $upload = 0;
        }
        if ($upload == 1) {

            /*==== default image upload =====*/

            $extension = PATHINFO($file_name, PATHINFO_EXTENSION);
            $target = $directory . 'large/' . $new_name . '.' . $extension;
            move_uploaded_file($file_tmp_name, $target);

            /*==== default image upload =====*/

            $product_small = $directory . 'small/' . $new_name . '.' . $extension;

            $this->create_thumbnail($target, $product_small, 115, 115);

            /*==== image upload =====*/

            $query = "insert into tbl_image (img,product_id) values (?,?)";
            $param = [$new_name . '.' . $extension, $product_id];
            $this->doQuery($query, $param);
        }
    }

    function removeAjaxGalleryImage($image_id)
    {
        $query = "select * from tbl_image where id=?";
        $param = [$image_id];
        $result = $this->doSelect($query, $param, 1);
        $img = $result['img'];
        $product_id = $result['product_id'];

        $directory = 'public/images/product/' . $product_id . '/gallery/';
        $directory_small = $directory . 'small/' . $img;
        $directory_large = $directory . 'large/' . $img;

        unlink($directory_small);
        unlink($directory_large);

        $query = "delete from tbl_image where id=?";
        $param = [$image_id];
        $this->doQuery($query, $param);
    }

    function addSpecial()
    {
        $time_start = $_POST['time_start'];
        $time_end = $_POST['time_end'];

        $time_start = explode('/', $time_start);
        $time_end = explode('/', $time_end);

        $time_start = jmktime(0, 0, 0, $time_start[1], $time_start[2], $time_start[0]);
        $time_end = jmktime(23, 59, 59, $time_end[1], $time_end[2], $time_end[0]);


        $discount = $_POST['discount'];
        $product_id = $_POST['product_id'];
        $query = "update tbl_product set special=1,time_start=?,time_end=?,discount=? where id=?";
        $param = [$time_start, $time_end, $discount, $product_id];
        $this->doQuery($query, $param);
    }
}
