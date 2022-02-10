<?php
defined('BASEPATH') or exit('No direct script access allowed');
class truck extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $this->session->unset_userdata('sess_search_truck');

        // PAGINATION
        $baseUrl    = base_url() . "admin/truck/index/";
        $totalRows  = count((array) $this->m_truck->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;



        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Truk';
        $data['truck']    = $this->m_truck->read($perPage, $page, '');


        // TEMPLATE
        $view         = "_backend/truck/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_truck', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_truck');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/truck/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_truck->read('', '', $data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Truk';
        $data['truck']    = $this->m_truck->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "_backend/truck/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Truk';

        // TEMPLATE
        $view         = "_backend/truck/_create";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function update_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Truk';
        $data['truck']          = $this->m_truck->get($this->uri->segment(4));

        // TEMPLATE
        $view         = "_backend/truck/_update";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function detail_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Truk';
        $data['truck']          = $this->m_truck->get($this->uri->segment(4));

        // TEMPLATE
        $view         = "_backend/truck/_detail";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        $filename_1              = "thumbnailtruck-" . date('YmdHis');
        $config['upload_path']   = "./upload/truck/";
        $config['allowed_types'] = "jpg|png|jpeg";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('truck_image')) {
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();
            $data['truck_image']       = $dat['file_name'];
        }

        // POST
        $data['truck_id']          = '';
        $data['truck_name']      = $this->input->post('truck_name');
        $data['truck_base_modal']      = $this->input->post('truck_base_modal');
        $data['truck_plate']      = $this->input->post('truck_plate');
        $data['truck_brand']      = $this->input->post('truck_brand');
        $data['truck_year']      = $this->input->post('truck_year');
        $data['truck_color']     = $this->input->post('truck_color');
        $data['truck_stnk']      = $this->input->post('truck_stnk');
        $data['truck_desc']      = $this->input->post('truck_desc');
        $data['createtime']      = date('Y-m-d H:i:s');
        $data['update_at']       = date('Y-m-d H:i:s');
        $this->m_truck->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data Truk ";
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data Truk ";
        getAlert($alertStatus, $alertMessage);

        redirect('admin/truck');
    }


    public function update()
    {
        csrfValidate();

        if ($_FILES['truck_image']['name'] != "") {
            $filename_1              = "thumbnailtruck-" . date('YmdHis');
            $config['upload_path']   = "./upload/truck/";
            $config['allowed_types'] = "jpg|png|jpeg";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('truck_image')) {

                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();

                unlink('./upload/truck/' . $this->input->post('truck_image_old'));

                $data['truck_image']       = $dat['file_name'];
            }
        }

        $data['truck_id']        = $this->input->post('truck_id');
        $data['truck_name']      = $this->input->post('truck_name');
        $data['truck_base_modal']      = $this->input->post('truck_base_modal');
        $data['truck_plate']     = $this->input->post('truck_plate');
        $data['truck_brand']     = $this->input->post('truck_brand');
        $data['truck_year']      = $this->input->post('truck_year');
        $data['truck_color']     = $this->input->post('truck_color');
        $data['truck_stnk']      = $this->input->post('truck_stnk');
        $data['truck_desc']      = $this->input->post('truck_desc');
        $data['update_at']       = date('Y-m-d H:i:s');

        $this->m_truck->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data Truk dengan ID = " . $data['truck_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data Truk ID : " . $data['truck_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/truck');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_truck->delete($this->input->post('truck_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data Truk dengan ID = " . $this->input->post('truck_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data Truk ID : " . $this->input->post('truck_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/truck');
    }
}
