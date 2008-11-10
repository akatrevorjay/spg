<?xml version="1.0"?>
<!DOCTYPE xsl:stylesheet [ <!ENTITY nbsp "&#160;"> ]>
<!--
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
	along with spg; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
-->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="gallery">
<html lang="en" xml:lang="en">
<head>
	<title>intheskywithdiamonds | photo gallery | <xsl:value-of select="stats/@path"/></title>
	<link rel="stylesheet" href="{stats/@root_url}/include/index.css" type="text/css" />
    <!-- begin lightbox -->
	<link rel="stylesheet" href="{stats/@root_url}/include/lightbox/lightbox.css" type="text/css"/>
    <script type="text/javascript" src="{stats/@root_url}/include/lightbox/lightbox.js"></script>
    <!-- end lightbox -->
</head>
<body>
<div id="content">
	<div id="header">
		<h1>photo gallery</h1>
		<h2><a href="{stats/@root_url}">root</a><xsl:for-each select="path/*">/<a href="{stats/@path}/album{@path}"><xsl:value-of select="@name"/></a></xsl:for-each>&nbsp;</h2>
	</div>
	<div id="albums">
		<xsl:for-each select="albums/*">
		<a href="{stats/@root_url}/album{@path}" title="{@name}"><xsl:value-of select="@name"/></a><br />
		</xsl:for-each>
	</div>
	<div id="photos">
		<ul>
		<xsl:for-each select="photos/*">
			<li><a href="{stats/@root_url}/files{@path}" rel="lightbox" title="{@name}"><xsl:value-of select="@name"/></a><br /></li>
		</xsl:for-each>
		</ul>
	</div>
	<div id="videos">
		<ul>
		<xsl:for-each select="videos/*">
			<li><a href="{stats/@root_url}/files{@path}" title="{@name}"><xsl:value-of select="@name"/></a><br /></li>
		</xsl:for-each>
		</ul>
	</div>
	<div id="footer">
		<a href="{stats/@root_url}/../html/album{stats/@path}">html</a>
		&nbsp;<a href="{stats/@proto}://intheskywithdiamonds.net">intheskywithdiamonds</a>
		&nbsp;generated in <xsl:value-of select="stats/@pGenTime"/>
	</div>
</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
