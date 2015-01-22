<?php get_header(); ?>
<!-- Content -->
<div id="main" class="container">
    <div class="row double">
        <!-- Content -->
        <div id="content" class="8u skel-cell-important">
            <?php get_template_part('loop', 'single'); ?>
            <?php comments_template(); ?>
        </div>
        <!-- Sidebar -->
        <div id="sidebar" class="4u">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
