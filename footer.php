<?php
    /**
     * The template for displaying the footer.
     *
     * @package QOD_Starter_Theme
     */
    ?>
</div> <!-- End of Site Content -->
<!-- Start of Footer -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <!-- Start of Site Info -->
    <div class="site-info">
        <!-- Start of Bottom Menu -->
        <div class="bottomMenu">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </div>
        <!-- End of Bottom Menu -->
        <p>Brought to you by <a href="<?php echo esc_url( 'http://www.github.com/OliverHeward' ); ?>">
            Oliver Heward</a>
        </p>
    </div>
    <!-- End of Site Info -->
</footer>
<!-- End of Footer -->
</div>
<!-- End of Page -->
<?php wp_footer(); ?> 
<!-- Exporting Footer -->
</body> 
<!-- End of Body -->
</html>	
<!-- End of HTML Document -->