<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_content');
		$this->load->model('m_message');
		$this->load->model('m_link');
		// check session data
		if (!$this->session->userdata('user_id')) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
	}

	public function index()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['widget']  = $this->m_content->widget();
		$data['income']  = $this->m_content->income();
		$data['outcome']  = $this->m_content->outcome();
		$data['message'] = $this->m_message->read(5, '', '', '0');

		$total_price = 0;
		$income_list = [];
		foreach ($data['income'] as $key => $value) {
			$incomes = $value->income_price;

			foreach ($data['outcome'] as $key2 => $value2)
				if ($value->truck_id == $value2->truck_id)
					$incomes = $value->income_price - $value2->outcome_price;

			$total_price += $incomes;
			$income_list[$key]['truck_name'] = $value->truck_name;
			$income_list[$key]['income'] = $incomes;
		}
		$data['income_list'] = $income_list;
		$data['total_income'] = $total_price;

		$quotes = $this->m_link->get();
		$quotes =  new DateTime($quotes[0]->createtime);
		$quotes =  $quotes->format('d-m-Y');

		// cek jika sudah berganti hari
		if ($quotes == date('d-m-Y')) {
			$quotes = $this->m_link->get();
			$data['quotes'] = $quotes[0]->link_url;
		} else {
			$quotes = $this->m_link->read('', '', '');
			$data['quotes'] = $quotes[rand(0, (count($quotes) - 1))]->link_url;

			// update hari
			$link['link_id']    	= 1;
			$link['link_url']   	= $data['quotes'];
			$link['createtime'] 	= date('Y-m-d H:i:s');;
			$this->m_link->update($link);
		}

		// TEMPLATE
		$view         = "_backend/dashboard";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
	}
}
