<?php


class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Register User
    public function register($data)
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUE (:name, :email, :password)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
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
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Get all users

    public function getAllUsers()
    {
        $this->db->query('SELECT id, name, email, role FROM users ');
        return $this->db->resultSet();
    }

    // Get user by Id
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');

        // Bind value

        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    // Update user by Id
    public function updateUser($data)
    {
        $this->db->query('UPDATE `users` SET `name`= :name,`email`= :email,`role`= :role WHERE `id`= :id');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update User with array
    // Update user by Id
    public function updateUserArray($array)
    {
        $comma = ' ';
        $id = $array['id'];
        unset($array['id']);

        if (count($array) > 1) {
            $comma = ',';
        }
        $string = '';
        foreach ($array as $key => $value) {
            $string .= ('`' . $key . '`' . ' = ' . '\'' . $value . '\'' . $comma);
        }
        $string = substr($string, 0, -1);
        $this->db->query("UPDATE `users` SET $string WHERE `id`= $id");

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update user Name by Id

    public function updateNameById($data)
    {
        $this->db->query('UPDATE `users` SET `name`= :name WHERE `id`= :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id', $data['id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update user Email by Id

    public function updateEmailById($data)
    {
        $this->db->query('UPDATE `users` SET `email`= :email WHERE `id`= :id');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id', $data['id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update user Role by Id

    public function updateRoleById($data)
    {
        $this->db->query('UPDATE `users` SET `role`= :role WHERE `id`= :id');
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':id', $data['id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUserById($data)
    {
        $this->db->query('DELETE FROM `users` WHERE `id`= :id');
        $this->db->bind(':id', $data['id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsersByRole()
    {
        $this->db->query('SELECT role FROM users ');
        return $this->db->resultSet();
    }
}