<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_seeder extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function create($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function empty_table($table)
    {
        $this->db->empty_table($table);
    }
}
