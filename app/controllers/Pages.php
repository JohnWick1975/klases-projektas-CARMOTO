<?php


class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        $data = [
            'title' => 'Brad Traversy MVC framework',
            'description' => 'Simple social network built on the Traversy MVC PHP framework'
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {

        $this->userAbout = $this->model('About');

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'name_err' => '',
                'email_err' => '',
            ];
            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if ($this->userAbout->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }
            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            //Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err'])) {

                // Register user
                if ($this->userAbout->userRegister($data)) {
                    redirect('pages/index');
                } else {
                    die('Something went wrong');
                }

            } else {
                // Load view with errors
                $this->view('pages/about', $data);
            }
        } else {
            // Load form
            $data = [
                'name' => '',
                'email' => '',
                'name_err' => '',
                'email_err' => '',
            ];

            // Load view
            $this->view('pages/about', $data);
        }
    }

    public function random()
    {


        $this->randomModel = $this->model('Random');

        $imgUrl = $this->randomModel->randomInfoUrl()->img_url;
        $text = $this->randomModel->randomInfoText()->text;
        $data = [
            'img_url' => $imgUrl,
            'text' => $text
        ];

        $this->view('pages/random', $data);

    }
}