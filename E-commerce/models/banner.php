<?php

class bannerModel
{
    private $con;
    public function __construct()
    {
        include_once 'connection.php';
        $this->con = $conn;
    }
    public function add($data)
    {
        $type = $data['type'];
        $images = [];
        foreach ($_FILES['files']['name'] as $key => $file) {
            $pic = $file;
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            move_uploaded_file($tmp_name, 'images/' . basename($pic));
            $images[] = $pic;
        }
        $images_str = "('" . implode("','$type'),('", $images) . "','$type')";
       
        $sql = "INSERT INTO `banner`(`Image_name`, `Type`) VALUES $images_str ";
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function show()
    {
        $sql = "SELECT `ID`, `Image_name` FROM `banner` WHERE `Type`= 'banner' ";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function showslider()
    {
        $sql = "SELECT `ID`, `Image_name` FROM `banner` WHERE `Type`= 'slider' ";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function delete($ID)
    {
        $sql = "DELETE FROM `banner` WHERE ID = '$ID' ";
        if (mysqli_query($this->con, $sql)) {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>