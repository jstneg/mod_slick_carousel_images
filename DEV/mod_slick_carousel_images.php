<?php
/**
 * Slick Image Carousel for Joomla 3.x
 */
defined( '_JEXEC' ) or die( 'Restricted access' ); // no direct access allowed
require_once __DIR__.'/helper.php';
$folder	= modSlickCarouselImages::getFolder($params);
//echo '<p>folder:'.$folder.'</p>';
$images	= modSlickCarouselImages::getImages($params, $folder);
if (!count($images)) {
	echo JText::_( 'No images ');
	return;
}
//$hello = modOrbit::test($params);

$speed			 = $params->get( 'speed', 10000 );
$autoplay		 = $params->get( 'autoplay', 1 );
$autoplayspeed	 = $params->get( 'autoplayspeed', 3000 );

$arrows			 = $params->get( 'arrows', 1 );
$prevarrow		 = $params->get( 'prevarrow', '' );
$nextarrow		 = $params->get( 'nextarrow', '' );
$dots			 = $params->get( 'dots', 0 );
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_slick_carousel_images', $params->get('layout', 'default'));
?>
