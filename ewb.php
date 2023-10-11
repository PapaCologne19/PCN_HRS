<?php 
include("connect.php");
    session_start();


date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y'); 


if(isset($_POST['to_index']))
   {
      session_unset(); 

// destroy the session 
session_destroy(); 

       header("location:index.php");

}



?>

<html lang="en">
<head>
  <meta charset="UTF-8">
   

  <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

 <link rel="stylesheet" type="text/css" href="deo1.css">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="assets/css/style.css">

 <!--for data table-->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">


<link rel="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.dataTables.min.css">
<link rel="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">




<style type="text/css">
        #results { padding:10px; border:1px solid; background:#ccc; }

    .bs-example{
      margin: 20px;
    }

body {font-family: Arial;
font-size: 20}

img {
  border-radius: 8px;
}



.body50
{
position:absolute;
top: 0;
left: 0%;
border: 5px solid black;
height: 100%;
width: 50%;
}

.body5010p
{
position:absolute;
top: 10%;
left: 20%;
border: 5px solid black;
height: 90%;
width: 60%;
}

.body5025p
{
position:absolute;
top: 10%;
left: 25%;
border: 0px solid green;
height: 90%;
width: 50%;
}


.body60
{
position:absolute;
top: 0;
left: 50%;
border: 5px solid black;
height: 100%;
width: 50%;
}

.body6010p
{
position:absolute;
top: 10%;
left: 20%;
border: 5px solid black;
height: 90%;
width: 60%;
}




</style>





  
  <title>HRS EWB</title>
</head>
<body style="background-image: url(bg.png); background-size:100% 100%; background-repeat: no-repeat;" >

<?php
                        

