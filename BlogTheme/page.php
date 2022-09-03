<?php get_header(); ?>
<br>
<br>
<br>
<div class="contents">
    <main>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <br>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>