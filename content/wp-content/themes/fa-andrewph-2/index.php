<?php
    $num_posts = 0;

    while(have_posts())
    {
        $num_posts++;
        the_post();
    }

    rewind_posts();

    if($num_posts > 1)
    {
        $GLOBALS["fa_is_front_page"] = true;
    }
?>

<?php get_header(); ?>

<div id="blog">
    <div class="row">
        <div class="small-12 columns">
            <?php
                if($num_posts > 1)
                {
                    echo '<h2>Recent News <a href="/?feed=rss2"><img src="/fa/images/rss.png" class="rssicon"></a></h2>';
                }
            ?>

            <ul id="posts">
                <?php 
                    if (have_posts())
                    {
                        while(have_posts())
                        {
                            the_post();
                            get_template_part('content', get_post_format());
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>
