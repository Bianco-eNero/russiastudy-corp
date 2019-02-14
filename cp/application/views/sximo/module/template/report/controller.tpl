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

		$this->data['setting'] 		= $this->info['setting'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		usort($this->data['tableGrid'], "SiteHelpers::_sort");
			$sortable = ''; 
			$cols = '{"data":"rowId"},';
			if($this->data['setting']['view-method'] =='expand'){
				$cols .= '{"className": "details-control","orderable": false,"data": null,"defaultContent": ""},';
			}
			$s = 0;
			foreach($this->data['tableGrid'] as $field)
			{				
				$indexArray = ++$s;
				if($field['view'] =='1') $cols .= '{"data":"'.$field['field'].'"},';
				if($field['sortable'] !=1) $sortable .= $indexArray.',';
						
			}
		$this->data['sortable'] = substr($sortable,strlen($sortable)-1) ;
		$this->data['column'] = substr($cols,0,strlen($cols)-1) ;	
		$this->data['access']		= $this->access;						
		$this->data['content'] = $this->load->view('{class}/index',$this->data, true );		
    	$this->load->view('layouts/main', $this->data );
	}

	public function data( )
	{ 

		$this->load->helpers('data');
		$tables 	= $this->info['config']['grid'];
		$cols = array();
		foreach($tables as $field)
		{				
			//$cols[$this->info['key']]	= array('db'=> $field['alias'] ,$this->info['key'] );
			if($field['view'] =='1')
			{
				$cols[] = array('db'=> $field['alias'],'dt'=> $field['field'] );
			}					
		}
		$conf = DataHelpers::simple($_REQUEST,$cols);
	//	print_r($_REQUEST); exit;

		$params = array(
			'page'		=> $conf['page'] ,
			'limit'		=> $conf['limit'] ,
			'sort'		=> ($conf['order']['sort'] !='' ? $conf['order']['sort'] : $this->info['setting']['orderby']) ,
			'order'		=> ($conf['order']['by'] !='' ? $conf['order']['by'] : $this->info['setting']['ordertype']),
			'params'	=> $conf['params'],
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);

		$results = $this->model->getRows($params);
		
		$array = array();
		foreach($results['rows'] as $row)
		{
			$values = array();
			$values['rowId'] = $row->{$this->info['key']};
			foreach($tables as $field)
			{			
				
				if($field['view'] =='1')
				{
					$values[$field['field']] = SiteHelpers::formatRows($row->{$field['field']}, $field , $row);
				}	
			}
			$array[] = $values; 	
		}
		
		$data = array(
			'draw'			=> (!is_null($_POST['draw']) ? intval($_POST['draw'] ) : 0), 
			'recordsTotal'	=> $results['total'] ,
			'recordsFiltered'	=> $results['total'],
			'data'				=> $array

		);
		header('content-type:application/json');
		echo json_encode($data);
	}
}	