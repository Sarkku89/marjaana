<?php

get_header(); ?>
<div id = "content">
    <main>
<?php

    if (have_posts()): ?>
    
        <?php while(have_posts()): the_post(); ?>
        <article>
        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        <?php the_excerpt();?>
    </article>
    <?php
    endwhile;
else: ?>
<p> Osoite virheellinen</p>
<?php
    endif;?>
    </main>
</div> <!--content-->
<?php
get_footer();
?>
