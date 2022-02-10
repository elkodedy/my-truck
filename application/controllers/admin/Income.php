<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Income extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_income');
        $this->load->model('m_income_category');
        $this->load->model('m_truck');
        $this->load->library('upload');

        if (!($this->session->userdata('user_id'))) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('auth');
        }
    }


    public function index()
    {
        $this->session->unset_userdata('sess_search_income');

        $user = '';
        if ($this->session->userdata('user_group') == 3)
            $user = $this->session->userdata('user_id');

        // PAGINATION
        $baseUrl    = base_url() . "admin/income/index/";
        $totalRows  = count((array) $this->m_income->read('', '', '', '', $user));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Pemasukkan';
        $data['income']    = $this->m_income->read($perPage, $page, '', '', $user);

        // TEMPLATE
        $view         = "_backend/income/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_income', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_income');
        }

        $user = $this->session->userdata('user_id');
        if ($this->session->userdata('user_group') == 3)
            $user = '';

        // PAGINATION
        $baseUrl    = base_url() . "admin/income/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_income->read('', '', $data['search'], '', $user));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Pemasukkan';
        $data['income']    = $this->m_income->read($perPage, $page, $data['search'], '', $user);

        // TEMPLATE
        $view         = "_backend/income/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Pemasukkan';
        $data['truck']         = $this->m_truck->read('', '', '',);
        $data['income_category'] = $this->m_income_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/income/_create";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function update_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Pemasukkan';
        $data['income']          = $this->m_income->get($this->uri->segment(4));
        $data['truck']         = $this->m_truck->read('', '', '');
        $data['income_category'] = $this->m_income_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/income/_update";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function detail_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Pemasukkan';
        $data['income']          = $this->m_income->get($this->uri->segment(4));
        $data['truck']         = $this->m_truck->read('', '', '');
        $data['income_category'] = $this->m_income_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/income/_detail";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        // POST
        $data['income_id']             = '';
        $data['income_category_id']    = $this->input->post('income_category_id');
        $data['truck_id']               = $this->input->post('truck_id');
        $data['user_id']                = $this->session->userdata('user_id');
        $data['income_name']           = $this->input->post('income_name');
        $data['income_count']          = $this->input->post('income_count');
        $data['income_amount']         = $this->input->post('income_amount');
        $data['income_price']          = $this->input->post('income_price');
        $data['income_desc']           = $this->input->post('income_desc');
        $data['income_date']           = $this->input->post('income_date');
        $data['createtime']             = date('Y-m-d H:i:s');
        $data['update_at']              = date('Y-m-d H:i:s');
        $this->m_income->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data Pemasukkan ";
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data Pemasukkan ";
        getAlert($alertStatus, $alertMessage);

        redirect('admin/income');
    }


    public function update()
    {
        csrfValidate();

        // POST
        $data['income_id']             = $this->input->post('income_id');
        $data['income_category_id']    = $this->input->post('income_category_id');
        $data['truck_id']               = $this->input->post('truck_id');
        $data['user_id']                = $this->session->userdata('user_id');
        $data['income_name']           = $this->input->post('income_name');
        $data['income_count']          = $this->input->post('income_count');
        $data['income_amount']         = $this->input->post('income_amount');
        $data['income_price']          = $this->input->post('income_price');
        $data['income_desc']           = $this->input->post('income_desc');
        $data['income_date']           = $this->input->post('income_date');
        $data['update_at']              = date('Y-m-d H:i:s');
        $this->m_income->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data Pemasukkan dengan ID = " . $data['income_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data Pemasukkan ID : " . $data['income_id'];
        getAlert($alertStatus, $alertMessage);


        redirect('admin/income');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_income->delete($this->input->post('income_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data Pemasukkan dengan ID = " . $this->input->post('income_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data Pemasukkan ID : " . $this->input->post('income_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/income');
    }
}
