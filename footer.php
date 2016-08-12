 
<div class="container-fluid navbar-default mtop text-center">
	<footer>
		<div class="container">
			<div class="row">
			  	<div class="col-sm-8 col-xs-12">
				    <ul class="list-unstyled">
				      <li><a title="Privacy Policy" href="page/privacy-policy">Privacy Policy</a></li>
				      <li><a title="DMCA" href="page/dmca">DMCA</a></li>
				      <li><a title="Contact Us" href="page/contact-us">Contact Us</a></li>
				    </ul>
			  	</div>
				<div class="col-sm-4 col-xs-12">
					<div class="fa-hover pull-right"><a href="<?php echo $curpage; ?>#top">Back to top <span class="fa fa-angle-double-up"></span></a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright <i class="fa fa-copyright"></i> 2015 <a title="<?php echo $config->sitename; ?>" href=""><?php echo $config->sitename.' - '.str_replace('www.', '', parse_url($curpage, PHP_URL_HOST)); ?></a>. All Rights Reserved.</p>
				</div>
				<div class="col-lg-12 mtop text-center small">
					<?php
                    $time = microtime();
                    $time = explode(' ', $time);
                    $time = $time[1] + $time[0];
                    $finish = $time;
                    $total_time = round(($finish - $start), 4);
                    echo 'Page generated in '.$total_time.' seconds.';
                    ?>
				</div>
			</div>
		</div>
	</footer>
</div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="/fancybox/fc.js"></script>
	<script type="text/javascript" src="/js/colorbox-min.js"></script>
	<script type="text/javascript" src="/js/screenfull.min.js"></script>
	<script type="text/javascript" src="/js/scripts.js"></script>

<!-- Histats.com  START (hidden counter)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="web counter" ><script  type="text/javascript" >
try {Histats.start(1,3074052,4,0,0,0,"");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3074052&101" alt="web counter" border="0"></a></noscript>
<!-- Histats.com  END  -->
</body>
</html>
