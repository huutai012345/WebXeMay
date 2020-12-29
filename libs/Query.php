<?php

require_once("DbConnection.php");

class Query
{
    protected $model;

    public function __construct()
    {
        $this->model = new DbConnection();
    }

    //Product

    public function getProduct($id)
    {
        $this->model->setModel("products");
        $result = $this->model->buildQueryParams(["where" => "id = $id",])->select();
        return $result;
    }

    public function loadProduct($num)
    {
        $this->model->setModel("products");
        return $this->model->buildQueryParams([
            "other" => "ORDER BY id DESC LIMIT $num"
        ])->select();
    }

    public function loadAllProduct()
    {
        $this->model->setModel("products");
        return $this->model->buildQueryParams([])->select();
    }

    public function loadAllProductByCategory($idCate)
    {
        $this->model->setModel("products");
        return $this->model->buildQueryParams([
            "where" => "idCate =$idCate"
        ])->select();
    }

    public function loadProductByCategory($idCate, $num)
    {
        $this->model->setModel("products");
        return $this->model->buildQueryParams([
            "where" => "idCate =$idCate",
            "other" => "LIMIT $num"
        ])->select();
    }

    public function insertProduct($name, $description, $price, $amount, $idCate, $img)
    {
        $this->model->setModel("products");
        return $this->model->buildQueryParams([
            "field" => "(name,price,amount,description,idCate,img) VALUES (?,?,?,?,?,?)",
            "value" => [$name, $price, $amount, $description, $idCate, $img]
        ])->insert();
    }

    public function updateProduct($id, $name, $description, $price, $amount, $idCate, $img)
    {
        $this->model->setModel("products");
        return $this->model->buildQueryParams([
            "value" => "name  = '$name' , price = '$price', amount = '$amount', description = '$description',idCate='$idCate',img='$img'",
            "where" => "id  = $id"
        ])->update();
    }

    public function updateAmountProduct($id)
    {
        $this->model->setModel("products");
        return $this->model->buildQueryParams([
            "value" => "amount -= 1 ",
            "where" => "id  = $id"
        ])->update();
    }

    public function deleteProduct($id)
    {
        $this->model->setModel("products");
        return $this->model->buildQueryParams([
            "where" => "id = $id"
        ])->delete();
    }

    //Cate

    public function loadAllCategory()
    {
        $model = new DbConnection();
        $model->setModel("categories");
        return $model->buildQueryParams([])->select();
    }

    public function getCate($id)
    {
        $this->model = new DbConnection();
        $this->model->setModel("categories");
        $result = $this->model->buildQueryParams(["where" => "id = $id",])->select();
        return $result;
    }

    public function insertCate($name, $description)
    {
        $this->model->setModel("categories");
        return $this->model->buildQueryParams([
            "field" => "(name,description) VALUES (?,?)",
            "value" => [$name, $description]
        ])->insert();
    }

    public function updateCate($id, $name, $description)
    {
        $this->model->setModel("categories");
        return $this->model->buildQueryParams([
            "value" => "name  = '$name' , description = '$description'",
            "where" => "id  = $id"
        ])->update();
    }

    public function checkDeleteCate($idCate)
    {
        $this->model->setModel("products");
        $result = $this->model->buildQueryParams([
            "where" => "idCate = $idCate"
        ])->select();

        if ($result) {
            return false;
        }
        return true;
    }

    public function deleteCate($id)
    {
        $this->model->setModel("categories");
        return $this->model->buildQueryParams([
            "where" => "id = $id"
        ])->delete();
    }

    //User

    public function getUser($id)
    {
        $this->model->setModel("users");
        $result = $this->model->buildQueryParams(["where" => "id = $id",])->select();
        return $result;
    }

    public function login($email, $pass)
    {
        $this->model->setModel("users");
        $result = $this->model->buildQueryParams([
            "where" => "email = '$email' and password='$pass' "
        ])->select();

        if ($result) {
            return $result[0];
        } else {
            return NULL;
        }
    }

    public function loadAllUser()
    {
        $this->model->setModel("users");
        return $this->model->buildQueryParams([])->select();
    }

    public function insertUser($firstName, $lastName, $phone, $address, $email, $role, $pass)
    {
        $this->model->setModel("users");
        return $this->model->buildQueryParams([
            "field" => "(first_name,last_name,phone,address,email, role, password) VALUES (?,?,?,?,?,?,?)",
            "value" => [$firstName, $lastName, $phone, $address, $email, $role, $pass]
        ])->insert();
    }

    public function updateUser($id, $firstName, $lastName, $phone, $address, $email, $role)
    {
        $this->model->setModel("users");
        return $this->model->buildQueryParams([
            "value" => "fist_name  = '$firstName' ,last_name  = '$lastName' 
                        , phone = '$phone', address = '$address'
                        , email = '$email',role='$role'",
            "where" => "id  = $id"
        ])->update();
    }

    public function deleteUser($id)
    {
        $this->model->setModel("users");
        return $this->model->buildQueryParams([
            "where" => "id = $id"
        ])->delete();
    }
}
