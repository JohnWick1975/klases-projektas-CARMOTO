<?php


class Random
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function randomInfoUrl()
    {
        $this->db->query("SELECT `img_url` FROM `random` ORDER BY RAND() LIMIT 1");
        return  $this->db->single();
    }

    public function randomInfoText()
    {
        $this->db->query("SELECT `text` FROM `random` ORDER BY RAND() LIMIT 1");
        return  $this->db->single();
    }

}