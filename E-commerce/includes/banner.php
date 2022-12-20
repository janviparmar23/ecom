<?php

include_once(__DIR__.'/../models/banner.php');
class banner
{
    private $bannermodel;
    public function __construct()
    {
        $this->bannermodel = new bannerModel();
    }
    public function addbanner()
    {
        if ($this->bannermodel->add($_POST)) {
            echo "successfully!";
        } else {
            echo "Something went wrong!";
        }
    }
    public function show()
    {
        $data = $this->bannermodel->show();
        return $data;
    }

    public function slider()
    {
        $data = $this->bannermodel->showslider();
        return $data;
    }

    public function deletebanner($ID)
    {
       
        if ($this->bannermodel->delete($ID)) {
            echo "delete
             successfull";
        } else {
            echo "something went wrong ";
        }
    }

}

?>