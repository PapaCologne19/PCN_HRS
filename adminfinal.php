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

<!--<script src="strap/bootstrap.min.js"></script>
<link rel="stylesheet" href="strap/bootstrap.min.css">-->
 <link rel="stylesheet" type="text/css" href="deo1.css">


<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="assets/css/style.css">

<!--<script src="strap/jquery.min.js"></script>-->



 <!--for data table-->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">







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

</style>





  
  <title>HRS ADMIN</title>
</head>
<body>


<?php
                        

if ($_SESSION["darkk"]=="green"){
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
                                            <li class="cd-side__label"><span>Recruitment Menu</span></li>
                                            <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                                                    <a href="">Reports</a>
                                                    
                                                    <ul class="cd-side__sub-list">
                                                      <form action = "" method = "POST">
                                                      <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "blacklistr">List of Blacklisted</button></a></li>
                                                     <!-- <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "shorlistr">Shortlisting Repots</button></a></li>-->
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
                                      <li class="cd-side__label"><span>Action</span></li>
                                      <li class="cd-side__btn"><a><BUTTON class="btn" name = "addclient">+ Create New Client</button></li>
                                      <li class="cd-side__btn"><a><BUTTON class="btn" name = "addproject">+ Create New Project</button></a></li>
                                      </form>
                                           
                                              </ul>
                                         
                                


                                  </nav>


';

}

else

{
 // kapag wala pang user name na kaparehas
      $kekelpogi_index = "Page direct Un Authorized";

    // remove all session variables

session_unset(); 

// destroy the session 
session_destroy(); 

}
?>





<?php



if(isset($_POST['addclient']))
   {
      Echo '


  <div class="cd-content-wrapper">
  
  <h1>New Client</h1>
  <br>
<!--- laman -->
      <form action = "" method = "POST">

                   <div class="form-group" >
                         <label>Client Name:</label>
                         <input type="text" name = "clientname" class="form-control"  placeholder="" style= "height:45px;width:60%;" autofocus>
                    </div>

                    <div class="form-group" >
                         <label>Area Coverage:</label>
                      
                                          <select class="form-control cbo" name="area_coverage"   data-placeholder="" style= "height:45px;width:60%"> ;      
                                                           
                                                           ';
                                                           echo '<option>Select One:</option> 
                                                         <option value="NCR">NCR</option>
                                                         <option value="PROVINCIAL">PROVINCIAL</option>
                                                          <option value="NATIONWIDE">NATIONWIDE</option>
                                                           </select> 
                                                           </div>
                                                      

                    <div class="form-group" >
                         <label>Region of Coverage:</label>
                               <select class="form-control cbo" name="region_coverage"   data-placeholder="" style= "height:45px;width:60%" > ;      
                                                           
                                                           ';
                                                           echo '<option>Select Region:</option> ';
                                                          $resultrg =mysql_query("SELECT * FROM region");
                                                                        while($rowrg=mysql_fetch_array($resultrg))
                                                                    {
                                                                       echo '<option  value="'.$rowrg[2].'">'.$rowrg[2].' </option> ';
                                                                     }
                                                                  echo '          
                                                           </select> 
                                                           </div>

                    <div class="form-group" >
                         <label>Address:</label>
                         <input type="text" name = "client_address" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                    </div>

                    <div class="form-group" >
                         <label>Client Status</label>
                   <select class="form-control cbo" name="client_status"   data-placeholder="" style= "height:45px;width:60%"> ;      
                                                           
                                                           ';
                                                           echo '<option>Select One:</option> 
                                                         <option value="0">ACTIVE</option>
                                                         <option value="1">NOT ACTIVE</option>
                                                          </select> 
                                                           </div>




    <button <input type = "submit" name = "createit" value = "" class="btn-info btn-lg" style="vertical-align:middle"><span>Create Client</span></button>
       <button <input type = "submit" name = "Cancel" value = "" class="btn-info btn-lg" style="vertical-align:middle"><span>Cancel</span></button>
       </form>

        </form>
<!--- laman -->
      </div>
    </div> <!-- .content-wrapper -->





';
    }



