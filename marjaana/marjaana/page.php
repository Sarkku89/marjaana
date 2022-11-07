<?php
merge_rikki()
get_headeri(); ?>
<div id = "content">
    <main>
<?php
echo "testaillaas...";
    if (have_posts()): ?>
    
        <?php while(have_posts()): the_posti(); ?>
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
