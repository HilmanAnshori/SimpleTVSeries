<?php
/**
 * TMDB API handler.
 */



/**
 * Get configuration from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @return object
 */
function get_configuration()
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'configuration?api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 *  TMDB Movies.
 */

/**
 * Get movie title list using discover from tmdb API for homepage.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_discovermvhome($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'discover/movie?primary_release_date.gte=1945-01-01&sort_by=vote_average.desc&page='.
           $page.'&api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get genre list for movies from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @return object
 */
function get_mvgenre()
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'genre/movie/list?api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get movie list by genre from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $id   tmdb genre id
 * @param int $page page
 *
 * @return object
 */
function get_discovermvgenre($id, $page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'discover/movie?sort_by=popularity.desc&with_genres='.$id.'&page='.
           $page.'&api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 *  TMDB TV Series.
 */

/**
 * Get genre list for tv series from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @return object
 */
function get_genre()
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'genre/tv/list?api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get popular tv series titles from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_popular($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'tv/popular?page='.$page.'&api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get latest tv from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_latest($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'tv/latest?page='.$page.'&api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get title list using discover from tmdb API for homepage.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_discoverhome($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'discover/tv?first_air_date.gte=1980-01-01&sort_by=vote_average.desc&page='.
           $page.'&api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get title list by genre from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $id   tmdb genre id
 * @param int $page page
 *
 * @return object
 */
function get_discovergenre($id, $page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'discover/tv?sort_by=popularity.desc&with_genres='.$id.'&page='.
           $page.'&api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get search result title list using query keywords from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $q    query keywords
 * @param int $page page
 *
 * @return object
 */
function get_search($q, $page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'search/tv?query='.$q.'&include_adult=false&page='.
           $page.'&api_key='.$config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get on the air title list from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_ontheair($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'tv/on_the_air?page='.$page.'&api_key='.
           $config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get airing today title list from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_airingtoday($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'tv/airing_today?page='.$page.'&api_key='.
           $config->apikey;
    $ret = json_decode(get_datacache($url, 1));

    return $ret;
}

/**
 * Get top rated title list from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_toprated($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'movie/top_rated?page='.$page.'&api_key='.
           $config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get upcoming movie list from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_upcoming($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'movie/upcoming?page='.$page.'&api_key='.
           $config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get upcoming movie list from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $page page
 *
 * @return object
 */
function get_nowplaying($page = 1)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'movie/now_playing?page='.$page.'&api_key='.
           $config->apikey;
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get movie details from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $id   tmdb title id
 * @param int $page page
 *
 * @return object
 */
function get_movie($id)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'movie/'.$id.'?api_key='.
           $config->apikey.'&append_to_response=credits,external_ids,videos,similar,reviews,keywords,images,alternative_titles';
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get tv details from tmdb API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $id   tmdb title id
 * @param int $page page
 *
 * @return object
 */
function get_tv($id)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'tv/'.$id.'?api_key='.
           $config->apikey.'&append_to_response=credits,external_ids,videos';
    $ret = json_decode(get_datacache($url, $config->cachetime));

    return $ret;
}

/**
 * Get season details from TMDB API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $id            tmdb title id
 * @param int $season_number season number
 *
 * @return object
 */
function get_season($id, $season_number)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'tv/'.$id.'/season/'.$season_number.'?api_key='.
           $config->apikey.'&append_to_response=credits,external_ids,videos';
    $data = get_datacache($url, $config->cachetime);

    return json_decode($data);
}

/**
 * Get episode details from TMDB API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $id             tmdb title id
 * @param int $season_number  season number
 * @param int $episode_number episode number
 *
 * @return object
 */
function get_episode($id, $season_number, $episode_number)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'tv/'.$id.'/season/'.$season_number.'/episode/'.$episode_number.
           '?api_key='.$config->apikey.'&append_to_response=credits,videos,external_ids';
    $data = get_datacache($url, $config->cachetime);

    return json_decode($data);
}

/**
 * Get person details from TMDB API.
 *
 * @global object $GLOBALS['config']
 *
 * @param int $id tmdb person id
 *
 * @return object
 */
function get_person($id)
{
    shuffleapikey();
    $config = $GLOBALS['config'];
    $url = $config->apibase.'person/'.$id.
           '?api_key='.$config->apikey.'&append_to_response=movie_credits,external_ids,images';
    $data = get_datacache($url, $config->cachetime);

    return json_decode($data);
}

/**
 * General Funtions.
 */
function genreslink()
{
    $genres = $GLOBALS['genres'];
    if ($genres->genres) {
        foreach ($genres->genres as $genre) {
            //create genres link
            $input = [
                'pagetype' => 'genre',
                'params'   => [
                    'id'    => $genre->id,
                    'title' => sanitizetitle($genre->name),
                    ],
                ];
            $genre->link = gen_internal_link($input);
        }
    }
}

function getRecentSearch()
{
    $config = $GLOBALS['config'];
    $memcacheConnected = $GLOBALS['memcacheConnected'];
    $memcache = $GLOBALS['memcache'];
    $key = md5('recentsearch');
    $output = '';
    if ($config->memcache && $memcacheConnected) {
        $ret = json_decode($memcache->get($key));
        $kw = [];
        if ($ret) {
            foreach ($ret as $rt) {
                $input = [
                    'pagetype' => 'search',
                    'params'   => [
                        'q' => urlencode($rt),
                        ],
                    ];
                $kw[] = '<a title="Search movies using keywords : '.$rt.'" href="'.gen_internal_link($input).'"><span class="fa fa-search-plus mright5"></span> '.$rt.'</a> ';
            }
            $output = implode('', $kw);
        }
    }

    return $output;
}

function handleRecentSearch($q)
{
    $config = $GLOBALS['config'];
    $memcacheConnected = $GLOBALS['memcacheConnected'];
    $memcache = $GLOBALS['memcache'];
    $key = md5('recentsearch');
    $kwords = [];
    $q = ucwords(urldecode($q));
    if ($config->memcache && $memcacheConnected) {
        $ret = json_decode($memcache->get($key));
        if ($ret) {
            if (!in_array($q, $ret, true)) {
                if (count($ret) == $config->recentsearchcount) {
                    array_shift($ret);
                }
                $ret[] = $q;
                $ret = json_encode($ret);
                $memcache->set($key, $ret, false, $config->rsearchcachetime);
            }
        } else {
            $kwords[] = $q;
            $ret = json_encode($kwords);
            $memcache->set($key, $ret, false, $config->rsearchcachetime);
        }
    }
}

/**
 * File caching handler.
 *
 * @global object $GLOBALS['config']
 * @global bool $GLOBALS['memcacheConnected']
 * @global object $GLOBALS['memcache']
 *
 * @param string $url   tmdb API url request
 * @param int    $hours cache time in hours
 *
 * @return string json string
 */
function get_datacache($url, $hours = 24)
{
    $config = $GLOBALS['config'];
    $apis = $GLOBALS['apis'];
    $memcacheConnected = $GLOBALS['memcacheConnected'];
    $memcache = $GLOBALS['memcache'];
    $cc = str_replace($apis, '', $url);
    $key = md5($cc);
    $file = $config->cache_folder.'/'.$key;
    if (file_exists($file)) {
        $current_time = time();
        $expire_time = $hours * 60 * 60;
        $file_time = filemtime($file);
        //check if cache file exist and if cache file has expired
        if (file_exists($file) && ($current_time - $expire_time < $file_time)) {
            if ($config->memcache && $memcacheConnected) {
                $output = $memcache->get($key);
                if ($output) {
                    // printvar('konten di memcache ada, return konten dari memcache');
                    return $output;
                } else {
                    $output = file_get_contents($file);
                    if (is_json($output)) {
                        $memcache->set($key, $output, false, $config->memcachetime);
                        // printvar('konten di memcache ga ada, jadi di cache dulu konten ke memcache');
                        return $output;
                    } else {
                        $output = ['error' => 'file cache error', 'error_message' => 'error file_get_contents file cache : '.$key];

                        return json_encode($output);
                    }
                }
            } else {
                $output = file_get_contents($file);
                if (is_json($output)) {
                    return $output;
                } else {
                    $output = ['error' => 'file cache error', 'error_message' => 'error file_get_contents file cache : '.$key];

                    return json_encode($output);
                }
            }
        } else {
            $content = crawltmdb($url);
            if (is_json($content)) {
                $cek = json_decode($content);
                if (!isset($cek->status_code)) {
                    file_put_contents($file, $content);
                    if ($config->memcache && $memcacheConnected) {
                        $memcache->set($key, $content, false, $config->memcachetime);
                        // printvar('filecache expire, jadi cache dulu konten ke memcache');
                    }

                    return $content;
                } else {
                    $output = ['error' => 'respon tmdb api error'];
                    if (empty($content)) {
                        $output['error_message'] = 'content kosong!';
                    } else {
                        $output['error_message'] = json_encode($content).PHP_EOL.$url;
                    }

                    return json_encode($output);
                }
            } else {
                $output = ['error' => 'crawl error'];
                if (empty($content)) {
                    $output['error_message'] = 'content kosong!';
                } else {
                    $output['error_message'] = $content;
                }

                return json_encode($output);
            }
        }
    } else {
        $content = crawltmdb($url);
        if (is_json($content)) {
            $cek = json_decode($content);
            if (!isset($cek->status_code)) {
                file_put_contents($file, $content);
                if ($config->memcache && $memcacheConnected) {
                    $memcache->set($key, $content, false, $config->memcachetime);
                    // printvar('filecache blm ada, jadi cache dulu konten ke memcache');
                }

                return $content;
            } else {
                $output = ['error' => 'respon tmdb api error'];
                if (empty($content)) {
                    $output['error_message'] = 'content kosong!';
                } else {
                    $output['error_message'] = json_encode($content).PHP_EOL.$url;
                }

                return json_encode($output);
            }
        } else {
            $output = ['error' => 'crawl error'];
            if (empty($content)) {
                $output['error_message'] = 'content kosong!';
            } else {
                $output['error_message'] = $content;
            }

            return json_encode($output);
        }
    }
}

/**
 * TMDB curl crawler handler.
 *
 * @param  string tmdp API request url
 *
 * @return string
 */
function crawltmdb($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

/**
 * Preparing movie object for loop view.
 *
 * @global object $GLOBALS['titles']
 * @global object $GLOBALS['configuration']
 */
function preparemvloop()
{
    $titles = $GLOBALS['titles'];
    $configuration = $GLOBALS['configuration'];

    if (count($titles->results) > 0):
        for ($i = 0; $i < count($titles->results); $i++):

            //create title link
            $input = [
                'pagetype' => 'movie',
                'params'   => [
                    'id'    => $titles->results[$i]->id,
                    'title' => sanitizetitle($titles->results[$i]->title),
                    ],
                ];
    $titles->results[$i]->link = gen_internal_link($input);

            //create poster link
            if (empty($titles->results[$i]->poster_path)) {
                $titles->results[$i]->poster_link = 'images/na.png';
            } else {
                $titles->results[$i]->poster_link = $configuration->images->base_url.
                    $configuration->images->poster_sizes[3].$titles->results[$i]->poster_path;
            }
    endfor;
    endif;
}

/**
 * Preparing object for loop view.
 *
 * @global object $GLOBALS['titles']
 * @global object $GLOBALS['configuration']
 */
function prepareloop()
{
    $titles = $GLOBALS['titles'];
    $configuration = $GLOBALS['configuration'];

    if (count($titles->results) > 0):
        for ($i = 0; $i < count($titles->results); $i++):

            //create title link
            $input = [
                'pagetype' => 'series',
                'params'   => [
                    'id'    => $titles->results[$i]->id,
                    'title' => sanitizetitle($titles->results[$i]->name),
                    ],
                ];
    $titles->results[$i]->link = gen_internal_link($input);

            //create poster link
            if (empty($titles->results[$i]->poster_path)) {
                $titles->results[$i]->poster_link = 'images/na.png';
            } else {
                $titles->results[$i]->poster_link = $configuration->images->base_url.
                    $configuration->images->poster_sizes[3].$titles->results[$i]->poster_path;
            }
    if (empty($titles->results[$i]->backdrop_path)) {
        $titles->results[$i]->backdrop_link = 'images/backdropna.png';
    } else {
        $titles->results[$i]->backdrop_link = $configuration->images->base_url.
                    $configuration->images->backdrop_sizes[0].$titles->results[$i]->backdrop_path;
    }
    endfor;
    endif;
}

/**
 * Preparing object for movie view.
 *
 * @global  object $GLOBALS['title']
 * @global  object $GLOBALS['configuration']
 * @global  object $GLOBALS['config']
 */
function preparemovie()
{
    $title = $GLOBALS['title'];
    $configuration = $GLOBALS['configuration'];
    $config = $GLOBALS['config'];

    //create title link
    $input = [
                'pagetype' => 'movie',
                'params'   => [
                    'id'    => $title->id,
                    'title' => sanitizetitle($title->title),
                    ],
                ];
    $title->link = gen_internal_link($input);

    //create popularity percent for star rating
    if ($title->vote_average) {
        $title->popularitypercent = round((($title->vote_average / 10) * 100));
    } else {
        $title->popularitypercent = 0;
    }

    //create star rating
    $starrating = '';
    if ($title->vote_average) {
        $whole = floor($title->vote_average);
        $fraction = $title->vote_average - $whole;
        for ($i = 0; $i < 10; $i++) {
            if ($i < $whole) {
                $starrating .= '<span class="fa fa-star"></span>';
            } else {
                if ($i == $whole) {
                    if ($fraction > 0) {
                        $starrating .= '<span class="fa fa-star-half-o"></span>';
                    } else {
                        $starrating .= '<span class="fa fa-star-o"></span>';
                    }
                } else {
                    $starrating .= '<span class="fa fa-star-o"></span>';
                }
            }
        }
    } else {
        for ($i = 0; $i < 10; $i++) {
            $starrating .= '<span class="fa fa-star-o"></span>';
        }
    }
    $title->starrating = $starrating;

    // Create genres link
    if ($title->genres) {
        for ($i = 0; $i < count($title->genres); $i++) {
            $input = [
                        'pagetype' => 'genre',
                        'params'   => [
                            'id'    => $title->genres[$i]->id,
                            'title' => sanitizetitle($title->genres[$i]->name),
                            ],
                        ];
            $title->genres[$i]->link = gen_internal_link($input);
        }
    }

    //create title runtime text
    if ($title->runtime) {
        $title->rtime = $title->runtime.' minute';
    } else {
        $title->rtime = ' - ';
    }

    //create title production companies text
    $companies = [];
    if ($title->production_companies) {
        for ($i = 0; $i < count($title->production_companies); $i++) {
            $companies[] = $title->production_companies[$i]->name;
        }
        $title->companies = implode(' | ', $companies);
    } else {
        $title->companies = ' - ';
    }

    //create title production countriestext
    $countries = [];
    if ($title->production_countries) {
        for ($i = 0; $i < count($title->production_countries); $i++) {
            $countries[] = $title->production_countries[$i]->name;
        }
        $title->countries = implode(' | ', $countries);
    } else {
        $title->countries = ' - ';
    }

    //create title lang array
    $lang = [];
    if ($title->spoken_languages) {
        for ($i = 0; $i < count($title->spoken_languages); $i++) {
            $lang[] = $title->spoken_languages[$i]->name;
        }
    }
    $title->lang = $lang;

    //create cast link & person photo link
    if ($title->credits->cast) {
        for ($i = 0; $i < count($title->credits->cast); $i++) {
            $input = [
                'pagetype' => 'person',
                'params'   => [
                    'id'   => $title->credits->cast[$i]->id,
                    'name' => sanitizetitle($title->credits->cast[$i]->name),
                    ],
                ];
            // $person = get_person($title->credits->cast[$i]->id);
            // if(isset($person->id)){
                $title->credits->cast[$i]->link = gen_internal_link($input);
            // }
            if ($title->credits->cast[$i]->profile_path) {
                $title->credits->cast[$i]->photo_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[2].$title->credits->cast[$i]->profile_path;
            } else {
                $title->credits->cast[$i]->photo_link = 'images/personna.png';
            }
        }
    }

    //create crew link & person photo link
    if ($title->credits->crew) {
        for ($i = 0; $i < count($title->credits->crew); $i++) {
            $input = [
                'pagetype' => 'person',
                'params'   => [
                    'id'   => $title->credits->crew[$i]->id,
                    'name' => sanitizetitle($title->credits->crew[$i]->name),
                    ],
                ];
            // $person = get_person($title->credits->cast[$i]->id);
            // if(isset($person->id)){
                $title->credits->crew[$i]->link = gen_internal_link($input);
            // }
            if ($title->credits->crew[$i]->profile_path) {
                $title->credits->crew[$i]->photo_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[2].$title->credits->crew[$i]->profile_path;
            } else {
                $title->credits->crew[$i]->photo_link = 'images/personna.png';
            }
        }
    }


    //create poster & poster original link
    if (empty($title->poster_path)) {
        $title->poster_link = 'images/na.png';
        $title->poster_original_link = 'images/na.png';
    } else {
        $title->poster_link = $configuration->images->base_url.
            $configuration->images->poster_sizes[3].$title->poster_path;
        $title->poster_original_link = $configuration->images->base_url.
            $configuration->images->poster_sizes[6].$title->poster_path;
    }

    //create backdrop & backdrop original link
    if (empty($title->backdrop_path)) {
        $title->backdrop_link = 'images/backdropna.png';
        $title->backdrop_original_link = 'images/backdropna.png';
    } else {
        $title->backdrop_link = $configuration->images->base_url.
            $configuration->images->backdrop_sizes[1].$title->backdrop_path;
        $title->backdrop_original_link = $configuration->images->base_url.
            $configuration->images->backdrop_sizes[3].$title->backdrop_path;
    }

    //create backdrops & backdrops original link
    if ($title->images->backdrops) {
        for ($i = 0; $i < count($title->images->backdrops); $i++) {
            if (empty($title->images->backdrops[$i]->file_path)) {
                $title->images->backdrops[$i]->backdrop_link = 'images/backdropna.png';
                $title->images->backdrops[$i]->backdrop_original_link = 'images/backdropna.png';
            } else {
                $title->images->backdrops[$i]->backdrop_link = $configuration->images->base_url.
                    $configuration->images->backdrop_sizes[0].$title->images->backdrops[$i]->file_path;
                $title->images->backdrops[$i]->backdrop_original_link = $configuration->images->base_url.
                    $configuration->images->backdrop_sizes[3].$title->images->backdrops[$i]->file_path;
            }
        }
    }

    //create posters & posters original link
    if ($title->images->posters) {
        for ($i = 0; $i < count($title->images->posters); $i++) {
            if (empty($title->images->posters[$i]->file_path)) {
                $title->images->posters[$i]->poster_link = 'images/na.png';
                $title->images->posters[$i]->poster_original_link = 'images/na.png';
            } else {
                $title->images->posters[$i]->poster_link = $configuration->images->base_url.
                    $configuration->images->poster_sizes[1].$title->images->posters[$i]->file_path;
                $title->images->posters[$i]->poster_original_link = $configuration->images->base_url.
                    $configuration->images->poster_sizes[6].$title->images->posters[$i]->file_path;
            }
        }
    }

    //Create similar movies link
    if ($title->similar->results) {
        for ($i = 0; $i < count($title->similar->results); $i++) {
            $input = [
                        'pagetype' => 'movie',
                        'params'   => [
                            'id'    => $title->similar->results[$i]->id,
                            'title' => sanitizetitle($title->similar->results[$i]->title),
                            ],
                        ];
            $title->similar->results[$i]->link = gen_internal_link($input);
            if ($title->similar->results[$i]->vote_average) {
                $title->similar->results[$i]->popularitypercent = round((($title->similar->results[$i]->vote_average / 10) * 100));
            } else {
                $title->similar->results[$i]->popularitypercent = 0;
            }
            if (empty($title->similar->results[$i]->poster_path)) {
                $title->similar->results[$i]->poster_link = 'images/na.png';
            } else {
                $title->similar->results[$i]->poster_link = $configuration->images->base_url.
                    $configuration->images->poster_sizes[2].$title->similar->results[$i]->poster_path;
            }
        }
    }

    // Create Director, Producer and Writer array
    $director = [];
    $producer = [];
    $writer = [];
    if ($title->credits->crew) {
        for ($i = 0; $i < count($title->credits->crew); $i++) {
            if ($title->credits->crew[$i]->job == 'Director') {
                $director[] = $title->credits->crew[$i];
            }
            if ($title->credits->crew[$i]->job == 'Producer') {
                $producer[] = $title->credits->crew[$i];
            }
            if ($title->credits->crew[$i]->job == 'Writer') {
                $writer[] = $title->credits->crew[$i];
            }
        }
    }
    $title->director = $director;
    $title->producer = $producer;
    $title->writer = $writer;

    // Create Stars array
    $stars = [];
    if ($title->credits->cast) {
        for ($i = 0; $i < count($title->credits->cast); $i++) {
            if ($i < 5) {
                $stars[] = $title->credits->cast[$i];
            } else {
                break;
            }
        }
    }
    $title->stars = $stars;

    //create ad-center link
    $input = [
                'pagetype' => 'watch',
                'params'   => [
                    'title' => base64_encode($title->title.' movie'),
                    ],
                ];
    $title->adcenter_link = gen_internal_link($input);

    //create amazon link
    $title->amazon_link = 'http://www.amazon.com/gp/search?ie=UTF8&camp=1789&creative=9325&index=dvd&keywords='.
                             urlencode($title->title.' movie').'&linkCode=ur2&tag='.$config->amazon_tag.
                             '&linkId=CY2N5QGG7TSGRCV7';
}

/**
 * Preparing object for series view.
 *
 * @global  object $GLOBALS['title']
 * @global  object $GLOBALS['configuration']
 * @global  object $GLOBALS['config']
 */
function prepareseries()
{
    $title = $GLOBALS['title'];
    $configuration = $GLOBALS['configuration'];
    $config = $GLOBALS['config'];

    //create title link
    $input = [
                'pagetype' => 'series',
                'params'   => [
                    'id'    => $title->id,
                    'title' => sanitizetitle($title->name),
                    ],
                ];
    $title->link = gen_internal_link($input);

    //create popularity percent for star rating
    if ($title->vote_average) {
        $title->popularitypercent = round((($title->vote_average / 10) * 100));
    } else {
        $title->popularitypercent = 0;
    }

    //create seasons and genres link

    if ($title->seasons) {
        for ($i = 0; $i < count($title->seasons); $i++) {
            $input = [
                        'pagetype' => 'season',
                        'params'   => [
                            'id'            => $title->id,
                            'title'         => sanitizetitle($title->name),
                            'season_number' => $title->seasons[$i]->season_number,
                            ],
                        ];
            if (is_int($title->seasons[$i]->season_number)) {
                $title->seasons[$i]->link = gen_internal_link($input);
            }
            if ($title->seasons[$i]->air_date) {
                $newdate = date('F j, Y', strtotime($title->seasons[$i]->air_date));
                $title->seasons[$i]->adate = $newdate;
            } else {
                $title->seasons[$i]->adate = '';
            }
        }
    }
    $gnr = [];
    $title->gnr = '';
    if ($title->genres) {
        for ($i = 0; $i < count($title->genres); $i++) {
            $input = [
                        'pagetype' => 'genre',
                        'params'   => [
                            'id'    => $title->genres[$i]->id,
                            'title' => sanitizetitle($title->genres[$i]->name),
                            ],
                        ];
            $title->genres[$i]->link = gen_internal_link($input);
            $gnr[] = $title->genres[$i]->name;
        }
        $title->gnr = implode(', ', $gnr);
    }

    //create title runtime text
    $rtime = [];
    if ($title->episode_run_time) {
        for ($i = 0; $i < count($title->episode_run_time); $i++) {
            $rtime[] = $title->episode_run_time[$i];
        }
        $title->rtime = implode(', ', $rtime).' minute';
    } else {
        $title->rtime = ' - ';
    }

    //create title network text
    $nworks = [];
    if ($title->networks) {
        for ($i = 0; $i < count($title->networks); $i++) {
            $nworks[] = $title->networks[$i]->name;
        }
        $title->nworks = implode(' | ', $nworks);
    } else {
        $title->nworks = ' - ';
    }

    //create title lang text
    $lang = [];
    if ($title->languages) {
        for ($i = 0; $i < count($title->languages); $i++) {
            $lang[] = $title->languages[$i];
        }
        $title->lang = implode(' - ', $lang);
    } else {
        $title->lang = ' - ';
    }

    //create person link & person photo link
    $cst = [];
    $title->cst = '';
    if ($title->credits->cast) {
        for ($i = 0; $i < count($title->credits->cast); $i++) {
            $input = [
                'pagetype' => 'person',
                'params'   => [
                    'id'   => $title->credits->cast[$i]->id,
                    'name' => sanitizetitle($title->credits->cast[$i]->name),
                    ],
                ];
            // $person = get_person($title->credits->cast[$i]->id);
            // if(isset($person->id)){
                $title->credits->cast[$i]->link = gen_internal_link($input);
            // }
            if ($title->credits->cast[$i]->profile_path) {
                $title->credits->cast[$i]->photo_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[2].$title->credits->cast[$i]->profile_path;
            } else {
                $title->credits->cast[$i]->photo_link = 'images/personna.png';
            }
            if ($title->credits->cast[$i]->character) {
                $cst[] = $title->credits->cast[$i]->name.' ('.$title->credits->cast[$i]->character.')';
            } else {
                $cst[] = $title->credits->cast[$i]->name;
            }
        }
        $title->cst = implode(', ', $cst);
    }

    //create title crew text
    $crew = [];
    if ($title->credits->crew) {
        for ($i = 0; $i < count($title->credits->crew); $i++) {
            $crew[] = $title->credits->crew[$i]->name;
        }
        $title->crew = implode(' - ', $crew);
    } else {
        $title->crew = ' - ';
    }

    //create title writer
    $writer = [];
    if ($title->created_by) {
        for ($i = 0; $i < count($title->created_by); $i++) {
            $writer[] = $title->created_by[$i]->name;
        }
        $title->writer = implode(' - ', $writer);
    } else {
        $title->writer = ' - ';
    }

    //create poster & poster original link
    if (empty($title->poster_path)) {
        $title->poster_link = 'images/na.png';
        $title->poster_original_link = 'images/na.png';
    } else {
        $title->poster_link = $configuration->images->base_url.
            $configuration->images->poster_sizes[3].$title->poster_path;
        $title->poster_original_link = $configuration->images->base_url.
            $configuration->images->poster_sizes[6].$title->poster_path;
    }

    //create backdrop image link
    if (empty($title->backdrop_path)) {
        $title->backdrop_link = 'images/backdropna.png';
    } else {
        $title->backdrop_link = $configuration->images->base_url.
            $configuration->images->backdrop_sizes[2].$title->backdrop_path;
    }

    //create ad-center link
    $input = [
                'pagetype' => 'watch',
                'params'   => [
                    'title' => base64_encode($title->name.' tv series'),
                    ],
                ];
    $title->adcenter_link = gen_internal_link($input);

    //create amazon link
    $title->amazon_link = 'http://www.amazon.com/gp/search?ie=UTF8&camp=1789&creative=9325&index=dvd&keywords='.
                             urlencode($title->name.' tv show').'&linkCode=ur2&tag='.$config->amazon_tag.
                             '&linkId=CY2N5QGG7TSGRCV7';

    //create youtube trailer or backdrop image im not exist
    if ($title->videos->results) {
        $title->trailer = '<div class="videoWrapper"><iframe width="780px" height="439px" src="https://www.youtube.com/embed/'.
                            $title->videos->results[0]->key.'" frameborder="0" allowfullscreen></iframe></div>';
    } else {
        $title->trailer = '<a rel="nofollow" target="_blank" href="'.$title->adcenter_link.'" title="Watch '.
                          $title->name.'"><div class="image fit" style="margin:0"><img style="max-height:504px" src="'.$title->backdrop_link.
                          '" alt="'.$title->name.' backdrop image" /></div></a>';
    }
}

/**
 * Preparing object for season view.
 *
 * @global object $GLOBALS['title']
 * @global object $GLOBALS['seasondata']
 * @global  object $GLOBALS['configuration']
 * @global  object $GLOBALS['config']
 */
function prepareSeason()
{
    $title = $GLOBALS['title'];
    $season = $GLOBALS['seasondata'];
    $configuration = $GLOBALS['configuration'];
    $config = $GLOBALS['config'];

    //create descriptions
    if ($season->overview) {
        $season->description = $season->overview.'<br /><i>'.$title->overview.'</i>';
        $title->overview = $season->description;
    } else {
        $season->description = $title->name.' '.$season->name.' aired on '.$season->air_date.
                                '. '.$title->overview;
    }

    //create episodes link & still image
    if ($season->episodes) {
        for ($i = 0; $i < count($season->episodes); $i++) {
            $season->episodes[$i]->adate = '';
            $input = [
                        'pagetype' => 'episode',
                        'params'   => [
                            'id'             => $title->id,
                            'title'          => sanitizetitle($title->name),
                            'season_number'  => $season->season_number,
                            'episode_number' => $season->episodes[$i]->episode_number,
                            ],
                        ];
            if (is_int($season->episodes[$i]->episode_number)) {
                $season->episodes[$i]->link = gen_internal_link($input);
            }
            if (empty($season->episodes[$i]->still_path)) {
                $season->episodes[$i]->still_link = 'images/stillna.png';
            } else {
                $season->episodes[$i]->still_link = $configuration->images->base_url.
                    $configuration->images->still_sizes[2].$season->episodes[$i]->still_path;
            }
            if ($i == 1) {
                $title->backdrop_link = $season->episodes[$i]->still_link = $configuration->images->base_url.
                    $configuration->images->still_sizes[3].$season->episodes[$i]->still_path;
            }
            $newdate = date('F j, Y', strtotime($season->episodes[$i]->air_date));
            $season->episodes[$i]->adate = $newdate;
        }
    }

    //create season crew list
    $crew = [];
    if ($season->credits->crew) {
        for ($i = 0; $i < count($season->credits->crew); $i++) {
            $crew[] = $season->credits->crew[$i]->name;
        }
        $season->crew = implode(' - ', $crew);
    } else {
        $season->crew = ' - ';
    }

    //create poster & poster original link
    if (empty($season->poster_path)) {
        $season->poster_link = 'images/na.png';
        $season->poster_original_link = 'images/na.png';
    } else {
        $season->poster_link = $configuration->images->base_url.
            $configuration->images->poster_sizes[3].$season->poster_path;
        $season->poster_original_link = $configuration->images->base_url.
            $configuration->images->poster_sizes[6].$season->poster_path;
    }

    //create season person link & person photo link
    $cst = [];
    $season->cst = '';
    if ($season->credits->cast) {
        for ($i = 0; $i < count($season->credits->cast); $i++) {
            $input = [
                'pagetype' => 'person',
                'params'   => [
                    'id'   => $season->credits->cast[$i]->id,
                    'name' => sanitizetitle($season->credits->cast[$i]->name),
                    ],
                ];
            // $person = get_person($season->credits->cast[$i]->id);
            // if(isset($person->id)){
                $season->credits->cast[$i]->link = gen_internal_link($input);
            // }
            if ($season->credits->cast[$i]->profile_path) {
                $season->credits->cast[$i]->photo_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[2].$season->credits->cast[$i]->profile_path;
            } else {
                $season->credits->cast[$i]->photo_link = 'images/personna.png';
            }
            if ($season->credits->cast[$i]->character) {
                $cst[] = $season->credits->cast[$i]->name.' ('.$season->credits->cast[$i]->character.')';
            } else {
                $cst[] = $season->credits->cast[$i]->name;
            }
        }
        $season->cst = implode(', ', $cst);
    }

    //create season ad-center link
    $input = [
                'pagetype' => 'watch',
                'params'   => [
                    'title' => base64_encode($title->name.' '.$season->name.' tv series'),
                    ],
                ];
    $season->adcenter_link = gen_internal_link($input);

    //create season amazon link
    $season->amazon_link = 'http://www.amazon.com/gp/search?ie=UTF8&camp=1789&creative=9325&index=dvd&keywords='.
                             urlencode($title->name.' '.$season->name.' tv show').'&linkCode=ur2&tag='.$config->amazon_tag.
                             '&linkId=CY2N5QGG7TSGRCV7';

    //create season youtube trailer or backdrop image im not exist
    if ($season->videos->results) {
        $season->trailer = '<div class="videoWrapper"><iframe width="780px" height="439px" src="https://www.youtube.com/embed/'.
                            $season->videos->results[0]->key.'" frameborder="0" allowfullscreen></iframe></div>';
    } else {
        $season->trailer = '<a rel="nofollow" target="_blank" href="'.$season->adcenter_link.'" title="Watch '.
                          $title->name.' '.$season->name.'"><div class="image fit" style="margin:0"><img style="max-height:504px" src="'.$title->backdrop_link.
                          '" alt="'.$title->name.' '.$season->name.' backdrop image" /></div></a>';
    }
}

/**
 * Preparing global variables for episode view.
 *
 * @global object $GLOBALS['title']
 * @global object $GLOBALS['seasondata']
 * @global object $GLOBALS['episode']
 * @global  object $GLOBALS['configuration']
 * @global  object $GLOBALS['config']
 */
function prepareEpisode()
{
    $title = $GLOBALS['title'];
    $season = $GLOBALS['seasondata'];
    $episode = $GLOBALS['episode'];
    $configuration = $GLOBALS['configuration'];
    $config = $GLOBALS['config'];

    //create descriptions
    if ($episode->overview) {
        $episode->description = $episode->overview.'<br /><i>'.$title->overview.'</i>';
    } else {
        $episode->description = $title->name.' '.$season->name.' Episode '.$episode->episode_number.' '.$episode->name.' aired on '.$episode->air_date.
                                '. '.$title->overview;
    }

    //create episodes link & still image
    $input = [
                'pagetype' => 'episode',
                'params'   => [
                    'id'             => $title->id,
                    'title'          => sanitizetitle($title->name),
                    'season_number'  => $episode->season_number,
                    'episode_number' => $episode->episode_number,
                    ],
                ];
    if (is_int($episode->episode_number)) {
        $episode->link = gen_internal_link($input);
    }
    if (empty($episode->still_path)) {
        $episode->still_link = 'images/stillna.png';
    } else {
        $episode->still_link = $configuration->images->base_url.
            $configuration->images->still_sizes[3].$episode->still_path;
    }

    //create episode crew list
    $crew = [];
    if ($episode->credits->crew) {
        for ($i = 0; $i < count($episode->credits->crew); $i++) {
            $crew[] = $episode->credits->crew[$i]->name;
        }
        $episode->crew = implode(' - ', $crew);
    } else {
        $episode->crew = ' - ';
    }

    //create episode person link & person photo link
    if ($episode->credits->cast) {
        for ($i = 0; $i < count($episode->credits->cast); $i++) {
            $input = [
                'pagetype' => 'person',
                'params'   => [
                    'id'   => $episode->credits->cast[$i]->id,
                    'name' => sanitizetitle($episode->credits->cast[$i]->name),
                    ],
                ];
            // $person = get_person($episode->credits->cast[$i]->id);
            // if(isset($person->id)){
                $episode->credits->cast[$i]->link = gen_internal_link($input);
            // }
            if ($episode->credits->cast[$i]->profile_path) {
                $episode->credits->cast[$i]->photo_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[2].$episode->credits->cast[$i]->profile_path;
            } else {
                $episode->credits->cast[$i]->photo_link = 'images/personna.png';
            }
        }
    }

    //create episode guest star link & person photo link
    if ($episode->credits->guest_stars) {
        for ($i = 0; $i < count($episode->credits->guest_stars); $i++) {
            $input = [
                'pagetype' => 'person',
                'params'   => [
                    'id'   => $episode->credits->guest_stars[$i]->id,
                    'name' => sanitizetitle($episode->credits->guest_stars[$i]->name),
                    ],
                ];
            // $person = get_person($episode->credits->guest_stars[$i]->id);
            // if(isset($person->id)){
                $episode->credits->guest_stars[$i]->link = gen_internal_link($input);
            // }
            if (!empty($episode->credits->guest_stars[$i]->profile_path)) {
                $episode->credits->guest_stars[$i]->photo_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[2].$episode->credits->guest_stars[$i]->profile_path;
            } else {
                $episode->credits->guest_stars[$i]->photo_link = 'images/personna.png';
            }
        }
    }

    //create episode ad-center link
    $input = [
                'pagetype' => 'watch',
                'params'   => [
                    'title' => base64_encode($title->name.' '.$season->name.' '.$episode->name.' tv series'),
                    ],
                ];
    $episode->adcenter_link = gen_internal_link($input);

    //create episode amazon link
    $season->amazon_link = 'http://www.amazon.com/gp/search?ie=UTF8&camp=1789&creative=9325&index=dvd&keywords='.
                             urlencode($title->name.' '.$season->name.' '.$episode->name.' tv show').'&linkCode=ur2&tag='.$config->amazon_tag.
                             '&linkId=CY2N5QGG7TSGRCV7';

    //create episode youtube trailer or backdrop image im not exist
    if ($episode->videos->results) {
        $episode->trailer = '<div class="videoWrapper"><iframe width="780px" height="439px" src="https://www.youtube.com/embed/'.
                            $episode->videos->results[0]->key.'" frameborder="0" allowfullscreen></iframe></div>';
    } else {
        $episode->trailer = '<a rel="nofollow" target="_blank" href="'.$episode->adcenter_link.'" title="Watch '.
                          $title->name.' '.$season->name.' '.$episode->name.'"><div class="image fit" style="margin:0"><img style="max-height:504px" src="'.$episode->still_link.
                          '" alt="'.$title->name.' '.$season->name.' '.$episode->name.' still image" /></div></a>';
    }
}

/**
 * Preparing object for person view.
 *
 * @global object $GLOBALS['person']
 * @global  object $GLOBALS['configuration']
 */
function preparePerson()
{
    $person = $GLOBALS['person'];
    $configuration = $GLOBALS['configuration'];

    //create photo link
    if ($person->profile_path) {
        $person->photo_link = $configuration->images->base_url.
            $configuration->images->profile_sizes[2].$person->profile_path;
        $person->original_photo_link = $configuration->images->base_url.
            $configuration->images->profile_sizes[3].$person->profile_path;
    } else {
        $person->photo_link = 'images/personna.png';
        $person->original_photo_link = 'images/personna.png';
    }

    // IMDb link profile
    $person->imdb = 'http://www.imdb.com/name/'.$person->imdb_id;

    //create movie link and poster link by it's cast
    if ($person->movie_credits->cast) {
        for ($i = 0; $i < count($person->movie_credits->cast); $i++) {
            $input = [
                'pagetype' => 'movie',
                'params'   => [
                    'id'    => $person->movie_credits->cast[$i]->id,
                    'title' => sanitizetitle($person->movie_credits->cast[$i]->title),
                    ],
                ];
            $person->movie_credits->cast[$i]->link = gen_internal_link($input);
            if (!empty($person->movie_credits->cast[$i]->poster_path)) {
                $person->movie_credits->cast[$i]->poster_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[2].$person->movie_credits->cast[$i]->poster_path;
            } else {
                $person->movie_credits->cast[$i]->poster_link = 'images/na.png';
            }
        }
    }

    //create movie link and poster link by it's crew
    if ($person->movie_credits->crew) {
        for ($i = 0; $i < count($person->movie_credits->crew); $i++) {
            $input = [
                'pagetype' => 'movie',
                'params'   => [
                    'id'    => $person->movie_credits->crew[$i]->id,
                    'title' => sanitizetitle($person->movie_credits->crew[$i]->title),
                    ],
                ];
            $person->movie_credits->crew[$i]->link = gen_internal_link($input);
            if (!empty($person->movie_credits->crew[$i]->poster_path)) {
                $person->movie_credits->crew[$i]->poster_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[2].$person->movie_credits->crew[$i]->poster_path;
            } else {
                $person->movie_credits->crew[$i]->poster_link = 'images/na.png';
            }
        }
    }

    //create posters & posters original link
    if ($person->images->profiles) {
        for ($i = 0; $i < count($person->images->profiles); $i++) {
            if (empty($person->images->profiles[$i]->file_path)) {
                $person->images->profiles[$i]->poster_link = 'images/personna.png';
                $person->images->profiles[$i]->poster_original_link = 'images/personna.png';
            } else {
                $person->images->profiles[$i]->photo_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[1].$person->images->profiles[$i]->file_path;
                $person->images->profiles[$i]->photo_original_link = $configuration->images->base_url.
                    $configuration->images->profile_sizes[3].$person->images->profiles[$i]->file_path;
            }
        }
    }

    // //create also known as view
    // $aka = array();
    // if($person->also_known_as ) {
    // 	for ($i=0;$i<count($person->also_known_as );$i++){
    // 			$aka [] = $person->also_known_as[$i];
    // 	}
    // 	$person->aka  = implode(' - ',$aka);
    // } else {
    // 	$person->aka  = ' - ';
    // }
}

/**
 * Meta header handler.
 *
 * @return string all seo meta
 */
function get_header()
{
    if (is_404()) {
        return;
    }
    $configuration = $GLOBALS['configuration'];
    $config = $GLOBALS['config'];
    $curpage = $GLOBALS['curpage'];

    //var
    $headers = (object) [];

    //identify request page
    if (is_loop()) {
        $titles = $GLOBALS['titles'];
        $paged = $GLOBALS['paged'];
        //homepage
        if (is_home()) {
            $headers->title = $config->sitename;
            $headers->description = $config->sitedescription;
            $headers->keywords = $config->sitekeywords;
            $headers->image = $titles->results[0]->poster_link;
            if (is_paged()) {
                $headers->title .= ' - Page '.$paged;
                $headers->description .= ' - Page '.$paged;
                $headers->keywords .= ',Page '.$paged;
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        //genre page
        if (is_genre()) {
            $genres = $GLOBALS['genres'];
            $id = $GLOBALS['id'];
            foreach ($genres->genres as $genre) {
                if ($id == $genre->id) {
                    $genrename = $genre->name;
                    break;
                }
            }
            $headers->title = $genrename.' | '.$config->sitename;
            $headers->description = 'TV Series with '.$genrename.' genre, all season & episode. '.$config->sitename;
            $headers->keywords = $config->sitekeywords.',genre';
            $headers->image = $titles->results[0]->poster_link;
            if (is_paged()) {
                $headers->title .= ' - Page '.$paged;
                $headers->description .= ' - Page '.$paged;
                $headers->keywords .= ',Page '.$paged;
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        //on the air page
        if (is_ontheair()) {
            $headers->title = 'On The Air TV Series | '.$config->sitename;
            $headers->description = 'Collection of currently on the air TV show, all season & episode. '.$config->sitename;
            $headers->keywords = $config->sitekeywords.',on the air';
            $headers->image = $titles->results[0]->poster_link;
            if (is_paged()) {
                $headers->title .= ' - Page '.$paged;
                $headers->description .= ' - Page '.$paged;
                $headers->keywords .= ',Page '.$paged;
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        //airing today page
        if (is_airingtoday()) {
            $headers->title = 'Airing Today TV Series | '.$config->sitename;
            $headers->description = 'Collection of currently airing today TV show, all season & episode. '.$config->sitename;
            $headers->keywords = $config->sitekeywords.',airing today';
            $headers->image = $titles->results[0]->poster_link;
            if (is_paged()) {
                $headers->title .= ' - Page '.$paged;
                $headers->description .= ' - Page '.$paged;
                $headers->keywords .= ',Page '.$paged;
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        //top rated page
        if (is_toprated()) {
            $headers->title = 'Top Rated TV Series | '.$config->sitename;
            $headers->description = 'Collection of top rated TV show, all season & episode. '.$config->sitename;
            $headers->keywords = $config->sitekeywords.',top rated';
            $headers->image = $titles->results[0]->poster_link;
            if (is_paged()) {
                $headers->title .= ' - Page '.$paged;
                $headers->description .= ' - Page '.$paged;
                $headers->keywords .= ',Page '.$paged;
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        //popular page
        if (is_popular()) {
            $headers->title = 'Popular TV Series | '.$config->sitename;
            $headers->description = 'Collection of most popular TV show, all season & episode. '.$config->sitename;
            $headers->keywords = $config->sitekeywords.',popular';
            $headers->image = $titles->results[0]->poster_link;
            if (is_paged()) {
                $headers->title .= ' - Page '.$paged;
                $headers->description .= ' - Page '.$paged;
                $headers->keywords .= ',Page '.$paged;
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        //search page
        if (is_search()) {
            $headers->title = 'Search for TV Series | '.$config->sitename;
            $headers->description = 'Search for TV show, all season & episode. '.$config->sitename;
            $headers->keywords = $config->sitekeywords.',popular';
            if ($titles->results) {
                $headers->image = $titles->results[0]->poster_link;
            } else {
                $headers->image = 'images/na.png';
            }
            if (is_paged()) {
                $headers->title .= ' - Page '.$paged;
                $headers->description .= ' - Page '.$paged;
                $headers->keywords .= ',Page '.$paged;
            }
            $headers->robots = 'noindex, follow';
        }
    } elseif (is_single()) {
        //series page
        if (is_series()) {
            $title = $GLOBALS['title'];
            $ttl = $title->name;
            $desc = $title->name;
            if ($title->first_air_date) {
                $ttl .= ' '.substr($title->first_air_date, 0, 4);
                $desc .= ' ('.substr($title->first_air_date, 0, 4).') TV series. ';
            }
            $ttl .= ' | '.$config->sitename;
            $headers->title = $ttl;
            if ($title->overview) {
                $desc .= $title->overview;
                if (strlen($desc) > 160) {
                    $headers->description = substr($desc, 0, 160);
                } else {
                    $desc .= $title->name.' TV show has '.$title->number_of_seasons.' seasons and '.$title->number_of_episodes.' episodes. ';
                    $headers->description = $desc;
                }
            } else {
                $desc .= $title->name.' TV show has '.$title->number_of_seasons.' seasons and '.$title->number_of_episodes.' episodes. ';
                if (count($title->created_by) > 0) {
                    $desc .= $title->name.' written by '.$title->writer;
                }
                if (strlen($desc) > 160) {
                    $headers->description = substr($desc, 0, 160);
                } else {
                    $headers->description = $desc;
                }
            }
            $headers->keywords = $config->sitekeywords.','.$title->name;
            $headers->image = $title->poster_original_link;
            if (strlen($headers->description) < 80 || strlen($headers->title) < 30) {
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        //seasons page
        if (is_season()) {
            $title = $GLOBALS['title'];
            $season = $GLOBALS['seasondata'];
            $ttl = $title->name.' '.$season->name;
            $desc = $title->name.' '.$season->name;
            if ($season->air_date) {
                $ttl .= ' '.substr($season->air_date, 0, 4);
                $desc .= ' ('.substr($season->air_date, 0, 4).') TV series. ';
            }
            $ttl .= ' | '.$config->sitename;
            $headers->title = $ttl;
            if ($season->overview) {
                $desc .= $season->overview;
                if (strlen($desc) > 160) {
                    $headers->description = substr($desc, 0, 160);
                } else {
                    $desc .= $title->name.' '.$season->name.' TV show has '.count($season->episodes).' episodes. ';
                    $headers->description = $desc;
                }
            } else {
                $desc .= $title->name.' '.$season->name.' TV show has '.count($season->episodes).' episodes. ';
                if (count($title->created_by) > 0) {
                    $desc .= $title->name.' written by '.$title->writer;
                }
                if (strlen($desc) > 160) {
                    $headers->description = substr($desc, 0, 160);
                } else {
                    $headers->description = $desc;
                }
            }
            $headers->keywords = $config->sitekeywords.','.$title->name.',season '.$season->season_number;
            $headers->image = $season->poster_original_link;
            if (strlen($headers->description) < 80 || strlen($headers->title) < 30) {
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

            //episode page
        if (is_episode()) {
            $title = $GLOBALS['title'];
            $season = $GLOBALS['seasondata'];
            $title = $GLOBALS['title'];
            $episode = $GLOBALS['episode'];
            $ttl = $title->name.' '.$season->name.' Episode '.$episode->episode_number.' '.$episode->name;
            $desc = $title->name.' '.$season->name.' Episode '.$episode->episode_number.' '.$episode->name;
            if ($episode->air_date) {
                $ttl .= ' '.substr($episode->air_date, 0, 4);
                $desc .= ' ('.substr($episode->air_date, 0, 4).') TV series. ';
            }
            if (strlen($ttl) < 40) {
                $ttl .= ' | '.$config->sitename;
            }
            $headers->title = $ttl;
            if ($episode->overview) {
                $desc .= $episode->overview;
                if (strlen($desc) > 160) {
                    $headers->description = substr($desc, 0, 160);
                } else {
                    $desc .= $title->name.' '.$season->name.' '.$episode->name.' TV show has '.count($season->episodes).' episodes. ';
                    $headers->description = $desc;
                }
            } else {
                $desc .= $title->name.' '.$season->name.' '.$episode->name.' TV show has '.count($season->episodes).' episodes. ';
                if (count($title->created_by) > 0) {
                    $desc .= $title->name.' written by '.$title->writer;
                }
                if (strlen($desc) > 160) {
                    $headers->description = substr($desc, 0, 160);
                } else {
                    $headers->description = $desc;
                }
            }
            $headers->keywords = $config->sitekeywords.','.$title->name.','.$title->name.',episode'.$episode->episode_number.','.$season->name.','.$episode->name;
            $headers->image = $episode->still_link;
            if (strlen($headers->description) < 80 || strlen($headers->title) < 30) {
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        if (is_person()) {
            $person = $GLOBALS['person'];
            $ttl = $person->name.' TV star';
            $desc = $person->name.' TV star. ';
            $ttl .= ' | '.$config->sitename;
            $headers->title = $ttl;
            $casting = '';
            if ($person->biography) {
                $desc .= $person->biography;
                $headers->description = $desc;
                if (strlen($desc) > 160) {
                    $headers->description = substr($desc, 0, 160);
                }
            } else {
                if ($person->tv_credits->cast) {
                    $castings = [];
                    $x = 0;
                    foreach ($person->tv_credits->cast as $ct) {
                        $castings[] = $ct->name;
                        if ($x == 8) {
                            break;
                        }
                        $x++;
                    }
                    $casting = implode(', ', $castings);
                    $desc .= $person->name.' has starred: '.$casting;
                }
                if (strlen($desc) > 160) {
                    $headers->description = substr($desc, 0, 160);
                } else {
                    $headers->description = $desc;
                }
            }
            if (!empty($casting)) {
                $headers->keywords = $person->name.','.$casting;
            } else {
                $headers->keywords = $config->sitekeywords.','.$person->name;
            }
            $headers->image = $person->original_photo_link;
            if (strlen($headers->description) < 80 || strlen($headers->title) < 30) {
                $headers->robots = 'noindex, follow';
            } else {
                $headers->robots = 'index, follow';
            }
        }

        //pages
        if (is_page()) {
            $pages = $GLOBALS['pages'];
            $pagefile = $GLOBALS['pagefile'];
            $meta = $pages->$pagefile;
            $headers->title = $meta->title;
            $headers->robots = $meta->robots;
            $headers->description = $meta->description;
            $headers->keywords = '';
            $headers->image = 'images/stillna.png';
        }

        //watch / register
        if (is_watch()) {
            $headers->title = 'Register | '.$config->sitename;
            $headers->robots = 'noindex, nofollow';
            $headers->description = $config->sitedescription;
            $headers->keywords = '';
            $headers->image = 'images/stillna.png';
        }
    }
    $headers->title = str_replace('"', '', $headers->title);
    $headers->description = str_replace('"', '', $headers->description);
    $header = '
	<title>'.$headers->title.'</title>
	<meta name="description" content="'.$headers->description.'"/>
	<meta name="keywords" content="'.$headers->keywords.'"/>
	<meta name="robots" content="'.$headers->robots.'"/>

	<meta property="og:title" content="'.$headers->title.'"/>
	<meta property="og:image" content="'.$headers->image.'"/>
	<meta property="og:site_name" content="'.$config->sitename.'"/>
	<meta property="og:description" content="'.$headers->description.'"/>
	<meta property="og:url" content="'.$curpage.'"/>
	<meta property="og:type" content="article" />
	';

    return $header;
}

/**
 * Make seo friendly url title.
 *
 * @param string $ttl any text
 *
 * @return string seo friendly url
 */
function sanitizetitle($ttl)
{
    $ttl = preg_replace('~[^\\pL0-9_]+~u', '-', $ttl);
    $ttl = trim($ttl, '-');
    $ttl = strtolower($ttl);
    $ttl = preg_replace('~[^-a-z0-9_]+~', '', $ttl);

    if (empty($ttl)) {
        $ttl = 'tv-series';
    }

    return $ttl;
}

/**
 * Get string between start string and end string.
 *
 * @param string $content
 * @param string $start
 * @param string $end
 *
 * @return string
 */
function potong($content, $start, $end)
{
    if ($content && $start && $end) {
        $r = explode($start, $content);
        if (isset($r[1])) {
            $r = explode($end, $r[1]);

            return $r[0];
        }

        return '';
    }
}

/**
 * function internal link generator
 * example code :
 * <code>
 * $input = array('pagetype' => 'genre', 'params' => array('id' => 35,'title' => sanitizetitle('Action & Adventure')));
 * $link = gen_internal_link($input);
 * </code>.
 *
 * @global object $GLOBALS['router'] global variable for router
 *
 * @param array $input array('pagetype' => '$router[3]value', 'params' => array($router[1]key1 => $router[1]value1,$router[1]key2 => $router[1]value2,...))
 *
 * @return string $link internal link
 */
function gen_internal_link($input)
{
    $router = $GLOBALS['router'];
    $link = $router->namedRoutes[$input['pagetype']];
    preg_match_all("/\[(.*?)\]/", $router->namedRoutes[$input['pagetype']], $routerkeys);
    $keys = [];
    foreach ($routerkeys[0] as $routerkey) {
        preg_match("/\:(.*?)\]/", $routerkey, $key);
        $keys[$key[1]] = $routerkey;
    }
    foreach (array_keys($keys) as $key) {
        $link = str_replace($keys[$key], $input['params'][$key], $link);
    }

    return $link;
}

/**
 * Strip link from html string.
 *
 * @param string $content html contet
 *
 * @return string html stripted link content
 */
function removelink($content)
{
    $result = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', '\\2', $content);

    return $result;
}

/**
 * Get current page url.
 *
 * @return string
 */
function curPageURL()
{
    $pageURL = 'http';
    $pageURL .= '://';
    if ($_SERVER['SERVER_PORT'] != '80') {
        $pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    } else {
        $pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }

    return $pageURL;
}

/**
 * Get current base url.
 *
 * @param string $curpage url string
 *
 * @return string
 */
function get_curbase($curpage)
{
    if (strpos($curpage, '/page/') !== false) {
        return potong('||'.$curpage, '||', '/page/');
    } elseif (substr($curpage, -1, 1) == '/') {
        return substr($curpage, 0, strlen($curpage) - 1);
    } else {
        return $curpage;
    }
}

/**
 * Function to check if input string is json or not.
 *
 * @param string $string any string
 *
 * @return bool
 */
function is_json($string)
{
    $array = json_decode($string, true);

    return !empty($string) && is_string($string) && is_array($array) && !empty($array) && json_last_error() == 0;
}

/**
 * Validating the object respond from tmdb API crawler.
 *
 * @param object $cnt object returned from tmdb API crawler
 */
function checkrespond($cnt)
{
    $config = $GLOBALS['config'];
    $curpage = $GLOBALS['curpage'];
    $is404 = $GLOBALS['is404'];
    if (isset($cnt->error)) {
        // error_log($cnt->error.PHP_EOL.$cnt->error_message.PHP_EOL.'Request page : '.$curpage, 1,$config->admin_email);
        header('HTTP/1.0 404 Not Found', true, 404);
        http_response_code(404);
        $is404 = true;
        include 'config.php';
        include 'maintenance.php';
        exit();
    }
}

/**
 * Randomize tmdb api key.
 *
 * @return void
 */
function shuffleapikey()
{
    $config = $GLOBALS['config'];
    $apis = $GLOBALS['apis'];
    shuffle($apis);
    $config->apikey = $apis[0];
}

/**
 * Redirect if there is a query search request.
 */
function checkforquerysearch()
{
    if (isset($_GET['q'])) {
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/search/'.urlencode($_GET['q']);

        header('Location: '.$url, true, 301);
    }
}

//page identifier

/**
 * Check if current page is 404.
 *
 * @global boolean $GLOBALS['is404']
 *
 * @return bool
 */
function is_404()
{
    return $GLOBALS['is404'];
}

/**
 * Check if current page is loop page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_loop()
{
    if ($GLOBALS['match']['target'] == 'loop'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is single page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_single()
{
    if ($GLOBALS['match']['target'] == 'single'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is paged page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_paged()
{
    if (strpos($GLOBALS['match']['name'], 'paged') !== false):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is home page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_home()
{
    if ($GLOBALS['match']['name'] == 'home' || $GLOBALS['match']['name'] == 'homepaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is popular page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_popular()
{
    if ($GLOBALS['match']['name'] == 'popular' || $GLOBALS['match']['name'] == 'popularpaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is upcoming movie page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_upcoming()
{
    if ($GLOBALS['match']['name'] == 'upcoming' || $GLOBALS['match']['name'] == 'upcomingpaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is now playing movie page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_nowplaying()
{
    if ($GLOBALS['match']['name'] == 'nowplaying' || $GLOBALS['match']['name'] == 'nowplayingpaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is on the air page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_ontheair()
{
    if ($GLOBALS['match']['name'] == 'on-the-air' || $GLOBALS['match']['name'] == 'on-the-airpaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is airing today page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_airingtoday()
{
    if ($GLOBALS['match']['name'] == 'airing-today' || $GLOBALS['match']['name'] == 'airing-todaypaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is top rated page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_toprated()
{
    if ($GLOBALS['match']['name'] == 'top-rated' || $GLOBALS['match']['name'] == 'top-ratedpaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is genre page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_genre()
{
    if ($GLOBALS['match']['name'] == 'genre' || $GLOBALS['match']['name'] == 'genrepaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is search page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_search()
{
    if ($GLOBALS['match']['name'] == 'search' || $GLOBALS['match']['name'] == 'searchpaged'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is episode page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_episode()
{
    if ($GLOBALS['match']['name'] == 'episode'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is season page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_season()
{
    if ($GLOBALS['match']['name'] == 'season'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is series page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_series()
{
    if ($GLOBALS['match']['name'] == 'series'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is movie page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_movie()
{
    if ($GLOBALS['match']['name'] == 'movie'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is person page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_person()
{
    if ($GLOBALS['match']['name'] == 'person'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is watch page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_watch()
{
    if ($GLOBALS['match']['name'] == 'watch'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current page is page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_page()
{
    if ($GLOBALS['match']['name'] == 'page'):
        return true; else:
        return false;
    endif;
}

/**
 * Check if current sitemap is page.
 *
 * @global array $GLOBALS['match']
 *
 * @return bool
 */
function is_sitemap()
{
    if ($GLOBALS['match']['name'] == 'sitemap'):
        return true; else:
        return false;
    endif;
}

function asDollars($value)
{
    return number_format($value, 0);
}

function isbad()
{
    $badwords = $GLOBALS['badwords'];
    $b = '/\W'.implode('\W|\W', $badwords).'\W/i';
    $ret = false;
    $text = '';
    if (is_loop()) {
        $titles = $GLOBALS['titles'];
        if (count($titles->results) > 0) {
            foreach ($titles->results as $title) {
                $text .= ' '.$title->title;
            }
        }
    }

    if (is_single()) {
        if (is_movie()) {
            $title = $GLOBALS['title'];
            $text .= $title->title.' '.$title->overview;
        }

        if (is_person()) {
            $person = $GLOBALS['person'];
            $text .= $person->biography;
            if ($person->movie_credits->cast) {
                foreach ($person->movie_credits->cast as $cast) {
                    $text .= ' '.$cast->title;
                }
            }
        }
    }
    // printvar($text);
    // printvar($b);
    $text = strtolower($text);
    $text .= ' '.$text.' ';
    // printvar($text);
    if (preg_match($b, $text)) {
        $ret = true;
    }

    return $ret;
}

function handleContactForm()
{
}

/*
Debug
 */

/**
 * Print var for debug.
 *
 * @param mixed $var mixed var
 */
function printvar($var)
{
    echo '<pre>';
    echo print_r($var, true);
    echo '</pre>';
}
