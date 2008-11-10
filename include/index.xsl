<?xml version="1.0"?>
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
	<title>intheskywithdiamonds | photo gallery</title>
	<link rel="stylesheet" href="/include/index.css" type="text/css" />
    <!-- begin lightbox -->
	<link rel="stylesheet" href="/include/lightbox/lightbox.css" type="text/css"/>
    <script type="text/javascript" src="/include/lightbox/lightbox.js"></script>
    <!-- end lightbox -->
</head>
<body>
<div id="content">
	<div id="header">
		<h1>spg version 0.1</h1>
		<h2>ts=<xsl:value-of select="stats/@ts"/>  <a href="/html/album{stats/@path}">html</a></h2>
	</div>
	<div id="albums">
		<xsl:for-each select="albums/album">
		<a href="{stats/@path}/album{@path}"><xsl:value-of select="@name"/></a><br />
		</xsl:for-each>
	</div>
	<div id="photos">
		<xsl:for-each select="photos/photo">
			<a href="/files{@path}" rel="lightbox" title="{@name}"><xsl:value-of select="@name"/></a><br />
		</xsl:for-each>
	</div>
</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
