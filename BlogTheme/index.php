<?php get_header() ?>
<div class="hero">
    <figure><img src="<?php echo get_template_directory_uri(); ?>/img/heroimg.jpg" alt="heroimg"></figure>
</div>
<div class="contents">
    <main>
        <div class="title">
            <h2>最新の投稿</h2>
        </div>
        <section class="main item">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article>
                        <p style="color:rgb(122,122,122);"><?php echo get_the_date($format, $post); ?></p>
                        <?php if (has_post_thumbnail()) : ?>
                            <figure>
                                <?php the_post_thumbnail('post-thumbnails'); ?>
                            </figure>
                        <?php else : ?>
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/traial.jpg" alt="eyecatch">
                            </figure>
                        <?php endif; ?>
                        <h3 style="color: rgb(70,70,70);"><?php the_title(); ?></h3>
                        <div class="excerpt">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?> " style="color: rgb(70,70,70);">Read More</a>
                    </article>
                    <br>
                <?php endwhile; ?>
            <?php else : ?>
                <p>投稿がありません</p>
            <?php endif; ?>
        </section>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer() ?>