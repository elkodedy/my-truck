<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_asset extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $category)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_web_asset a');

        if ($category != "") {
            $this->db->where('a.asset_category_id', $category);
        }

        if ($key != '') {
            $this->db->like("a.asset_name", $key);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.asset_id', 'DESC');

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
        $this->db->insert('tbl_web_asset', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_web_asset', $data, array('asset_id' => $data['asset_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_web_asset', array('asset_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('asset_id', $id);
        $query = $this->db->get('tbl_web_asset', 1);
        return $query->result();
    }


    public function getBySlug($slug)
    {
        $this->db->select('a.*, b.field_name, b.user_fullname, c.asset_category_name');
        $this->db->from('tbl_web_asset a');
        $this->db->join('tbl_user c', 'a.user_id=b.user_id', 'LEFT');
        $this->db->join('tbl_web_asset_category ', 'a.asset_category_id=c.asset_category_id', 'LEFT');
        $this->db->where('asset_slug', $slug);
        $query = $this->db->get();
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
