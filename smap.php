<?php

include 'Sitemap.php';

$key = $match['params']['key'];
if ($key == '123456789') {
    $base = 'http://'.$_SERVER['SERVER_NAME'];
    $sitemap = new Sitemap($base);
    // $sitemap->setPath('sitemaps/');
    $paged = 1000;
    $titles = get_popular($paged);
    $maxpage = $titles->total_pages;
    if ($maxpage > 1000) {
        $maxpage = 1000;
    }
    for ($i = 1; $i < $maxpage + 1; $i++) {
        $paged = $i;
        $titles = get_popular($paged);
        if ($titles->results) {
            preparemvloop();
            echo $i * count($titles->results).' .. ';
            foreach ($titles->results as $title) {
                // printvar($title);
                // exit();
                $sitemap->addItem($title->link);
            }
        } else {
            break;
        }
    }
    echo '<br />';
    $sitemap->createSitemapIndex($base.'/', 'Today');
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $finish = $time;
    $total_time = round(($finish - $start), 4);
    echo '<center>Sitemap generated in '.$total_time.' seconds.</center>';
} else {
    die('get out!');
}
