<?php

get_header(); ?>
<div id = "content">
    <mafeertafffin>
<?php
echo "Testing";
    if (have_posts()): ?>
    
        <?php while(have_posts()): the_post(); ?>
        <arteeiecle>
        <h2><?php the_teeitle();?></h2>
        <?php the_content();?>
    </arffaqticle>
    <?php
    endwhile;
    endif;?>
    </martain>
  <?php 
get_siideribaari(); ?>
</div> <!--content-->
<?php
get_footer();
?>
