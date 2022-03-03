<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH  . 'core/Api_Controller.php';

class Pakan extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Pakan_model");
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
        $pakan_id = $this->get('pakan_id');

        $user_id = $this->get('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($pakan_id === null) {
            $listPakan = $this->Pakan_model->getPakan($user_id);

            $this->sendResponse(true, "", $listPakan, self::HTTP_OK);
        } else {
            $pakan = $this->Pakan_model->getPakan($user_id, $pakan_id);

            $this->sendResponse(true, "", $pakan, self::HTTP_OK);
        }
    }

    public function index_post()
    {
        $input['jenis_pakan'] = $this->post('jenis_pakan');

        $input['deskripsi'] = $this->post('deskripsi');

        $input['user_id'] = $this->post('user_id');

        if ($this->post('user_id') === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {
            if ($this->Pakan_model->createPakan($input) > 0) {
                $this->sendResponse(true, "Pakan Berhasil Ditambahkan", [], self::HTTP_CREATED);
            } else {
                $this->sendResponse(false, "Pakan Gagal Ditambahkan", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete()
    {
        $pakan_id = $this->delete('pakan_id');

        $user_id = $this->delete('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($pakan_id === null) {
            $this->sendResponse(false, "Pakan Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($this->Pakan_model->deletePakan($pakan_id) > 0){
            $this->sendResponse(true, "Delete Pakan Berhasil", [], self::HTTP_OK);
        } else {
            $this->sendResponse(false, "Pakan Id Tidak Ditemukan", [], self::HTTP_BAD_REQUEST);
        }

    }

    public function index_put()
    {
        $pakan_id = $this->put('pakan_id');

        $input['jenis_pakan'] = $this->put('jenis_pakan');

        $input['deskripsi'] = $this->put('deskripsi');

        $input['user_id'] = $this->put('user_id');

        if ($this->put('user_id') === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {
            if ($this->Pakan_model->updatePakan($pakan_id, $input) > 0) {
                $this->sendResponse(true, "Pakan Berhasil Diubah", [], self::HTTP_OK);
            } else {
                $this->sendResponse(false, "Tidak Ada Perubahan Data", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }
}
