<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH  . 'core/Api_Controller.php';

class Biota extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Biota_model');
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

        $biota_id = $this->get('biota_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($keramba_id === null) {
            $this->sendResponse(false, "Keramba Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {
            if ($biota_id === null) {

                $listBiota = $this->Biota_model->getBiota($keramba_id);

                $this->sendResponse(true, "", $listBiota, self::HTTP_OK);
            } else {

                $biota = $this->Biota_model->getBiota($keramba_id, $biota_id);

                $this->sendResponse(true, "", $biota, self::HTTP_OK);
            }
        }
    }

    public function index_post()
    {
        $user_id = $this->post('user_id');
        
        $data['jenis_biota'] = $this->post('jenis_biota');

        $data['bobot'] = $this->post('bobot');

        $data['panjang'] = $this->post('panjang');

        $data['jumlah_bibit'] = $this->post('jumlah_bibit');

        $data['tanggal_tebar'] = $this->post('tanggal_tebar');

        if ($this->post('tanggal_panen') !== null) {
            $data['tanggal_panen'] = $this->post('tanggal_panen');
        }

        $data['keramba_id'] = $this->post('keramba_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        try {
            $row = $this->Biota_model->createBiota($data);

            if ($row > 0) {
                $this->sendResponse(true, "Biota Berhasil Ditambahkan", [], self::HTTP_CREATED);
            } else {
                $this->sendResponse(false, "Biota Gagal Ditambahkan", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $biota_id = $this->delete('biota_id');

        $user_id = $this->delete('user_id');

        if ($user_id === null) {
            $this->sendResponse(false, "User Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        }

        if ($biota_id === null) {
            $this->sendResponse(false, "Biota Id Tidak Tersedia", [], self::HTTP_BAD_REQUEST);
        } else {

            $row = $this->Biota_model->deleteBiota($biota_id);

            if ($row > 0) {
                $this->sendResponse(true, "Delete Biota Berhasil", [], self::HTTP_OK);
            } else {
                $this->sendResponse(false, "Biota Id Tidak Ditemukan", [], self::HTTP_BAD_REQUEST);
            }
        }
    }


    public function index_put()
    {
        $biota_id = $this->put('biota_id');

        $data['jenis_biota'] = $this->put('jenis_biota');

        $data['bobot'] = $this->put('bobot');

        $data['panjang'] = $this->put('panjang');

        $data['jumlah_bibit'] = $this->put('jumlah_bibit');

        $data['tanggal_tebar'] = $this->put('tanggal_tebar');

        if ($this->put('tanggal_panen') !== null) {
            $data['tanggal_panen'] = $this->put('tanggal_panen');
        }

        $data['keramba_id'] = $this->put('keramba_id');

        try {
            $row = $this->Biota_model->updateBiota($data, $biota_id);

            if ($row > 0) {
                $this->sendResponse(true, "Biota Berhasil Diubah", [], self::HTTP_OK);
            } else {
                $this->sendResponse(false, "Tidak Ada Perubahan Data", [], self::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            $this->sendResponse(false, $e->getMessage(), [], self::HTTP_BAD_REQUEST);
        }
    }
}
