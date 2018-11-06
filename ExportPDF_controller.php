<?php  
 function fetch_data()  
 {  
      $output = '';    
      $result = $db->query("SELECT * FROM EQUIPMENT ORDER BY id ASC");  
      while($row =$result->fetchArray())  
      {       
      $output .= '<tr>  
                          <td>'.$row["qty"].'</td>  
                          <td>'.$row["model"].'</td>  
                          <td>'.$row["serial.no"].'</td>  
                          <td>'.$row["description"].'</td>  
                          <td>'.$row["remarks"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
    }