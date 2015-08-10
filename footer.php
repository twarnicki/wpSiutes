<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Siutes
 */

?>
            
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
            <?php if (is_active_sidebar( 'widget-footer' )): ?> 
                <div class="container">
                    <div class="widget-area widget-footer">
                        <?php dynamic_sidebar('widget-footer'); ?>
                    </div>
                </div>

            <?php endif; ?>
                
            <div id="map-canvas"></div>
            <br/>
            <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'siutes' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'siutes' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'siutes' ), 'Siutes', '<a href="http://warnicki.pl" rel="designer">Tom Warnicki</a>' ); ?>
            </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script >
var styles = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}];
function initialize() {
    var mapOptions = {
      zoom: 16,
      center: new google.maps.LatLng(53.381176, 14.6652416),
      scrollwheel: false,
      styles: styles
    };
    var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

    var myLatLng = new google.maps.LatLng(53.381176, 14.6652416);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        
    });
} 
google.maps.event.addDomListener(window, 'load', initialize);

</script>

</body>
</html>
