<?php
$tabs = array(
		'' 		        => '<i class="icon-info2"></i> '. $this->lang->line('core.tab_siteinfo'),
		'email'			=> '<i class="icon-envelop"></i> '. $this->lang->line('core.t_emailtemplate'),
		'security'		=> '<i class="icon-switch"></i> '. $this->lang->line('core.tab_loginsecurity') ,
		'getTranslation'	=>'<i class="icon-flag"></i> Translation',
	);

?>

<ul class="nav nav-tabs" >
<?php foreach($tabs as $key=>$val): ?>
	<li  <?php if($key == $active) echo 'class="active"';?>> 
		<a href="<?php  echo site_url('sximo/config/'.$key);?>"><?php echo $val ;?>  </a>
	</li>
<?php endforeach; ?>

</ul>