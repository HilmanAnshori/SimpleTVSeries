<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center" style="height:450px">
			<div class="redirect">
				<div class="" style="  margin: auto;margin-top: 10%;">
					<p style="font-size:42px"><i class="fa fa-spinner fa-pulse"></i></p>
					<p class="small">Please wait while you are being redirected to secure page ...</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript"> 
	setTimeout(function(){
       window.location='<?php echo $url; ?>';
    }, 3000);
</script>
