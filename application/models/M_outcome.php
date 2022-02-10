<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_outcome extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key, $category, $user)
    {
        $this->db->select('a.*, b.user_fullname, c.outcome_category_name, d.*');
        $this->db->from('tbl_web_outcome a');
        $this->db->join('tbl_user b', 'a.user_id=b.user_id', 'LEFT');
        $this->db->join('tbl_web_outcome_category c', 'a.outcome_category_id=c.outcome_category_id', 'LEFT');
        $this->db->join('tbl_web_truck d', 'a.truck_id=d.truck_id', 'LEFT');

        if ($category != "") {
            $this->db->where('a.outcome_category_id', $category);
        }

        if ($key != '') {
            $this->db->like("a.outcome_name", $key);
            $this->db->or_like("b.user_fullname", $key);
            $this->db->or_like("c.outcome_category_name", $key);
        }

        if ($user != "") {
            $this->db->where('a.user_id', $user);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.outcome_id', 'DESC');

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
        $this->db->insert('tbl_web_outcome', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_web_outcome', $data, array('outcome_id' => $data['outcome_id']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_web_outcome', array('outcome_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('outcome_id', $id);
        $query = $this->db->get('tbl_web_outcome', 1);
        return $query->result();
    }


    public function getBySlug($slug)
    {
        $this->db->select('a.*, b.field_name, b.user_fullname, c.outcome_category_name');
        $this->db->from('tbl_web_outcome a');
        $this->db->join('tbl_user c', 'a.user_id=b.user_id', 'LEFT');
        $this->db->join('tbl_web_outcome_category ', 'a.outcome_category_id=c.outcome_category_id', 'LEFT');
        $this->db->where('outcome_slug', $slug);
        $query = $this->db->get();
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
