
<?php 
include("connect.php");

    session_start();

$data=$_SESSION["data"];
$view="Add Applicant to Shortlist (".$data.")";

//$data1=$_SESSION["data1"];




if(isset($_POST['displaymo']))
   {

$appnum1 = $_POST['shadowd1'];
$shortnum1 = $_POST['shadowd2'];
$appname1 = $_POST['appname88'];
echo $appname1;

$_SESSION["appnum2"] = $appnum1;
$_SESSION["appko"] = $appname1;

  header("location:details.php");
}

if(isset($_POST['Back']))
{
     header("location:recruitment.php");
}

if(isset($_POST['Back1']))
{
     header("location:short.php");
}


?>






<html>

<head>

<style>
.how2
{
  position:absolute;
  top:0;
  left:0;
  z-index: 105;
  background: rgb(255, 255, 255);
  background-size: 100% 100% ;
  height: 100%;
  width: 100%;
  border: 0px solid black;
}

.notification {
  background-color: #555;
  color: green;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: green;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>





 <link rel="stylesheet" type="text/css" href="deo1.css">



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



 <!--for data table-->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
</head>

<body>


      <center>

<?php
echo '
            <form action = "" method = "POST">
            <button class="button btn-success" Name ="Back" style="float:right;width:150px;height:40px"><span>BACK</span></button>
             </form>

<h2><font color="black"> ' .$view. ' </font> </h2>


                  <table id="example" class="table" style="width:90%;">
                              <thead>
                              <tr>
                              
                              <th> Lastname. </th>
                              <th> Firstname </th>
                              <th> Middlename </th>
                              <th> SSS </th>
                              <th> Pag-ibig </th>
                              <th> Philhealth </th>
                              <th> TIN </th>
                              <th> Police </th>
                              <th> Brgy </th>
                              <th> NBI </th>
                              <th> PSA </th>
                              <th> Status </th>
                              <th> Action </th>

                               </tr>   
                              </thead>

                              <tbody> 
                  ';

                  $resultx = mysql_query("SELECT * FROM employees WHERE  actionpoint <> 'BLACKLISTED' AND actionpoint <> 'REJECTED' AND actionpoint <> 'DEPLOYED'");
                  while($rowx=mysql_fetch_row($resultx))
                  {  

                                          echo ' <tr> ';
                                          
                                          echo '  <td>  '.$rowx[6].'   </td> ';
                                          echo '  <td> '.$rowx[7].'   </td> ';       
                                          echo '  <td> '.$rowx[8].'   </td> ';       
                                          echo '  <td> '.$rowx[24].'   </td> ';       
                                          echo '  <td> '.$rowx[25].'   </td> ';       
                                          echo '  <td> '.$rowx[26].'   </td> ';       
                                          echo '  <td> '.$rowx[27].'   </td> ';       
                                          echo '  <td> '.$rowx[28].'   </td> ';       
                                          echo '  <td> '.$rowx[29].'   </td> ';       
                                          echo '  <td> '.$rowx[30].'   </td> ';       
                                          echo '  <td> '.$rowx[31].'   </td> ';       
                                          echo ' 
                                           <td>  
                                           <form action = "" method = "POST">
                                           <input type = "hidden" name = "shadowd1" value = "'.$rowx[4].'">
                                           <input type = "hidden" name = "shadowd2" value = "'.$data.'">
                                           <input type = "hidden" name = "appname88" value = "'.$rowx[6].', '.$rowx[7].' '.$rowx[8].'">

                                          <button type="submit" name = "displaymo" class="button btn-success" style = "font-size:15;width:140px;height:40px">
                                          <span class="glyphicon glyphicon-edit" >'.$rowx[33].'</span> 
                                          </button>
                                          </form>
                                           
                                            </td> ';


                                            if ($rowx[33] == "TERMINATED")
                                            {


                                                  echo '<td> <form action = "" method = "POST">

                                                  <input type = "hidden" name = "emp_number" value = "'.$rowx[4].'">
                                                        <input type = "hidden" name = "appname88" value = "'.$rowx[6].', '.$rowx[7].' '.$rowx[8].'">
                                                  ';
                                                  $resultcem=mysql_query("SELECT * FROM shortlist_master where appnumto = '$rowx[4]'" );
                                                  $corow = mysql_num_rows($resultcem);

                                                  echo '
                                                  <input type = "hidden" name = "shad" value = "'.$corow.'">
                                                  

                                                  <!--<button type="submit" name = "renew" id = "addtoshortlistbtn1" class="btn btn-info notification" style = "font-size:15;width:100px;height:40px">
                                                  <span class="glyphicon glyphicon-edit" >UnTerminate</span> <span class="badge">'.$corow.'</span>
                                                  </button>
                                                  <button type="button" class="btn btn-info notification" style = "font-size:15;width:120px;height:40px" data-toggle="modal" data-target="#myModal_unter" ><span class="glyphicon glyphicon-edit" >Un_Terminate</span> <span class="badge">'.$corow.'</span></button>
                                                        -->
<button type="submit" name="unterminate_me" class="btn btn-info notification" style = "font-size:15;width:120px;height:40px"  ><span class="glyphicon glyphicon-edit" >Un_Terminate</span> <span class="badge">'.$corow.'</span></button>
                                                  </form></td>
                                                  ';
                                            }
                                            else
                                            {   
                                                  echo '<td> <form action = "" method = "POST">
                                                  <input type = "hidden" name = "shadowE1" value = "'.$rowx[4].'">


                                                  ';
                                                  $resultcem=mysql_query("SELECT * FROM shortlist_master where appnumto = '$rowx[4]'" );
                                                  $corow = mysql_num_rows($resultcem);

                                                  echo '
                                                  <input type = "hidden" name = "shad" value = "'.$corow.'">
               
                                                  <button type="submit" name = "addtoshortlistbtn1" id = "addtoshortlistbtn1" class="btn btn-info notification" style = "font-size:15;width:100px;height:40px">
                                                  <span class="glyphicon glyphicon-edit" >ADD</span> <span class="badge">'.$corow.'</span>
                                                  </button>

                                                  </form></td>
                                                  ';
                                            }           
                                                 echo '
               
                                          </tr> ';
                  }
                  '

                       </tbody>
                          </table> 



            ';
            echo '</center>
                          
</body>
</html>

';


if(isset($_POST['addtoshortlistbtn1']))
   {

$id1 = $_POST['shadowE1'];

  
  $resultac=mysql_query("SELECT * FROM employees where appno='$id1'" );
        while($rowac=mysql_fetch_array($resultac))
          {


          echo '<input type = "text" name = "" value = "'.$rowac[33].'">';
          echo '<input type = "text" name = "" value = "'.$id1.'">';

                        if ($rowac[33]=="")
                                {
                                 mysql_query("UPDATE employees
                                  SET
                                  
                                  actionpoint = 'SHORTLISTED'
                                  WHERE
                                  appno = '$id1'
                                  ");

                                      $dtnow=date("m/d/Y");

                                                  $resultchk = mysql_query("select * from shortlist_master WHERE shortlistnameto = '$data' and appnumto='$id1' ");
                                                if (mysql_num_rows($resultchk) == 0) {
                                                // kapag wala pang user name na kaparehas
                                                                
                                                            mysql_query("INSERT INTO shortlist_master
                                                                  (shortlistnameto,appnumto,dateto)
                                                                  VALUES
                                                                  ('$data','$id1','$dtnow')
                                                                  ");
                                                          $kekelpogi="Applicant Added to Shortlist Database";

                                                                  }
                                           
                                         
                                                                 else{
                                                                  
                                                              $kekelpogi = "Not Added due to duplication";
                                                                  
                                                                        }

                                 }
                              else
                              {
                                     $dtnow=date("m/d/Y");

                                                  $resultchk = mysql_query("select * from shortlist_master WHERE shortlistnameto = '$data' and appnumto='$id1' ");
                                                if (mysql_num_rows($resultchk) == 0) {
                                                // kapag wala pang user name na kaparehas
                                                                
                                                            mysql_query("INSERT INTO shortlist_master
                                                                  (shortlistnameto,appnumto,dateto)
                                                                  VALUES
                                                                  ('$data','$id1','$dtnow')
                                                                  ");
                                                          $kekelpogi="Applicant Added to Shortlist Database!";

                                                                  }
                                           
                                         
                                                                 else{
                                                                  
                                                              $kekelpogi = "Not Added due to Duplication!";
                                                                  
                                                                        }

                              }                                 





           }

    
   }










if(isset($_POST['unterminate_me']))
   {


$emp_number1 = $_POST['emp_number'];
$emp_number2 = $_POST['appname88'];


  echo '<div class = "how1"><div class = "many"><br> 
    Revert Termination: for '.$emp_number2.'<br>





    <form action = "" method = "POST"><br>
    

                                                              <div class="form-group" >
                                                            <label>Reason of Un_Termination:</font></label>
                                                            <center> 
                                                          <input type="text" name = "unter_reason" value= "" class="form-control"  placeholder="" style= "height:45px;width:70%;" autofocus>
                                                        </center>
                                                      </div>

                                                          
<br>



<input type = "text" name = "emp_number1" value = "'.$emp_number1.'">

    <input type = "submit" name = "unter_me" value = "Submit" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    
    </form>
    





  </div></div>';







  }



if(isset($_POST['unter_me']))
   {

    $emp_number1 = $_POST['emp_number1'];
    $unter_reason1 = $_POST['unter_reason'];

   $resultemp=mysql_query("UPDATE employees 
                                  set
                                  actionpoint='EWB',
                                  unter_reason='$unter_reason1',
                                  reasonofaction=''  
                                WHERE
                                 appno = '$emp_number1'");

    $kekelpogi="Un Termination successful !";

}


if(isset($kekelpogi))
  {
  echo '<div class = "how1"><div class = "many"><br> 
    '.$kekelpogi.'<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    </form>
    
  </div></div>';







  }


?>
<script>

   $(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function() {
    $('#example1').DataTable();
} );



//$(document).ready(function() {
//    var table = $('#example').DataTable();
 
//    $('#example tbody').on( 'click', 'tr', function () {
//        if ( $(this).hasClass('selected') ) {
//            $(this).removeClass('selected');
//        }
//        else {
//            table.$('tr.selected').removeClass('selected');
//            $(this).addClass('selected');
//        }
//    } );
 
//    $('#addtoshortlistbtn').click( function () {
//        table.row('.selected').remove().draw( false );
//        document.getElementById("addtoshortlistbtn1").click();
//    } );
//} );




</script>


