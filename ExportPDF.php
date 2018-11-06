<?php include ('database.php');

function fetch_data()  
{
      $db = new MyDb();

      $output = '';          
                $location = '';


                if(!isset($_GET['location'])){
               
                  $query = "SELECT * FROM EQUIPMENT";
                  $location = 'general';

                } else{

                  $location = $_GET['location'];
                  if($location == 'general'){
                    
                    $query = "SELECT * FROM EQUIPMENT";
                  
                  } else {
        
                    $query = "SELECT * FROM EQUIPMENT WHERE location = '$location' ";

                  }
              }
                  $result = $db->query($query);
                          
  
      while($row = $result->fetchArray())
     {        
      $output .= '<tr>  
                          <td>'.$row["qty"].'</td> 
                          <td>'.$row["eq_ui"].'</td>
                          <td>'.$row["eqmt_name"].'</td>  
                          <td>'.$row["model"].'</td>  
                          <td>'.$row["serial_no"].'</td>  
                          <td>'.$row["description"].'</td>  
                          <td>'.$row["remarks"].'</td>  
                     </tr>  
                          ';  

      }  
      return $output;  

}
 
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '20', PDF_MARGIN_RIGHT, '40');  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 10);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
     
      <table border="1" cellspacing="0" cellpadding="5"> 
        
           <tr>  

                <th width="8%">QTY</th>
                <th width="8%">U/I</th> 
                <th width="8%">EQMT</th>
                <th width="20%">DESCRIPTION</th>   
                <th width="27%">MODEL</th>  
                <th width="20%">SERIAL.NO</th>  
                <th width="10%">Remarks</th>  
           </tr>  
      ';  
      $content .= fetch_data();
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
        <style type="text/css">
    .gunther{
      position: relative;
      left: 100px;
      top:50px;
    }
  </style>
           <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />            
      </head>  
      <body>  
        <div class="gunther"> <img src="back.png" onclick="history.go(-1);" width="30"></div>

           <br /><br />  
           <div class="container" style="width:700px;"> 

            <?php
                
                
                $location = '';


                if(!isset($_GET['location'])){
               
                  $query = "SELECT * FROM EQUIPMENT";
                  $location = 'general';

                } else{

                  $location = $_GET['location'];
                  if($location == 'general'){
                    
                    $query = "SELECT * FROM EQUIPMENT";
                  
                  } else {
        
                    $query = "SELECT * FROM EQUIPMENT WHERE location = '$location' ";

                  }
              }
                  $result = $db->query($query);
                          
            ?>
                <center><h3><?= ucwords(str_replace("_", " ", $location));?></h3></center>
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="8%">QTY</th> 
                               <th width="8%">U/I</th> 
                               <th width="8%">EQMT</th> 
                               <th width="20%">DESCRIPTION</th> 
                               <th width="27%">MODEL</th>  
                               <th width="20%">SERIAL.NO</th>  
                               <th width="10%">Remarks</th>  
                          </tr>  
                    <tbody>
                         <?php  
                            echo fetch_data();  
                         ?>                 
                       
                        <?php
                    

                    ?>  
                       
                    </tbody>
                    </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="DOWNLOAD" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>