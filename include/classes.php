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

// Item class
Class Item {
	public $name;
	//public $desc;
	public $path;

	public function __construct ($path, $name) {
		//echo "$path | photo: $name<br />";
		$this->path = $path;
		$this->name = $name;
	}
}

Class Photo extends Item {
}

Class Video extends Item {
}

Class Album {
	public $name;
	//public $desc;
	public $path;
	public $depth;
	
	public $photos = array();
	public $videos = array();
	public $subalbums = array();

	// We were just instanced.
	public function __construct ($path, $name='root') {
		$this->path		= fixpath($path);
		$this->name		= $name;
		$this->depth	= substr_count($this->path, '/')-1;

		#if ($this->depth <= $GLOBALS['config']['max_depth']) {
		if ($name=='root') {
			$this->fill();
		}
	}

	// Random subalbum objectref
	public function rand_subalbum($recurs=0) {
		if (count($this->subalbums) < 1) {
			return 0;
		}

		die;
	}

	// Random photo objectref
	public function rand_photo($recurs=0) {
		if (count($this->photos) < 1) {
			return 0;
		}

		die;
	}

	// Fill album with photos
	private function fill () {
		if (!@$files = scandir($GLOBALS['config']['files_path'].$this->path)) {
			//print "Album does not exist.";
			//return 0;
			die;
		}

		foreach($files as $i => $file) {
			$path = $this->path.$file;
			$fspath = $GLOBALS['config']['files_path'].$path;

			if ($file == '.' || $file == '..') {
            } elseif (is_dir($fspath.'/.')) {
                $this->subalbums[] = new Album($path, $file);
			} else {
            	if ($this->name=='root' && is_file($fspath)) {
#					$info = new finfo(FILEINFO_MIME);
#					$mimetype = $info->file($fspath);

					if (preg_match($GLOBALS['config']['photo_regex'], $file, $match)) {
#					if ($GLOBALS['config']['photo_mimetypes'][$mimetype]) {
						$this->photos[] = new Photo($path, $match[1]);
#					} elseif ($GLOBALS['config']['video_mimetypes'][$mimetype]) {
					} elseif (preg_match($GLOBALS['config']['video_regex'], $file, $match)) {
						$this->videos[] = new Video($path, $match[1]);
					}
				}
			}
		}
	}
}


// Adds a trailing directory seperator if it is not there.
function fixpath($path) {
	return (substr($path, -1, 1) !== '/') ? $path.'/' : $path;
}


Class pGenTimer {
	private $laps = array();
	private $auto;

	public function __construct($auto=true) {
		$this->auto = $auto;

		if ($this->auto) {
			$this->lap();
		}
	}

	public function lap($name='start') {
		$tmp				= explode(' ', microtime() );
		$this->laps[$name]	= $tmp[1] + $tmp[0];
	}

	public function diff($begin='start', $end='now') {
		if ($end=='now') {
			$this->lap('stop');
			$end='stop';
		}

		if (!isset( $this->laps[$end] )
		 || !isset( $this->laps[$begin] ) ) { return 0; }

		return $this->laps[$end] - $this->laps[$begin];
	}
}

?>
