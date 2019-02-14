	 <div class="table-responsive" style="min-height:300px;">
    <table class="table table-striped ">
        <thead>
			<tr>
				
				
				<?php foreach ($tableGrid as $t):
						if($t['view'] =='1') : ?>			
						<th><?php echo $t['label'] ;?></th>			
					<?php endif;
					endforeach; ?>
				
			  </tr>
        </thead>

        <tbody>        						
           <?php foreach ($rowData as $row) :?>
                <tr>
					
													
				 <?php foreach ($tableGrid as $field) :
					 if($field['view'] =='1'): ?>
						 <td>					 
						 	 <?php echo SiteHelpers::formatRows($row->{$field['field']},$field,$row) ;?>						 
						 </td>
					<?php	endif; ?>	
					 					 
				 <?php endforeach; ?>
				 			 
                </tr>
				
            <?php endforeach;?>
              
        </tbody>
      
    </table>
	<input type="hidden" name="md" value="" />
	</div>