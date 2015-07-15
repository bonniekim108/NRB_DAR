<?php
$pagelist = get_pages('sort_column=menu_order&sort_order=asc&parent=0');
$pages = array();
foreach ($pagelist as $page) {
   $pages[] += $page->ID;
}

if(is_front_page()){
$current_id = 14;
}else{
$current_id = get_the_ID();
}

//echo 'current_id '.$current_id;
//echo '<pre>';
//print_r($pages);
//echo '</pre>';

$current = array_search($current_id, $pages);
$prevID = $pages[$current-1];
$nextID = $pages[$current+1];

$prev_title = get_field("short_title", $prevID);
$next_title = get_field("short_title", $nextID);

if(empty($prev_title)) $prev_title = get_the_title($prevID);
if(empty($next_title)) $next_title = get_the_title($nextID);
?>
<div class="nav-section cf">
	<div class="center-wrap">
		<?php if (!empty($prevID) && !is_front_page() && $current_id != 14) { ?>
		<a href="<?php echo get_permalink($prevID); ?>" title="<?php echo $prev_title; ?>" class="link-prev">back: <?php echo $prev_title; ?></a>
		<?php } ?>
		<?php if (!empty($nextID)) { ?>
		<a href="<?php echo get_permalink($nextID); ?>" title="<?php echo $next_title; ?>" class="link-next">next: <?php echo $next_title; ?></a>
		<?php } ?>
	</div>
</div>
