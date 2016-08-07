<?php include 'header.php'; ?>

<div class="container">
	<div class="bs-docs-section ptop">
		<?php if(is_search()):?>
			<div class="row mbottom">
				<div class="col-sm-12 text-center navbar-default mbottom">
					<form class="navbar-form" role="search" method="get" action="/">
		              <div class="form-group">
		                <div class="input-group">
		                  <input type="text" class="form-control" name="q" placeholder="Input keywords ...">
		                  <span class="input-group-btn">
		                    <button type="submit" class="btn btn-default">Search</button>
		                  </span>
		                </div>
		              </div>
		            </form>
				</div>
			</div>
		<?php endif;?>
		<?php if(count($titles->results)>0):?>
			<div class="row nowrap bd">
				<div class="movie-list">
					<?php foreach($titles->results as $title):?>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 center nopadding nowrap">
							<a href="<?php echo $title->link;?>" title="<?php echo $title->name;?>">
	<!-- 							<div class="poster"> -->
									<img class="poster fit" src="<?php echo $title->backdrop_link;?>" alt="<?php echo $title->name;?> backdrop thumbnail" />
								<!-- </div> -->
								<div class="title-wrap text-center">
									<div class="movie-title">
										<?php echo $title->name;?>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach;?>	
				</div>	
			</div> 	
		<?php else:?>
			<h3><center>No results found!</center></h3>	
		<?php endif;?>
		<?php if(count($titles->results)>0):?>
			<div class="row ptop">
				<div class="col-lg-12">
					<?php include 'pagination.php';?>
				</div>
			</div>
		<?php endif;?>   
	</div>
</div>

<?php include 'footer.php'; ?>