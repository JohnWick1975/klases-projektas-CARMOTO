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
}

