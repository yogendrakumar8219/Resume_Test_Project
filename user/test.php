<?php

// require('connect.php');
// require('header.php');

?>







?>

<div class="main3">
<div class="main3">
	<div class="navigator_up">
		<a href="select_theme.php"><div class="nav_cont " ><i class="fa fa-map"></i> Select Theme</div></a>
		<a href="create_card2.php"><div class="nav_cont"><i class="fa fa-bank"></i> Company Details</div></a>
		<a href="create_card3.php"><div class="nav_cont "><i class="fa fa-facebook"></i> Social Links</div></a>
		<a href="create_card4.php"><div class="nav_cont"><i class="fa fa-rupee"></i> Payment Options</div></a>
		<a href="create_card5.php"><div class="nav_cont active"><i class="fa fa-ticket"></i> Products & Services</div></a>
		<a href="create_card7.php"><div class="nav_cont"><i class="fa fa-archive"></i> Order Page</div></a>
		<a href="create_card6.php"><div class="nav_cont"><i class="fa fa-image"></i> Image Gallery</div></a>
		<a href="preview_page.php"><div class="nav_cont"><i class="fa fa-laptop"></i> Preview Card</div></a>
	
	</div>
	
	<div class="btn_holder">
		<a href="create_card4.php"><div class="back_btn"><i class="fa fa-chevron-circle-left"></i> Back</div></a>
		<a href="create_card6.php"><div class="skip_btn">Skip <i class="fa fa-chevron-circle-right"></i></div></a>
	</div>
	<h1>Products & Services</h1>
	<p class="sug_alert">(Upload images with in 250 KB each image)</p>
	
	<div id="status_remove_img"></div>
	<form action="" method="POST" enctype="multipart/form-data">
	

<!-------------------form ----------------------->	
	
<!-------------------order ----------------------->
<?php 
for ($m=1;$m <= 10; $m++){
	
	?>
	
	

	<div class="divider"><div class="num"><?php  echo "$m"; ?></div>
		<?php if(!empty($row2["d_pro_name$m"])){
		?>
			<div class="delImg" onclick="removeData(<?php echo $row2['id']; ?>,<?php echo $m; ?>)"><i class="fa fa-trash-o"></i></div><?php
	;}?>
		<div class="input_box"><p><?php  echo "$m"; ?>th Product & Service</p><input type="text" name="<?php  echo "d_pro_name$m"; ?>" maxlength="200" placeholder="Product/Service Name" value="<?php if(!empty($row2["d_pro_name$m"])){echo $row2["d_pro_name$m"];}?>" ></div>
		<img src="<?php if(!empty($row2["d_image_file$m"])){echo '../p_and_s/'.$row2["d_image_file$m"];}else {echo 'images/upload.png';} ?>" alt="Select image" id="<?php  echo "showPreviewLogo$m"; ?>" onclick="<?php  echo "clickFocus($m)"; ?>" >
		<div class="input_box">
		
		
		
		
			<script>
			
				function clickFocus(vbl){
					$('#clickMeImage'+vbl).click();
				}
				
				function readURL<?php  echo "$m"; ?>(input){
					if(input.files && input.files[0]){
						var reader = new FileReader();
						reader.onload= function (a){
							$('#showPreviewLogo'+<?php  echo "$m"; ?>).attr('src',a.target.result);
						};
						reader.readAsDataURL(input.files[0]);
					}
					
				}
				
			
			</script>
			<input type="file" name="<?php  echo "d_pro_img$m"; ?>" id="<?php  echo "clickMeImage$m"; ?>" class="" onchange="<?php  echo "readURL$m(this);"; ?>" accept="image/*"  >
			
		</div>	
	</div>
	
	
	<?php

// php incrementer form is ended
}

?>
<!-------------------service 1 ----------------------->
		
		
		
		<input type="submit" class="" name="process4" value="Next 6" id="block_loader">
	
