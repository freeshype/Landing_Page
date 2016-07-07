    <footer id="colophon" class="<?php echo get_option('_dw_page_footer_class') ?>">
        <div class="container">
            <div class="copyright">
                <div class="site-info">
                    Copyright &copy; 2012 by <a href="<?php echo site_url() ?>" title="<?php bloginfo('description') ?>"><?php echo preg_replace('/\&lt;[^(\&gt;)]*(&gt;)/i','',get_bloginfo( 'name' ) ) ; ?></a>. Powered by <a href="http://wordpress.org">WordPress</a>. <br>
                    <?php bloginfo('description'); ?>
                </div>
            </div>

            <?php do_action('dw_page_socials'); ?>
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>
