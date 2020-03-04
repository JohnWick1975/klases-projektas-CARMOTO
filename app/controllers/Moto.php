<?php


class Moto extends Controller
{
    public function __construct()
    {
        $this->motoModel = $this->model('Mot');
    }

    public function moto()
    {

        if (!isLoggedIn()) {
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $moto = $this->motoModel->selectMoto();
            $data = [
                'moto'=> $moto
            ];
            $this->view('pages/moto', $data);
        } else {
            $moto = $this->motoModel->motoInfo();
            $data = ['moto' => $moto];
            $this->view('pages/moto', $data);
        }
    }
}