if(isset($_POST['createit']))
   {
  $clientname1=$_POST['clientname'];
  $area_coverage1=$_POST['area_coverage'];
  $region_coverage1=$_POST['region_coverage'];
  $client_address1=$_POST['client_address'];
  $client_status1=$_POST['client_status'];


     $resultclient = mysql_query("select * from client_company");

                if (mysql_num_rows($result) == 0)

                    {
                              mysql_query("INSERT INTO client_company
                                    (company_name,area,region,branch,address,is_deleted)
                                    VALUES
                                    ('$clientname1','$area_coverage1','$region_coverage1','BRANCH','$client_address1','$client_status1')
                                    ");

                     $kekelpogi="Client Created !";         
                    }                 
                    else
                    {
                      $kekelpogi="Client name already existed !";
                    }



   }


if(isset($_POST['projectit']))
   {
  $projectname1=$_POST['projectname'];
  $clientname11=$_POST['client_name1'];
  $applicant_count1=$_POST['applicant_count'];
  $start_date1=$_POST['start_date'];
  $end_date1=$_POST['end_date'];
  $statusofproject1=$_POST['statusofproject'];


     $resultclient = mysql_query("select * from projects");

                if (mysql_num_rows($result) == 0)

                    {
                              mysql_query("INSERT INTO projects
                                    (project_title,client_company_id,ewb_count,start_date,end_date,status,is_deleted)
                                    VALUES
                                    ('$projectname1','$clientname11','$applicant_count1','$start_date1','$end_date1','$statusofproject1','0')
                                    ");

                     $kekelpogi="Project Created !";         
                    }                 
                    else
                    {
                      $kekelpogi="Project name already existing !";
                    }



   }



if(isset($_POST['addproject']))
   {
      Echo '


  <div class="cd-content-wrapper">
  
  <h1>New Project</h1>
<br>
<!--- laman -->
  <form action = "" method = "POST">

                   <div class="form-group" >
                         <label>Project Name:</label>
                         <input type="text" name = "projectname" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                    </div>

                    <div class="form-group" >
                         <label>Select Client:</label>
                               <select class="form-control cbo" name="client_name1"   data-placeholder="" style= "height:45px;width:60%" > ;      
                                                           
                                                           ';
                                                           echo '<option>Select Client:</option> ';
                                                          $resultcn =mysql_query("SELECT * FROM client_company");
                                                                        while($rowcn=mysql_fetch_array($resultcn))
                                                                    {
                                                                       echo '<option  value="'.$rowcn[0].'">'.$rowcn[1].' </option> ';
                                                                     }
                                                                  echo '          
                                                           </select> 
                                                           </div>

                    <div class="form-group" >
                         <label>Applicant Count:</label>
                         <input type="text" name = "applicant_count" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                    </div>

                    <div class="form-group" >
                         <label>Start Date:</label>
                         <input type="date" name = "start_date" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                    </div>

                    <div class="form-group" >
                         <label>End Date</label>
                         <input type="date" name = "end_date" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                    </div>

                    <div class="form-group" >
                         <label>Status of Project:</label>
                         <select class="form-control cbo" name="statusofproject"   data-placeholder="" style= "height:45px;width:60%"> ;      
                                                           
                                                           ';
                                                           echo '<option>Select One:</option> 
                                                         <option value="0">ACTIVE</option>
                                                         <option value="1">NOT ACTIVE</option>
                                                          </select> 
                                                           </div>


    <button <input type = "submit" name = "projectit" value = "" class="btn-info btn-lg" style="vertical-align:middle"><span>Create Project</span></button>
       <button <input type = "submit" name = "Cancel" value = "" class="btn-info btn-lg" style="vertical-align:middle"><span>Cancel</span></button>
       </form>

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





</script>


</body>
</html>




<?php
  if(isset($kekelpogi))
  {
  echo '<div class = "how1"><div class = "many"><br> 
    '.$kekelpogi.'<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px"></form>
    
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
?>