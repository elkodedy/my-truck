<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_buku_klasifikasi extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('*');
        $this->db->from('tbl_web_buku_klasifikasi');

        if ($key != '') {
            $this->db->like("buku_klasifikasi_nama", $key);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function create($data)
    {
        $this->db->insert('tbl_web_buku_klasifikasi', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_web_buku_klasifikasi', $data, array('buku_klasifikasi_id' => $data['buku_klasifikasi_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_web_buku_klasifikasi', array('buku_klasifikasi_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('buku_klasifikasi_id', $id);
        $query = $this->db->get('tbl_web_buku_klasifikasi', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
