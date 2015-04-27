<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">



				<article id="post-37" class="post-37 page type-page status-publish hentry">
					<header class="entry-header">
						<h1 class="entry-title">Detail Instalivit</h1>
					</header>
					
					<div class="entry-content">
							<?php

							$media_id = $_GET['media'];
							$token = $_GET['token'];

							// GET DATA MEDIA
							$json_media = file_get_contents('https://api.instagram.com/v1/media/'.$media_id.'?access_token='.$token);
							$json_media_array = json_decode($json_media);

								// TAGS
								$insta_tags = "";
								foreach ($json_media_array->data->tags as $key_tags => $val_tags) {
									$insta_tags .= ' #'.$val_tags.' ';
								}
								

								?>
								<img src="<?php echo $json_media_array->data->images->standard_resolution->url;?>" width="640"><br>


								<table>
									<tr>
										<td width="20%">
											<img src="<?php echo $json_media_array->data->user->profile_picture;?>" width="100"><br>
											<a href="instagram.com/<?php echo $json_media_array->data->user->username; ?>" target="_blank">
											<?php echo "@".$json_media_array->data->user->username; ?>
											</a>
										</td>
										<td width="80%">
											<?php echo $json_media_array->data->caption->text; ?>
											<br>
											<?php echo $tags; ?>
										</td>
									</tr>
								</table>

								<?php


							// SHOW RATE
							echo '<span class="glyphicon glyphicon-heart"></span> '.$json_media_array->data->likes->count." likes<br>";


							// SHOR TOTAL COMMENT
							if($json_media_array->data->comments->count != 0){
								echo '<span class="glyphicon glyphicon-comment"></span> '.$json_media_array->data->comments->count." Comments<br><br>";
								echo " Newest Comment : <br>";

								$jumlah_data = count($json_media_array->data->comments->data) -1;//array start at 0
								$key_end = $jumlah_data;
								$key_start = $jumlah_data - 7;
								if($key_start < 0 ){
									$key_start = 0;
								}
								for ($i= $key_start  ; $i <= $key_end ; $i++) { 
									?>

										<table>
											<tr>
												<td width="20%">
													<img src="<?php echo $json_media_array->data->comments->data[$i]->from->profile_picture;?>" width="100"><br>
													<a href="instagram.com/<?php echo $json_media_array->data->comments->data[$i]->from->username; ?>" target="_blank">
													<?php echo "@".$json_media_array->data->comments->data[$i]->from->username; ?>
													</a>
												</td>
												<td width="80%">
													<?php
													echo "created time : ".date('d-m-Y H:i:s', $json_media_array->data->comments->data[$i]->created_time)."<br>";
													echo $json_media_array->data->comments->data[$i]->text."<br>";
													?>
												</td>
											</tr>
										</table>


								<?php
								}
							}else{
								echo "No comment yet";
							}
							?>
					</div>
					
					<br>

					<div>
						<center>
							Posting Comment
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
								<textarea></textarea>
								<input type="submit" value="Submit">
							</form>
						</center>
					</div>

				</article>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
