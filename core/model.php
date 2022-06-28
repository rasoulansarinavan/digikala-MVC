<?php

class Model
{
    public static $conn = '';
    public $serverName = SERVERNAME;
    public $userName = USERNAME;
    public $password = PASSWORD;
    public $dbName = DBNAME;

    function __construct()
    {
        $servername = $this->serverName;
        $username = $this->userName;
        $password = $this->password;
        $dbname = $this->dbName;
        $farsi = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $farsi);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (function_exists('jdate') == false) {
            require('public/assets/jdf/jdf.php');
        }
    }


    function doSelect($sql, $values = [], $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {

            $stmt->bindValue($key + 1, $value);
        }

        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchStyle);
        } else {
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    }

// fetch = $this->doSelect($query,[],1)
// []=values
// fetchAll = $this->doSelect($query)

    function doQuery($sql, $values = [])
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
    }

    public static function getOptions()
    {
        $query = "select * from tbl_options ";
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $options_new = [];
        foreach ($result as $option) {
            $setting = $option['setting'];
            $value = $option['value'];
            $options_new[$setting] = $value;
        }
        return $options_new;
    }

    function calculateDiscount($price, $discount)
    {
        $price_discount = ($price * $discount) / 100;
        return $price - $price_discount;
    }

    function create_thumbnail($file, $pathtosave = '', $w = '', $h = '', $crop = 'FALSE')
    {
        $new_height = $h;
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);
        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);
                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }
        if ($new_height != '') {
            $newheight = $new_height;
        }
        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathtosave, 95);//pish farz tabe 75 darsad guality ast
        return $dst;
    }

    public static function sessionInit()
    {
        @session_start();
    }

    public static function sessionSet($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    public static function setBasketCookie()
    {
        if (isset($_COOKIE['basket'])) {
            $cookie = $_COOKIE['basket'];
        } else {
            $value = time();
            $expire = time() + 7 * 24 * 3600;
            setcookie('basket', $value, $expire, '/');
            $cookie = $value;
        }
        return $cookie;
    }

    function getBasket()
    {
        $cookie = Model::setBasketCookie();
        $query = "select tbl_product.* ,
       tbl_basket.number,tbl_basket.id as basket_id ,
       tbl_colors.title as colorTitle ,
       tbl_colors.hex_code,
       tbl_guarantee.title as guaranteeTitle
         from tbl_basket 
         left join  tbl_product on tbl_basket.product_id=tbl_product.id
         left join  tbl_colors on tbl_basket.color_id=tbl_colors.id
         left join  tbl_guarantee on tbl_basket.guarantee_id=tbl_guarantee.id
         where tbl_basket.cookie=? ";
        $param = [$cookie];
        $basketItems = $this->doSelect($query, $param);
        /*====== calculate total price =====*/
        $totalPrice = 0;
        $totalDiscount = 0;
        $totalNumber = 0;
        foreach ($basketItems as $item) {
            $price = $item['price'];
            $number = $item['number'];
            $discount = $item['discount'];
            $itemDiscount = ($number * $price * $discount) / 100;

            $totalDiscount = $totalDiscount + $itemDiscount;


            $itemPrice = $price * $number;
            $totalPrice = $totalPrice + $itemPrice;

            $totalNumber = $totalNumber + $number;
        }

        return [$basketItems, $totalPrice, $totalDiscount, $totalNumber];
    }

    public static function getBasketInfo()
    {
        $cookie = Model::setBasketCookie();
        $query = "select tbl_product.* ,
       tbl_basket.number,tbl_basket.id as basket_id ,
       tbl_colors.title as colorTitle ,
       tbl_colors.hex_code,
       tbl_guarantee.title as guaranteeTitle
         from tbl_basket 
         left join  tbl_product on tbl_basket.product_id=tbl_product.id
         left join  tbl_colors on tbl_basket.color_id=tbl_colors.id
         left join  tbl_guarantee on tbl_basket.guarantee_id=tbl_guarantee.id
         where tbl_basket.cookie=? ";
        $param = [$cookie];
        $basketItems = (new Model)->doSelect($query, $param);
        /*====== calculate total price =====*/
        $totalPrice = 0;
        $totalDiscount = 0;
        $totalNumber = 0;
        foreach ($basketItems as $item) {
            $price = $item['price'];
            $number = $item['number'];
            $discount = $item['discount'];
            $itemDiscount = ($number * $price * $discount) / 100;
            $totalDiscount = $totalDiscount + $itemDiscount;


            $itemPrice = $price * $number;
            $totalPrice = $totalPrice + $itemPrice;
            $totalNumber = $totalNumber + $number;
        }

        return [$basketItems, $totalPrice, $totalDiscount, $totalNumber];
    }

    function getUserInfo()
    {
        self::sessionInit();
        $user_id = self::sessionGet('user_id');
        $query = "select * from tbl_users where id=?";
        $param = [$user_id];
        return $this->doSelect($query, $param, 1);
    }

    public static function shamsi($time)
    {
        $now = jdate('j F Y');
        $shamsiDate = jdate('j F Y', $time);
        $format1 = jdate('j F Y // G:i', $time);

        return [$shamsiDate, $now, $format1];
    }

    function getOrderInfo($order_id)
    {
        $query = "select * from tbl_order where id=?";
        $param = [$order_id];
        $order = $this->doSelect($query, $param, 1);
        $order_date = $order['order_date'];
        $order_date = self::shamsi($order_date);
        $order['order_date'] = $order_date[0];

        $basket = unserialize($order['basket']);
        $order['basket'] = $basket;

        $address = unserialize($order['address']);
        $order['address'] = $address;


        return $order;
    }

    function checkUserLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select * from tbl_users where email=? and password=?";
        $param = [$email, $password];
        $user = $this->doSelect($query, $param, 1);

        if ($user != '') {
            Model::sessionInit();
            Model::sessionSet('user_id', $user['id']);
        }
    }

    public static function getUserLevel()
    {
        Model::sessionInit();
        $user_id = Model::sessionGet('user_id');

        $query = "select * from tbl_users where id=?";
        $param = [$user_id];
        $user = (new Model)->doSelect($query, $param, 1);
        return $user['level'];
    }

    function getUsers()
    {
        $query = "select * from tbl_users order by id desc ";
        return $this->doSelect($query);
    }

    function search()
    {
        $title = $_POST['title'];
        if (strlen($title) > 3) {
            $query = 'select id,title,price from tbl_product where title like "%' . $title . '%"';
            $result = $this->doSelect($query);
            if (sizeof($result) > 0) {
                return $result;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    function getSpecial()
    {
        $time = time();
        $query = " select * from tbl_product where special=1 and time_start<" . $time . " and time_end >" . $time . " ";

        $result = $this->doSelect($query);

        foreach ($result as $key => $row) {
            $price_total = $this->calculateDiscount($row['price'], $row['discount']);
            $time_special = $row['time_end'];
            date_default_timezone_set('Asia/Tehran');

            $date = date('Y/m/d H:i:s', $time_special);
            $result[$key]['time_special'] = $date;
            $result[$key]['price_total'] = $price_total;
        }
        return $result;
    }
}