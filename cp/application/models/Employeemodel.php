<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employeemodel extends SB_Model 
{

	public $table = 'employee';
	public $primaryKey = 'employee_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "   SELECT employee.* FROM employee   ";
	}
	public static function queryWhere(  ){
		
		return "  WHERE employee.employee_id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "   ";
	}
	
}

?>
