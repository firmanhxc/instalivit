<?php
if ( ! class_exists( 'Easy_Instagram_Utils' ) ) :
	_e( 'Please install the Easy Instagram plugin.', 'Easy_Instagram' );
else :
	$ei_utils = new Easy_Instagram_Utils();
	$kses_author = array( 
		'a' => array( 'href' => array(), 'title' => array(), 'target' => array() )
	);
?>


<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(".example6").colorbox({
    	iframe:true, 
    	innerWidth:690, 
    	innerHeight:500,
    	scalePhotos:true,
    	scrolling:true
    });    
});

</script>
<div class="easy-instagram-container default">


<?php foreach ( $easy_instagram_elements as $element ) : ?>
	<div class='easy-instagram-thumbnail-wrapper' >
	<?php echo $ei_utils->get_thumbnail_html( $element ); ?>
	<?php if ( ! empty( $element['author'] ) ): ?>
		<div class='easy-instagram-thumbnail-author'>
		<?php echo wp_kses( $element['author'], $kses_author ); ?>
		</div>
	<?php endif; ?>


	<?php if ( ! empty( $element['created_at_formatted'] ) ) : ?>
		<?php echo esc_html( $element['created_at_formatted'] ); ?>
	<?php endif; ?>

	<a href="http://localhost/wordpress/detail-instalivit/?media=<?php echo $element['media_id']; ?>&token=<?php echo $element['access_token']; ?>">
		<button>detail</button>
	</a>
	</div>

	<?php 

	?>


<?php endforeach; ?>

</div>
<?php endif; ?>