<?php
// if ( ! defined( 'ABSPATH' ) ) exit;
// echo "ffesfesfsef";
 echo dirname( __FILE__ );
 echo "<pre>";
 print_r( $_GET);
 // die();

?>
<table>
	<tr>
		<td>
			<!-- <img src="<?php echo $_GET['thumb_url']; ?>" height="400"><br> -->
			<!-- <?php echo $_GET['thumb_title']; ?><br> -->
			<?php echo $_GET['media_id']; ?><br>
			<!-- <?php echo $_GET['unique_rel']; ?><br> -->
		</td>
		<td>Comment</td>
	</tr>
</table>