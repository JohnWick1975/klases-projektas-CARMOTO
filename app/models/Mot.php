<?php


class Mot
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // CarsInfo
    public function motoInfo()
    {
        $this->db->query("SELECT * FROM `moto`");
        return $this->db->resultSet();
    }

    public function selectMoto()
    {
        if (isset($_POST['color']) && (isset($_POST['fuel_type']))) {
            $fuel = $_POST['fuel_type'];
            $color = $_POST['color'];
            $this->db->query("SELECT * FROM `moto` WHERE color IN ('" . implode("','",
                    $color) . "') AND fuel_type IN ('" . implode("','", $fuel) . "')");
        } else {
            $color = isset($_POST['color']) ? $_POST['color'] : array();
            $fuel = isset($_POST['fuel_type']) ? $_POST['fuel_type'] : array();
            $this->db->query("SELECT * FROM `moto` WHERE color IN ('" . implode("','",
                    $color) . "') OR fuel_type IN ('" . implode("','", $fuel) . "')");
        }
        return $this->db->resultSet();

    }
}