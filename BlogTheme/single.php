<?php get_header(); ?>
<br>
<br>
<br>
<div class="breadcrumb ">

</div>
<div class="contents">
    <main>
        <p><?php echo get_the_date($format, $post); ?></p>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>