//if ($_SESSION["darkk"]=="ewb"){
echo '




                                    <header class="cd-main-header js-cd-main-header">
                                                      <div class="cd-logo-wrapper">
                                                        <a href="#0" class="cd-logo"><img src="assets/img/pcnlogo1.png" alt="Logo"></a>
                                                      </div>
                                                      
                                                                <div class=" js-cd-search">
                                                                  <form>

                                                                   <!-- <input class="reset" type="search" placeholder="Search...">-->
                                                                  </form>
                                                                </div>
                                   
                                               <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
                                    
                                                          <ul class="cd-nav__list js-cd-nav__list">

                                                                                <!--<li class="cd-nav__item"><a href="#0">Tour</a></li>
                                                                                <li class="cd-nav__item"><a href="#0">Support</a></li>
                                                                                -->
                                                                                <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">

                                                                                                  <a href="">
                                                                                                    <img src="assets/img/cd-avatar.svg" alt="avatar">
                                                                                                    <span>Account</span>
                                                                                                  </a>
                                                                                                <form action = "" method = "POST">
                                                                                <ul class="cd-nav__sub-list">
                                                                                 <!-- <li class="cd-nav__sub-item"><a href="#0">My Account</a></li>
                                                                                  <li class="cd-nav__sub-item"><a href="#0">Edit Account</a></li>-->
                                                                                  <li class="cd-nav__sub-item"><BUTTON class="button2" name = "to_index" style="font-size:14; width:98%;height:50px">Log out</button></li>
                                                                                   </ul>
                                                                                </form>
                                                                              </li>
                                                          </ul>

                                    </header> <!-- .cd-main-header -->
                                    
                                    <main class="cd-main-content">
                                      <nav class="cd-side-nav js-cd-side-nav">
                                              <ul class="cd-side__list js-cd-side__list">
                                                <!--<li class="cd-side__label"><span>Recruitment</span></li>-->
                                                        <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
                                                          <!--<a href="#0">Overview</a>-->
                                                          
                                                                  <ul class="cd-side__sub-list">
                                                                 <!--   <li class="cd-side__sub-item"><a href="#0">All Data</a></li>
                                                                    <li class="cd-side__sub-item"><a href="#0">Category 1</a></li>
                                                                    <li class="cd-side__sub-item"><a href="#0">Category 2</a></li>
                                                                  -->
                                                                  </ul>
                                                        </li>

                                                        <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">
                                                              <!--          <a href="#0">Notifications<span class="cd-count">3</span></a>-->
                                                                        
                                                                        <ul class="cd-side__sub-list">
                                                                          <!--<li class="cd-side__sub-item"><a aria-current="page" href="">All Notifications</a></li>-->
                                                                          <!--<li class="cd-side__sub-item"><a href="">Recruitment Request</a></li>-->
                                                                          <!--<li class="cd-side__sub-item"><a href="">Shortlist Request</a></li>-->
                                                                        </ul>
                                                        </li>
                                            
                                                                <li class="cd-side__item cd-side__item--has-children cd-side__item--comments js-cd-item--has-children">
                                                                        <!--<a href="#0">Comments</a>-->
                                                                        
                                                                        <ul class="cd-side__sub-list">
                                                                       <!--   <li class="cd-side__sub-item"><a href="#0">All Comments</a></li>
                                                                          <li class="cd-side__sub-item"><a href="#0">Edit Comment</a></li>
                                                                          <li class="cd-side__sub-item"><a href="#0">Delete Comment</a></li>
                                                                        -->
                                                                        </ul>
                                                                </li>
                                              </ul>
                                      
                                        <ul class="cd-side__list js-cd-side__list">
                                                <li class="cd-side__label" style="font-size:26"><span>EWB MENU</span></li>
                                                <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                                                        <a href="">REPORTS</a>
                                                        
                                                        <ul class="cd-side__sub-list">
                                                          <form action = "" method = "POST">
                                                          <li class="cd-side__btn"><a><BUTTON class="btn" name = "report1" style="font-size:14; width:150px;height:50px">EWB database</button></a></li>     
                                                          <li class="cd-side__btn"><a><BUTTON class="btn" name = "report2" style="font-size:14; width:150px;height:50px">Summary Report</button></a></li>     

                                                          <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "additionalr">Additional Repots</button></a></li>-->
                                                          </form>
                                                        </ul>
                                                </li>

                                                        <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
                                                          <!--<a href="#0">Images</a>-->
                                                          
                                                          <ul class="cd-side__sub-list">
                                                            <!--<li class="cd-side__sub-item"><a href="#0">All Images</a></li>
                                                            <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>

                                                          --> 
                                                          </ul>
                                                        </li>
                                                  
                                                      <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
                                                      <!--  <a href="#0">Users</a>-->
                                                        
                                                        <ul class="cd-side__sub-list">
                                                          <!--
                                                          <li class="cd-side__sub-item"><a href="#0">All Users</a></li>
                                                          <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next1">Edit User</button></a></li>
                                                          <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next">Add User</button></a></li>
                                                          -->
                                                        </ul>
                                                      </li>
                                            
                                        </ul>
                                                
                                                  <ul class="cd-side__list js-cd-side__list">
                                              
                                                    <form action = "" method = "POST">
                                                    <li class="cd-side__label"><span>EWB Action</span></li>
                                                    <li class="cd-side__btn"><a><BUTTON class="btn" name = "applicant">+ Single Transaction</button></li>
                                                    <li class="cd-side__btn"><a><BUTTON class="btn" name = "multipleme">+ Multiple Transaction</button></a></li>
                                                    <li class="cd-side__btn"><a><BUTTON class="btn" name = "databaselist">+ </button></a></li>        





                                       <ul class="cd-side__list js-cd-side__list">
                                                <!--<li class="cd-side__label" style="font-size:26"><span>SHORTLISTING MENU</span></li>-->
                                                <!--<li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">-->
                                                      <!--  <a href="">REPORTS</a>-->
                                                        
                                                        <ul class="cd-side__sub-list">
                                                          <form action = "" method = "POST">
                                                          <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "blacklistr">List of Blacklisted</button></a></li>-->
                                                         <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "viewdatabaseshort">View Database</button></a></li>-->
                                                         <li class="cd-side__btn"><a><button type="button" class="btn" style="font-size:14; width:150px;height:50px" data-toggle="modal" data-target="#myModaladdshortview" >+ Shortlist Download</button></a></li>
                                                          <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "additionalr">Additional Repots</button></a></li>-->
                                                          <li class="cd-side__btn"><a><BUTTON class="btn" name = "summary" style="font-size:14; width:150px;height:50px">+ Summary</button></a></li>     
                                                          </form>
                                                        </ul>
                                                </li>

                                                        <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
                                                          <!--<a href="#0">Images</a>-->
                                                          
                                                          <ul class="cd-side__sub-list">
                                                            <!--<li class="cd-side__sub-item"><a href="#0">All Images</a></li>
                                                            <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>

                                                          --> 
                                                          </ul>
                                                        </li>
                                                  
                                                      <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
                                                      <!--  <a href="#0">Users</a>-->
                                                        
                                                        <ul class="cd-side__sub-list">
                                                          <!--
                                                          <li class="cd-side__sub-item"><a href="#0">All Users</a></li>
                                                          <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next1">Edit User</button></a></li>
                                                          <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next">Add User</button></a></li>
                                                          -->
                                                        </ul>
                                                      </li>
                                            
                                        </ul>








                                                      <!--<li class="cd-side__label"><span>Shortlisting Action</span></li>-->
                                                          <!-- <form action = "" method = "POST">-->
                                                    <!--<li class="cd-side__btn"><a><BUTTON class="btn" name = "shortlisttitle">+ Create Shortlist Title</button></a></li>        -->
                                                   <!-- <li class="cd-side__btn"><a><BUTTON class="btn" name = "addapp">+ Add Applicant to Shorlist1</button></a></li>        -->

                                                         
                                                   <!--</form>-->
                                  <!--<li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModaladdshort" >+ Add to Shortlist</button></li>-->
                                  <!--<li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModaldelshort" >+ Remove / EWB</button></li>-->
                                                     <!--<div  id="my_camera"></div>-->
                                                    
                                                    
                                               
                                                  </ul>
                                             
                                    


                                      </nav>
