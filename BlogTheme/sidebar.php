    <aside>
        <!-- <h2>関連記事</h2> -->
        <div class="ranking">
            <h2>人気の記事</h2>
            <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 5,
                'orderby' => 'meta_value_num',
                'meta_key' => '_custom_meta_views',
                'order' => 'DESC'
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();  ?>
                    <article>
                        <figure>
                            <?php the_post_thumbnail('post-thumbnails'); ?>
                        </figure>
                        <a href="<?php the_permalink(); ?>">
                            <h3 style="color:rgb(70, 70, 70);"><?php the_title(); ?></h3>
                        </a>
                    </article>
            <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <div class="category">
            <h2>カテゴリ一覧</h2>
            <ul>
                <?php
                $args = array(
                    'orderby' => 'id',
                    'order' => 'ASC'
                );
                $categories = get_categories($args);
                ?>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </aside>