<?php

include_once(__DIR__ . '/../models/category.php');
class category
{
    private $con;
    private $categorymodel;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
        $this->categorymodel = new categoryModel();
    }
    public function addcategory()
    {
        if ($this->categorymodel->add($_POST)) {
            echo "add category successfully!";
        } else {
            echo "Something went wrong!";
        }
    }
    public function fetch_category()
    {
        $data = $this->categorymodel->fetch();
        return $data;

    }
    public function deletecategory($ID)
    {

        if ($this->categorymodel->delete($ID)) {
            echo "delete successfull";
        } else {
            echo "something went wrong ";
        }
    }
    public function showcategory($ID)
    {
        $data = $this->categorymodel->show($ID);
        return $data;
    }
    public function editcategory($ID)
    {
        if ($this->categorymodel->edit($_POST)) {

            echo "succesfull";
           // header("location: index.php?action=category&do=showcategory");
        } else {
            echo "Something went wrong!";
        }
    }
}
?>