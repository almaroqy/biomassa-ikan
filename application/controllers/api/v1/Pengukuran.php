<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH  . 'core/Api_Controller.php';

class Pengukuran extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Pengukuran_model");
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
        $biota_id = $this->get('biota_id');

        $user_id = $this->get('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($biota_id === null) {
            $this->sendResponse(false, "Biota Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            $pengukuran = $this->Pengukuran_model->getPengukuran($biota_id);

            $this->sendResponse(true, "", $pengukuran, self::HTTP_OK);
        }
    }


    public function index_delete()
    {
        $pengukuran_id = $this->delete('pengukuran_id');

        $user_id = $this->delete('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($pengukuran_id === null) {
            $this->sendResponse(false, "Biota Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            if ($this->Pengukuran_model->deletePengukuran($pengukuran_id) > 0) {

                $this->sendResponse(true, "Data Berhasil Dihapus", [], self::HTTP_OK);
            } else {
                $this->sendResponse(false, "Pengukuran Id Tidak Ditemukan", [], self::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $input['panjang'] = $this->post('panjang');

        $input['bobot'] = $this->post('bobot');

        $input['tanggal_ukur'] = $this->post('tanggal_ukur');

        $input['biota_id'] = $this->post('biota_id');

        $input['user_id'] = $this->post('user_id');

        if ($this->post('user_id') === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {
            if ($this->Pengukuran_model->createPengukuran($input) > 0) {
                $this->sendResponse(true, "Data Berhasil Ditambahkan", [], self::HTTP_CREATED);
            } else {
                $this->sendResponse(false, "Data Gagal Ditambahkan", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $pengukuran_id = $this->put('pengukuran_id');

        $input['panjang'] = $this->put('panjang');

        $input['bobot'] = $this->put('bobot');

        $input['tanggal_ukur'] = $this->put('tanggal_ukur');

        $input['biota_id'] = $this->put('biota_id');

        $input['user_id'] = $this->put('user_id');

        if ($this->put('user_id') === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {
            if ($this->Pengukuran_model->updatePengukuran($pengukuran_id, $input) > 0) {
                $this->sendResponse(true, "Data Berhasil Diubah", [], self::HTTP_OK);
            } else {
                $this->sendResponse(false, "Tidak Ada Perubahan Data", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }
}
