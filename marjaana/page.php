<?php

get_header(); ?>
<div id = "content">
    <main>
<?php
    if (have_posts()): ?>
    
        <?php while(have_posts()): the_post(); ?>
        <article>
        <h2><?php the_title();?></h2>
        <?php the_content();?>
    </article>
    <?php
    endwhile;
    endif;?>
    </main>
  <?php 
get_sidebar(); ?>
</div> <!--content-->
<?php
get_footer();
?>
