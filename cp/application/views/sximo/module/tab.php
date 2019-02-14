<ul class="nav nav-tabs" style="margin-bottom:10px;">
  <li><a href="<?php echo site_url('sximo/module');?>"><i class="icon-tablet"></i> All </a></li>
  <li <?php if($active == 'config') echo 'class="active"';?>><a href="<?php echo site_url('sximo/module/config/'.$module_name);?>"><i class="icon-info2"></i> <?php echo $this->lang->line('core.modtab_info'); ?> </a></li>
  <li <?php if($active == 'sql') echo 'class="active"';?> >
  <a href="<?php echo site_url('sximo/module/sql/'.$module_name);?>"><i class="icon-database"></i> <?php echo $this->lang->line('core.modtab_sql'); ?> </a></li>
  <li <?php if($active == 'table') echo 'class="active"';?>>
  <a href="<?php echo site_url('sximo/module/table/'.$module_name);?>"><i class="icon-table"></i> <?php echo $this->lang->line('core.modtab_table'); ?> </a></li>
  <li <?php if($active == 'form') echo 'class="active"';?>>
  <a href="<?php echo site_url('sximo/module/form/'.$module_name);?>"><i class="icon-indent-increase"></i> <?php echo $this->lang->line('core.modtab_form'); ?> </a></li> 
  <li <?php if($active == 'sub') echo 'class="active"';?>>
  <a href="<?php echo site_url('sximo/module/sub/'.$module_name);?>"><i class="icon-page-break2"></i> Master Detail</a></li>   
  <li <?php if($active == 'permission') echo 'class="active"';?>>
  <a href="<?php echo site_url('sximo/module/permission/'.$module_name);?>"><i class="icon-key2"></i> <?php echo $this->lang->line('core.modtab_permission'); ?> </a></li>
   <li <?php if($active == 'rebuild') echo 'class="active"';?> >
   <a href="javascript://ajax" onclick="SximoModal('<?php echo site_url('sximo/module/build/'.$module_name);?>','<?php echo $this->lang->line('core.modtab_rebuildtitle'); ?> <?php echo $module_name;?>')"><i class="icon-spinner7"></i>  <?php echo $this->lang->line('core.modtab_rebuild'); ?> </a></li>

  <li class="dropdown pull-right">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-table2"></i> Swith Module
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <?php $md = $this->db->query(" select * from tb_module where module_type != 'core' ")->result();
      foreach($md as $m) { ?>
      <li><a href="<?php echo  site_url('sximo/module/'.$active.'/'.$m->module_name) ;?>"> <?php echo  $m->module_title;?></a></li>
      <?php } ?>
    </ul>
  </li>
</ul>