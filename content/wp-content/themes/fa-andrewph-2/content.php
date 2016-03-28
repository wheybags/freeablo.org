<?php
    if(!array_key_exists("fa_no_date_author", $GLOBALS))
    {
        $GLOBALS["fa_no_date_author"] = false;
    }
?>

<li>
    <a class="post-title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>

    <?php

        if(!$GLOBALS["fa_no_date_author"])
        {
            echo '<h4 class="subheader">';
            the_date();
            echo ' by ';
            the_author();
            echo '</h4>';
        }

        the_content(); 
    ?>
</li>

