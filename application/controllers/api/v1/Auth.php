<?php

require APPPATH  . 'core/Api_Controller.php';

class Auth extends Api_Controller
{
    protected $exceptions = ['login'];

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function login_post()
    {
        $username = $this->post('username');

        $password = $this->post('password');

        $response = $this->Auth_model->login($username, $password);

        if ($response) {
            $data['status'] = true;

            $data['message'] = 'Login success';

            $data['data'] = $response;

            $this->response($data, Api_Controller::HTTP_OK);
        } else {
            $data['status'] = false;

            $data['message'] = 'Login failed';

            $data['data'] = [];

            $this->response($data, Api_Controller::HTTP_UNAUTHORIZED);
        }
    }
}
