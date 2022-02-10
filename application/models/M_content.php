<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_content extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function update($data)
    {
        $this->db->update('tbl_web_content', $data, array('content_id' => $data['content_id']));
    }

    public function get($id)
    {
        $this->db->where('content_menu', $id);
        $query = $this->db->get('tbl_web_content', 1);
        return $query->result();
    }


    public function widget()
    {
        $query  = $this->db->query(" SELECT
            (SELECT count(truck_id) FROM tbl_web_truck) as total_truck,
            (SELECT count(asset_id) FROM tbl_web_asset) as total_asset
        ");
        return $query->result();
    }

    public function income()
    {
        $this->db->select_sum('a.income_price');
        $this->db->select('a.truck_id, b.truck_name');
        $this->db->from('tbl_web_income a');
        $this->db->join('tbl_web_truck b', 'a.truck_id=b.truck_id', 'LEFT');
        $this->db->group_by('a.truck_id', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function outcome()
    {
        $this->db->select_sum('a.outcome_price');
        $this->db->select('a.truck_id, b.truck_name');
        $this->db->from('tbl_web_outcome a');
        $this->db->join('tbl_web_truck b', 'a.truck_id=b.truck_id', 'LEFT');
        $this->db->group_by('a.truck_id', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    function __destruct()
    {
        $this->db->close();
    }
}
