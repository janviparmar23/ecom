<?php

include_once(__DIR__.'/../models/banner.php');
class banner
{
    private $bannermodel;
    public function __construct()
    {
        $this->bannermodel = new bannerModel();
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

}
?>