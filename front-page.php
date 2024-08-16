<?php
get_header();
?>

<main class="top-130">
    <?php
    // Start the loop
    if ( have_posts() ) : while ( have_posts() ) : the_post();

        // Output the content (this will include Gutenberg blocks)
        the_content();

    endwhile; endif;
    ?>
</main>

<?php
get_footer();
?>
