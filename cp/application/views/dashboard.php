<div class="page-content row">

	<div class="page-content-wrapper m-t">  
	  
	<?php if($this->session->userdata('gid') ==1) : ?>


	
	<div class="row m-t">
		<div class="col-md-12">
			<div class="sbox">
				<div class="sbox-title"> <h4> Sample Chart <small> ( Plugins js using Chart Js ) </small> </h4> </div>
				<div class="sbox-content">



				<section  class="ribon-sximo">

						<div class="row m-l-none m-r-none m-t shortcut " >
							<div class="col-sm-6 col-md-3 p-sm  ribon-menu">
								<span class="pull-left m-r-sm text-navy"><i class="icon-table2"></i></span> 
								<a href="<?php echo site_url('sximo/module');?>" class="clear">
									<span class="h3 block m-t-xs"><strong><?php echo $this->lang->line('core.m_modules'); ?> </strong>
									</span> <small > Manage Existing Modules or Create new one </small>
								</a>
							</div>
							<div class="col-sm-6 col-md-3 p-sm ribon-setting">
								<span class="pull-left m-r-sm ">	<i class="icon-steam2"></i></span>
								<a href="<?php echo site_url('sximo/config');?>" class="clear">
									<span class="h3 block m-t-xs"><strong><?php echo $this->lang->line('core.m_setting'); ?> </strong>
									</span> <small >  Setting Up your application login option , sitename , email etc. </small> 
								</a>
							</div>
							<div class="col-sm-6 col-md-3 p-sm ribon-module">
								<span class="pull-left m-r-sm  ">	<i class="icon-list"></i></span>
								<a href="<?php echo site_url('sximo/menu');?>" class="clear">
								<span class="h3 block m-t-xs"><strong><?php echo $this->lang->line('core.m_sitemenu'); ?> </strong></span>
								<small >Manage Menu for your application frontend or backend   </small> </a>
							</div>
							<div class="col-sm-6 col-md-3  p-sm ribon-white">
								<span class="pull-left m-r-sm ">	<i class="icon-users"></i></span>
								<a href="<?php echo site_url('core/users');?>" class="clear">
								<span class="h3 block m-t-xs"><strong><?php echo $this->lang->line('core.m_usersgroups'); ?> </strong>
								</span> <small>Manage groups and users and grant what module and menu are accesible  </small> </a>
							</div>
						</div> 
				</section>	




					<div class="row">
						<div class="col-md-11">
							<canvas id="chartdiv" width="350" height="120" ></canvas>
						</div>
						
					</div>
				
						
				</div>
			</div>
		</div>
		
		
	
	</div>
	<?php endif;?>
	
	</div>
</div>	
<?php if($this->session->userdata('gid') =='1') : ?>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('chartdiv', {
        title: {
            text: 'Combination chart'
        },
        xAxis: {
            categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
        },
        labels: {
            items: [{
                html: 'Total fruit consumption',
                style: {
                    left: '50px',
                    top: '18px',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                }
            }]
        },
        series: [{
            type: 'column',
            name: 'Jane',
            data: [3, 2, 1, 3, 4]
        }, {
            type: 'column',
            name: 'John',
            data: [2, 3, 5, 7, 6]
        }, {
            type: 'column',
            name: 'Joe',
            data: [4, 3, 3, 9, 0]
        }, {
            type: 'spline',
            name: 'Average',
            data: [3, 2.67, 3, 6.33, 3.33],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: 'Total consumption',
            data: [{
                name: 'Jane',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
            }, {
                name: 'John',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
            }, {
                name: 'Joe',
                y: 19,
                color: Highcharts.getOptions().colors[2] // Joe's color
            }],
            center: [100, 80],
            size: 100,
            showInLegend: false,
            dataLabels: {
                enabled: false
            }
        }]
    });
});

</script>
<?php endif;?>
