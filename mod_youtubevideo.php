<?php
//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$list = modYoutubeVideoHelper::getList($params);

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root().'/modules/mod_youtubevideo/assets/youtubevideo.css');

require JModuleHelper::getLayoutPath('mod_youtubevideo', $params->get('layout', 'default'));

?>