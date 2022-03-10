<?php
class Pakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pakan');
        $this->load->view('lib/header');
    }

    public function index()
    {
        $data['pakan'] = $this->m_pakan->tampil_data()->result();
        $this->load->view('user/pakan', $data);
        $this->load->view('lib/footer');
    }

    public function hapus($pakan_id)

    {
        $where = array('pakan_id' => $pakan_id);
        $this->m_pakan->hapus_data($where, 'pakan');
        redirect('pakan');
        $this->load->view('lib/footer');
    }

    public function edit($pakan_id)
    {
        $where = array('pakan_id' => $pakan_id);
        $data['pakan'] = $this->m_pakan->edit_data($where, 'pakan')->result();
        $this->load->view('user/ubah_pakan', $data);
        $this->load->view('lib/footer');
    }

    public function update()
    {
        $data = [
            'jenis_pakan' => htmlspecialchars($this->input->post('nama-pak', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'user_id' => htmlspecialchars($this->input->post('id-user-pakan', true))
            ];

        $where = array(
            'pakan_id' => htmlspecialchars($this->input->post('pak-id', true))
        );

        $this->m_pakan->update_data($where, $data, 'pakan');
        redirect('pakan');
        $this->load->view('lib/footer');
    }
}
