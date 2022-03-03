<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH  . 'core/Api_Controller.php';

class Keramba extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keramba_model');
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

        if ($keramba_id === null) {
            $keramba = $this->Keramba_model->getAllKeramba($user_id);

            $this->sendResponse(true, "", $keramba, self::HTTP_OK);
        } else {
            $keramba = $this->Keramba_model->getAllKeramba($user_id, $keramba_id);

            $this->sendResponse(true, "", $keramba, self::HTTP_OK);
        }
    }

    public function index_delete()
    {
        $keramba_id = $this->delete('keramba_id');

        $user_id = $this->delete('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($keramba_id === null) {
            $this->sendResponse(false, "Keramba Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($this->Keramba_model->deleteKeramba($keramba_id) > 0) {
            $this->sendResponse(true, "Delete Keramba Berhasil", [], self::HTTP_OK);
        } else {
            $this->sendResponse(false, "Keramba Id Tidak Ditemukan", [], self::HTTP_BAD_REQUEST);
        }
    }

    public function index_post()
    {
        $input['nama'] = $this->post('nama');

        $input['ukuran'] = $this->post('ukuran');

        $input['tanggal_install'] = $this->post('tanggal_install');

        $input['user_id'] = $this->post('user_id');

        if ($this->post('user_id') === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {

            if ($this->Keramba_model->createKeramba($input) > 0) {

                $this->sendResponse(true, "Keramba Berhasil Ditambahkan", [], self::HTTP_CREATED);
            } else {
                $this->sendResponse(false, "Keramba Gagal Ditambahkan", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $keramba_id = $this->put('keramba_id');

        $input['nama'] = $this->put('nama');

        $input['ukuran'] = $this->put('ukuran');

        $input['tanggal_install'] = $this->put('tanggal_install');

        $input['user_id'] = $this->put('user_id');

        if ($this->put('user_id') === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {

            $res = $this->Keramba_model->updateKeramba($input, $keramba_id);

            if ($res > 0) {
                $this->sendResponse(true, "Keramba Berhasil Diubah", [], self::HTTP_OK);
            } else {
                $this->sendResponse(false, "Tidak Ada Perubahan Data", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }
}
