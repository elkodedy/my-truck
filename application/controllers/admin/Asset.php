<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Asset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_asset');
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
        $this->session->unset_userdata('sess_search_asset');

        // PAGINATION
        $baseUrl    = base_url() . "admin/asset/index/";
        $totalRows  = count((array) $this->m_asset->read('', '', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Asset';
        $data['asset']    = $this->m_asset->read($perPage, $page, '', '');

        // TEMPLATE
        $view         = "_backend/asset/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_asset', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_asset');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/asset/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_asset->read('', '', $data['search'], ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Asset';
        $data['asset']    = $this->m_asset->read($perPage, $page, $data['search'], '');

        // TEMPLATE
        $view         = "_backend/asset/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Asset';

        // TEMPLATE
        $view         = "_backend/asset/_create";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function update_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Asset';
        $data['asset']          = $this->m_asset->get($this->uri->segment(4));

        // TEMPLATE
        $view         = "_backend/asset/_update";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function detail_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Asset';
        $data['asset']          = $this->m_asset->get($this->uri->segment(4));

        // TEMPLATE
        $view         = "_backend/asset/_detail";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        // POST
        $data['asset_id']             = '';
        $data['asset_name']       = $this->input->post('asset_name');
        $data['asset_count']      = $this->input->post('asset_count');
        $data['asset_amount']     = $this->input->post('asset_amount');
        $data['asset_price']      = $this->input->post('asset_price');
        $data['asset_desc']       = $this->input->post('asset_desc');
        $data['createtime']       = date('Y-m-d H:i:s');
        $data['update_at']        = date('Y-m-d H:i:s');
        $this->m_asset->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data Asset ";
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data Asset ";
        getAlert($alertStatus, $alertMessage);

        redirect('admin/asset');
    }


    public function update()
    {
        csrfValidate();

        // POST
        $data['asset_id']             = $this->input->post('asset_id');
        $data['asset_name']       = $this->input->post('asset_name');
        $data['asset_count']      = $this->input->post('asset_count');
        $data['asset_amount']     = $this->input->post('asset_amount');
        $data['asset_price']      = $this->input->post('asset_price');
        $data['asset_desc']       = $this->input->post('asset_desc');
        $data['update_at']              = date('Y-m-d H:i:s');
        $this->m_asset->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data Asset dengan ID = " . $data['asset_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data Asset ID : " . $data['asset_id'];
        getAlert($alertStatus, $alertMessage);


        redirect('admin/asset');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_asset->delete($this->input->post('asset_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data Asset dengan ID = " . $this->input->post('asset_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data Asset ID : " . $this->input->post('asset_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/asset');
    }
}
