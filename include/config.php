<?php

# Are we using SSL?
$proto = ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http';

$config = array(
	root_url    		=> $proto.'://gallery.intheskywithdiamonds.net',

	files_path			=> '/var/www/gallery/htdocs/files',

	templates_path		=> 'include/templates',
	default_template	=> 'xml',

	max_depth			=> 0,

	/*
		This is a regex that must be matched to allow a photo/video
		to show up in the list. It must return the name as a match.
	*/
	photo_regex		=> '/^([^\.]+)\.(?:jpg|jpeg|png|gif)$/i',
	video_regex		=> '/^([^\.]+)\.(?:3gp|avi|mpg|mpeg)$/i',

	photo_exts		=> array(
		'jpg' => 1, 'jpeg' => 1, 'gif' => 1, 'png' => 1
	),
	video_exts		=> array(
		'3gp' => 1, 'mpg' => 1
	),
);

#$config['files_url'] = $config['root_url'].'/'.$config['files_path'];
$config['files_url'] = $config['root_url'].'/files';

?>
