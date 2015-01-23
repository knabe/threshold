<?php

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

    // Show Address Inputs
	jQuery('#footer_address_check').click(function() {
  		jQuery('#section-footer_address_one').fadeToggle(400);
        jQuery('#section-footer_address_two').fadeToggle(400);
	});

	if (jQuery('#footer_address_check:checked').val() !== undefined) {
		jQuery('#section-footer_address_one_text_hidden').show();
        jQuery('#section-footer_address_two_text_hidden').show();
	}

    // Show E-mail Input
    jQuery('#footer_email_check').click(function() {
  		jQuery('#section-footer_email').fadeToggle(400);
	});

	if (jQuery('#footer_email_check:checked').val() !== undefined) {
		jQuery('#section-footer_email').show();
	}

    // Show Telephone Input
    jQuery('#footer_telephone_check').click(function() {
  		jQuery('#section-footer_telephone').fadeToggle(400);
	});

	if (jQuery('#footer_email_check:checked').val() !== undefined) {
		jQuery('#section-footer_telephone').show();
	}

    // Show Social Input
    jQuery('#footer_social_check').click(function() {
  		jQuery('#section-footer_social_multicheck').fadeToggle(400);
	});

	if (jQuery('#footer_social_check:checked').val() !== undefined) {
		jQuery('#section-footer_social_multicheck').show();
	}

});
</script>

<?php } ?>
