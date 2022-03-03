<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH  . 'core/Api_Controller.php';

class History extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('History_model');
    }

    private function sendResponse($status, $message, $input_data, $response_code)
    {
        $data['status'] = $status;

        $data['message'] = $message;

        $data['data'] = $input_data;

        $this->response($data, $response_code);
    }

    public function index_get()
    {
        $user_id = $this->get('user_id');

        $keramba_id = $this->get('keramba_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($keramba_id == null){
            $this->sendResponse(false, "Keramba Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            $list_history = $this->History_model->getHistoryBiota($keramba_id);

            $this->sendResponse(true, "", $list_history, self::HTTP_OK);
        }

    }
}