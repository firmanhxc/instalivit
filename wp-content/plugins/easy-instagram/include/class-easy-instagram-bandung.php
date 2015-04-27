<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<?php

$media_id = $_GET['media_id'];
$token = $_GET['token'];

// GET DATA MEDIA
$json_media = file_get_contents('https://api.instagram.com/v1/media/'.$media_id.'?access_token='.$token);
$json_media_array = json_decode($json_media);


	?>
	<img src="<?php echo $json_media_array->data->images->standard_resolution->url;?>" width="640"><br>

	<?php
	echo "text : ".$json_media_array->data->caption->text."<br>";
	echo "username : ".$json_media_array->data->user->username."<br>";
	echo "full_name : ".$json_media_array->data->user->full_name."<br>";
	echo "id : ".$json_media_array->data->user->id."<br>";
	echo "profile_picture : ".$json_media_array->data->user->profile_picture."<br>";

	// TAGS
	$insta_tags = "";
	foreach ($json_media_array->data->tags as $key_tags => $val_tags) {
		$insta_tags .= '<span class="label label-info"> #'.$val_tags.'</span> ';
	}
	echo "Tags = ".$insta_tags."<br><br>";






// SHOW RATE
echo '<span class="glyphicon glyphicon-heart"></span> '.$json_media_array->data->likes->count." likes<br>";


// SHOR TOTAL COMMENT
if($json_media_array->data->comments->count != 0){
	echo '<span class="glyphicon glyphicon-comment"></span> '.$json_media_array->data->comments->count." Comments<br><br>";
	echo " Newest Comment : <br>";

	$jumlah_data = count($json_media_array->data->comments->data) -1;//array start at 0
	$key_end = $jumlah_data;
	$key_start = $jumlah_data - 2;
	if($key_start < 0 ){
		$key_start = 0;
	}
	for ($i= $key_start  ; $i <= $key_end ; $i++) { 
		?>

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-1">
						<img src="<?php echo $json_media_array->data->comments->data[$i]->from->profile_picture;?>" width="100"><br>
						<?php echo $json_media_array->data->comments->data[$i]->from->username; ?>
					</div>
					<div class="col-md-9">
						<?php
						echo "created time : ".date('d-m-Y H:i:s', $json_media_array->data->comments->data[$i]->created_time)."<br>";
						echo "teks : ".$json_media_array->data->comments->data[$i]->text."<br>";
						// echo "Username : ".$json_media_array->data->comments->data[$i]->from->username."<br>";
						// echo "profile_picture : ".$json_media_array->data->comments->data[$i]->from->profile_picture."<br>";
						echo "id : ".$json_media_array->data->comments->data[$i]->from->id."<br>";
						// echo "fullname : ".$json_media_array->data->comments->data[$i]->from->full_name."<br>---------<br>";
						?>
					</div>
				</div>
			</div>


	<?php
	}

}else{
	echo "No comment yet";
}


// echo "<pre>";
// print_r($json_media_array);
?>