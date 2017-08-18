<?php
$conn=mysqli_connect('localhost','root','','shopping');
?>




<!DOCTYPE html>
<html>
	 <head>
	     <title>shopping</title>
		
		 
	 
	      <link href="shopping.css" rel="stylesheet">
	 </head>
	 <body>
			<h1 align=center> My Cart </h1>
			
			
			
			<?php //1
				$query="select * from department  ";
				$result=mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result,1)) {
					echo '<ul><a href='."front.php?dept_id=".$row['id'].'>'.$row['name'].'</a></ul>';
				   $query="select * from subdepartment where department_id=" .$row['id'];
				  echo '<ul><a href='."front.php?dept_id=".$row['id'].'>'.'</a></ul>';
				  $query="select * from product where depar_id=" .$row['id'];
						
			    }
				     	

	
			
						$query="select *  from product where dept_id";
	                    $result=mysqli_query($conn,$query);
	
			        while($row=mysqli_fetch_array($result))
					{
					
						echo '
			
						<div class="item">	
			
						<div class="product-item" >
		  
						<img src="'.$row['image'].'" width="100" height="150"/>
						<p>'.$row['name'].'</p>
						<p>'.$row['code'].'</p>
						<b>'.$row['price'].'</b>
						<input type="submit" name="Add TO CART" value="ADD TO CART">
						<input type="submit" value="BUY NOW" style="align=center">
			
			
						</div>	 
						</div>
						';
					}

			?>
				
			
			<?php //2
			  if(isset($_GET['dept_id'])){
					$query = 'select * from subdepartment where department_id='.$_GET['dept_id'];
					$result = mysqli_query($conn,$query);
					if(mysqli_num_rows($result)>0){
						$subcat = array();
					    while($row =mysqli_fetch_array($result,1))
						$subcat[] = $row;
						
					}
			 		
			    }
				
			
			
				if(isset($subcat) && count($subcat)>0){
					echo '<ul>';
					foreach($subcat as $key => $value)
					{
						echo'<li><a href= "front.php?sub_id='.$value['id'].'&dept_id='.$value['department_id'].'"> '.$value['sub_categary'].'</a></li>';
					}
					echo '</ul>';
				}
			?>
			
			<div class ="itemdiv"style="heigth:800px;width:300px;" >
			
			
			<?php  //3
			if(isset($_GET['sub_id'])){
			  $query='select *  from product where sub_id='.$_GET['sub_id'];
		
				
			   $result=mysqli_query($conn,$query);
	
			  
			   while($row=mysqli_fetch_array($result))
			   {
				  echo '
			
                  <div class="item">	
			
                  <div class="product-item" >
		  
			      <img src="'.$row['image'].'" width="100" height="150"/>
			      <p>'.$row['name'].'</p>
			      <p>'.$row['code'].'</p>
			      <b>'.$row['price'].'</b>
			      <input type="submit" name="Add TO CART" value="ADD TO CART">
			     <input type="submit" value="BUY NOW" style="align=center">
			
			
		         </div>	 
		         </div>
   		
			      ';
			    }
			
			}
			?>
			</div>
	 </body>
	 
</html>

