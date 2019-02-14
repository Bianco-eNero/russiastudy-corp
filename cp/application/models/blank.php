<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blankmodel extends SB_Model 
{

	public $table = 'orders';
	public $primaryKey = 'orderNumber';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "   SELECT orders.* FROM orders   ";
	}
	public static function queryWhere(  ){
		
		return "  WHERE orders.orderNumber IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "   ";
	}
	
}

?>
