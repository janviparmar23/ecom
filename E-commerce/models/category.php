<?php

class categoryModel
{
    private $con;
    public function __construct()
    {
        include 'connection.php';
        $this->con = $conn;
    }
    public function add($data)
    {
        $name = $data['name'];
        $description = $data['description'];
        $parent_id = $data['category'];
        $modifydate = $data['modifydate'];
        $modifydate = date("Y-m-d");
        $pic = $_FILES['image']['name'];
        if ($pic) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . basename($pic));
        }

       // $sql = "INSERT INTO `category`(`Name`, `Description`, `Parent_id`, `Image`,`Modify-date`) VALUES ('$name','$description','$parent_id','$pic','$modifydate')";

$sql="INSERT INTO `category`(`Name`, `Description`, `Parent_id`, `Image`, `Modify-date`) VALUES ('$name','$description','$parent_id','$pic','$modifydate')";

        if (mysqli_query($this->con, $sql)) {
            // echo "data insertted ";
            //header('location: dashboard.php');
            return true;
        } else {
            // echo "error" . mysqli_error($this->con);
            return false;
        }
    }
    public function fetch()
    {
       // $sql = "SELECT `ID`, `Name` ,  `Parent_id`  FROM `category` ";
        $sql = " SELECT A.ID , A.Name , A.Parent_id, B.Name AS parent_name FROM category A LEFT JOIN category B on A.Parent_id = B.ID" ;
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function show($ID)
    {
        $sql = "SELECT * FROM `category` WHERE ID = '$ID'";
        $result = mysqli_query($this->con, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }
    public function delete($ID)
    {
        $sql = "DELETE FROM `category` WHERE ID = '$ID' ";
        if (mysqli_query($this->con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function edit($data)
    {
        $ID = $data['ID'];
        $name = $data['name'];
        $description = $data['description'];
        $parent_id = $data['category'];
        $modifydate = $data['modifydate'];
        $modifydate = date("Y-m-d");
        $pic = $_FILES['image']['name'];
        if ($pic) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . basename($pic));
        }else {
            $pic = $data['old_image'];
        }
        $sql = "UPDATE `category` SET `ID`='$ID',`Name`='$name',`Description`='$description',`Parent_id`='$parent_id',`Image`='$pic',`Modify-date`='$modifydate' WHERE  ID = '$ID' ";
        if (mysqli_query($this->con, $sql)) {
           // header("location: dashboard.php");
            return true;
        } else {
           // echo "error" . mysqli_error($this->con);
            return false;
        }
    }
}
?>