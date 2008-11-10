<?php
/*
    spg - Simple (PHP|Photo) Gallery)
    ~trevorj <[trevorjoynson@gmail.com]>

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
    along with spg; if not, write to the Free Software Foundation, Inc.,
    51 Franklin St, Fifth Floor,
    Boston, MA  02110-1301  USA
*/

// Define this so our children won't cry on contact
define('SPG_VERSION', 0.1);

// Move little piggies, move!
require('include/config.php');
require('include/classes.php');

// init our page gen timer now that we've loaded our classes
$timer = new pGenTimer();


// Do we have a requested album? If so, is it sanitized?
$cln_album = ( preg_match('/^\/[0-9A-Za-z\/\-\_]+$/', $_REQUEST['album'])) ? $_REQUEST['album'] : '/';

// Setup root album, which starts a recursive name-calling scenario
$root_album = new Album($cln_album);

// Is the given template sanitized?
$cln_t = ( preg_match('/^[0-9A-Za-z\-\_]+$/', $_REQUEST['t']) ) ? $_REQUEST['t'] : $config['default_template'];


if (   is_dir(     $config['templates_path'].'/'.$cln_t)
	&& file_exists($config['templates_path'].'/'.$cln_t.'/album.php')
) {
	$template['name'] = $cln_t;
	$template['path'] = fixpath($config['templates_path'].'/'.$template['name']);
	require($template['path'].'album.php');
} else {
	print "template $cln_t was not found";
}

?>
