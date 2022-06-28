<?php

class model_adminCategory extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getCategory()
    {
        $query = "select * from tbl_category";
        return $this->doSelect($query);
    }

    function getCategoryInfo($category_id)
    {
        $query = "select * from tbl_category where id=?";
        $param = [$category_id];
        return $this->doSelect($query, $param, 1);
    }

    function getSubCategory($category_id)
    {
        $query = "select * from tbl_category where parent=?";
        $param = [$category_id];
        return $this->doSelect($query, $param);
    }

    function addCategory()
    {
        $title = $_POST['title'];
        $parent = $_POST['category'];
        $category_id = $_POST['category_id'];

        if ($_POST['category_id'] == '') {
            $query = "insert into tbl_category (title,parent) values (?,?)";
            $stmt = self::$conn->prepare($query);
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, $parent);
            $stmt->execute();
        } else {
            $query = "update tbl_category set title=?,parent=? where id=?";
            $stmt = self::$conn->prepare($query);
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, $parent);
            $stmt->bindValue(3, $category_id);
            $stmt->execute();
        }
        header('location:' . BASE . 'adminCategory/index/' . $parent);
    }

    function removeAjax($id)
    {
        $query = "delete from tbl_category where id=?";
        $stmt = self::$conn->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    function getAttributes($category_id, $attribute_id)
    {
        $query = "select * from tbl_attr where category_id=? and parent=?";
        $param = [$category_id, $attribute_id];
        return $this->doSelect($query, $param);
    }

    function getAttributeInfo($attribute_id)
    {
        $query = "select * from tbl_attr where id=?";
        $param = [$attribute_id];
        return $this->doSelect($query, $param, 1);
    }

    function addAttribute($data, $category_id, $attribute_id)
    {
        $title = $data['title'];
        $attr_id = $data['attr_id'];

        if ($data['attr_id'] == '') {
            $query = "insert into tbl_attr (title ,category_id ,parent) values (?,?,?)";
            $param = [$title, $category_id, $attribute_id];
            $this->doQuery($query, $param);
        } else {
            $query = "update  tbl_attr set title=? ,category_id=?,parent=? where id=?";
            $param = [$title, $category_id, $attribute_id, $attr_id];
            $this->doQuery($query, $param);
        }

    }

    function removeAjaxAttribute($id)
    {
        $query = "select * from tbl_attr where  parent=?";
        $param = [$id];
        $attributes = $this->doSelect($query, $param);

        $attributes_id = [];
        array_push($attributes_id, $id);
        foreach ($attributes as $attribute) {
            $ids = $attribute['id'];
            array_push($attributes_id, $ids);
        }

        $attr_ids = join(',', $attributes_id);

        $query = "delete from tbl_attr where id IN (" . $attr_ids . ")";
        $this->doQuery($query);
    }
}