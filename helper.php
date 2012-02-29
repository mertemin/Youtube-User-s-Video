<?php

// no direct access
defined('_JEXEC') or die;

// include the helper file
require_once(dirname(__FILE__).DS.'helpers/simplepie.inc');

/**
 * @package		Joomla.Site
 * @subpackage	mod_youtubevideo
 */
class modYoutubeVideoHelper
{
	static function &getList(&$params)
	{
		// get a parameter from the module's configuration
		$username = $params->get('username');
		 
		// We'll process this feed with all of the default options.
		$feed = new SimplePie();
		 
		// Set which feed to process.
		$feed->set_feed_url('feed://gdata.youtube.com/feeds/api/users/'.$username.'/uploads');
		
		// Set cache duration
		$feed->set_cache_duration(60);
		
		// Run SimplePie.
		$feed->init();
		 
		// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
		$feed->handle_content_type();
		
		$list = array();
		foreach($feed->get_items() as $item)
		{
			// As long as an enclosure exists...
			if ($enclosure = $item->get_enclosure())
			{
				$link = $item->get_permalink();
				parse_str(parse_url($link, PHP_URL_QUERY), $vars);
				$video_id = $vars['v'];   
				
				$list[] = array(
					'title'		=> $enclosure->get_title(),
					'href'		=> 'http://www.youtube.com/v/'.$video_id.'&fs=1&autoplay=1',
					'thumb'		=> $enclosure->get_thumbnail()
				);				 
			}
		}
		return $list;
	}
}