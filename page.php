<?php include 'header.php'; ?>

<!-- Main -->
	<div class="container">
		<header class="major">
			<h2><?php echo $pages->$pagefile->title; ?></h2>
		</header>
	<!-- Image -->
		<section>
			<div style="text-align:justify">
				<?php include 'page/'.$pagefile.'.php'; ?>	
			</div>
		</section>
	</div>

<?php include 'footer.php'; ?>