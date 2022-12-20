<?php

class bannerModel
{
    private $con;
    public function __construct()
    {
        include_once __DIR__ . '/../connection.php';
        $this->con = $conn;
    }

    public function show()
    {
        $sql = "SELECT `ID`, `Image_name` FROM `banner` WHERE `Type`= 'banner' limit 2";
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

}
?>