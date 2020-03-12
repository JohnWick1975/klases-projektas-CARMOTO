<?php


class Car
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // CarsInfo
    public function carsInfo()
    {
        $this->db->query("SELECT * FROM `cars`");
        return $this->db->resultSet();
    }

    public function selectCars()
    {
        if (isset($_POST['color']) && (isset($_POST['fuel_type']))) {
            $fuel = $_POST['fuel_type'];
            $color = implode("','", $_POST['color']);
            $this->db->query("SELECT * FROM `cars` WHERE color IN ('$color') AND fuel_type IN ('" . implode("','", $fuel) . "')");
        } else {
            $color = isset($_POST['color']) ? $_POST['color'] : array();
            $fuel = isset($_POST['fuel_type']) ? $_POST['fuel_type'] : array();
            $this->db->query("SELECT * FROM `cars` WHERE color IN ('" . implode("','",
                    $color) . "') OR fuel_type IN ('" . implode("','", $fuel) . "')");
        }
        return $this->db->resultSet();

    }

}