';

//}

//else

//{
 // // kapag wala pang user name na kaparehas
//      $kekelpogi_index = "Page direct Un Authorized";

  //  // remove all session variables

//session_unset(); 

// // destroy the session 
// session_destroy(); 

// }
?>
<?php 




if(isset($_POST['verify1']))
{
$shadowewb1 = $_POST['shadowewb'];
    

  echo '
  

  <div class = "how1"><div class = "many"><br> 
    <form action = "" method = "POST"><br>
<input type = "hidden" name = "ewbid"  value = "'.$shadowewb1.'">

  
   <div class="form-group" >
                                                            <label> Select  : </label><br>
                                                     
                                                          <select class="" name="ewbchoiceto"  data-placeholder="" style= "height:45px;width:60%" autofocus> ';      
                                                           echo '<option>Select EWB Status:</option> ';


                                                          $resultpro = mysql_query("SELECT * FROM ewb_choices");
                                                                        while($rowpro = mysql_fetch_array($resultpro))
                                                                    {
                                                          
                                                              echo '<option  value="'.$rowpro[1].'">'.$rowpro[1].' </option> 
                                                   
                                                                       ';
                                                                      }                                                                     
                                                                  echo '          
                                                           </select> </div>
                                                          
   <input type = "submit" name = "processit" value = "Submit" class="button btn-success" style = "font-size:15;height:50px;width:100px;">
          <input type = "submit" name = "Cancelko" value = "Cancel" class="button btn-info" style = "font-size:15;width:100px;height:50px">




    </form>
    
  </div></div>';


}



