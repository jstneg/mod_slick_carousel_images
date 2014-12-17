<?php
// Bootstrap 3.1.1 Carousel
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addStyleSheet($doc->baseurl.'/modules/mod_slick_carousel_images/css/slick.css');
//$doc->addScript($doc->baseurl.'/modules/mod_slick_carousel_images/js/jquery-1.11.1.min.js', 'text/javascript', false);
$doc->addScript($doc->baseurl.'/modules/mod_slick_carousel_images/js/slick.min.js', 'text/javascript', false);

$tmpScript = "jQuery(document).ready(function() {
	jQuery('#slick-".$module->id."').slick({
		autoplay: ".(($autoplay)?('true'):('false')).",
		speed: ".$speed.",
		autoplaySpeed: ".$autoplayspeed.",\n";

if($dots){
	$doc->addStyleSheet($doc->baseurl.'/modules/mod_slick_carousel_images/css/slick-dots.css');
	$tmpScript .= "dots: true,\n";
}
switch ($arrows) {
    case 0: //none
        $tmpScript .= "arrows: false,\n";
        break;
    case 1: //default
		$doc->addStyleSheet($doc->baseurl.'/modules/mod_slick_carousel_images/css/slick-nav-default.css');
        break;
    case 2: //glyphicons
		$doc->addStyleSheet($doc->baseurl.'/modules/mod_slick_carousel_images/css/slick-nav-glyphicon.css');
        $tmpScript .= "\t\tprevArrow:'<a class=\"slick-prev\">";
        if($prevarrow!=''){
        	$tmpScript .= "<span class=\"glyphicon ".$prevarrow."\"></span></a>',\n";
        }else{
        	$tmpScript .= "<span class=\"glyphicon glyphicon-chevron-left\"></span></a>',\n";
        }
        $tmpScript .= "\t\tnextArrow:'<a class=\"slick-next\">";
        if($nextarrow!=''){
        	$tmpScript .= "<span class=\"glyphicon ".$nextarrow."\"></span></a>',\n";
        }else{
        	$tmpScript .= "<span class=\"glyphicon glyphicon-chevron-right\"></span></a>',\n";
        }
        break;
    case 3: //font awesome
    	$doc->addStyleSheet($doc->baseurl.'/modules/mod_slick_carousel_images/css/slick-nav-fontawesome.css');
        $tmpScript .= "\t\tprevArrow:'<a class=\"slick-prev\">";
        if($prevarrow!=''){
        	//$tmpScript .= $prevarrow."</a>',\n";
        	$tmpScript .= "<span class=\"fa ".$prevarrow."\"></span></a>',\n";
        }else{
        	$tmpScript .= "<span class=\"fa fa-chevron-left\"></span></a>',\n";
        }
        $tmpScript .= "\t\tnextArrow:'<a class=\"slick-next\">";
		if($nextarrow!=''){
        	//$tmpScript .= $nextarrow."</a>',\n";
        	$tmpScript .= "<span class=\"fa ".$nextarrow."\"></span></a>',\n";

        }else{
        	$tmpScript .= "<span class=\"fa fa-chevron-right\"></span></a>',\n";
        }
        break;
} 

$tmpScript .= "\t});\n});";
$doc->addScriptDeclaration($tmpScript);
?>
<!-- carousel start -->
<div id="slick-<?php echo $module->id; ?>">
<?php 
foreach ( $images as $ikey=>$ivalue ) { 
	echo '<div class="';
	echo ($ikey==0)?(' active'):('');
	echo '">';
	echo $ivalue;
	echo '</div>'."\n";
}
?>
</div>
<!-- carousel end -->
