<?php
include('config/conn.php');


if(isset($_GET['id']))
{
	
	$id=$_GET['id'];
}

  $data=$_GET['data']; 


            $result = $conn->query("select * FROM cat_prod where id='$id'");

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); 
				
				$image = explode(",",$row['ic_image']); 
				
				$key = array_search($data, $image);
				unset($image[$key]);
				$image1=  implode(",",$image);
				
				     $sql="UPDATE cat_prod SET ic_image='$image1' WHERE id='$id'"; 
                     $res=mysqli_query($conn,$sql);
			 if($res){
				      header('Location: add-products.php?id='.$id);
    }


	

    

} 



?>