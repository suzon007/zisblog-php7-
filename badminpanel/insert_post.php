 <?php

         if(isset($_POST['publish']))
         {
            include "../connection.php";
			
			    $my_image_name =  $_FILES['image']['name']; 
			    $my_image_type =  $_FILES['image']['type']; 
			    $my_image_size =  $_FILES['image']['size']; 
			    $my_image_tmp_name =  $_FILES['image']['tmp_name'];
				
				$type = explode('.', $_FILES["pic"]["name"]);
		    	$type = $type[count($type)-1];
		    	$url = "./images/pp/".uniqid(rand()).'.'.$type;
			   
		
            
			   $my_title =   $_POST['mytitle'];
               $my_article =    $_POST['myarticle'];
			   $my_category =   $_POST['mycategory'];
			   
			 
		
            
			// working with image file
      
			
			
			//date
			$my_time = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$mt = $my_time->format('g:i a,F j, Y'); 
            
            $sql = "INSERT INTO datatable ". "(id,tbtitle, tbarticle, tbcategory,tbimage,tbtime,tbuv,tbdv) ". "VALUES('id','$my_title','$my_article', '$my_category', '$my_image','$mt' , 0,0 )";
               
            mysql_select_db('mytinynewsdb');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval )
            {
				echo '
					<div class="alert alert-warning alert-success" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Failed!</strong> Post is not published! ';
		  		
               die('Could not enter data: ' . mysql_error());
			   
			   echo '
			   Problem is:
		</div> 
		';
		
			   
            }
            
            echo '
			  <div class="alert alert-success alert-success" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong> Your Post Published Successfully! Redirecting..
		</div>
		';
	header("Refresh:2; url=home.php");
			
            
         }
         else
         { }
            ?>