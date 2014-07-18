<?php
$jsnutils	= JSNTplUtils::getInstance();
$doc		= $this->_document;

// Count module instances
$doc->hasRight		= $jsnutils->countModules('right');
$doc->hasLeft		= $jsnutils->countModules('left');
$doc->hasPromo		= $jsnutils->countModules('promo');
$doc->hasPromoLeft	= $jsnutils->countModules('promo-left');
$doc->hasPromoRight	= $jsnutils->countModules('promo-right');
$doc->hasInnerLeft	= $jsnutils->countModules('innerleft');
$doc->hasInnerRight	= $jsnutils->countModules('innerright');

// Define template colors
$doc->templateColors	= array('blue', 'red', 'green', 'violet', 'orange', 'grey');

if (isset($doc->sitetoolsColorsItems))
{
	$this->_document->templateColors = $doc->sitetoolsColorsItems;
}

// Apply K2 style
if ($jsnutils->checkK2())
{
	$doc->addStylesheet($doc->templateUrl . "/ext/k2/jsn_ext_k2.css");
}

// Start generating custom styles
$customCss	= '';

// setup main layouts width
if ($doc->customWidth != 'responsive')
{
	$customCss .= '
#jsn-topheader-inner,
#jsn-header_inner,
#jsn-content-top_inner,
#jsn-content,
#jsn-content-bottom_inner,
#jsn-content-bottom-over_inner,
#jsn-usermodules3-inner,
#jsn-bottom_inner,
#jsn-footer-inner, 
#template-detail-inner,
#jsn-blog-promo-inner,
#extension-detail-inner,
#jsn-promo_inner {
	width: ' . $doc->customWidth . ';
}';
}

// Setup main menu width parameter
if ($doc->mainMenuWidth)
{
	$menuMargin = $doc->mainMenuWidth;

	$customCss .= '
		div.jsn-modulecontainer ul.menu-mainmenu ul,
		div.jsn-modulecontainer ul.menu-mainmenu ul li {
			width: ' . $doc->mainMenuWidth . 'px;
		}
		div.jsn-modulecontainer ul.menu-mainmenu > li:hover > ul {
			margin-left: -' . $menuMargin/2 . 'px;
			left: 50%;
		}
		div.jsn-modulecontainer ul.menu-mainmenu ul ul {';
		if($doc->direction == 'ltr'){
			$customCss .= '
				margin-left: ' . $menuMargin/2 . 'px;
			';
		}
		if($doc->direction == 'rtl'){
			$customCss .= '
				margin-right: ' . $menuMargin/2 . 'px;
				right: ' . $menuMargin/2 . 'px;
			';
		}
		$customCss .= '
		}
		div.jsn-modulecontainer ul.menu-mainmenu li.jsn-submenu-flipback ul ul {
		';
		if($doc->direction == 'rtl') {
			$customCss .= '
				margin-left: ' . $menuMargin/2 . 'px;
				left: ' . $menuMargin/2 . 'px;
			';
		}
		if($doc->direction == 'ltr') {
			$customCss .= '
				margin-right: ' . $menuMargin/2 . 'px;
				right: ' . $menuMargin/2 . 'px;
			';
		}
		$customCss .= '
		}
		#jsn-pos-toolbar div.jsn-modulecontainer ul.menu-mainmenu ul ul {
		';
		if($doc->direction == 'ltr'){
			$customCss .= '
				margin-right: ' . $menuMargin/2 . 'px;
				margin-left : auto;
				right:'. $menuMargin/2 . 'px; 
				';
		}
		if($doc->direction == 'rtl'){
			$customCss .= '
				margin-left : ' . $menuMargin/2 . 'px;
				margin-right: auto';
		}
		$customCss .= '
		}
	';
}

// Setup slide menu width parameter
if ($doc->sideMenuWidth)
{
	$sideMenuMargin = $doc->sideMenuWidth + 2;

	$customCss .= '
		div.jsn-modulecontainer ul.menu-sidemenu ul,
		div.jsn-modulecontainer ul.menu-sidemenu ul li {
			width: ' . $doc->sideMenuWidth . 'px;
		}
		div.jsn-modulecontainer ul.menu-sidemenu li ul {
			right: -' . $sideMenuMargin . 'px;
		}
		body.jsn-direction-rtl div.jsn-modulecontainer ul.menu-sidemenu li ul {
			left: -' . $sideMenuMargin . 'px;
			right: auto;
		}
		div.jsn-modulecontainer ul.menu-sidemenu ul ul {
		';
		if($doc->direction == 'ltr'){
			$customCss .= '
				margin-left: ' . $sideMenuMargin . 'px;
			';
		}
		if($doc->direction == 'rtl'){
			$customCss .= '
				margin-right: ' . $sideMenuMargin . 'px;
			';
		}
		$customCss .= '
		}
	';
}

// Include CSS3 support for IE browser
if ($doc->isIE)
{
	$customCss .= '
		.text-box,
		.text-box-highlight,
		.text-box-highlight:hover,
		div[class*="box-"] div.jsn-modulecontainer_inner,
		div[class*="solid-"] div.jsn-modulecontainer_inner {
			behavior: url(' . $doc->rootUrl . '/templates/'.strtolower($doc->template).'/css/PIE.htc);
		}
		.link-button {
			zoom: 1;
			position: relative;
			behavior: url(' . $doc->rootUrl . '/templates/'.strtolower($doc->template).'/css/PIE.htc);
		}
	';
}

$doc->addStyleDeclaration(trim($customCss, "\n"));
