		</div>
		<!-- Footer -->
        <div id="footer">
            <div class="container">

                <!-- Footer List -->
                    <div id="contact">
                        <?php threshold_footer_sections() ?>
                    </div>
                <!-- /Footer List -->


                <!-- Newsletter -->
                    <div id="newsletter">
                        <div class="row">
                            <section class="6u">
                                <span>Fusce lobortis lorem at ipsum semper sagittis sui unteconvil sitamet interdium</span>
                            </section>
                            <section class="6u">
                                <form method="post" action="#" id="subscribe">
                                    <input type="text" class="text" name="search" placeholder="Your email address" />
                                    <a href="#" class="submit">Subscribe</a>
                                </form>
                            </section>
                        </div>
                    </div>
                <!-- /Newsletter -->

                <!-- Copyright -->
                    <div id="copyright">
                        &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'title' ); ?> All Rights Reserved
                    </div>
                <!-- /Copyright -->

            </div>
        </div>
		<?php wp_footer() ?>
	</body>
</html>
