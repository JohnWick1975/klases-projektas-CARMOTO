<?php


class Admins extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function admins()
    {
        if ($_SESSION['user_role'] != 'admin') {
            redirect('cars/cars');
        }
        // Get all users info
        $usersInfo = $this->userModel->getAllUsers();

        $data = ['all_users' => $usersInfo];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'all_users' => $usersInfo,
                'get_user' => '',
                'id_err' => '',
                'name_err' => '',
                'email_err' => '',
                'role_err' => '',
                'id' => trim($_POST['id']),
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role']),
            ];
            // If click SELECT
            if (isset($_POST['select'])) {
                // Validate Id
                if (empty($data['id'])) {
                    $data['id_err'] = 'Please enter Id';
                } else {
                    if (!$data['get_user'] = $this->userModel->getUserById($data['id'])) {
                        $data['id_err'] = 'This Id is not exist';
                    }
                }
            }

            // If click UPDATE ver.1.0
            /*if (isset($_POST['update'])){
                // Validate Id
                if (empty($data['id'])){
                    $data['id_err'] = 'Please enter Id';
                }else{
                    if (!$data['get_user'] = $this->userModel->getUserById($data['id'])) {
                        $data['id_err'] = 'This Id is not exist';
                    }
                }
                // Validate user email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }else{
                    // Check email
                    if ($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate user Role
                if ($data['role'] != 'user' && $data['role'] !='admin' ){
                    $data['role_err'] = 'Please enter \'user\' or \'admin\'';
                }

                // Make sure errors are empty
                if (empty($data['id_err']) && empty($data['email_err']) && empty($data['role_err'])){
                    $this->userModel->updateUser($data);
                }else{
                    $this->view('admins/admins', $data);
                }
            }*/

            // If click UPDATE ver.0.2
            /* if (isset($_POST['update'])) {
                 // Validate Id
                 if (empty($data['id'])) {
                     $data['id_err'] = 'Please enter Id';
                 } else {
                     if (!$data['get_user'] = $this->userModel->getUserById($data['id'])) {
                         $data['id_err'] = 'This Id is not exist';
                     }
                 }
                 if (empty($data['id_err'])) {
                     // Validate and update User email
                     if (!empty($data['email'])) {
                         // Validate user Email
                         if ($this->userModel->findUserByEmail($data['email'])) {
                             $data['email_err'] = 'Email is already taken';
                         } else {
                             // Update email
                             $this->userModel->updateEmailById($data);
                         }
                     }

                     //  Update User name
                     if (!empty($data['name'])) {
                         $this->userModel->updateNameById($data);
                     }

                     // Validate and update user Role
                     if (!empty($data['role'])) {
                         if ($data['role'] != 'user' && $data['role'] != 'admin') {
                             $data['role_err'] = 'Please enter \'user\' or \'admin\'';
                         } else {
                             $this->userModel->updateRoleById($data);
                         }
                     }
                 }
             }*/

            // If click UPDATE ver.0.3
            if (isset($_POST['update'])) {
                $array = [];
                // Validate Id
                if (empty($data['id'])) {
                    $data['id_err'] = 'Please enter Id';
                } else {
                    if (!$data['get_user'] = $this->userModel->getUserById($data['id'])) {
                        $data['id_err'] = 'This Id is not exist';
                    }
                }
                if (empty($data['id_err'])) {
                    $array['id'] = $data['id'];
                    // Validate and push User email in array
                    if (!empty($data['email'])) {
                        // Validate user Email
                        if ($this->userModel->findUserByEmail($data['email'])) {
                            $data['email_err'] = 'Email is already taken';
                        } else {
                            // Push email in array
                            $array['email'] = $data['email'];
                        }
                    }
                    //  Push User Name to array
                    if (!empty($data['name'])) {
                        $array['name'] = $data['name'];
                    }
                    // Validate and push user Role in array
                    if (!empty($data['role'])) {
                        if ($data['role'] != 'user' && $data['role'] != 'admin') {
                            $data['role_err'] = 'Please enter \'user\' or \'admin\'';
                        } else {
                            $array['role'] = $data['role'];
                        }
                    }
                    $this->userModel->updateUserArray($array);
                }
            }


            // If click DELETE
            if (isset($_POST['delete'])) {
                // Validate Id
                if (empty($data['id'])) {
                    $data['id_err'] = 'Please enter Id';
                } elseif (!$data['get_user'] = $this->userModel->getUserById($data['id'])) {
                    $data['id_err'] = 'This Id is not exist';
                } else {
                    $this->userModel->deleteUserById($data);
                }
            }
        }



        // Diagram users, admins
        $result = $this->userModel->getUsersByRole();
        $usersAmount = count($result);
        $user = 0;
        $admin = 0;
        $data['users_amount'] = $usersAmount;
        foreach ($result as $value) {
            if ($value->role == 'user') {
                $user++;
            } else {
                $admin++;
            }
        }
        $userProc = round((100 * $user) / $usersAmount);
        $adminProc = round((100 * $admin) / $usersAmount);
        $data['user'] = $user;
        $data['admin'] = $admin;
        $data['user_proc'] = $userProc . '%';
        $data['admin_proc'] = $adminProc . '%';

        $this->view('admins/admins', $data);
    }

}