if(isset($_POST['processit']))
{
 $dtnow=date("m/d/Y");
    $ewbid1 = $_POST['ewbid'];
    $ewbc1 = $_POST['ewbchoiceto'];


                  mysql_query("UPDATE employees

                            SET
                      
                       ewbdeploy='$ewbc1',
                               ewbdate='$dtnow'
                            WHERE
                            appno = '$ewbid1'
                            ");

$kekelpogi = "Single EWB Process Succesful !"; 

}







  
if(isset($_POST['processmultiple']))
{
 $dtnow=date("m/d/Y");


    $ewbc1m = $_POST['ewbchoiceto1'];

    echo '<input type = "hidden" name = ""  value = "'.$ewbc1m.'">';

  if(!empty($_POST['check_list']))
      {
      // Loop to store and display values of individual checked checkbox.
            foreach($_POST['check_list'] as $selected)
            {
           // echo $selected."</br>";


                  mysql_query("UPDATE employees

                            SET
                      
                       ewbdeploy='$ewbc1m',
                       ewbdate='$dtnow'
                            
                            WHERE
                            appno = '$selected'
                            ");

                  $kekelpogi="Multiple Entry to Database Succesful";

            }


      }
      else {$kekelpogi="Selection Empty Nothing to Process";}
      
      
}




 if(isset($_POST['applicant']))
                   {
                      Echo '

                       

                                <div class="cd-content-wrapper">


                                  <div class="">
                <div class = "how2" style="width:100%">
                            <!--- laman -->
                            <form action = "" method = "POST">
                              <button class="button btn-success" Name ="" style="float:right;width:200px;height:50px"><span>Close</span></button>
                                  <br>
                             </form>
                            
                <center>
                                    <h2>EWB LISTING</h2>
                 </center>        


<table id="example" class="stripe row-border order-column nowrap" style="width:100%">
                            <thead>
                               <tr>
                   
                                <th> Applicant No </th>
                                <th> Lastname </th>
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
                                <th> Birthday </th>
                                <th> Action </th>

                                 </tr>   
                             </thead>

                            <tbody> 

                ';

                $resultx = mysql_query("SELECT * FROM employees where actionpoint='EWB' and ewbdeploy='0'");
                while($rowx=mysql_fetch_row($resultx))
                {  
         
           
                                                            echo ' <tr> ';

                   
                        echo '  <td>  '.$rowx[4].'   </td> ';
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
                           echo '  <td> '.$rowx[14].'   </td> ';  


   echo '<td> <form action = "" method = "POST">

<input type = "hidden" name = "shadowewb" id = "shadowewb" value = "'.$rowx[4].'">

  <button type="submit" name = "verify1"  class="button btn-info" style = "font-size:15;width:100px;height:60px">
                                      <span class="glyphicon glyphicon-edit" >Verify</span>
                                    </button>


     ';
 echo '</form></td>';

                                        echo ' </tr> 

 ';
                }



                 echo ' 
            

 

                     </tbody>
                        </table> 

                               </div>
                            <!--- laman -->
                                  </div>
                                </div> <!-- .content-wrapper -->
                  
                  ';
                  
                  } 



if(isset($_POST['multipleme']))
                   {
                      Echo '


                                <div class="cd-content-wrapper">
                                  <div class="">
                <div class = "how2" style="width:100%">
                            <!--- laman -->

                             <form action = "" method = "POST">
                        <button class="button btn-success" Name ="" style="float:right;width:200px;height:50px"><span>Close</span></button>
                            
                             <br>      




                </form>

<form action = "" method = "POST">

                <center>
                                    <h2>EWB LISTING</h2>
                 </center>        

<table id="example" class="stripe row-border order-column nowrap" style="width:100%">
                            <thead>
                               <tr>
                           <th></th>
                                <th> Applicant No </th>
                                <th> Lastname </th>
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
                                <th> Birthday </th>
                                <th> Action </th>

                                 </tr>   
                             </thead>

                            <tbody> 

                ';

                $resultx = mysql_query("SELECT * FROM employees where actionpoint='EWB' and ewbdeploy='0'");
                while($rowx=mysql_fetch_row($resultx))
                {  
         
           
                                                            echo ' <tr> ';

                        echo '  <td><input type="checkbox" name="check_list[]" value="'.$rowx[4].'"></td> ';
                        echo '  <td>  '.$rowx[4].'   </td> ';
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
                           echo '  <td> '.$rowx[14].'   </td> ';  


   echo '<td> 

<input type = "hidden" name = "shadowewb" id = "shadowewb" value = "'.$rowx[4].'">

  <!--<button type="submit" name = "verify1"  class="button btn-info" style = "font-size:15;width:100px;height:60px">
                                      <span class="glyphicon glyphicon-edit" >Verify</span>
                                    </button>-->


     ';
 echo '</td>';

                                        echo ' </tr> 

 ';
                }



                 echo ' 
               <div class="form-group" >
                                                            <label> Select One : </label><br>
                                                     
                                                          <select class="" name="ewbchoiceto1"  data-placeholder="" style= "height:45px;width:20%" autofocus> ';      
                                                           echo '<option>Select:</option> ';


                                                          $resultpro1 = mysql_query("SELECT * FROM ewb_choices");
                                                                        while($rowpro1 = mysql_fetch_array($resultpro1))
                                                                    {
                                                          
                                                              echo '<option  value="'.$rowpro1[1].'">'.$rowpro1[1].' </option> 
                                                   
                                                                       ';
                                                                      }                                                                     
                                                                  echo '          
                                                           </select> 
               <button class="submit" class="button btn-success" Name ="processmultiple" style="font-size:15;width:200px;height:50px"><span>Multiple</span></button>
        <br></div>

               <button class="" class="btn btn-success" Name ="" style="font-size:15;width:100%;height:5px"></button>



<br><br><br><br>
 

                     </tbody>
                        </table> 

</form>
                               </div>
                            <!--- laman -->
                                  </div>
                                </div> <!-- .content-wrapper -->
                  
                  ';
                  
                  } 





if(isset($_POST['report1']))
                   {
                      Echo '


<div class="cd-content-wrapper">
<div class = "how2" style="width:100%">
<!--- laman -->


 <form action = "" method = "POST">
                              <button class="button btn-success" Name ="" style="float:right;width:200px;height:50px"><span>Close</span></button>
                                  <br>
                             </form>

                <center>
                                    <h2>EWB REPORT</h2>
                 </center>        

<table id="example" class="stripe row-border order-column nowrap" style="width:100%">
                            <thead>
                               <tr>
                   
                                <th> Applicant No </th>
                                <th> Lastname </th>
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
                                <th> Birthday </th>
                                   <th> EWB Date </th>
                                 <th> Shortlist </th>
                                                    <th> Project </th>

                                 </tr>   
                             </thead>

                            <tbody> 

                ';

                $resultx = mysql_query("SELECT * FROM employees where actionpoint='EWB' and ewbdeploy!='0'");
                while($rowx=mysql_fetch_row($resultx))
                {  
                          

                             $resulty = mysql_query("SELECT * FROM shortlist_master where  appnumto='$rowx[4]'");
                            while($rowy=mysql_fetch_row($resulty))
                                {  

                                       $resultz = mysql_query("SELECT * FROM shortlist_details where  shortlistname='$rowy[1]'");
                                      while($rowz=mysql_fetch_row($resultz))
                                        {  


           
                                                            echo ' <tr> ';

                   
                        echo '  <td>  '.$rowx[4].'   </td> ';
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
                           echo '  <td> '.$rowx[14].'   </td> ';
                           echo '  <td> '.$rowx[37].'   </td> '; 
                                  echo '  <td> '.$rowy[1].'   </td> ';  
                                    echo '  <td> '.$rowz[2].'   </td> ';  



                                        echo ' </tr> 

 ';
                }}}



                 echo ' 
            

 

                     </tbody>
                        </table> 



<!--- laman -->
</div>
</div> <!-- .content-wrapper -->
                  
                  ';
                  
                  } 


if(isset($_POST['report2']))
                   {
                      Echo '


<div class="cd-content-wrapper">
<div class = "how2" style="width:100%">
<!--- laman -->

 <form action = "" method = "POST">
                              <button class="button btn-success" Name ="" style="float:right;width:200px;height:50px"><span>Close</span></button>
                                  <br>
                             </form>


                <center>
                                    <h2>EWB REPORT</h2>
                 </center>        

<table id="example" class="stripe row-border order-column nowrap" style="width:50%">
                            <thead>
                               <tr>
                   
                                   <th> EWB Date </th>
                                 <th> Manpower Count </th>
                         

                                 </tr>   
                             </thead>

                            <tbody> 

                ';


$resultdis = mysql_query("SELECT ewbdate, count(*) FROM employees where actionpoint='EWB' and ewbdeploy!='0' group by ewbdate asc ");
                while($rowdis = mysql_fetch_array($resultdis))
                {
                    echo ' <tr> ';   
                       echo '  <td>  '.$rowdis[0].'   </td> ';
                        echo '  <td>  '.$rowdis[1].'   </td> ';
                      }
                          echo ' </tr> ';






                 echo ' 
            

 

                     </tbody>
                        </table> 



<!--- laman -->
</div>
</div> <!-- .content-wrapper -->
                  
                  ';
                  
                  } 



?>

  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>



<script language="JavaScript">
 
    


   $(document).ready(function() {
    $('#example').DataTable();
} );



function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    var text = document.getElementById("shadowewb");
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
 

</script>


</body>
</html>




<?php
  if(isset($kekelpogi))
  {
  echo '<div class = "how1"><div class = "many"><br> 
    '.$kekelpogi.'<br>
    <form action = "" method = "POST"><br>
                <input type = "submit" name = "" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    </form>
    
  </div></div>';
  }


  if(isset($kekelpogi_index))
  {
  echo '<div class = "how2"><div class = "many"><br> 
    <font color="Black" size="12">'.$kekelpogi_index.'</font><br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "to_index" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    </form>
    
  </div></div>';
  }

  if(isset($kekelpogi1))
  {
  echo '<div class = "how1"><div class = "many"><br> 
    '.$kekelpogi1.'<br>
    <br>
    <input type = "submit" name = "" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px" >
    
    
  </div></div>';
  }
?>


