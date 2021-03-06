<?php get_header(); ?>

<?php if(of_get_option('enable-feature-banner')): ?>
    <!-- Banner -->
    <div id="banner" class="container">
        <div class="row double">
            <section class="6u">
                <div id="one">
                    <?php $feature = threshold_get_feature_banner(); ?>
                    <header>
                        <?php if($feature['heading']){ ?>
                        <h2><?php echo $feature['heading'] ?></h2>
                        <?php } ?>

                        <?php if($feature['subheading']){ ?>
                        <span class="byline"><?php echo $feature['subheading'] ?></span>
                        <?php } ?>
                    </header>

                    <a href="<?php echo $feature['page']['link'] ?>" class="button">Click Here</a>
                </div>
            </section>
            <section class="6u skel-cell-important">
                <?php if($feature['image']){ ?>
                <a href="<?php echo $feature['page']['link'] ?>"><img src="<?php echo $feature['image'] ?>" alt="" class="image full" /></a>
                <?php } ?>
                </div>
            </section>
        </div>
    </div>
    <!-- /Banner -->
<?php endif; ?>
<?php if(of_get_option('enable-feature-section-one')): ?>
<!-- Extra #1 -->
<div id="extra" class="container">
    <ul>
        <li><a href="<?php echo get_permalink(of_get_option('feature-section-one-page')) ?>"><img src="<?php echo of_get_option('feature-section-one-image') ?>" alt="" class="image full" /></a></li>
        <li>
            <div class="content">
                <h3><?php echo of_get_option('feature-section-one-heading') ?></h3>
                <p><?php echo of_get_option('feature-section-one-description') ?></p>
                <a href="<?php echo get_permalink(of_get_option('feature-section-one-page')) ?>" class="button">More Info</a>
            </div>
        </li>
    </ul>
</div>
<?php endif; ?>

<!-- Extra #2 -->
<div id="extra2" class="container">
    <div class="row">
        <section class="6u">
            <header>
                <h2>Aliquam tincidunt mauris eu risus</h2>
                <span class="byline">Etiam pellentesque mauris ut lectus nunc tellus ante mattis eget gravida vitae ultricies</span>
            </header>
        </section>
        <section class="6u">
            <ul class="icon">
                <li>
                    <span class="pennant">
                        <a href="#"><span class="fa fa-user"></span></a>
                    </span>
                </li>
                <li>
                    <div class="pennant">
                        <a href="#"><span class="fa fa-rocket"></span></a>
                    </div>
                </li>
                <li>
                    <div class="pennant">
                        <a href="#"><span class="fa fa-shield"></span></a>
                    </div>
                </li>
            </ul>
        </section>
    </div>
</div>
<!-- /Extra #2 -->

<!-- Featured -->
<div id="featured" class="container">
    <div class="row">

        <section class="4u">
            <div class="image-border"><img src="<?php echo get_template_directory_uri() ?>/library/images/pic04.jpg" alt="" class="image full" /></div>
        </section>

        <section class="8u">
            <?php threshold_latest_posts(); ?>
        </section>

    </div>
</div>
<!-- /Featured -->
<?php get_footer(); ?>
