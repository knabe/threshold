<?php

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

    // Show Address Inputs
	jQuery('#footer_address_showhidden').click(function() {
  		jQuery('#section-footer_address_one_text_hidden').fadeToggle(400);
        jQuery('#section-footer_address_two_text_hidden').fadeToggle(400);
	});

	if (jQuery('#footer_address_showhidden:checked').val() !== undefined) {
		jQuery('#section-footer_address_one_text_hidden').show();
        jQuery('#section-footer_address_two_text_hidden').show();
	}

    // Show E-mail Input
    jQuery('#footer_email_showhidden').click(function() {
  		jQuery('#section-footer_email_text_hidden').fadeToggle(400);
	});

	if (jQuery('#footer_email_showhidden:checked').val() !== undefined) {
		jQuery('#section-footer_email_text_hidden').show();
	}

    // Show Telephone Input
    jQuery('#footer_telephone_showhidden').click(function() {
  		jQuery('#section-footer_telephone_text_hidden').fadeToggle(400);
	});

	if (jQuery('#footer_email_showhidden:checked').val() !== undefined) {
		jQuery('#section-footer_telephone_text_hidden').show();
	}

    // Show Social Input
    jQuery('#footer_social_showhidden').click(function() {
  		jQuery('#section-footer_social_multicheck').fadeToggle(400);
	});

	if (jQuery('#footer_social_showhidden:checked').val() !== undefined) {
		jQuery('#section-footer_social_multicheck').show();
	}

});
</script>

<?php } ?>
