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
if ($config['default_template']!=$template['name']) {
	$config['root_url'] .= '/xml';
}

#print var_dump($root_album->subalbums); die;

// Mmmm XML
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><?xml-stylesheet type="text/xsl" href="'.$config['root_url'].'/'.$template['path'].'album.xsl"?><gallery></gallery>');

// path heirarchy
// there _has_ to be a better way to do this
$xml->addChild('path');
//$i = 1;
$seg_path = '';
foreach ( split('/', substr($root_album->path, 1, -1) ) as $s ) {
	if (strlen($s) > 0) {
		$x = $xml->path->addChild('p');
		$seg_path .= '/'.$s;

		$x->addAttribute('name', $s);
		$x->addAttribute('path', $seg_path);

//		$x->addAttribute('depth', $i);
//		$i++;
	}
}
unset($seg_path);
//unset($i);

$xml->addChild('albums');
foreach ($root_album->subalbums as $i => $album) {
	$x = $xml->albums->addChild('a');
	$x->addAttribute('name', $album->name);
	$x->addAttribute('path', $album->path);
	//$xalbum->addAttribute('desc', $album->desc);
	//$xalbum->addAttribute('ts', $album->ts);
}


$xml->addChild('photos');
foreach ($root_album->photos as $i => $photo) {
	$x = $xml->photos->addChild('p');
	$x->addAttribute('name', $photo->name);
	$x->addAttribute('path', $photo->path);
}

$xml->addChild('videos');
foreach ($root_album->videos as $i => $video) {
	$x = $xml->videos->addChild('v');
	$x->addAttribute('name', $video->name);
	$x->addAttribute('path', $video->path);
}

$xml->addChild('flashs');
foreach ($root_album->flashs as $i => $flash) {
        $x = $xml->flashs->addChild('f');
        $x->addAttribute('name', $flash->name);
        $x->addAttribute('path', $flash->path);
}

$stats = $xml->addChild('stats');
$stats->addAttribute('ts', time());
$stats->addAttribute('path', $root_album->path);
$stats->addAttribute('root_url', $config['root_url']);
$stats->addAttribute('files_url', $config['files_url']);
$stats->addAttribute('template_path', $template['path']);
$stats->addAttribute('pGenTime', $timer->diff() );
$stats->addAttribute('proto', $proto);
unset($stats);

#echo "<pre>"; var_dump($xml); echo "</pre>";
Header('Content-type: text/xml');
echo $xml->asXML();
?>