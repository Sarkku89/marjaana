<?php

get_header(); ?>
<div id = "content">
    <main>
        <h2 id="pagetitle"><?php echo get_queried_object()->name; ?></h2>
        <p><?php echo get_queried_object()->description; ?></p>
        <div id="subcate-box">
        
<?php
    
    $the_query = new WP_Query(array(
        'tag' => 'terveys',
        'orderby' => 'title',
        'order' => 'asc',
        
    ));
    if ($the_query -> have_posts()): ?>
        <div id="subcate-list">
        <?php while($the_query -> have_posts()): $the_query -> the_post(); ?>
        <div class ="subcate">
        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
    </div>

    <?php
    endwhile;
    wp_reset_postdata();
else: ?>
<p> Ei kirjoituksia</p>
<?php
    endif;?>
    </div>
    <img id= "subcate-img" src="https://suomenmustaterrierit.files.wordpress.com/2018/07/27540434_467717176963771_3710523969120952397_n.jpg?w=494&h=600">


    </main>
  <?php 
get_sidebar(); ?>
</div> <!--content-->
<?php
get_footer();
?>
