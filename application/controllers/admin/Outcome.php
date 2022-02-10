<?php
defined('BASEPATH') or exit('No direct script access allowed');
class outcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_outcome');
        $this->load->model('m_outcome_category');
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
        $this->session->unset_userdata('sess_search_outcome');

        // PAGINATION
        $baseUrl    = base_url() . "admin/outcome/index/";
        $totalRows  = count((array) $this->m_outcome->read('', '', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Pengeluaran';
        $data['outcome']    = $this->m_outcome->read($perPage, $page, '', '');

        // TEMPLATE
        $view         = "_backend/outcome/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_outcome', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_outcome');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/outcome/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_outcome->read('', '', $data['search'], ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Pengeluaran';
        $data['outcome']    = $this->m_outcome->read($perPage, $page, $data['search'], '');

        // TEMPLATE
        $view         = "_backend/outcome/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Pengeluaran';
        $data['truck']         = $this->m_truck->read('', '', '',);
        $data['outcome_category'] = $this->m_outcome_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/outcome/_create";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function update_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Pengeluaran';
        $data['outcome']          = $this->m_outcome->get($this->uri->segment(4));
        $data['truck']         = $this->m_truck->read('', '', '');
        $data['outcome_category'] = $this->m_outcome_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/outcome/_update";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function detail_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Pengeluaran';
        $data['outcome']          = $this->m_outcome->get($this->uri->segment(4));
        $data['truck']         = $this->m_truck->read('', '', '');
        $data['outcome_category'] = $this->m_outcome_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/outcome/_detail";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        // POST
        $data['outcome_id']             = '';
        $data['outcome_category_id']    = $this->input->post('outcome_category_id');
        $data['truck_id']               = $this->input->post('truck_id');
        $data['user_id']                = $this->session->userdata('user_id');
        $data['outcome_name']           = $this->input->post('outcome_name');
        $data['outcome_count']          = $this->input->post('outcome_count');
        $data['outcome_amount']         = $this->input->post('outcome_amount');
        $data['outcome_price']          = $this->input->post('outcome_price');
        $data['outcome_desc']           = $this->input->post('outcome_desc');
        $data['outcome_date']           = $this->input->post('outcome_date');
        $data['createtime']             = date('Y-m-d H:i:s');
        $data['update_at']              = date('Y-m-d H:i:s');
        $this->m_outcome->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data Pengeluaran ";
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data Pengeluaran ";
        getAlert($alertStatus, $alertMessage);

        redirect('admin/outcome');
    }


    public function update()
    {
        csrfValidate();

        // POST
        $data['outcome_id']             = $this->input->post('outcome_id');
        $data['outcome_category_id']    = $this->input->post('outcome_category_id');
        $data['truck_id']               = $this->input->post('truck_id');
        $data['user_id']                = $this->session->userdata('user_id');
        $data['outcome_name']           = $this->input->post('outcome_name');
        $data['outcome_count']          = $this->input->post('outcome_count');
        $data['outcome_amount']         = $this->input->post('outcome_amount');
        $data['outcome_price']          = $this->input->post('outcome_price');
        $data['outcome_desc']           = $this->input->post('outcome_desc');
        $data['outcome_date']           = $this->input->post('outcome_date');
        $data['update_at']              = date('Y-m-d H:i:s');
        $this->m_outcome->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data Pengeluaran dengan ID = " . $data['outcome_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data Pengeluaran ID : " . $data['outcome_id'];
        getAlert($alertStatus, $alertMessage);


        redirect('admin/outcome');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_outcome->delete($this->input->post('outcome_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data Pengeluaran dengan ID = " . $this->input->post('outcome_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data Pengeluaran ID : " . $this->input->post('outcome_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/outcome');
    }
}
