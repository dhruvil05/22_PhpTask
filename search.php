<?php  include 'db_connect.php';

    $query = $_POST['query'];
  
        $query = htmlspecialchars($query); 
        
        $sql = "SELECT * FROM `data`
        WHERE (`sno` LIKE '%".$query."%') OR (`name` LIKE '%".$query."%') OR (`phone` LIKE '%".$query."%' OR (`email` LIKE '%".$query."%') OR (`image` LIKE '%".$query."%') OR (`gender` LIKE '%".$query."%') OR (`created_date` LIKE '%".$query."%');" ;

        $results = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($results);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if($rows>0){
                while($data = mysqli_fetch_array($result)){
                    
                }
            }
		        else{ 
			        echo "No results";
		    }
         
        }
	    else{ // if query length is less than minimum
		echo "Minimum length is ";
	    }  
?>