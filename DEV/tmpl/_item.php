<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$images = json_decode($item->images);
$item_heading = $params->get('item_heading', 'h4');
?>
<div class="item">
<?php
	if ($params->get('item_title')):
		echo '<'.$item_heading.'>';
		if ($params->get('link_titles') && $item->link != ''):
			echo '<a href="'.$item->link.'">'.$item->title.'</a>';
		else:
			echo $item->title;
		endif;
		echo '</'.$item_heading.'>';
	endif;

	if (!$params->get('intro_only')) :
		echo $item->afterDisplayTitle;
	endif;
	echo $item->beforeDisplayContent;
	echo $item->introtext;
	if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')):
		echo '<a class="readmore" href="'.$item->link.'">'.JTEXT::_('MOD_SLICK_CAROUSEL_ARTICLES_READMORE').'</a>';
	endif;
?>
</div>
