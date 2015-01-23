<?php

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

    // checkboxes with hidden inputs
    jQuery('.has_hidden_child').find('input:checkbox').each(function(){

        if ( jQuery(this).is(":checked")) {
            jQuery(this).parents('.section').next().show();
        }

        jQuery(this).change(function() {
            jQuery(this).parents('.section').next().fadeToggle(400);
        });

    });

});
</script>

<?php } ?>
