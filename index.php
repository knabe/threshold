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

<!-- Extra #1 -->
<div id="extra" class="container">
    <ul>
        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/library/images/pic03.jpg" alt="" class="image full" /></a></li>
        <li>
            <div class="content">
                <h3>Integer vitae libero acrisus egestas placerat  sollicitudin leo</h3>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor.</p>
                <a href="#" class="button">More Info</a>
            </div>
        </li>
    </ul>
</div>

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
            <ul class="list">
                <li>
                    <h3>Integer vitae libero</h3>
                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae libero luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing</p>
                    <a href="#" class="button">More Info</a>
                </li>
                <li>
                    <h3>Cras iaculis ultri</h3>
                    <p>Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis</p>
                    <a href="#" class="button">More Info</a>
                </li>
                <li>
                    <h3>Nam convallis pelle</h3>
                    <p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem lorem ipsum</p>
                    <a href="#" class="button">More Info</a>
                </li>
                <li>
                    <h3>Vivamus adipiscing</h3>
                    <p>Ut convallis, sem sit amet interdum consectetuer, odio augue aliquam leo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus ferment</p>
                    <a href="#" class="button">More Info</a>
                </li>
            </ul>
        </section>

    </div>
</div>
<!-- /Featured -->
<?php get_footer(); ?>
