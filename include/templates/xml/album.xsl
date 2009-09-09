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
	<title>skywww media | <xsl:value-of select="stats/@path"/></title>
	<link rel="stylesheet" href="{stats/@root_url}/{stats/@template_path}common-html_xml.css" type="text/css" />
    <!-- begin multibox -->
        <link href="{stats/@root_url}/include/multibox-1.3.1/multibox.css" rel="stylesheet" type="text/css" />
        <!--[if lte IE 6]><link rel="stylesheet" href="{stats/@root_url}/include/multibox-1.3.1/ie6.css" type="text/css" media="all" /><![endif]-->
        <script type="text/javascript" src="{stats/@root_url}/include/multibox-1.3.1/mootools.js"></script>
        <script type="text/javascript" src="{stats/@root_url}/include/multibox-1.3.1/overlay.js"></script>
        <script type="text/javascript" src="{stats/@root_url}/include/multibox-1.3.1/multibox.js"></script>
    <!-- end multibox -->
    <script type="text/javascript" src="{stats/@root_url}/{stats/@template_path}album.js"></script>
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
			Path: <a href="{stats/@root_url}">root</a><xsl:for-each select="path/*">&nbsp;/&nbsp;<a href="{stats/@path}/album{@path}"><xsl:value-of select="@name"/></a></xsl:for-each>
		</div>
	</div>
	<div id="content">
		<div id="content_albums">
			<xsl:for-each select="albums/*">
				<a href="{stats/@root_url}/album{@path}" title="{@name}"><xsl:value-of select="@name"/></a><br />
			</xsl:for-each>
		</div>
		<div id="content_photos">
			<xsl:for-each select="photos/*">
				<a href="{stats/@root_url}/files{@path}" class="multibox" title="{@name}"><xsl:value-of select="@name"/></a><br />
			</xsl:for-each>
		</div>
		<div id="content_videos">
			<xsl:for-each select="videos/*">
					<a href="{stats/@root_url}/files{@path}" class="multibox" title="{@name}"><xsl:value-of select="@name"/></a><br />
			</xsl:for-each>
		</div>
		<div id="content_flashs">
			<xsl:for-each select="flashs/*">
				<a href="{stats/@root_url}/files{@path}" class="multibox" title="{@name}"><xsl:value-of select="@name"/></a><br />
			</xsl:for-each>
		</div>
	</div>
	
	<div id="footer">
		<div id="footer_l">
                        <a href="http://skywww.net">skywww</a>
                        &nbsp;<a href="http://trevorjay.net">trevorjay</a>
                        &nbsp;<a href="http://intheskywithdiamonds.net">intheskywithdiamonds</a>
		</div>
		<div id="footer_m">
			delivered in <xsl:value-of select="stats/@pGenTime"/>
		</div>
		<div id="footer_r">
			<a href="{stats/@root_url}/../html/album{stats/@path}">html</a>
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
