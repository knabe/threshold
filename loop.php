<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>">
        <header>
            <h2><?php the_title() ?></h2>
        </header>
		<?php the_content(); ?>
	</article>
<?php else: ?>
	<?php if (have_posts()):
		while (have_posts()) : the_post() ?>
			<article id="article-<?php the_ID() ?>" class="article">
				<header class="article-header">
					<?php if (has_post_thumbnail() and !is_singular()): ?>
						<div class="featured-image">
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail() ?></a>
						</div>
					<?php endif; ?>
					<h2 class="article-title"><?php if(!is_singular()): ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php endif; the_title() ?><?php if(!is_singular()): ?></a><?php endif; ?></h2>
					<span class="article-info byline">
						<span class="post-name-date">Posted on <span class="post-date"><?php the_date('F d Y') ?></span> by <span class="post-author"><?php the_author() ?></span></span>
					</span>
				</header>
				<div class="article-content">
					<?php (is_single()) ? the_content() : the_excerpt() ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else: ?>
		<p>Nothing matches your query.</p>
	<?php  endif; ?>
<?php  endif; ?>
