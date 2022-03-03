<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH  . 'core/Api_Controller.php';

class Panen extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Panen_model');
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
        $keramba_id = $this->get('keramba_id');

        $user_id = $this->get('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($keramba_id === null) {
            $this->sendResponse(false, "Keramba Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            $listPanen = $this->Panen_model->getPanen($keramba_id);

            $this->sendResponse(true, "", $listPanen, self::HTTP_OK);
        }
    }

    public function index_post()
    {
        $input['user_id'] = $this->post('user_id');

        $input['tanggal_panen'] = $this->post('tanggal_panen');

        $input['bobot'] = $this->post('bobot');

        $input['panjang'] = $this->post('panjang');

        $input['jumlah_hidup'] = $this->post('jumlah_hidup');

        $input['jumlah_mati'] = $this->post('jumlah_mati');

        $input['biota_id'] = $this->post('biota_id');

        $input['keramba_id'] = $this->post('keramba_id');

        if ($this->post('user_id') === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {
            if ($this->Panen_model->createPanen($input) == true) {
                $this->sendResponse(true, "Panen Berhasil Ditambahkan", [], self::HTTP_CREATED);
            } else {
                $this->sendResponse(false, "Panen Gagal Ditambahkan", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }
}
