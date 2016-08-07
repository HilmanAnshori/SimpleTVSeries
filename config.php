<?php
/**
 * Global configuration
 * @var object $config 
 */
$config = (object) array(
	'sitename' => 'TV Series Online',
	'sitedescription' => 'Watch and stream full tv series hd online for free',
	'sitekeywords' => 'movie,film,box office,streaming,download,watch movies online,movie streaming online,actor,biography,cinema',
	'admin_email' => 'admin@example.com',
	'adcenter_ref' => '5036072',
	'amazon_tag' => 'moviesnew0e-20',
	'apibase' => 'http://api.themoviedb.org/3/',
	'apikey' => '',
	'cachetime' => 24*7,
	'cache_folder' => '../cache',
	'memcache' => false,
	'memcachehost' => 'localhost',
	'memcacheport' => 11211,
	'memcachetime' =>  (60*60)*12,
	'memcacheadminkey' => '',
	'recentsearchcount' => 20,
	'rsearchcachetime' => (60*60)*24
	);

$apis = array(
	'5eec12ffdb6874f464853cc79c649d00',
	'5c3d677ded37cda5d0238a72c8218b2a',
	'f01d310a9afca3429dc9a7276f6395be'
	);

// $ads = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
// <!-- Movies -->
// <ins class="adsbygoogle"
//      style="display:block"
//      data-ad-client="ca-pub-3687683717051498"
//      data-ad-slot="5767463560"
//      data-ad-format="auto"></ins>
// <script>
// (adsbygoogle = window.adsbygoogle || []).push({});
// </script>';

$pages = (object) array(
	'contact-us' => (object)array(
			'title' => 'Contact Us | ' . $config->sitename,
			'description' => 'Don not hesitate to contact us',
			'robots' => 'noindex,follow'
		),
	'tos' => (object)array(
			'title' => 'Terms of Service | ' . $config->sitename,
			'description' => 'Terms of Service',
			'robots' => 'noindex,follow'
		),
	'dmca' => (object)array(
			'title' => 'DMCA | ' . $config->sitename,
			'description' => 'DMCA',
			'robots' => 'noindex,follow'
		),
	'about' => (object)array(
			'title' => 'About Us | ' . $config->sitename,
			'description' => 'About Us',
			'robots' => 'noindex,follow'
		),
	'privacy-policy' => (object)array(
			'title' => 'Privacy Policy | ' . $config->sitename,
			'description' => 'Privacy Policy',
			'robots' => 'noindex,follow'
		)
	);

$badwords = array(
	'adult',
	'anal',
	'anus',
	'amateur',
	'asshole',
	'ass',
	'erotic',
	'tits',
	'blow j',
	'blow job',
	'bitch',
	'butt',
	'dog style',
	'ecstasy',
	'erotism',
	'fuck',
	'hand job',
	'hentai',
	'hooker',
	'kamasutra',
	'masturbate',
	'motherfucker',
	'porn',
	'nude',
	'penis',
	'pussy',
	'sasha grey',
	'sex',
	'sodomy',
	'threesome',
	'vagina',
	'vivid',
	'zoophilia',
	'heroin',
	'marijuana',
	'drug',
	'naked',
	'gigolo',
	'whore',
	'prostitute',
	'gay',
	'xxx',
	'striptease',
	'dope',
	'gamble',
	'gambling',
	'poker',
	'blackjack',
	'orgasm',
	'sadist',
	'shit',
	'bastard',
	'ejaculate',
	'lesbian',
	'boobs',
	'tobacco',
	'ejaculation'
	);

