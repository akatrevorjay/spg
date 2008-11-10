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
$config['root_uri'] = '/xml';

// Mmmm JSON
echo '{';
$first = 1;
foreach ($root_album->photos as $i => $photo) {
	if (!isset($first)) { echo ','; unset($first); }

	echo ' image'.$i.': \''.$photo->path.'\'';
}
echo '}';

?>
