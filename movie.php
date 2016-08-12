<?php include 'header.php'; ?>

<div class="container">
	<div class="bs-docs-section">

		<div class="row mbottom">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mbottom">
				<a target="_blank" rel="nofollow" title="Watch <?php echo $title->title; ?>" href="<?php echo $title->adcenter_link?>">
					<img class="img-responsive img-thumbnail" alt="<?php echo $title->title; ?> backdrop thumbnail" src="<?php echo $title->backdrop_link?>"/>
				</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mbottom center text-center">
				<a target="_blank" rel="nofollow" title="Watch <?php echo $title->title; ?>" href="<?php echo $title->adcenter_link?>">
					<button class="btn btn-block btn-info mbottom">Watch Online Streaming</button>
				</a>
				<a target="_blank" rel="nofollow" title="Buy <?php echo $title->title; ?> DVD" href="<?php echo $title->amazon_link?>">
					<button class="btn btn-block btn-info mbottom">Buy DVD on Amazon</button>
				</a>	
				<?php if (!isbad()):?>
					<div class="fit ads336 mauto"><?php echo $ads; ?></div>
				<?php endif; ?>
			</div>
		</div> 
		<hr />

		<div class="row mbottom">
			<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 mbottom">
				<h1 class="nomargin"><?php echo $title->title; ?> - <?php echo substr($title->release_date, 0, 4); ?></h1>	
				<?php if ($title->tagline):?>
					<h2 class="nomargin"><?php echo $title->tagline; ?></h2>
				<?php endif; ?>
				<?php if ($title->genres):?>
					<p>
						<?php foreach ($title->genres as $gnr):?>
							<a class="label label-info" title="Movies in <?php echo $gnr->name; ?> Genre" href="<?php echo $gnr->link; ?>"><span class="fa fa-plus-square mright5"></span> <?php echo $gnr->name; ?></a>	
						<?php endforeach; ?>
					</p>
				<?php endif; ?>	
				<?php if ($title->overview):?>
					<p class="text-justify">
						<?php echo nl2br($title->overview); ?>	
					</p>
				<?php endif; ?>	
				<?php if ($title->alternative_titles->titles):?>
					<div class="row mbottom">
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-4">
							<strong>A.K.A. : </strong>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-10 col-xs-8">
							<?php foreach ($title->alternative_titles->titles as $titles):?>
								<strong class="mright5 small"><span class="fa fa-check mright5"></span> <?php echo $titles->title; ?></strong>	
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->director):?>
					<div class="row mbottom">
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-4">
							<strong>Director : </strong>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-10 col-xs-8">
							<?php foreach ($title->director as $people):?>
								<a class="label label-info" title="Movies directed by <?php echo $people->name; ?>" href="<?php echo $people->link; ?>"><span class="fa fa-user mright5"></span> <?php echo $people->name; ?></a>	
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>	
				<?php if ($title->producer):?>
					<div class="row mbottom">
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-4">
							<strong>Producer : </strong>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-10 col-xs-8">
							<?php foreach ($title->producer as $people):?>
								<a class="label label-info" title="Movies produced by <?php echo $people->name; ?>" href="<?php echo $people->link; ?>"><span class="fa fa-user mright5"></span> <?php echo $people->name; ?></a>	
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->writer):?>
					<div class="row mbottom">
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-4">
							<strong>Writer : </strong>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-10 col-xs-8">
							<?php foreach ($title->writer as $people):?>
								<a class="label label-info" title="Movies written by <?php echo $people->name; ?>" href="<?php echo $people->link; ?>"><span class="fa fa-user mright5"></span> <?php echo $people->name; ?></a>	
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->stars):?>
					<div class="row mbottom">
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-4">
							<strong>Stars : </strong>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-10 col-xs-8">
							<?php foreach ($title->stars as $people):?>
								<a class="label label-info" title="Movies starred by <?php echo $people->name; ?>" href="<?php echo $people->link; ?>"><span class="fa fa-user mright5"></span> <?php echo $people->name; ?></a>	
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->keywords->keywords):?>
					<div class="row mbottom">
						<div class="col-lg-2 col-md-3 col-sm-2 col-xs-4">
							<strong>Tags : </strong>
						</div>
						<div class="col-lg-10 col-md-9 col-sm-10 col-xs-8">
							<?php foreach ($title->keywords->keywords as $keywords):?>
								<strong class="mright5 small label label-default"><span class="fa fa-tag mright5"></span> <?php echo $keywords->name; ?></strong>	
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 bleft">
				<?php if ($title->status):?>
					<div class="row mbottom">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Status : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<?php if ($title->status == 'Released'):?>
								<span class="label label-success">	
							<?php else:?>
								<span class="label label-warning">	
							<?php endif; ?>
							<?php echo $title->status; ?></span>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->release_date):?>
					<div class="row mbottom">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Release Date : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<span class="small pleft2"><?php echo $title->release_date; ?></span>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->starrating):?>
					<div class="row mbottom">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">TMDB Rating : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<span class="small pleft2 orange"><?php echo $title->starrating; ?></span>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->runtime):?>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Runtime : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<span class="small pleft2"><span class="fa fa-clock-o mright5"></span> <?php echo $title->runtime; ?> minute</span>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->budget):?>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Budget : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<span class="small pleft2"><span class="fa fa-dollar mright5"></span> <?php echo asDollars($title->budget); ?></span>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->revenue):?>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Revenue : </strong>
						</div>	
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<span class="small pleft2"><span class="fa fa-dollar mright5"></span> <?php echo asDollars($title->revenue); ?></span>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->homepage):?>
					<?php if (strpos($title->homepage, 'http://') === false) {
    $title->homepage = 'http://'.$title->homepage;
} ?>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Homepage : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<a target="_blank" title="<?php echo $title->title; ?> Homepage" href="<?php echo $title->homepage; ?>"><span class="small pleft2"><span class="fa fa-external-link-square mright5"></span> <?php echo parse_url($title->homepage, PHP_URL_HOST); ?></span></a>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->imdb_id):?>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">IMDB Page: </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<a target="_blank" title="<?php echo $title->title; ?> IMDB Page" href="http://www.imdb.com/title/<?php echo $title->imdb_id; ?>"><span class="small pleft2"><span class="fa fa-external-link-square mright5"></span> www.imdb.com</span></a>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->lang):?>
					<div class="row mtop">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Language : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<?php for ($i = 0; $i < count($title->lang); $i++):?>
									<span class="small pleft2"><span class="fa fa-flag mright5"></span> <?php echo $title->lang[$i]; ?></span><br />
							<?php endfor; ?>	
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->production_companies):?>
					<div class="row mtop">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Production Companies : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<?php for ($i = 0; $i < count($title->production_companies); $i++):?>
								<span class="small pleft2"><span class="fa fa-bank mright5"></span> <?php echo $title->production_companies[$i]->name; ?></span><br />
							<?php endfor; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($title->production_countries):?>
					<div class="row mtop">
						<div class="col-lg-4 col-md-4 col-sm-2 col-xs-4">
							<strong class="small">Production Countries : </strong>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8">
							<?php for ($i = 0; $i < count($title->production_countries); $i++):?>
								<span class="small pleft2"><span class="fa fa-map-marker mright5"></span> <?php echo $title->production_countries[$i]->name; ?></span><br />
							<?php endfor; ?>
						</div>
					</div>
				<?php endif; ?>
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
	                <li class="active"><a href="#cast" data-toggle="tab"><span class="fa fa-users mright5"></span> Casts</a></li>
	                <li><a href="#crew" data-toggle="tab"><span class="fa fa-users mright5"></span> Crews</a></li>
	                <li><a href="#image" data-toggle="tab"><span class="fa fa-image mright5"></span> Images</a></li>
	                <li><a href="#trailer" data-toggle="tab"><span class="fa fa-youtube mright5"></span> Trailers</a></li>
	                <li><a href="#review" data-toggle="tab"><span class="fa fa-file-text mright5"></span> Reviews</a></li>
	                <li><a href="#similar" data-toggle="tab"><span class="fa fa-film mright5"></span> Similar Movies</a></li>
	                <li><a href="#comments" data-toggle="tab"><span class="fa fa-comments mright5"></span> Comments</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="cast">
						<div class="row text-center">
							<div class="col-lg-12">
								<h2><?php echo $title->title; ?> Casts</h2>
							</div>
						</div>
						<?php if (count($title->credits->cast) > 0):?>
							<div class="row ptop nowrap">
								<?php foreach ($title->credits->cast as $cast):?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 center">
										<a href="<?php echo $cast->link; ?>" title="<?php echo $cast->name; ?>">
											<div class="poster">
												<img class="img-responsive img-thumbnail fit" src="<?php echo $cast->photo_link; ?>" alt="<?php echo $cast->name; ?> photo thumbnail" />
											</div>
											<div class="img-thumbnail postertitle btn-default small">
												<span class="mright5"><?php echo $cast->name; ?></span> <span class="fa fa-arrow-circle-right mright5"></span> <?php echo $cast->character; ?>
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
								<h2><?php echo $title->title; ?> Crews</h2>
							</div>
						</div>
						<?php if (count($title->credits->crew) > 0):?>
					  		<div class="row ptop nowrap">							
								<?php foreach ($title->credits->crew as $crew):?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 center">
										<a href="<?php echo $crew->link; ?>" title="<?php echo $crew->name; ?>">
											<div class="poster">
												<img class="img-responsive img-thumbnail fit" src="<?php echo $crew->photo_link; ?>" alt="<?php echo $crew->name; ?> photo thumbnail" />
											</div>
											<div class="img-thumbnail postertitle btn-default small">
												<span class="mright5"><?php echo $crew->name; ?></span> <span class="fa fa-arrow-circle-right mright5"></span> <?php echo $crew->job; ?>
											</div>
										</a>
									</div>
								<?php endforeach; ?>							
							</div> 
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="image">
						<?php if (count($title->images->posters) > 0):?>
							<div class="row nowrap">
								<div class="col-lg-12">
									<h2 class="text-center"><?php echo $title->title; ?> Poster Images</h2>
								</div>
							</div>
							<div class="row ptop nowrap">
								<?php foreach ($title->images->posters as $poster):?>
									<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 center">
										<a rel="poster_group" href="<?php echo $poster->poster_original_link; ?>" title="<?php echo $title->title; ?> Poster">
												<img class="fboxtmb img-thumbnail mbottom" src="<?php echo $poster->poster_link; ?>" alt="<?php echo $title->title; ?> poster thumbnail" />
										</a>
									</div>
								<?php endforeach; ?>	
							</div>		
						<?php endif; ?>
						<?php if (count($title->images->backdrops) > 0):?>
							<div class="row nowrap">
								<div class="col-lg-12">
									<h2 class="text-center"><?php echo $title->title; ?> Backdrop Images</h2>
								</div>
							</div>
							<div class="row ptop nowrap">
								<?php foreach ($title->images->backdrops as $backdrop):?>
									<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 center">
										<a rel="backdrop_group" href="<?php echo $backdrop->backdrop_original_link; ?>" title="<?php echo $title->title; ?> Backdrop Image">
												<img class="bdtmb img-thumbnail mbottom" src="<?php echo $backdrop->backdrop_link; ?>" alt="<?php echo $title->title; ?> backdrop thumbnail" />
										</a>
									</div>
								<?php endforeach; ?>	
							</div>		
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="trailer">
						<div class="row text-center">
							<div class="col-lg-12">
								<h2><?php echo $title->title; ?> Trailers</h2>
							</div>
						</div>
						<?php if (count($title->videos->results) > 0):?>
							<div class="row ptop nowrap">
								<?php foreach ($title->videos->results as $trailer):?>
									<?php if ($trailer->site == 'YouTube'):?>
										<div class="col-lg-6 center mtop">
											<div class="fit">
												<div class="videoWrapper">
													<iframe width="780px" height="439px" src="https://www.youtube.com/embed/<?php echo $trailer->key; ?>" frameborder="0" allowfullscreen=""></iframe>
												</div>
											</div>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>	
							</div>		
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="review">
						<div class="row text-center">
							<div class="col-lg-12">
								<h2><?php echo $title->title; ?> Reviews</h2>
							</div>
						</div>
						<?php if (count($title->reviews->results) > 0):?>
							<div class="row text-justify">
								<div class="col-lg-12">
								<?php foreach ($title->reviews->results as $review):?>
									<h3><?php echo $title->title; ?> review by <span class="label label-primary small"><span class="fa fa-smile-o mright5"></span> <?php echo $review->author; ?></a></span></h3>	
									<p>
									<?php echo nl2br($review->content); ?>
									</p>
								<?php endforeach; ?>	
								</div>
							</div>		
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="similar">
						<div class="row text-center">
							<div class="col-lg-12">
								<h2><?php echo $title->title; ?> Similar Movies</h2>
							</div>
						</div>
						<?php if (count($title->similar->results) > 0):?>
							<div class="row nowrap ptop">							
								<?php foreach ($title->similar->results as $titl):?>
									<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 center">
										<a href="<?php echo $titl->link; ?>" title="<?php echo $titl->title; ?>">
											<div class="poster">
												<img class="img-responsive img-thumbnail fit" src="<?php echo $titl->poster_link; ?>" alt="<?php echo $titl->title; ?> poster thumbnail" />
											</div>
											<div class="img-thumbnail postertitle btn-default">
												<span class="fa fa-film mright5"></span> <?php echo $titl->title; ?>
											</div>
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