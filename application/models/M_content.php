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
            (SELECT count(asset_id) FROM tbl_web_asset) as total_asset,
            (SELECT sum(truck_base_modal) FROM tbl_web_truck) as total_modal
        ");
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
