<?php


class About
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    // Register user
    public function userRegister($data)
    {
        $this->db->query('INSERT INTO about (name, email) VALUE (:name, :email)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);

        // Execute
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        // Bind value

        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}
