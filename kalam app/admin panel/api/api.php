<?php
date_default_timezone_set("Asia/Kolkata");
header("Access-Control-Allow-Origin:*");

// $con=mysqli_connect("kagroceryapp2.in.mysql","kagroceryapp2_inkagroceryapp2_in_dbactive","ABCD@@@@LKJpoi####^&*","kagroceryapp2_inkagroceryapp2_in_dbactive");
$con = mysqli_connect('localhost','root','','kalamapp') or die('db error');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  mysqli_query($con, "SET GLOBAL sql_mode = ''");
  mysqli_query($con, "SET SESSION sql_mode = ''");
   $type=$_POST['type'];

	if($type=='0001'){
        	$user=$_POST['user'];
			$password=$_POST['password'];
		    	$query="select `ca_id`, `ca_login` from `course_admin` where `ca_name`='$user' and `ca_password`='$password'";	
				//$run =mysql_query($query);
				$run=mysqli_query($con,$query);
				$number=mysqli_num_rows($run); 
				if($number>0){
			    	$row=mysqli_fetch_array($run);
					 $aid=$row['ca_id'];
					 $type=$row['ca_login'];
			    	$dat[0] = $aid;
				    $dat[1] = $type;	
			//	echo $dat;
						echo json_encode($dat);
		    	}else{
		    		echo "#001";
		    	}
		
	}else if($type=='0002'){

         	$Name=$_POST['Name'];
			$Qty=$_POST['Qty'];
			$Price=$_POST['Price'];
			$Image=$_POST['image'];
			$Discrption=$_POST['Discrption'];
		    $Admin_id=$_POST['Admin_id'];
		
	        $dor=date("Y-m-d");
             //{'type':'0002','Name':Name, 'Qty':Qty,'Price':Price, 'Discrption':Discrption,'image':image},
	     	$query="INSERT INTO `E_Firdaus_E_products`(`P_ID`, `Name`, `Qty`, `Price`, `Image`, `Discprition`, `dor`, `A_ID`) VALUES ('0','$Name','$Qty','$Price','$Image','$Discrption','$dor','$Admin_id')";	
			//	$run =mysql_query($query);
			$run=mysqli_query($con,$query);
				if($run>0){
					echo "Success";
			    }else{
				    echo "Try Again";
			    }
	}else if($type=='0003'){
	    $query="SELECT * FROM `E_Firdaus_E_Order` ORDER BY O_ID DESC";	
	//	$run =mysql_query($query);
	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
	}else if($type=='0004'){
				$query="SELECT * FROM `course_lecture`";	
		        $run=mysqli_query($con,$query);
		while($result = mysqli_fetch_row($run)){
		    	$data[] = $result;
		}

		echo json_encode($data);
	}else if($type=='0005'){
            $Title=$_POST['Title'];
			$Descprition=$_POST['Descprition'];
			$Content=$_POST['Content'];
			 $Admin_id=$_POST['Admin_id'];
		    $cat1=$_POST['cat1'];
		    $lectype=$_POST['lectype'];
   		    $dor=date("Y-m-d");
		     
                $query="INSERT INTO `course_lecture`(`cl_title`, `cl_descprition`, `cl_content`, `cl_type`, `status` ) 
				VALUES ('$Title','$Descprition','$Content','$lectype','Enable')";	
		  //      $run =mysql_query($query);
	        $run=mysqli_query($con,$query);
	    
	   
    	
	            if($run>0){echo "Success";} else{echo "Failed";} 
	       

   	
	   
	}else if($type=='0006'){
	   
	   	$query="SELECT * FROM `E_Firdaus_E_user` ORDER BY U_ID DESC";	
		//$run =mysql_query($query);
		$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
	
	    
	}else if($type=='0007'){
	  //					data : {'type':'0007','id':id,'newname':newname,'newQty':newQty,'newprice':newprice,'newdesc':newdesc},
/*
	        $id=$_POST['id'];
			$newname=$_POST['newname'];
			$newQty=$_POST['newQty'];
			$newprice=$_POST['newprice'];
		    $newdesc=$_POST['newdesc'];
		
		   $query="UPDATE `E_Firdaus_E_products` SET `Name`='$newname',`Qty`='$newQty',`Price`='$newprice',`Discprition`='$newdesc' WHERE `P_ID`='$id'";	
			$run=mysqli_query($con,$query);
		    if($run>0){
		        echo"Updated Sucessfully";
		         $tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_products'";	
    	mysqli_query($con,$query1);
		    } 
		   */
		    
            $Name=$_POST['Name']; $Qty=$_POST['Qty']; $Price=$_POST['Price'];	$Discrption=$_POST['Discrption'];
		    $Admin_id=$_POST['Admin_id']; $cat1=$_POST['cat1']; $dor=date("Y-m-d");
            $pro_id=$_POST['type1']; $curr_image=$_POST['curr_image'];  $fakePrice=$_POST['fakePrice']; $subcat1=$_POST['subcat1'];
  $target_path = "uploads/";
/*myshit*/
	    $post_photo=$_FILES["p_image"]["name"];
	   
	    $post_photo_temp=$_FILES['p_image']['tmp_name'];
	    $ext=pathinfo($post_photo, PATHINFO_EXTENSION);
	    $newfilename = round(microtime(true))*round(microtime(true)) . '.' . $ext;
	    $post_photo=$newfilename;
	    if($ext=='png' || $ext=='PNG' || $ext=='JPEG' || $ext=='jpeg' || $ext=='JPG' || $ext=='jpg' || $ext=='gif' || $ext=='GIF' ){
	        
	      if($ext=='png' || $ext=='PNG'){$src=imagecreatefrompng($post_photo_temp);}
	      else if($ext=='JPEG' || $ext=='jpeg' || $ext=='JPG' || $ext=='jpg'){$src=imagecreatefromjpeg($post_photo_temp);}
	      else if($ext=='gif' || $ext=='GIF'){$src=imagecreatefromgif($post_photo_temp);}   
	        
	        list($width_min,$height_min)=getimagesize($post_photo_temp);
	        
	        $newwidth_min=$width_min;
	        $newheight_min=$height_min;

	      //  $newheight_min=($width_min/$height_min)*$newwidth_min;
	        $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);
	        
	        imagecopyresampled($tmp_min,$src,0,0,0,0, $newwidth_min, $newheight_min, $width_min, $height_min);
	       
	        if(imagejpeg($tmp_min,"uploads/".$post_photo,100)) {
	            $image="uploads/".$post_photo;  
               // $query="INSERT INTO `E_Firdaus_E_products`(`P_ID`, `Name`, `Qty`, `Price`, `Image`, `Discprition`, `dor`, `A_ID`, `Status`, `Category`) VALUES ('0','$Name','$Qty','$Price','$image','$Discrption','$dor','$Admin_id', 'Enable', '$cat1')";	
                $query="UPDATE `E_Firdaus_E_products` SET `Name`='$Name',`Qty`='$Qty',`Price`='$Price',`Image`='$image',`Discprition`='$Discrption', `Category`='$cat1', `fakePrice`='$fakePrice',`SUBCategory_ID`='$subcat1' WHERE `P_ID`='$pro_id'";
	        $run=mysqli_query($con,$query);
	    
	    $tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_products'";	
    	mysqli_query($con,$query1);
    	
	            if($run>0){echo "Success";} else{echo "Failed";} 
	       }else{ echo"Try Again";}
	 }else if($post_photo_temp==''){
	      //no image selected push old image
	        $image=$curr_image;
	        $query="UPDATE `E_Firdaus_E_products` SET `Name`='$Name',`Qty`='$Qty',`Price`='$Price',`Image`='$image',`Discprition`='$Discrption', `Category`='$cat1', `fakePrice`='$fakePrice',`SUBCategory_ID`='$subcat1' WHERE `P_ID`='$pro_id'";
	        $run=mysqli_query($con,$query);
	        if($run>0){echo "Success";} else{echo "Failed";} 
	    $tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_products'";	
    	mysqli_query($con,$query1);
	     
	 }

   	
	}else if($type=='0008'){
		$orderdate=$_POST['orderdate'];
	    $query="SELECT * FROM `E_Firdaus_E_Order` WHERE `dor`='$orderdate' ORDER BY O_ID DESC";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);


	
	}else if($type=='0009'){

		$id=$_POST['id'];
        $query="DELETE FROM `course_lecture` WHERE `cl_id`='$id'";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
	    if($run>0){
		        echo"Deleted Sucessfully";
		        
		    }
	    
	}
	else if($type=='00099'){

		$id=$_POST['id'];
        $query="DELETE FROM `course` WHERE `c_id`='$id'";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
	    if($run>0){
		        echo"Deleted Sucessfully";
		        
		    }
	    
	}
	
	
	else if($type=='0010'){

	    	$CatName=$_POST['CatName']; 
			$catdesc=$_POST['catdesc']; 
			$CatDuration=$_POST['CatDuration'];
			$catcp=$_POST['Catcp'];
			$catsp=$_POST['Catsp'];
			$cat_image_tmp=$_POST['cat_image_tmp'];

			function base64_to_jpeg($base64_string, $output_file) {
				$ifp = fopen( $output_file, 'wb' ); 
				$data = explode( ',', $base64_string );
				fwrite( $ifp, base64_decode( $data[ 1 ] ) );
				fclose( $ifp ); 
				return $output_file; 
			}

			$img_nm = "KA".date("Ymdhis").".jpg" ;
			$ash = $cat_image_tmp;
           $image = base64_to_jpeg( $ash , 'uploads/'.$img_nm );

        $query="INSERT INTO `course` ( `c_name`, `c_descprition`, `c_duration`,`course_price`,`sale_price`,`c_image`, `status`)
		 VALUES ('$CatName','$catdesc','$CatDuration','$catcp','$catsp','$image','Enable')";

    	$run=mysqli_query($con,$query);
	    if($run>0){
		        echo"Added Sucessfully";
		    }else{
		        echo"Failed: Please Try Again";
		    }


   	


	}else if($type=='0011'){
	     $ID=$_POST['ID']; $Status=$_POST['Status']; $mno=$_POST['mno'];
	    $query="UPDATE `E_Firdaus_E_Order` SET `Status`='$Status' WHERE `O_ID`='$ID'";	
		$run=mysqli_query($con,$query);
		echo"Success";
	  //Process msg here
	  //Kx0DcVxkcMs-Ti3CCWpDc3KoFWOCB9S3sp4ycUH3YU	
	  	  $apiKey = urlencode('');
	$numbers = array($mno);
	$sender = urlencode('Naushd');
	$message = rawurlencode("Your order is $Status-- Naushd F K.");
	$numbers = implode(',', $numbers);
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	  
	  
	  
	}else if($type=='0012'){

	    $query="SELECT * FROM `course` ORDER BY c_id DESC ";	
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);


	}else if($type=='0013'){
        $cat_id=$_POST['cat_id']; $sts=$_POST['sts'];
	    $query="UPDATE `E_Firdaus_E_Category` SET `Status`='$sts' WHERE `Category_ID`='$cat_id'";	
    	$run=mysqli_query($con,$query);
		echo"Success";
	
$tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_Category'";	
    	mysqli_query($con,$query1);

	}else if($type=='0014'){
$image3=$_POST['image3'];
	   $query="INSERT INTO `E_Firdaus_E_promo`(`Banner_ID`, `Banner`) VALUES ('0','$image3')";	
    	$run=mysqli_query($con,$query);
		echo"Success";
		$tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_promo'";	
    	mysqli_query($con,$query1);
	


	}else if($type=='0015'){
$cat_id=$_POST['cat_id'];
	    $query="UPDATE `E_Firdaus_E_Category` SET `Status`='Enable' WHERE `Category_ID`='$cat_id'";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		echo"Success";
	
$tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_Category'";	
    	mysqli_query($con,$query1);
//					data : {'type':'0012','catid3':catid3,'Namecat1':Namecat1,'desccat1':desccat1},

	}else if($type=='0016'){
$catid3=$_POST['catid3']; 
$Namecat1=$_POST['Namecat1'];
$desccat1=$_POST['desccat1'];
$cat_image_tmp1=$_POST['cat_image_tmp1'];
$Duration=$_POST['Duration'];
$Courseprice=$_POST['Courseprice'];
$Saleprice=$_POST['Saleprice'];
if($cat_image_tmp1!=="") {
	function base64_to_jpeg($base64_string, $output_file) {
		$ifp = fopen( $output_file, 'wb' ); 
		$data = explode( ',', $base64_string );
		fwrite( $ifp, base64_decode( $data[ 1 ] ) );
		fclose( $ifp ); 
		return $output_file; 
	}

	$img_nm = "KA".date("Ymdhis").".jpg" ;
	$ash = $cat_image_tmp1;
   $image = base64_to_jpeg( $ash , 'uploads/'.$img_nm );

	   $query="UPDATE `course` SET `c_name`='$Namecat1',`c_descprition`='$desccat1',`c_image`='$image',`c_duration`='$Duration',`course_price`='$Courseprice',`sale_price`='$Saleprice' WHERE `c_id`='$catid3'";	
	
    	if($run=mysqli_query($con,$query)) {
		echo"Success";
	 }  else{
		echo "error";
	 }
}else{
	$query="UPDATE `course` SET `c_name`='$Namecat1',`c_descprition`='$desccat1',`c_duration`='$Duration',`course_price`='$Courseprice',`sale_price`='$Saleprice' WHERE `c_id`='$catid3'";	
	
    	if($run=mysqli_query($con,$query)) {
		echo"Success";
	 }  else{
		echo "error";
	 }
}
	    
	}
	
	else if($type=='0017'){
        $id=$_POST['id']; 
	    $query="SELECT * FROM `E_Firdaus_E_Order` WHERE `O_ID`='$id'";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
    		$row = mysqli_fetch_row($run);
			  
		
		echo json_encode($row);

	}else if($type=='0018'){
       $SlotName=$_POST['SlotName']; $SlotValue=$_POST['SlotValue']; 
	   $query="INSERT INTO `E_Firdaus_E_Slot`(`Slot_ID`, `Name`, `Value`, `Other`) VALUES ('0','$SlotName','$SlotValue','')";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		echo"Success";
		 $tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_Slot'";	
    	mysqli_query($con,$query1);
	}else if($type=='0019'){
	   
	    $query="SELECT * FROM `E_Firdaus_E_Slot`";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
		 $tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_Slot'";	
    	mysqli_query($con,$query1);
	}else if($type=='0020'){
	   $sid=$_POST['sid'];
	    $query="DELETE FROM `E_Firdaus_E_Slot` WHERE `Slot_ID`='$sid'";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
			echo"Success";
			
			 $tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_Slot'";	
    	mysqli_query($con,$query1);
			
			
	}else if($type=='0021'){
	   $newpass=$_POST['newpass'];
	    $query="UPDATE `E_Firdaus_E_admin` SET `Password`='$newpass' WHERE `A_ID`='1'";	
    	$run=mysqli_query($con,$query);
			echo"Success";
	}else if($type=='0023'){
	   
	    $query="SELECT * FROM `E_Firdaus_E_promo`";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
	}else if($type=='0024'){
	   $sid=$_POST['sid'];
	    $query="DELETE FROM `E_Firdaus_E_promo` WHERE `Banner_ID`='$sid'";	
    	$run=mysqli_query($con,$query);
			echo"Success";
			$tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_promo'";	
    	mysqli_query($con,$query1);
	}else if($type=='0030'){
	    $MIN_ORDER=$_POST['MIN_ORDER']; 
		
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$MIN_ORDER' , `Tble_load`='yo' WHERE `Tble_Name`='MIN_ORDER'";
    	mysqli_query($con,$query1);
    	echo"Sucess";
			
	}else if($type=='0031'){
	    $dor=date("Y-m-d"); $contacttypeof=$_POST['contacttypeof']; $contactdetails=$_POST['contactdetails']; 
	    $query="INSERT INTO `E_Firdaus_E_ContactOption`(`CONTACT_ID`, `Type`, `Details`) VALUES ('0','$contacttypeof','$contactdetails')";	
    	$run=mysqli_query($con,$query);
			echo"Success";
			
		$tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_ContactOption'";	
    	mysqli_query($con,$query1);
			
	}else if($type=='0032'){
	   $query="SELECT * FROM `E_Firdaus_E_ContactOption`";	
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
	}else if($type=='0033'){
	   $A_ID=$_POST['A_ID']; 	   

	 	$query="DELETE FROM `E_Firdaus_E_ContactOption` WHERE `CONTACT_ID`='$A_ID'";	
    	$run=mysqli_query($con,$query);
			echo"Success";
			
				 $tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_ContactOption'";	
    	mysqli_query($con,$query1);
      
	   }else if($type=='0034'){

		$id=$_POST['id']; 	$sts=$_POST['sts'];
        $query="UPDATE `course_lecture` SET `status`='$sts' WHERE `cl_id`='$id'";	
    	$run=mysqli_query($con,$query);
	    if($run>0){echo"Updated Sucessfully";}else{echo"Failed";}
	        
	}
	else if($type=='00344'){

		$id=$_POST['id'];
		$sts=$_POST['sts'];
        $query="UPDATE `course` SET `status`='$sts' WHERE `c_id`='$id'";	
    	$run=mysqli_query($con,$query);
	    if($run>0){echo"Updated Sucessfully";}else{echo"Failed";}
	        
	}

	else if($type=='0035'){
	    $dor=date("Y-m-d");  $cityUserName=$_POST['cityUserName']; $cityUserPass=$_POST['cityUserPass']; 
	   //data : {'type':'0028','cityName':cityName,'cityUserName':cityUserName,'cityUserPass':cityUserPass},
	    $query="INSERT INTO `E_Firdaus_E_admin`(`A_ID`, `Name`, `Password`, `type`, `Status`, `DOR`) VALUES ('0','$cityUserName','$cityUserPass','local','Active','$dor')";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
			echo"Success";
	}else if($type=='0036'){
	   $query="SELECT * FROM `E_Firdaus_E_admin`";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
	}else if($type=='0037'){
	   $A_ID=$_POST['A_ID'];
	   if($A_ID=='1'){
	       echo"Can Not Delete Primary Admin";
	   }else{
	 	    $query="DELETE FROM `E_Firdaus_E_admin` WHERE `A_ID`='$A_ID'";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
			echo"Success";
      
	   }
	}else if($type=='0039'){
	 $cat1=$_POST['cat1'];
	   $query="SELECT `SUBCategory_ID`, `Category_ID`, `SUBCategoryName`, `SUBCategoryDesc`, `Status` FROM `E_Firdaus_E_SUBCategory` WHERE Category_ID='$cat1'";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
	}else if($type=='0040'){

	   /* $query="SELECT * FROM `E_Firdaus_E_SUBCategory` ORDER BY SUBCategory_ID DESC";	
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);*/
		$query="SELECT * FROM `E_Firdaus_E_SUBCategory` ORDER BY SUBCategory_ID DESC";	
		$run=mysqli_query($con,$query);
		while($result = mysqli_fetch_array($run)){
	        $Category=$result['Category_ID']; //Category_ID
		    	$data[] = array(
				$result['SUBCategory_ID'],
				$result['Category_ID'],
				$result['SUBCategoryName'],
				$result['SUBCategoryDesc'],
				$result['Status'],
				$result['SUBCat_Symbol'],
				mysqli_fetch_array(mysqli_query($con,"SELECT `CategoryName` FROM `E_Firdaus_E_Category` WHERE `Category_ID`='$Category'"))['CategoryName']

			);	}echo json_encode($data);
	}else if($type=='0041'){

		//	data : {'type':'0038', 'SubCatName':SubCatName, 'Subcatdesc':Subcatdesc, 'Subcat2':Subcat2, 'cat_image_tmp':cat_image_tmp},

	        $SubCatName=$_POST['SubCatName']; $Subcatdesc=$_POST['Subcatdesc']; 	  $Subcat2=$_POST['Subcat2']; $cat_image_tmp=$_POST['Subcat_image_tmp']; $subcat_id=$_POST['subcat_id'];
        $query="UPDATE `E_Firdaus_E_SUBCategory` SET `Category_ID`='$Subcat2',`SUBCategoryName`='$SubCatName',`SUBCategoryDesc`='$Subcatdesc',`SUBCat_Symbol`='$cat_image_tmp' WHERE `SUBCategory_ID`='$subcat_id'";	

    	$run=mysqli_query($con,$query);
	    if($run>0){
		        echo"Updated Sucessfully";
		        $tbalemodifies = uniqid();
                $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_SUBCategory'";	
    	    mysqli_query($con,$query1);
		    }else{
		        echo"Failed: Please Try Again";
		    }
	   
	}else if($type=='0042'){

	 $sts=$_POST['sts']; $subcat_id=$_POST['cat_id'];
        $query="UPDATE `E_Firdaus_E_SUBCategory` SET `Status`='$sts' WHERE `SUBCategory_ID`='$subcat_id'";	

    	$run=mysqli_query($con,$query);
	    if($run>0){
		        echo"Updated Sucessfully";
		        $tbalemodifies = uniqid();
                $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_SUBCategory'";	
    	    mysqli_query($con,$query1);
		    }else{
		        echo"Failed: Please Try Again";
		    }
	   
	}else if($type=='00388'){
	       
	     $dor=date("Y-m-d");  $Coupon_CODE=$_POST['Coupon_CODE']; $Coupon_Value=$_POST['Coupon_Value']; $MIN_Order=$_POST['MIN_Order']; $Coupon_Remark=$_POST['Coupon_Remark']; 
	    $query="INSERT INTO `E_Firdaus_E_Coupon`(`Coupon_ID`, `Coupon_Code`, `Value`, `MIN_Order`, `Remark`, `DOR`, `Status`) VALUES ('','$Coupon_CODE','$Coupon_Value','$MIN_Order','$Coupon_Remark','$dor','Enable')";	
    	$run=mysqli_query($con,$query);
			echo"Success";

	 	   
	   }else if($type=='00399'){
	 
	   $query="SELECT * FROM `E_Firdaus_E_Coupon`";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
	 
      
	   }else if($type=='00404'){
	       
	  $A_ID=$_POST['A_ID']; $sts=$_POST['sts'];
	   
	    $query1="UPDATE `E_Firdaus_E_Coupon` SET `Status`='$sts' WHERE `Coupon_ID`='$A_ID'";	
    	mysqli_query($con,$query1);
	    echo"Success";

      }else if($type=='003888'){
	    $MIN_ORDER=$_POST['MIN_ORDER']; 
		
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET `Tble_Modified`='$MIN_ORDER' WHERE `Tble_Name`='REFER_VALUE'";
    	mysqli_query($con,$query1);
    	echo"Sucess";
			
	} else if($type=='003909'){
	    $MIN_ORDER=$_POST['MIN_ORDER']; 
		$UID=$_POST['idu']; 
        $query1="UPDATE `E_Firdaus_E_user` SET `WalletBalance`='$MIN_ORDER' WHERE `U_ID`='$UID'";
    	mysqli_query($con,$query1);
    	echo"Sucess";
	}else if($type=='0025'){
	    $dor=date("Y-m-d");  $PIN_CODE=$_POST['PIN_CODE']; 
	   //data : {'type':'0028','cityName':cityName,'cityUserName':cityUserName,'cityUserPass':cityUserPass},
	    $query="INSERT INTO `E_Firdaus_E_PIN_Code`(`ID`, `PIN_CODE`) VALUES ('0','$PIN_CODE')";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
			echo"Success";
				$tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_PIN_Code'";	
    	mysqli_query($con,$query1);
			
	}else if($type=='0026'){
	   $query="SELECT * FROM `E_Firdaus_E_PIN_Code`";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
		while($row = mysqli_fetch_row($run)){
			 $rows[]= $row;
		}
		echo json_encode($rows);
	}else if($type=='0027'){
	   $A_ID=$_POST['A_ID'];
	  	$query="DELETE FROM `E_Firdaus_E_PIN_Code` WHERE `ID`='$A_ID'";	
	//	$run =mysql_query($query);
    	$run=mysqli_query($con,$query);
			echo"Success";
				$tbalemodifies = uniqid();
        $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_PIN_Code'";	
    	mysqli_query($con,$query1);
	   

		
	}else if($type=='0043'){
	    //					data : {'type':'0038', 'SubCatName':SubCatName, 'Subcatdesc':Subcatdesc, 'Subcat2':Subcat2, 'cat_image_tmp':cat_image_tmp},

	        	$SubCatName=$_POST['SubCatName']; 	$Subcatdesc=$_POST['Subcatdesc']; 	  $Subcat2=$_POST['Subcat2']; $cat_image_tmp=$_POST['Subcat_image_tmp'];
        $query="INSERT INTO `E_Firdaus_E_SUBCategory`(`SUBCategory_ID`, `Category_ID`, `SUBCategoryName`, `SUBCategoryDesc`, `Status`, `SUBCat_Symbol`) VALUES ('','$Subcat2','$SubCatName','$Subcatdesc','Enable','$cat_image_tmp')";	

    	$run=mysqli_query($con,$query);
	    if($run>0){
		        echo"Updated Sucessfully";
		        $tbalemodifies = uniqid();
                $query1="UPDATE `E_Firdaus_E_TableCheck` SET  `Tble_Modified`='$tbalemodifies' , `Tble_load`='yo' WHERE `Tble_Name`='E_Firdaus_E_SUBCategory'";	
    	    mysqli_query($con,$query1);
		    }else{
		        echo"Failed: Please Try Again";
		    }
	}else if($type=='0038'){
	     $mnos=$_POST['mnos']; $nottitle=$_POST['nottitle']; $mstosend=$_POST['smstosend']; 
	    $mnoss= json_decode($mnos);
	    /* $device_idErr = "";
    $device_id = $title = $message  = "";
    
    $sendtitle = $nottitle;
    $sendMesssage = $mstosend;
    //$token = "c1QTnbXWzjs:APA91bFbdQ08sEZfiAKiWYu3SuKDPk17p68J4d4M16SOIYE9IzeMfoc_u8NvKz5f_dbw5ja3I7PV9_VBdYhEAgEqYmWPsErD_41LqGelVazspFNNVjoVM28ulSz1gQaJ7w-pHMdsyvvU";
    define('API_ACCESS_KEY','AAAAeJhsGcM:APA91bExKyjMW-UPHrEKCeC_InlMFt6w_5KjN8ysX4s7Qba8hkxfl1lAWTDooQOlL3I-0iml_g42Bm4AOH0PpaNTF_t3i-DCmfGIp_uAqEelNols5hhunr2vadOMhufcOyMxqclBoX3S');
    $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    
    //to -> registration_ids 
     $notification = [
                    'title' =>$sendtitle ,
                    'body' => $sendMesssage,
                ];
                $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
        
                $fcmNotification = [
                    'registration_ids'        => $mnoss, //single token
                    'notification' => $notification,
                    'data' => $extraNotificationData
                ];
        
                $headers = [
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                ];
        
        
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$fcmUrl);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
                $result = curl_exec($ch);
                curl_close($ch);
                	echo json_encode($result);

        
               // echo $result;*/
	  
	}
	else if($type=='001122'){
	   $open_close=$_POST['open_close'];
	   
	    $query="UPDATE `E_Firdaus_E_availability` SET `availability`='$open_close'";	
    	$run=mysqli_query($con,$query);
    	
    	if($run) {
	    $query2="SELECT `availability` FROM `E_Firdaus_E_availability`";	
    	$run2=mysqli_query($con,$query2);
    	$row=mysqli_fetch_array($run2);
    	echo $row['availability'];
			
    	}else{ echo "error"; }
	}
	
	else if($type=='004040'){
	   $co_ID=$_POST['co_ID'];
	  	$query="DELETE FROM `E_Firdaus_E_Coupon` WHERE `Coupon_ID`='$co_ID'";	
	//	$run =mysql_query($query);
    	if($run=mysqli_query($con,$query)) {
			echo"Success";}
				
	   

		
	}
	else if($type=='00167'){
		$id=$_POST['id']; 
		$title=$_POST['title'];
		$desc=$_POST['desc'];
		$Type=$_POST['Type'];
		$content=$_POST['editcontent'];
		
		
		$title=$_POST['title'];
			   $query="UPDATE `course_lecture` SET `cl_title`='$title',`cl_descprition`='$desc',`cl_type`='$Type',`cl_content`='$content' WHERE `cl_id`='$id'";	
			
				if($run=mysqli_query($con,$query)) {
				echo"Success";
			 }  else{
				echo "error";
			 }
			}
	
	mysqli_close($con);
?>
