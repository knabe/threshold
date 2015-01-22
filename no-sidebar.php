<?php

/*
Template Name: No Sidebar
*/

get_header();

?>

<!-- Content -->
<div id="main" class="container">
    <div class="row double">
        <!-- Content -->
        <div id="content" class="12u skel-cell-important">
            <?php get_template_part('loop', 'page'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
