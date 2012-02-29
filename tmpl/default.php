<?php
// no direct access
defined('_JEXEC') or die;
?>

<ul class="youtubevideo">
<?php foreach ($list as $item) : ?>
	<li class="item">
		<a href="<? echo $item['href'] ?>" title="<? echo $item['title'] ?>" class="modal" rel="{handler: 'iframe', size: {x: 600, y: 450}}"><img src="<? echo $item['thumb'] ?>" /></a>
		<p class="caption"><? echo $item['title'] ?></p>
	</li>
<?php endforeach; ?>
</ul>
