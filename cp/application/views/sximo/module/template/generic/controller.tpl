<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class {controller} extends SB_Controller 
{

	protected $layout 	= "layouts/main";
	public $module 		= '{class}';
	public $per_page	= '10';

	function __construct() {
		parent::__construct();
		
		$this->load->model('{class}model');
		$this->model = $this->{class}model;
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);	
		$this->data = array_merge( $this->data, array(
			'pageTitle'		=> 	$this->info['title'],
			'pageNote'		=>  $this->info['note'],
			'pageModule'	=> '{class}',
			'pageUrl'		=>  site_url('{class}'),
			'return'		=> self::returnUrl()
		));
		
		if(!$this->session->userdata('logged_in')) redirect('user/login',301);
		
	}

	public function index()
	{
		if($this->access['is_view'] ==0)
		{ 
			$this->session->set_flashdata('error',SiteHelpers::alert('error','Your are not allowed to access the page'));
			redirect('dashboard',301);
		}	

		$this->data['content'] = $this->load->view('{class}/index',$this->data, true );		
    	$this->load->view('layouts/main', $this->data );		
	}

	function show( $id = null) 
	{

		if($this->access['is_detail'] ==0) 
			{ echo SiteHelpers::alert('error',' You are not allowed to view this page'); die; }
	
		$this->data['content'] = $this->load->view('{class}/view',$this->data, true );		
    	$this->load->view('layouts/main', $this->data );

	}
  
	function update( $id = null ) 
	{

		if($id =='')
			if($this->access['is_add'] ==0) { echo SiteHelpers::alert('error',' You are not allowed to view this page'); die; }

		if($id !='')
			if($this->access['is_edit'] ==0) { echo SiteHelpers::alert('error',' You are not allowed to view this page'); die; }

		$this->data['content'] = $this->load->view('{class}/form',$this->data, true );		
    	$this->load->view('layouts/main', $this->data );		
	
	}
	
	function save() {
		
		
	}

	function delete()
	{
		if($this->access['is_remove'] ==0) 
			{ echo SiteHelpers::alert('error',' You are not allowed to view this page'); die; }
		
	}


}
