<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notificationmodel extends SB_Model 
{

	public $table = 'tb_notification';
	public $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "   SELECT tb_notification.* FROM tb_notification   ";
	}
	public static function queryWhere(  ){
		
		return "  WHERE tb_notification.id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "   ";
	}
	
}

?>
