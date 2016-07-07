<?php

/*
 * Calm Custom Meta Boxes
 */



// Add Meta Boxes

function calm_custom_meta() {


    // Portfolio Item Type Box

    add_meta_box( 'portfolio_type', __( 'Portfolio Item Type', 'calm' ), 'portfolio_select', 'portfolio', 'normal', 'high' );

}

add_action( 'add_meta_boxes', 'calm_custom_meta' );




// Enque Image Uploader Javascript

function calm_img_upload() {

    global $typenow;
    if( $typenow == 'post' || $typenow == 'portfolio' ) {
        wp_enqueue_media();

        wp_register_script( 'meta-box-image', get_template_directory_uri() . '/admin/assets/js/meta-box-image.js' );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'calm' ),
                'button' => __( 'Use this image', 'calm' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}

add_action( 'admin_enqueue_scripts', 'calm_img_upload' );



// Display Portfolio Type Select Box

function portfolio_select( $post ) {

    wp_nonce_field( basename( __FILE__ ), 'calm_nonce' );
    $calm_stored_meta = get_post_meta( $post->ID );
    ?>

    <div class="meta-content">
        <p><?php _e( 'Please select the type of portfolio item this will be.', 'calm' )?></p>
        <label for="standard">
            <?php _e( 'Standard', 'calm' )?>
            <input type="radio" class="port-type-select" name="portfolio-select" id="standard" value="standard" <?php if ( isset ( $calm_stored_meta['portfolio-select'] ) ) checked( $calm_stored_meta['portfolio-select'][0], 'standard' ); ?>>
        </label>
        <label for="video">
            <?php _e( 'Video', 'calm' )?>
            <input type="radio" class="port-type-select" name="portfolio-select" id="video" value="video" <?php if ( isset ( $calm_stored_meta['portfolio-select'] ) ) checked( $calm_stored_meta['portfolio-select'][0], 'video' ); ?>>
        </label>
        <label for="slider">
            <?php _e( 'Slider', 'calm' )?>
            <input type="radio" class="port-type-select" name="portfolio-select" id="slider" value="slider" <?php if ( isset ( $calm_stored_meta['portfolio-select'] ) ) checked( $calm_stored_meta['portfolio-select'][0], 'slider' ); ?>>
        </label>
        <div class="slider-cont">
            <div id="selected-images">
                <?php if ( isset ( $calm_stored_meta['slider-img-1'] ) )
                    $slide_dump = $calm_stored_meta['slider-img-1'][0];
                    $slide_dump = rtrim($slide_dump);
                    $slides = explode(" ", $slide_dump);

                    foreach ($slides as $slide) {
                        echo '<img class="selected-image" src="'.$slide.'" alt="">';
                    }
                ?>
            </div>
            <textarea name="slider-img-1" id="image-upload" ><?php if ( isset ( $calm_stored_meta['slider-img-1'] ) ) echo $calm_stored_meta['slider-img-1'][0]; ?></textarea>
            <input type="button" id="image-upload-button" class="button" value="<?php _e( 'Choose or Upload Your Slider Images', 'calm' )?>" />
            <script type="text/javascript">

                function clearBox(e1, e2)
                    {
                        document.getElementById(e1).innerHTML = "";
                        document.getElementById(e2).innerHTML = "";
                    }

            </script>
            <button type="button" id="clear_button" class="button" onclick="clearBox('image-upload', 'selected-images')">Clear</button>
        </div>
    </div>

<?php }



// Save Meta Boxes

function calm_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'calm_nonce' ] ) && wp_verify_nonce( $_POST[ 'calm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }


    // Checks for input and sanitizes/saves if needed



    // Portfolio Input

    if( isset( $_POST[ 'portfolio-select' ] ) ) {
        update_post_meta( $post_id, 'portfolio-select', $_POST[ 'portfolio-select' ] );
    }
    if( isset( $_POST[ 'slider-img-1' ] ) ) {
        update_post_meta( $post_id, 'slider-img-1', $_POST[ 'slider-img-1' ] );
    }
    if( isset( $_POST[ 'slider-img-sel' ] ) ) {
        update_post_meta( $post_id, 'slider-img-sel', $_POST[ 'slider-img-sel' ] );
    }



}

add_action( 'save_post', 'calm_meta_save' );
