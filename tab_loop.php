<?php

/**
* Class and Function List:
* Function list:
* Classes list:
*/

if ( isset ($atts['top']))
{
    $topcat = ($atts['top'])  ? 0 :  ($atts['top']);
}

$args   = [];
if (is_int($topcat) && $topcat > 0)
{
	$args   = array(
		'child_of' => $topcat
	);
}
echo '<div id="tcats">';

$categories = get_categories($args);


echo '<ul>';
foreach ($categories as $category)
{

		//echo '<section id="tcat-'.$category->slug.'"><h2 id="#tcatb"><a href="#tcat-'.$category->slug.'">'.$category->name.'</a></h2><p>';
	// LOOP with category number
	$cat_num      = get_category_by_slug($category->slug);

	$cat_id       = $cat_num->term_id;

    
    echo'<li id="tcat-' . $category->slug . '"><a href="#cattab-'.$cat_id. '">' . $category->name . '</a></li>';


	// THE LOOP HERE
}
echo '</ul>';

foreach ($categories as $category)
{
    $cat_num      = get_category_by_slug($category->slug);

	$cat_id       = $cat_num->term_id;

    echo '<div id="cattab-'.$cat_id.'">';
	$args2        = array(
		
		'category'              => $cat_id,
		'orderby'              => 'title',
		'order'              => 'ASC',
        'posts_per_page'              => -1
	); // exclude category 9
	$custom_posts = get_posts($args2);
	foreach ($custom_posts as $post):
		setup_postdata($post);
		echo '<a href="' . $post->guid . '">' . $post->post_title . '</a><BR>';
	endforeach;

	// LOOP END
	echo '</div>';
}


echo "</div>";
echo '<script>jQuery("document").ready(function() {
    jQuery( "#tcats" ).tabs();
});</script>';

?>