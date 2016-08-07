<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

require 'AltoRouter.php';
include 'config.php';
include 'functions.php';

// header("Cache-Control: max-age=86400");

/**
* routing handler
* routing request inside $match variable
*/
$router = new AltoRouter();
$router->setBasePath('');
$router->map('GET','/', 'loop', 'home');
$router->map('GET','/page/[i:page]', 'loop', 'homepaged');
$router->map('GET','/popular/page/[i:page]', 'loop', 'popularpaged');
$router->map('GET','/popular', 'loop', 'popular');
$router->map('GET','/on-the-air/page/[i:page]', 'loop', 'on-the-airpaged');
$router->map('GET','/on-the-air', 'loop', 'on-the-air');
$router->map('GET','/airing-today/page/[i:page]', 'loop', 'airing-todaypaged');
$router->map('GET','/airing-today', 'loop', 'airing-today');
$router->map('GET','/top-rated/page/[i:page]', 'loop', 'top-ratedpaged');
$router->map('GET','/top-rated', 'loop', 'top-rated');
$router->map('GET','/upcoming/page/[i:page]', 'loop', 'upcomingpaged');
$router->map('GET','/upcoming', 'loop', 'upcoming');
$router->map('GET','/now-playing/page/[i:page]', 'loop', 'nowplayingpaged');
$router->map('GET','/now-playing', 'loop', 'nowplaying');
$router->map('GET','/genre/[:title]/[i:id]/page/[i:page]', 'loop', 'genrepaged');
$router->map('GET','/genre/[:title]/[i:id]', 'loop', 'genre');
$router->map('GET','/search/[:q]/page/[i:page]', 'loop', 'searchpaged');
$router->map('GET','/search/[:q]', 'loop', 'search');
$router->map('GET','/watch-[:title]/[i:id]/season/[i:season_number]/episode/[i:episode_number]', 'single', 'episode');
$router->map('GET','/watch-[:title]/[i:id]/season/[i:season_number]', 'single', 'season');
$router->map('GET','/watch-[:title]/[i:id]', 'single', 'series');
$router->map('GET','/maintenance', 'single', 'maintenance');
$router->map('GET','/person/[:name]/[i:id]', 'single', 'person');
$router->map('GET','/register/[:title]', 'single', 'watch');
$router->map('GET|POST','/page/[:title]', 'single', 'page');
$router->map('GET','/sitemap/[:key]', 'single', 'sitemap');
$router->map('GET','/movie/watch-[:title]/[i:id]', 'single', 'movie');

$match = $router->match();

$curpage = curPageURL();

// handle no $match routes
$is404 = false;
if ($match==false){
	header("HTTP/1.0 404 Not Found",true, 404);
	http_response_code(404);
	$is404 = true;
	include 'config.php';
	include '404.php';
	exit();
}

/**
 * prepare memcache
 */
$memcacheConnected = false;
$memcache = null;
if($config->memcache){
	$memcache = new Memcache;
	$memcacheConnected = $memcache->connect($config->memcachehost,$config->memcacheport);
}

/**
* prepare global variable for general var
*/
// shuffle($apis);
// $config->apikey = $apis[0];
$configuration = get_configuration();
checkrespond($configuration);
$genres = get_genre();
genreslink();
checkrespond($genres);
$basepaginationurl = get_curbase($curpage);
$rsearch = getRecentSearch();


/**
* handle view routing and prepare for varible used in request view
*/

//check if search query avaliable and redirect to search page
checkforquerysearch();

	/**
	* if the request is looped content
	*/
