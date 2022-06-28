<?php

class adminCategory extends Controller
{
    function __construct()
    {
        parent::__construct();
        $level = Model::getUserLevel();
        if ($level != 1) {
            header('location:' . BASE . 'adminLogin/index');
        }
    }

    function index($category_id = 0)
    {
        if (isset($_POST['title'])) {
            $this->model->addCategory($_POST);
        }
        $category = $this->model->getCategory();
        $SubCategory = $this->model->getSubCategory($category_id);
        $data = ['Subcategory' => $SubCategory, 'category' => $category, 'category_id' => $category_id];
        $this->getView('admin/category/index', $data, 1, 1);
    }

    function removeAjax($id)
    {
        $this->model->removeAjax($id);
    }

    function attributes($category_id, $attribute_id = 0)
    {
        if (isset($_POST['title'])) {
            $this->model->addAttribute($_POST, $category_id, $attribute_id);
        }
        $attributes = $this->model->getAttributes($category_id, $attribute_id);
        $categoryInfo = $this->model->getCategoryInfo($category_id);
        $attributeInfo = $this->model->getAttributeInfo($attribute_id);
        $data = ['attributes' => $attributes, 'categoryInfo' => $categoryInfo, 'attributeInfo' => $attributeInfo];
        $this->getView('admin/category/attributes', $data, 1, 1);
    }

    function removeAjaxAttribute($id)
    {
        $this->model->removeAjaxAttribute($id);
    }
}
