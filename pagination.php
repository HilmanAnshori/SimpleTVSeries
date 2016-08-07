<?php
include('paginator.class.php');
$num_rows = $titles->total_results; 
if ($num_rows>20*1000):
	$num_rows = 20*1000;
endif;
$pages = new Paginator($num_rows,7,array(20),$paged,$basepaginationurl);?>
<div class="center">
	<ul class="pagination mauto">
	<?php foreach($pages->display_pages() as $pag):?>
				<?php echo str_replace('/page/1"','"',$pag);?>
		<?php endforeach;?>	
	</ul>
</div>
<div class="center" style="margin-bottom:50px">Page: <?php echo $pages->current_page;?> of <?php echo $pages->num_pages;?> </div>
