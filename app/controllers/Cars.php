<?php


class Cars extends Controller
{
   public function __construct()
   {
        $this->carModel = $this->model('Car');
   }

   public function cars()
   {
       $car = $this->carModel->carsInfo();
       $data=['cars'=>$car];
       $this->view('pages/cars', $data);
   }



}