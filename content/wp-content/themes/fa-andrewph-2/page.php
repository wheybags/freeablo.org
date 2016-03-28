<?php get_header(); ?>

<div id="blog">
    <div class="row">
        <div class="small-12 columns">
            <ul id="posts">
                <?php
                    $GLOBALS["fa_no_date_author"] = true;

                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        get_template_part( 'content', get_post_format() );
                    endwhile; endif; 
                ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>
