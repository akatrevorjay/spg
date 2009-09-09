<?php
/*
    spg - Simple (PHP|Photo) Gallery)                                             ~trevorj <[trevorjoynson@gmail.com]>

    Copyright 2006 Trevor Joynson

    This file is part of spg.

    spg is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.                                           
    spg is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with spg; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!defined('SPG_VERSION')) { die; };

$template_root_url = $config['root_url'];
if ($config['default_template']!=$template['name']) {
    $template_root_url .= '/html';
}

function getAlbumURL($path) {
	return $GLOBALS['template_root_url'].'/album'.$path;
}
function getFileURL($path) {
	return $GLOBALS['config']['files_url'].$root_album->path.$path;
}

echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title>Motorcars Acura Volvo | Video | <?= $root_album->path ?></title>
	<link rel="stylesheet" href="<?=$config['root_url']?>/include/index.css" type="text/css"/>
    <!-- begin multibox -->
		<link href="<?=$config['root_url']?>/include/multibox-1.3.1/multibox.css" rel="stylesheet" type="text/css" />
		<!--[if lte IE 6]><link rel="stylesheet" href="<?=$config['root_url']?>/include/multibox-1.3.1/ie6.css" type="text/css" media="all" /><![endif]-->
		<script type="text/javascript" src="<?=$config['root_url']?>/include/multibox-1.3.1/mootools.js"></script>
		<script type="text/javascript" src="<?=$config['root_url']?>/include/multibox-1.3.1/overlay.js"></script>
		<script type="text/javascript" src="<?=$config['root_url']?>/include/multibox-1.3.1/multibox.js"></script>
	<!-- end multibox -->
    <script type="text/javascript" src="<?=$config['root_url']?>/<?=$template['path']?>album.js"></script>
</head>
<body>
<div id="outer">
<div id="container">
<div id="inner">
	<div id="header">
		<div id="header_title">
			skywww media
		</div>
		<div id="header_path">
			Path: <a href="<?=$config['root_url']?>">root</a>
<?php

// path heirarchy
// there _has_ to be a better way to do this
$seg_path = '';
foreach ( split('/', substr($root_album->path, 1, -1) ) as $s ) {
    if (strlen($s) > 0) {
        $seg_path .= '/'.$s;

		// I wonder if this is any faster than an echo statement.
		?>&nbsp;/&nbsp;<a href="<?=getAlbumURL($seg_path)?>"><?=$s?></a><?php
    }
}
unset($seg_path);

?>
		</div>
	</div>
	<div id="content">
		<div id="content_albums">
			<?php foreach ($root_album->subalbums as $i => $album): ?>
				<a href="<?=getAlbumURL($album->path)?>"><?=$album->name?></a><br />
			<?php endforeach; ?>
		</div>
		<div id="content_photos">
<?php

if (count($root_album->photos)===0) {
//	echo "<script>document.getElementById('photos').visibility = hidden;</script>";
} else {
	foreach ($root_album->photos as $i => $p) {
		echo '<a class="multibox" href="'.getFileURL($p->path).'">'.$p->name.'</a><br />';
	}
}

?>
		</div>
		<div id="content_videos">
<?php

if (count($root_album->videos)===0) {
//  echo "<script>document.getElementById('videos').visibility = hidden;</script>";
} else {                                          
    foreach ($root_album->videos as $i => $v) {
        echo '<a class="multibox" href="'.getFileURL($v->path).'">'.$v->name.'</a><br />';
    }
}

?>
		</div>
		<div id="content_flashs">
<?php

if (count($root_album->flashs)===0) {
//  echo "<script>document.getElementById('flashs').visibility = hidden;</script>";
} else { 
    foreach ($root_album->flashs as $i => $f) {
        echo '<a class="multibox" href="'.getFileURL($f->path).'">'.$f->name.'</a><br />';
    }
}

?>
		</div>
	</div>
	
	<div id="footer">
		<div id="footer_l">
			<a href="http://skywww.net">skywww</a>
			&nbsp;<a href="http://trevorjay.net">trevorjay</a>
			&nbsp;<a href="http://intheskywithdiamonds.net">intheskywithdiamonds</a>
		</div>
		<div id="footer_m">
			delivered in <?=$timer->diff()?>
		</div>
		<div id="footer_r">
			<a href="<?=$config['root_url']?>/xml/album<?=$cln_album?>">xml</a>
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>
