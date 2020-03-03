<?php


class Cars extends Controller
{
    public function __construct()
    {
        $this->carModel = $this->model('Car');
    }

    public function cars()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $car = $this->carModel->selectCars();
            $data = [
                'cars'=> $car
            ];
            $this->view('pages/cars', $data);
        } else {
            $car = $this->carModel->carsInfo();
            $data = ['cars' => $car];
            $this->view('pages/cars', $data);
        }
    }


}