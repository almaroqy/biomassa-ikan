<?php
class Export_model extends CI_Model
{
    public function getKerambaInfo($kerambaId)
    {
        $this->db->select('nama, ukuran, tanggal_install');
        $this->db->from('keramba');
        $this->db->where('keramba_id', $kerambaId);
        return $this->db->get()->row_array();
    }

    public function getPanenList($kerambaId)
    {
        $query = $this->db->query('SELECT b.jenis_biota, p.panjang, p.bobot, p.jumlah_hidup, p.jumlah_mati, p.tanggal_panen, b.tanggal_tebar FROM panen p LEFT JOIN biota b
        ON p.biota_id = b.biota_id
        WHERE p.keramba_id=' . $kerambaId .
            ' ORDER BY p.tanggal_panen');

        return $query->result_array();
    }

    public function getMinTanggalTebar($kerambaId)
    {
        $query = $this->db->query('SELECT MIN(b.tanggal_tebar) AS mTanggal FROM panen p LEFT JOIN biota b
        ON p.biota_id = b.biota_id
        WHERE p.keramba_id=' . $kerambaId);

        $row = $query->row();

        return $row->mTanggal;
    }

    public function getMaxTanggalPanen($kerambaId)
    {
        $query = $this->db->query('SELECT MAX(p.tanggal_panen) AS mTanggal FROM panen p LEFT JOIN biota b
        ON p.biota_id = b.biota_id
        WHERE p.keramba_id=' . $kerambaId);

        $row = $query->row();

        return $row->mTanggal;
    }

    public function getBiotaFeeding($start, $end, $kerambaId)
    {
        $query = $this->db->query('SELECT f.tanggal_feeding, d.jam_feeding, d.ukuran_tebar, p.jenis_pakan FROM feeding f INNER JOIN detail_feeding d
        ON f.activity_id = d.activity_id
        INNER JOIN pakan p
        ON d.pakan_id = p.pakan_id
        WHERE f.keramba_id =' . $kerambaId . ' AND f.tanggal_feeding BETWEEN ' . $this->db->escape($start) . ' AND ' . $this->db->escape($end) . ' ORDER BY f.tanggal_feeding, d.jam_feeding');

        return $query->result_array();
    }

    public function getBiotaData($kerambaId)
    {
        $query = $this->db->query('SELECT b.jenis_biota, pp.panjang, pp.bobot, pp.tanggal_ukur FROM panen p LEFT JOIN biota b
        ON p.biota_id = b.biota_id
        INNER JOIN pengukuran pp
        ON b.biota_id = pp.biota_id
        WHERE p.keramba_id=' . $kerambaId .
            ' ORDER BY pp.tanggal_ukur;');

        return $query->result_array();
    }
}