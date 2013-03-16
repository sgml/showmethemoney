<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml"
                >

<xsl:output method="xml" encoding="utf-8" version="" indent="yes" standalone="yes" media-type="text/html" omit-xml-declaration="no" doctype-system="about:legacy-compat" />

<xsl:template match="/">
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
      <link rel="stylesheet" type="text/css" href="ux.css"/>
    </head>
    <body>
    <div id="container">
		  <object>
<div class="donate_btn">
<span lang="usd" id="_10">$10</span>
</div>
</object>
		  <object>
<div class="donate_btn">
<span lang="usd" id="_25">$25</span>
</div>
</object>
		  <object>
<div class="donate_btn">
<span lang="usd" id="_50">$50</span>
</div>
</object>
		  <object>
<div class="donate_btn">
<span lang="usd" id="_100">$100</span>
</div>
</object>      
<span class="wedge"></span>
	  </div>
	  
	  <h2>
	    Change Currency:
	  </h2>
	  <dl id="fiats">
	    <dt><a href="#_USD">United States Dollar</a></dt>
            <dt><a href="#_JPY">Japanese Yen</a></dt>
	    <dt><a href="#_BGN">Bulgarian Lev</a></dt>
	    <dt><a href="#_CZK">Czech Koruna</a></dt>
	    <dt><a href="#_ARS">Argentine Peso</a></dt>
	    <dt><a href="#_AUD">Australian Dollar</a></dt>
	    <dt><a href="#_CHF">Swiss Franc</a></dt>
	  </dl>
      <xsl:apply-templates />
      <input type="hidden" id="USD" value="1"></input>
      <input type="hidden" id="lang_USD" value="$"></input>
      <script src="ux.js" type="application/javascript"></script>
    </body>
  </html>
</xsl:template>

<xsl:template match="text()"/>

<xsl:template match="/response/conversion/currency">
	<xsl:variable name="foo">
	  <xsl:value-of select="."/>
	</xsl:variable>
  
	<xsl:variable name="bar">
	  <xsl:value-of select="following-sibling::node()/text()"/>
	</xsl:variable>
	
        <xsl:variable name="baz">
          <xsl:value-of select="document('lang.xml')/lang/node()[local-name()=$foo]/appeal/text()"/>
        </xsl:variable>

	<input type="hidden" id="{$foo}" value="{$bar}"></input>
	<input type="hidden" id="lang_{$foo}" value="{$baz}"></input>
        
</xsl:template>

</xsl:stylesheet>
