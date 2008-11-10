<?php
/*
    spg - Simple (PHP|Photo) Gallery)                                             ~trevorj <[trevorjoynson@gmail.com]>

    Copyright 2006 Trevor Joynson

    This file is part of spg.

    spg is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by          the Free Software Foundation; either version 2 of the License, or
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
	<title>intheskywithdiamonds | photo gallery | <?= $root_album->path ?></title>
	<link rel="stylesheet" href="<?=$config['root_url']?>/include/index.css" type="text/css"/>
    <!-- begin lightbox -->
	<link rel="stylesheet" href="<?=$config['root_url']?>/include/lightbox/lightbox.css" type="text/css"/>
    <script type="text/javascript" src="<?=$config['root_url']?>/include/lightbox/lightbox.js"></script>
    <!-- end lightbox -->
</head>
<body>
<div id="content">
<div id="header">
	<h1>photo gallery</h1>
	<h2><a href="<?=$config['root_url']?>">root</a><?php
/////////////// PHP CODE
// path heirarchy
// there _has_ to be a better way to do this
$seg_path = '';
foreach ( split('/', substr($root_album->path, 1, -1) ) as $s ) {
    if (strlen($s) > 0) {
        $seg_path .= '/'.$s;

		// I wonder if this is any faster than an echo statement.
		?>/<a href="<?=getAlbumURL($seg_path)?>"><?=$s?></a><?php
    }
}
unset($seg_path);
?></h2>
</div>
<div id="albums">
	<?php foreach ($root_album->subalbums as $i => $album): ?>
	<a href="<?=getAlbumURL($album->path)?>"><?=$album->name?></a><br />
	<?php endforeach; ?>
</div>
<div id="photos">
<?php

if (count($root_album->photos)===0) {
//	echo "<script>document.getElementById('photos').visibility = hidden;</script>";
} else {
	foreach ($root_album->photos as $i => $p) {
		echo '<a rel="lightbox" href="'.getFileURL($p->path).'">'.$p->name.'</a><br />';
	}
}

?>
</div>
<div id="videos">
<?php

if (count($root_album->videos)===0) {
//  echo "<script>document.getElementById('videos').visibility = hidden;</script>";
} else {                                          
    foreach ($root_album->videos as $i => $v) {
        echo '<a href="'.getFileURL($v->path).'">'.$v->name.'</a><br />';
    }
}

?>
</div>
<div id="footer">
	<a href="<?=$config['root_url']?>/xml/album<?=$cln_album?>">xml</a>
	&nbsp;<a href="<?= $proto ?>://intheskywithdiamonds.net">intheskywithdiamonds</a>
	&nbsp;generated in <?=$timer->diff()?>
</div>

</div>
</body>
</html>
