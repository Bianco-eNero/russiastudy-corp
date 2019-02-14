<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends SB_Controller 
{

	protected $layout 	= "layouts/main";
	public $module 		= 'pages';
	public $per_page	= '10';

	function __construct() {
		parent::__construct();
		
		$this->load->model('sximo/pagesmodel');
		$this->model = $this->pagesmodel;
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);	
		$this->data = array_merge( $this->data, array(
			'pageTitle'		=> 	$this->info['title'],
			'pageNote'		=>  $this->info['note'],
			'pageModule'	=> 'pages',
			'pageUrl'		=>  site_url('pages'),
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
			$cols = '{"data":"rowId"},';
			if($this->data['setting']['view-method'] =='expand'){
				$cols .= '{"className": "details-control","orderable": false,"data": null,"defaultContent": ""},';
			}
			foreach($this->data['tableGrid'] as $field)
			{				
				
				if($field['view'] =='1')
				{
					$cols .= '{"data":"'.$field['field'].'"},';
				}
						
			}

		$this->data['column'] = substr($cols,0,strlen($cols)-1) ;	
		$this->data['access']		= $this->access;						
		$this->data['content'] = $this->load->view('sximo/pages/index',$this->data, true );		
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
			'params'	=> $conf['params'] ." AND pagetype ='page' ",
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
	
	function show( $id = null) 
	{
		if($this->access['is_detail'] ==0) { echo SiteHelpers::alert('error',' You are not allowed to view this page'); die; }

		$row = $this->model->getRow($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('pages'); 
		}

		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 
		$this->data['fields'] =  AjaxHelpers::fieldLang($this->info['config']['grid']);
		$this->data['id'] = $id;
		$this->data['setting'] 		= $this->info['setting'];
		$this->data['access']		= $this->access;
		$this->load->view('sximo/pages/view', $this->data);	  
	}
  
	function update( $id = null ) 
	{

		if($id =='')
			if($this->access['is_add'] ==0) { echo SiteHelpers::alert('error',' You are not allowed to view this page'); die; }

		if($id !='')
			if($this->access['is_edit'] ==0) { echo SiteHelpers::alert('error',' You are not allowed to view this page'); die; }

		$row = $this->model->getRow( $id );
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('tb_pages'); 
		}

		if($this->data['row']['access'] !='')
		{
			$access = json_decode($this->data['row']['access'],true)	;	
		} else {
			$access = array();
		}
		$groups = $this->db->get('tb_groups');
		$group = array();
		foreach($groups->result_array() as $g) {
			$group_id = $g['group_id'];			
			$a = (isset($access[$group_id]) && $access[$group_id] ==1 ? 1 : 0);		
			$group[] = array('id'=>$g['group_id'] ,'name'=>$g['name'],'access'=> $a); 			
		}		

		$this->data['groups'] = $group;	
		$path = 'application/views/layouts/'.CNF_THEME.'/info.json';
		$this->data['pagetemplate'] = json_decode(file_get_contents($path),true);

		 
		$this->data['id'] = $id;
		$this->data['setting'] 		= $this->info['setting'];
		$this->load->view('sximo/pages/form',$this->data);		
	
	}
	
	function save() {
		
		$rules = $this->validateForm();

		$this->form_validation->set_rules( $rules );
		if( $this->form_validation->run() )
		{
			$data = $this->validatePost();
			$data['note'] = $this->input->post('content');
			$ID = $this->model->insertRow($data , $this->input->get_post( 'pageID' , true ));
			
			// Input logs
			if( $this->input->get( 'pageID' , true ) =='')
			{
				$this->inputLogs("New Entry row with ID : $ID  , Has Been Save Successfull");
			} else {
				$this->inputLogs(" ID : $ID  , Has Been Changed Successfull");
			}

			self::createRouters();
				header('content-type:application/json');	
				echo json_encode(array(
					'status'	=>'success',
					'message'	=> ' Data has been saved succesfuly !',
					
					));	
			
		} else {
			header('content-type:application/json');
			echo json_encode(array(
					'message'	=> validation_errors('<li>', '</li>'),
					'status'	=> 'error'
					));			
			
		}
	}

	function delete()
	{
		if($this->access['is_remove'] ==0) { echo SiteHelpers::alert('error',' You are not allowed to view this page'); die; }
		if(!is_null($this->input->post('ids')))
		{
			$this->model->destroy($this->input->post( 'ids' , true ));
			$this->inputLogs("ID : ".implode(",",$this->input->post( 'ids' , true ))."  , Has Been Removed Successfull");
			header('content-type:application/json');
			echo json_encode(array(
				'status'=>'success',
				'message'=> SiteHelpers::alert('success','Data Has Been Removed Successfull')
			));
		} else {
			header('content-type:application/json');
			echo json_encode(array(
				'status'=>'error',
				'message'=> 'Ops , Something Went Wrong !'
			));

		} 	
	}
	function createRouters()
	{
		$rows =$this->db->get('tb_pages')->result();
		$val  =	"<?php \n"; 
		foreach($rows as $row)
		{
			$val .= '$route["' . $row->alias . '"] = "page/index/' . $row->alias . '";' ."\n";	
			$val .= '$route["' . $row->alias . '/(:any)"] = "page/index/' . $row->alias . '/%1";' ."\n";	
		}
		$val .= 	"?>";
		$filename = 'application/config/pageroutes.php';
		$fp=fopen($filename,"w+"); 
		fwrite($fp,$val); 
		fclose($fp);	
		return true;	
		
	}	

}
