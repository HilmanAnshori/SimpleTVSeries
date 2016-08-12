<?php include 'header.php'; ?>

<div class="container">
	<div class="bs-docs-section">
		<div class="row mbottom">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mbottom">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mbottom">
						<img class="img-responsive img-thumbnail fit" alt="<?php echo $person->name; ?> photo thumbnail" src="<?php echo $person->photo_link?>"/>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 mbottom">
						<div class="row mbottom">
							<div class="col-lg-12">
								<h1 class="nomargin text-center"><?php echo $person->name?></h1>
								<?php if ($person->also_known_as):?>
									<?php foreach ($person->also_known_as as $aka):?>
										<strong class="mright5 small"><span class="fa fa-check mright5"></span> <?php echo $aka; ?></strong>	
									<?php endforeach; ?>
								<?php endif; ?>
								<hr/>
								<?php if ($person->birthday):?>
									<div class="row mbottom">
										<div class="col-lg-3 col-md-4 col-sm-2 col-xs-4">
											<strong class="small">Birthday : </strong>
										</div>
										<div class="col-lg-9 col-md-8 col-sm-10 col-xs-8">
											<span class="small pleft2"><span class="fa fa-birthday-cake mright5"></span> <?php echo $person->birthday; ?></span>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($person->place_of_birth):?>
									<div class="row mbottom">
										<div class="col-lg-3 col-md-4 col-sm-2 col-xs-4">
											<strong class="small">Birth Place : </strong>
										</div>
										<div class="col-lg-9 col-md-8 col-sm-10 col-xs-8">
											<span class="small pleft2"><span class="fa fa-home mright5"></span> <?php echo $person->place_of_birth; ?></span>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($person->deathday):?>
									<div class="row mbottom">
										<div class="col-lg-3 col-md-4 col-sm-2 col-xs-4">
											<strong class="small">Deathhday : </strong>
										</div>
										<div class="col-lg-9 col-md-8 col-sm-10 col-xs-8">
											<span class="small pleft2"><span class="fa fa-bed mright5"></span> <?php echo $person->deathday; ?></span>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($person->popularity):?>
									<div class="row mbottom">
										<div class="col-lg-3 col-md-4 col-sm-2 col-xs-4">
											<strong class="small">Popularity : </strong>
										</div>
										<div class="col-lg-9 col-md-8 col-sm-10 col-xs-8">
											<span class="small pleft2"><span class="fa fa-star mright5"></span> <?php echo $person->popularity; ?></span>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($person->homepage):?>
									<?php if (strpos($person->homepage, 'http://') === false) {
    $person->homepage = 'http://'.$person->homepage;
} ?>
									<div class="row mbottom">
										<div class="col-lg-3 col-md-4 col-sm-2 col-xs-4">
											<strong class="small">Homepage : </strong>
										</div>
										<div class="col-lg-9 col-md-8 col-sm-10 col-xs-8">
											<a target="_blank" title="<?php echo $person->name; ?> Homepage" href="<?php echo $person->homepage; ?>"><span class="small pleft2"><span class="fa fa-external-link-square mright5"></span> <?php echo parse_url($person->homepage, PHP_URL_HOST); ?></span></a>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($person->imdb):?>
									<?php if (strpos($person->imdb, 'http://') === false) {
    $person->imdb = 'http://'.$person->imdb;
} ?>
									<div class="row mbottom">
										<div class="col-lg-3 col-md-4 col-sm-2 col-xs-4">
											<strong class="small">IMDB Profile : </strong>
										</div>
										<div class="col-lg-9 col-md-8 col-sm-10 col-xs-8">
											<a target="_blank" title="<?php echo $person->name; ?> IMDB Profile" href="<?php echo $person->imdb; ?>"><span class="small pleft2"><span class="fa fa-external-link-square mright5"></span> <?php echo parse_url($person->imdb, PHP_URL_HOST); ?></span></a>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mbottom text-center">
				<?php if (!isbad()):?>
					<div class="mauto fit"><?php echo $ads; ?></div>
				<?php endif; ?>
			</div>
		</div> 

		<div class="row mbottom">
			<div class="col-lg-12">
				<p class="text-justify"><?php echo nl2br($person->biography); ?></p>
			</div>
		</div>

		<div class="row center text-center">
			<div class="col-lg-12 center mbottom">
				<?php if (!isbad()):?>
					<div class="ads768 mauto"><?php echo $ads; ?></div>
				<?php endif; ?>
			</div>
		</div>

		<div class="row mbottom">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
	                <li class="active"><a href="#cast" data-toggle="tab"><span class="fa fa-film mright5"></span> Starred Movies</a></li>
	                <li><a href="#crew" data-toggle="tab"><span class="fa fa-film mright5"></span> Crewed Movies</a></li>
	                <li><a href="#image" data-toggle="tab"><span class="fa fa-image mright5"></span> Images</a></li>
	                <li><a href="#comments" data-toggle="tab"><span class="fa fa-comments mright5"></span> Comments</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="cast">
						<div class="row text-center">
							<div class="col-lg-12">
								<h2><?php echo $person->name; ?> Starred Movies</h2>
							</div>
						</div>
						<?php if (count($person->movie_credits->cast) > 0):?>
							<div class="row ptop nowrap">
								<?php foreach ($person->movie_credits->cast as $cast):?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 center">
										<a href="<?php echo $cast->link; ?>" title="Watch <?php echo $cast->title; ?>">
											<div class="poster">
												<img class="img-responsive img-thumbnail fit" src="<?php echo $cast->poster_link; ?>" alt="<?php echo $cast->title; ?> poster thumbnail" />
											</div>
											<div class="img-thumbnail postertitle btn-default small">
												<span class="mright5"><?php echo $cast->title; ?></span> <span class="fa fa-arrow-circle-right mright5"></span> <?php echo $cast->character; ?>
											</div>
										</a>
									</div>
								<?php endforeach; ?>		
							</div>	
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="crew">
						<div class="row text-center">
							<div class="col-lg-12">
								<h2><?php echo $person->name; ?> Crewed Movies</h2>
							</div>
						</div>
						<?php if (count($person->movie_credits->crew) > 0):?>
							<div class="row ptop nowrap">
								<?php foreach ($person->movie_credits->crew as $crew):?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 center">
										<a href="<?php echo $crew->link; ?>" title="Watch <?php echo $crew->title; ?>">
											<div class="poster">
												<img class="img-responsive img-thumbnail fit" src="<?php echo $crew->poster_link; ?>" alt="<?php echo $crew->title; ?> poster thumbnail" />
											</div>
											<div class="img-thumbnail postertitle btn-default small">
												<span class="mright5"><?php echo $crew->title; ?></span> <span class="fa fa-arrow-circle-right mright5"></span> <?php echo $crew->job; ?>
											</div>
										</a>
									</div>
								<?php endforeach; ?>		
							</div>	
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="image">
						<div class="row text-center">
							<div class="col-lg-12">
								<h2><?php echo $person->name; ?> Photos</h2>
							</div>
						</div>
						<?php if (count($person->images->profiles) > 0):?>
							<div class="row ptop nowrap">
								<?php foreach ($person->images->profiles as $poster):?>
									<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 center">
										<a rel="poster_group" href="<?php echo $poster->photo_original_link; ?>" title="<?php echo $person->name; ?> Photo">
												<img class="fboxtmb img-thumbnail mbottom" src="<?php echo $poster->photo_link; ?>" alt="<?php echo $person->name; ?> photo thumbnail" />
										</a>
									</div>
								<?php endforeach; ?>	
							</div>		
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="comments">
						<div class="row text-justify">
							<div class="col-lg-12">
								<div id="disqus_thread"></div>
									<script type="text/javascript">
									    /* * * CONFIGURATION VARIABLES * * */
									    var disqus_shortname = 'onlinemoviestreaming';
									    
									    /* * * DON'T EDIT BELOW THIS LINE * * */
									    (function() {
									        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
									        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
									        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
									    })();
									</script>
									<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>		

	</div>
</div>

<?php include 'footer.php'; ?>