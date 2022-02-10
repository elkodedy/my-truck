<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Income_category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_income_category');
        if (!($this->session->userdata('user_id'))) {
            // if (!$this->session->userdata('user_id') or $this->session->userdata('user_group') != 1) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('admin/dashboard');
        }
    }


    public function index()
    {
        $this->session->unset_userdata('sess_search_income_category');

        // PAGINATION
        $baseUrl    = base_url() . "admin/income_category/index/";
        $totalRows  = count((array) $this->m_income_category->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Jenis Pemasukkan';
        $data['income_category'] = $this->m_income_category->read($perPage, $page, '');

        // TEMPLATE
        $view         = "_backend/income/income_category";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_income_category', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_income_category');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/income_category/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_income_category->read('', '', $data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Jenis Pemasukkan';
        $data['income_category'] = $this->m_income_category->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "_backend/income/income_category";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();
        // POST
        $data['income_category_id']   = '';
        $data['income_category_name'] = $this->input->post('income_category_name');
        $data['income_category_desc'] = $this->input->post('income_category_desc');
        // $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_income_category->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data Jenis Pemasukkan " . $data['income_category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data Jenis Pemasukkan " . $data['income_category_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/income_category');
    }


    public function update()
    {
        csrfValidate();
        // POST
        $data['income_category_id']   = $this->input->post('income_category_id');
        $data['income_category_name'] = $this->input->post('income_category_name');
        $data['income_category_desc'] = $this->input->post('income_category_desc');
        $this->m_income_category->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data Jenis Pemasukkan dengan ID = " . $data['income_category_id'] . " - " . $data['income_category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data Jenis Pemasukkan : " . $data['income_category_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/income_category');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_income_category->delete($this->input->post('income_category_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data Jenis Pemasukkan dengan ID = " . $this->input->post('income_category_id') . " - " . $this->input->post('income_category_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data Jenis Pemasukkan : " . $this->input->post('income_category_name');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/income_category');
    }
}