if (is_loop())
{
	/**
	* check if variable page exist in $match variable and handle $paged var
	*/
	if (is_paged()){
		$paged = $match['params']['page'];
	} else {
		$paged = 1;	
	}

	/**
	* check if request is home
	*/
	if (is_home()) {
		//get data from crawl or cache
		$titles = get_popular($paged);
		$looptitle = $config->sitename;
	}

	/**
	* check if request is genre
	*/

	if (is_genre()){
		$id = $match['params']['id'];
		//get data from crawl or cache
		$titles = get_discovermvgenre($id,$paged);
		$genrename = '';
		foreach ($genres->genres as $genre){
			if ($id == $genre->id){
				$genrename = $genre->name;
				break;	
			}
		}
		$looptitle = 'Movies With ' . $genrename . ' Genre';
	}

	/**
	* check if request is upcoming movies
	*/
	if (is_nowplaying()) {
		//get data from crawl or cache
		$titles = get_nowplaying($paged);
		$looptitle = 'Now Playing Movies';
	}

	/**
	* check if request is now playing movies
	*/
	if (is_upcoming()) {
		//get data from crawl or cache
		$titles = get_upcoming($paged);
		$looptitle = 'Upcoming Movies';
	}

	/**
	* check if request is on the air
	*/
	if (is_ontheair()) {
		//get data from crawl or cache
		$titles = get_ontheair($paged);
		$looptitle = 'On The Air TV Shows';
	}
	
	/**
	* check if request is airing today
	*/
	if (is_airingtoday()) {
		//get data from crawl or cache
		$titles = get_airingtoday($paged);
		$looptitle = 'Airing Today TV Shows';
	}
	
	/**
	* check if request is top rated
	*/
	if (is_toprated()){
			//get data from crawl or cache
			$titles = get_toprated($paged);
			$looptitle = 'Top Rated Movies';
		}
	/**
	* check if request is popular
	*/
	if (is_popular()){
			//get data from crawl or cache
			$titles = get_popular($paged);
			$looptitle = 'Most Popular Movies';
		}
	/**
	* check if request is home
	*/
	if (is_search()){			
			$q = $match['params']['q'];
			//get data from crawl or cache
			$titles = get_search($q,$paged);
			$looptitle = 'Search For Movies';
			if($titles->results){
				handleRecentSearch($q);
			}
	}
	//check for crawl respond
	checkrespond($titles);
	// preparing needed variable for view page
	prepareloop();
	include 'loop.php';
}
	
	/**
	* if the request is single content
	*/
elseif (is_single())
{
	/**
	 * Check if request is series
	 */
	if (is_series())
	{
		$id = $match['params']['id'];
		//get data from crawl or cache
		$title = get_tv($id);

		checkrespond($title);
		// preparing needed variable for view page
		prepareseries();
		include 'series.php';
	}

	/**
	 * Check if request is movie
	 */
	if (is_movie())
	{
		$id = $match['params']['id'];
		//get data from crawl or cache
		$title = get_movie($id);

		checkrespond($title);
		// preparing needed variable for view page
		preparemovie();
		include 'movie.php';
	}
	
	/**
	 * Check if request is season
	 */
	if(is_season())
	{
		$id = $match['params']['id'];
		$season_number = $match['params']['season_number'];
		//get data from crawl or cache
		$title = get_tv($id);
		$seasondata = get_season($id, $season_number);
		
		checkrespond($title);
		checkrespond($seasondata);
		
		prepareseries();
		prepareSeason();
		
		include 'season.php';
	}
	
	/**
	 * Check if request is episode
	 */
	if(is_episode())
	{
		$id = intval($match['params']['id']);
		$season_number = intval($match['params']['season_number']);
		$episode_number = intval($match['params']['episode_number']);
		//get data from crawl or cache
		$title = get_tv($id);
		$seasondata = get_season($id, $season_number);
		$episode = get_episode($id, $season_number, $episode_number);
		
		checkrespond($title);
		checkrespond($seasondata);
		checkrespond($episode);
		
		prepareseries();
		prepareSeason();
		prepareEpisode();
		// printvar($episode->credits->cast);
		include 'episode.php';
	}
	
	/**
	 * Check if request is view person
	 */
	if(is_person())
	{
		$id = intval($match['params']['id']);
		//get data from crawl or cache
		$person = get_person($id);
		
		checkrespond($person);
		preparePerson();
		
		include 'person.php';
	}

	/**
	 * Check if request is view page
	 */
	if(is_page())
	{
		$pagefile = $match['params']['title'];	
		include 'page.php';
	}

	/**
	 * Check if request is sitemap page
	 */
	if(is_sitemap())
	{
		include 'smap.php';
	}

	/**
	 * Check if request is view watch
	 */
	if(is_watch())
	{
		$title = base64_decode($match['params']['title']);
		$title = str_replace('&', 'and', $title);
		$url = 'http://ads.ad-center.com/offer?prod=3&ref=' . $GLOBALS['config']->adcenter_ref .
				'&q=' . urlencode($title);	
		if($match['params']['title']=='free'){
			$url = 'http://ads.ad-center.com/offer?prod=3&ref=' . $GLOBALS['config']->adcenter_ref;	
		}
		include 'watch.php';
	}
}

// $input = array('pagetype' => 'popularpaged', 'params' => array('page' => 6, 'id' => 1234,'season_number' => 5,'title' => sanitizetitle('The Flash')));
// $link = gen_internal_link($input);
// printvar(ucwords(urldecode($q)));
// printvar($router);
// printvar(gettype(json_encode(array(1,2,3,4))));
// printvar($match);
// printvar($configuration);
// printvar($rsearch);
// printvar($seasondata);
// printvar($person);
// printvar(get_header());
// printvar($genres);
// printvar($title);
// printvar($episode);
// printvar($curpage);
