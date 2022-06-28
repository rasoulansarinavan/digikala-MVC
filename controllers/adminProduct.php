<?php

class adminProduct extends Controller
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
        $products = $this->model->getProducts();
        $data = ['products' => $products];
        $this->getView('admin/product/index', $data, 1, 1);
    }

    function addProduct($product_id = '')
    {

        if (isset($_POST['title'])) {
            $this->model->addProduct($_POST, $product_id, $_FILES);
        }
        $category = $this->model->getCategories();
        $colors = $this->model->getColors();
        $guarantee = $this->model->getGuarantee();
        $productInfo = $this->model->getProductInfo($product_id);
        $compareItem = $this->model->getCompareItem();
        $data = ['category' => $category, 'colors' => $colors, 'guarantee' => $guarantee, 'productInfo' => $productInfo[0], 'colorsInfo' => $productInfo[1],
            'compareItem' => $compareItem];
        $this->getView('admin/product/addProduct', $data, 1, 1);
    }

    function review($product_id)
    {
        $productInfo = $this->model->getProductInfo($product_id);
        $reviews = $this->model->getReviews($product_id);
        $data = ['review' => $reviews, 'productInfo' => $productInfo[0]];
        $this->getView('admin/product/review', $data, 1, 1);
    }

    function addReview($product_id, $review_id = '')
    {
        if (isset($_POST['title'])) {
            $this->model->addReview($_POST, $product_id, $review_id);
        }
        $review = $this->model->getReviewInfo($review_id);
        $productInfo = $this->model->getProductInfo($product_id);
        $data = ['review' => $review, 'productInfo' => $productInfo[0]];
        $this->getView('admin/product/addreview', $data, 1, 1);
    }

    function removeAjaxProduct($id)
    {
        $this->model->removeAjaxProduct($id);
    }

    function removeAjaxReview($id)
    {
        $this->model->removeAjaxReview($id);
    }

    function attributes($id)
    {
        if (isset($_POST['submit'])) {
            $this->model->editAttribute($_POST, $id);
        }
        $attributes = $this->model->getProductAttributes($id);
        $productInfo = $this->model->getProductInfo($id);
        $data = ['attributes' => $attributes, 'productInfo' => $productInfo[0]];
        $this->getView('admin/product/attributes', $data, 1, 1);
    }

    function productGalleryImage($product_id)
    {
        if (isset($_FILES['image'])) {
            $this->model->addGalleryImage($product_id, $_FILES['image']);
        }
        $images = $this->model->getGalleryImage($product_id);
        $productInfo = $this->model->getProductInfo($product_id);
        $data = ['images' => $images, 'productInfo' => $productInfo[0]];
        $this->getView('admin/product/gallery', $data, 1, 1);
    }

    function removeAjaxGalleryImage($image_id)
    {
        $this->model->removeAjaxGalleryImage($image_id);
    }

    function special()
    {
        $specials = $this->model->getSpecial();
        $products = $this->model->getProducts();
        $data = ['specials' => $specials, 'products' => $products];
        $this->getView('admin/product/special', $data, 1, 1);
    }

    function addSpecial()
    {
        $this->model->addSpecial($_POST);
    }
}