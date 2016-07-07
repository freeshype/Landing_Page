<?php global $tt_options;
  $tt_settings = get_option( 'tt_options', $tt_options );
?>
<style>
<?php if( $tt_settings['site-color'] != '' ) : ?>
    body { border-top: 10px solid <?php echo $tt_settings['site-color']; ?>;}
    a,.social-icons a:hover,.social-icons a:focus { color:<?php echo $tt_settings['site-color']; ?>;}
    .header a:hover, .header a:focus {color: <?php echo $tt_settings['site-color']; ?>;}
    #submit, .wpcf7-submit, .grid .tile h2, .btn { background-color: <?php echo $tt_settings['site-color']; ?>;}
<?php endif; ?>
  </style>
