<?php

/*
Template Name: Left Sidebar
*/

get_header();

?>
<!-- Content -->
<div id="main" class="container">
    <div class="row double">
        <!-- Sidebar -->
        <div id="sidebar" class="4u">
            <?php get_sidebar(); ?>
        </div>
        <!-- Content -->
        <div id="content" class="8u skel-cell-important">
            <?php get_template_part('loop', 'page'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
