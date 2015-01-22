<?php get_header(); ?>
<!-- Content -->
<div id="main" class="container">
    <div class="row double">
        <!-- Content -->
        <div id="content" class="8u skel-cell-important">
            <?php if (have_posts()) : ?>
                <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                <?php if (is_category()): ?>
                    <header>
                        <h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
                    </header>
                <?php elseif(is_tag()): ?>
                    <header>
                        <h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
                    </header>
                <?php elseif (is_day()): ?>
                    <header>
                        <h1>Archive for <?php the_time('F jS, Y'); ?></h1>
                    </header>
                <?php elseif (is_month()): ?>
                    <header>
                        <h1>Archive for <?php the_time('F, Y'); ?></h1>
                    </header>
                <?php elseif (is_year()): ?>
                    <header>
                        <h1>Archive for <?php the_time('Y'); ?></h1>
                    </header>
                <?php elseif (is_author()): ?>
                    <header>
                        <h1>Author Archive</h1>
                    </header>
                <?php elseif (isset($_GET['paged']) and !empty($_GET['paged'])): ?>
                    <header>
                        <h1>Blog Archives</h1>
                    </header>
            <?php endif; ?>
                <?php get_template_part('loop', 'archive'); ?>
            <?php else : ?>
                <header>
                    <h1>Nothing found</h1>
                </header>
            <?php endif; ?>
        </div>
        <div id="sidebar" class="4u">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