<!-------------------form ending----------------------->
	</form>
	
	
	<script>
	
							
							// if delete approved
								function removeData(id,numb){
										console.log(id,numb);
										$('#status_remove_img').css('color','blue');
									
										$.ajax({
											url:'js_request.php',
											method:'POST',
											data:{id:id,d_pro_img:numb,d_pro_name:numb},
											dataType:'text',
											success:function(data){
												$('#status_remove_img').html(data);
												$('#showPreviewLogo'+numb).attr('src','images/upload.png');
											}
											
										});
										
									}
	
	</script>
	
	<?php
	if(isset($_POST['process4'])){
		
		$query=mysqli_query($connect,'SELECT * FROM digi_card2 WHERE id="'.$_SESSION['card_id_inprocess'].'" ');
		if(mysqli_num_rows($query)==1){
		
		// enter details in database
		
		// compress file function creation 
						function compressImage($source,$destination,$quality){
							$imageInfo=getimagesize($source);
							
							$mime=$imageInfo['mime'];
							
							switch($mime){
								case 'image/jpeg':
								$image=imagecreatefromjpeg($source);
								break;
								case 'image/png':
								$image=imagecreatefrompng($source);
								break;
								case 'image/gif':
								$image=imagecreatefromgif($source);
								break;
								default:
								$image-imagecreatefromjpeg($source);
							}
							imagejpeg($image,$destination,$quality);
							
							return $destination;
							
						}
					
					// compress file function ended
		// image upload
				for($x=0;$x<=10;$x++){
				if(!empty($_FILES["d_pro_img$x"]['tmp_name']))
				{
					$source=$_FILES["d_pro_img$x"]['tmp_name'];
					$destination=$_FILES["d_pro_img$x"]['tmp_name'];
					if($_FILES["d_pro_img$x"]['size'] < 500000)
					{
					    $quality=65;
					    
					}
					else
					{
					    $quality=20; 
					}
						
					//call the function for compressing image
					$compressimage=compressImage($source,$destination,$quality);
					$d_pro_img=addslashes(file_get_contents($compressimage));
				    
				    // 	
				    $ps_file_name = date('ymdsih').$_FILES["d_pro_img$x"]['name'];	
				    
					$filename2='../p_and_s/'.$ps_file_name;
					
					if(move_uploaded_file($compressimage,$filename2))
					{
					    $update1=mysqli_query($connect,"UPDATE digi_card2 SET d_image_file$x='".$ps_file_name."' WHERE id='".$_SESSION['card_id_inprocess']."' ");
					    
					}
					else
					{
					    echo 'Image Not uploaded';
					}
				// 
					
					
					
					
				}
		}
				
		//replace--------
				$d_pro_name1=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name1']);
				$d_pro_name2=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name2']);
				$d_pro_name3=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name3']);
				$d_pro_name4=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name4']);
				$d_pro_name5=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name5']);
				$d_pro_name6=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name6']);
				$d_pro_name7=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name7']);
				$d_pro_name8=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name8']);
				$d_pro_name9=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name9']);
				$d_pro_name10=str_replace(array('"',"'",'<','>'),array('\"',"\'",'\<','\>'),$_POST['d_pro_name10']);
				
				
				
				// image upload
				
			$update=mysqli_query($connect,'UPDATE digi_card2 SET 
			
			d_pro_name1="'.$d_pro_name1.'",
			d_pro_name2="'.$d_pro_name2.'",
			d_pro_name3="'.$d_pro_name3.'",
			d_pro_name4="'.$d_pro_name4.'",
			d_pro_name5="'.$d_pro_name5.'",
			d_pro_name6="'.$d_pro_name6.'",
			d_pro_name7="'.$d_pro_name7.'",
			d_pro_name8="'.$d_pro_name8.'",
			d_pro_name9="'.$d_pro_name9.'",
			d_pro_name10="'.$d_pro_name10.'"
			WHERE id="'.$_SESSION['card_id_inprocess'].'" ');
			
		// enter details in database ending
		
		if($update){
			echo '<a href=""><div class="next_btn">Re-Upload Images</div></a>';
			echo '<a href="create_card7.php"><div class="next_btn">Next</div></a>';
			echo '<meta http-equiv="refresh" content="500;URL=create_card7.php">';
			echo '<style>  form {display:none;} </style>';
			
		}else {
			echo '<a href="create_card5.php"><div class="alert danger">Error! Try Again.</div></a>';
		}
			
		
		}else {
			
			echo '<a href="create_card.php"><div class="alert danger">Detail Not Available. Try Again Click here.</div></a>';
		}
		
	}
	?>

</div>


<footer class="">

<p>Copyright 2020 || <?php echo $_SERVER['HTTP_HOST']; ?></p>

</footer>