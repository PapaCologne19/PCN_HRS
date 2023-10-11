
<?php 
require_once './PHPWord.php';

include("connect.php");

    session_start();

   




            


date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y'); 
 $datenow=date("m/d/Y h:i:s A");


?>

<?php





















if(isset($_POST['Back']))
{
  header("location:deployment.php"); 
}














if(isset($_POST['dl_loa']))
{

echo $_SESSION["appno"];
$appno=$_SESSION["appno"];



                                                          $resultem = mysql_query("SELECT * FROM employees where appno='$appno' ");
                                                                        while($rowem = mysql_fetch_row($resultem))
                                                                    {
    
                                                                      $lname=$rowem[6];
                                                                      $fname=$rowem[7];
                                                                      $mname=$rowem[8];
                                                                      $fullname= $lname.", ".$fname." ".$mname;

                                                                      $paddress=$rowem[10];

                                                                      $sss_1=$rowem[24];
                                                                      $Pagibig_1=$rowem[25];
                                                                      $ph_1=$rowem[26];
                                                                      $tin_1=$rowem[27];

                                                                       $contk_num =  $rowem[18];

                                                                    }

                                                          $resultloa = mysql_query("SELECT * FROM deployment where appno_d='$appno' ");
                                                                        while($rowloa = mysql_fetch_array($resultloa))
                                                                    {
                                                                      
                                                                    $stemplate =  $rowloa[17];
                                                                    $ptitle =  $rowloa[3];
                                                                       $caddress =  $rowloa[2];
                                                                       $jposition = $rowloa[16];
                                                                          $estatus = $rowloa[15];


                                                                         // $datefrom = $rowloa[8];
                                                                          $datefromx=date_create($rowloa[8]);
                                                                          $datefrom = date_format($datefromx,"m/d/Y");
                                                                          


                                                                          //$dateto = $rowloa[9];
                                                                           $datetox=date_create($rowloa[9]);
                                                                          $dateto = date_format($datetox,"m/d/Y");  



                                                                          $rate_day = $rowloa[18];
                                                                          $daily_rate = $rowloa[18];
                                                                          $ecola = $rowloa[19];
                                                                          $comm_al = $rowloa[23];
                                                                          $transpo = $rowloa[24];
                                                                          $meal_al = $rowloa[21];
                                                                          $inet_al = $rowloa[20];
                                                                          $outbase = $rowloa[22];
                                                                          $outlet = $rowloa[27];
                                                                          $nodays = $rowloa[26];

                                                                          $dep_by = $rowloa[31];
                                                                          $dep_desi = $rowloa[32];

                                                                          $hr_rep = $rowloa[28];
                                                                          $hr_desi = $rowloa[29];

                                                                          $ps = $rowloa[33];
                                                                          $ps_desi = $rowloa[34];

                                                                          $head =  $rowloa[35];
                                                                          $head_desi = $rowloa[36];

                                                                          $id_1 = $rowloa[35];

                                                                          $emp_no= $rowloa[6];
 
                                                                    }  
                                                                    
                                                                    





$LOAtemp="loa_templates/" . $stemplate;
$filenamenya="loa_files/" . $stemplate;

$Rowvaladd="27 CRESTA STREET, BARANGAY MALAMIG, MANDALUYONG CITY and 30 ARAYAT STREET, BARANGAY MALAMIG, MANDALUYONG CITY";
$Rowval1=$fullname;

  
$Rowval2=$paddress;
$Rowval3=$ptitle;
$Rowval5=$caddress;
$Rowval6=$jposition;
$Rowval7=$estatus;
$Rowval8=$datefrom;
$Rowval9=$dateto;
$Rowval10=  $rate_day;
$Rowval10p=$daily_rate;
$Rowval10c=$ecola;
$Rowval10a=$comm_al;
$Rowval10b=$transpo;

$Rowval=$meal_al;
$Rowval=$inet_al;
$Rowval=$outbase;


$Rowval11a=$outlet;
$Rowval12=$nodays;

$Rowval16=$dep_by;
$Rowval17=$dep_desi;

$Rowval18=$hr_rep;
$Rowval19=$hr_desi;

$Rowval20=$ps;
$Rowval21=$ps_desi;

$Rowval22=$head;
$Rowval23=$head_desi;

$Rowval27="$fullname";




$Rowval13=date("d");
$Rowval14x=date("n");

switch ($Rowval14x) {
  case '1':
    # code...
    $Rowval14="January";
    break;
  case '2':
    # code...
    $Rowval14="February";
    break;
    case '3':
    # code...
    $Rowval14="March";
    break;
    case '4':
    # code...
    $Rowval14="April";
    break;
    case '5':
    # code...
    $Rowval14="May";
    break;
    case '6':
    # code...
    $Rowval14="June";
    break;
    case '7':
    # code...
    $Rowval14="July";
    break;
    case '8':
    # code...
    $Rowval14="August";
    break;
    case '9':
    # code...
    $Rowval14="September";
    break;
    case '10':
    # code...
    $Rowval14="October";
    break;
    case '11':
    # code...
    $Rowval14="November";
    break;
    case '12':
    # code...
    $Rowval14="December";
    break;
  default:
    # code...
    break;
}



$Rowval15=date("Y");




$Rowval26=$sss_1;
$Rowval27=$ph_1;
$Rowval28=$Pagibig_1;
$Rowval29=$tin_1;

$Rowval31=$id_1;
$Rowval32=$contk_num;
$Rowval33=$emp_no;



//$Rowval35="rodeo villavicencio";
//$Rowval36="rodeo villavicencio";
//$Rowval37="Date - Division - Emp no  ";


        
                 
                  $PHPWord = new PHPWord();

                  $document = $PHPWord->loadTemplate($LOAtemp);


$document->setValue('VAddress', $Rowvaladd);
       $document->setValue('Value1', $Rowval1);
       $document->setValue('Value2', $Rowval2);
       $document->setValue('Value3', $Rowval3);
          
       $document->setValue('Value4', $Rowval4);     
       $document->setValue('Value5', $Rowval5);


       $document->setValue('Value6', $Rowval6);
       $document->setValue('Value7', $Rowval7);
       $document->setValue('Value8', $Rowval8);
       $document->setValue('Deo9', $Rowval9);
       $document->setValue('Value10', $Rowval10);
       $document->setValue('Value10c', $Rowval10c);
       $document->setValue('Value10a', $Rowval10a);
       $document->setValue('Value10b', $Rowval10b);




       $document->setValue('Value11a', $Rowval11a);
       $document->setValue('Value12', $Rowval12);



       $document->setValue('Value13', $Rowval13);
       $document->setValue('Value14', $Rowval14);
       $document->setValue('Value15', $Rowval15);

       $document->setValue('Value16', $Rowval16);
       $document->setValue('Value17', $Rowval17);

       $document->setValue('Value18', $Rowval18);
       $document->setValue('Value19', $Rowval19);
       
       $document->setValue('Value20', $Rowval20);
       $document->setValue('Value21', $Rowval21);
       
       $document->setValue('Value22', $Rowval22);
       $document->setValue('Value23', $Rowval23);
       
       $document->setValue('Value24', $Rowval24);
       $document->setValue('Value25', $Rowval25);



       $document->setValue('Value26', $Rowval26);
       $document->setValue('Value27', $Rowval27);
       $document->setValue('Value28', $Rowval28);
       $document->setValue('Value29', $Rowval29);

       $document->setValue('Value30', $Rowval30);

       $document->setValue('Value31', $Rowval31);
       $document->setValue('Value32', $Rowval32);

       $document->setValue('Value33', $Rowval33);
       $document->setValue('Value34', $Rowval34);
      // $document->setValue('Value35', $Rowval35);
      // $document->setValue('Value36', $Rowval36);
      //$document->setValue('Value37', $Rowval37);




    $document->save($filenamenya);

      //autodownload the file 
      // this includes the download.php
 header("location:download.php?download_file=".$filenamenya);

}





















if(isset($_POST['Regular']))
{


$client_d1 = $_POST['client_d'];
$address_d1 = $_POST['address_d'];
$project_d1 = $_POST['project_d'];
$shortlist_d1 = $_POST['shortlist_d'];
$appno_d1 = $_POST['appno_d'];
//$empno_d1 = $_POST['empno_d'];
$deploy_stat1 = $_POST['deploy_stat'];
$emp_startdate_d1=$_POST['emp_startdate_d'];
$emp_end_date_d1 = $_POST['emp_end_date_d'];
$X1 = $_POST['X'];
$Y1 = $_POST['Y'];
$category_d1 = $_POST['category_d'];
$locator_d1 = $_POST['locator_d'];
$channel_d1 = $_POST['channel_d'];
$employment_status_d1 = $_POST['employment_status_d'];
$job_title_d1 = $_POST['job_title_d'];
$loa_template_d1 = $_POST['loa_template_d'];
$basic_salary_d1 = $_POST['basic_salary_d'];
$ecola_d1 = $_POST['ecola_d'];
$internet_allowance_d1 = $_POST['internet_allowance_d'];
$meal_allowance_d1 = $_POST['meal_allowance_d'];
$outbase_meal_d1 = $_POST['outbase_meal_d'];
$comm_allowance1 = $_POST['comm_allowance'];
$transpo_allowance1 = $_POST['transpo_allowance'];
$deployment_remarks1 = $_POST['deployment_remarks'];
$no_of_days_work_d1 = $_POST['no_of_days_work_d'];
$outlet_d1 = $_POST['outlet_d'];
$hrrep_d1 = $_POST['hrrep_d'];
$hr_designation_d1 = $_POST['hr_designation_d'];
$fs_d1 = $_POST['fs_d'];
$deploying_personnel_d1 = $_POST['deploying_personnel_d'];
$deploying_designation_d1 = $_POST['deploying_designation_d'];
$project_supervisor_d1 = $_POST['project_supervisor_d'];
$ps_designation_d1 = $_POST['ps_designation_d'];
$head_d1 = $_POST['head_d'];
$head_designation_d1 = $_POST['head_designation_d'];
$idnum1 = $_POST['idnum'];
$mandatory_status1 = $_POST['mandatory_status'];
$date_created1 = $_POST['date_created'];
$disqualified_date_d1 = $_POST['disqualified_date_d'];
$desqualified_remarks_d1 = $_POST['desqualified_remarks_d'];


switch ($employment_status_d1) {
  case 'Regular':
    # code...
   $empno_d1="R".$appno_d1;

    break;
  
  case 'Probationary':
      # code...
$empno_d1="P".$appno_d1;
    break;
  
  case 'Project_Based':
    # code...
    $empno_d1="A".$appno_d1;
    break;
  
  default:
    # code...
     $empno_d1="X".$appno_d1;
      break;
}


// dito ka gumawa ng mga restriction kung mga blank



//===================

    $resulttracking=mysql_query("SELECT * FROM track WHERE id = '2'");
    while($rowtr=mysql_fetch_array($resulttracking))
{
//echo $rowtr[1]+1;
$newloatracking = $rowtr[1] + 1;
//echo $newtracking;


    
      mysql_query("UPDATE track
          SET
          
          appno = '$newloatracking'
          WHERE
          id = '2'
          ");

$loanumber1=$newloatracking;
}


//determine last loa, change val to blank inactive, affect history and dep database as active


      mysql_query("UPDATE deployment SET active = 'INACTIVE' WHERE appno_d = '$appno_d1' ");
   mysql_query("UPDATE deployment_history SET active = 'INACTIVE' WHERE appno_d = '$appno_d1' ");
      

//===================


  mysql_query("INSERT INTO deployment
        (client_d,clientadd_d,project_d,shortlist_d,appno_d,empno_d,status_d,emp_startdate_d,emp_end_date,division_d,department_d,category_d,locator_d,channel_d,employment_status_d,job_title_d,loa_template_d,basic_salary_d,ecola_d,internet_allowance_d,meal_allowance_d,outbase_meal_d,comm_allowance,transpo_allowance,deployment_remarks,no_of_days_work_d,outlet_d,hr_manager_d,hr_designation,supervisor_d,deploying_personnel_d,deploying_designation_d,project_supervisor_d,ps_designation_d,head_d,head_designation_d,idnum,mandatory_status,date_created,disqualified_date_d,letter_remarks_d,loa_number,active)

        VALUES
        ('$client_d1','$address_d1','$project_d1','$shortlist_d1','$appno_d1','$empno_d1','$deploy_stat1','$emp_startdate_d1','$emp_end_date_d1','$X1','$Y1','$category_d1','$locator_d1','$channel_d1','$employment_status_d1','$job_title_d1','$loa_template_d1','$basic_salary_d1','$ecola_d1','$internet_allowance_d1','$meal_allowance_d1','$outbase_meal_d1','$comm_allowance1','$transpo_allowance1','$deployment_remarks1','$no_of_days_work_d1','$outlet_d1','$hrrep_d1','$hr_designation_d1','$fs_d1','$deploying_personnel_d1','$deploying_designation_d1','$project_supervisor_d1','$ps_designation_d1','$head_d1','$head_designation_d1','$idnum1','$mandatory_status1','$date_created1','$disqualified_date_d1','$desqualified_remarks_d1','$loanumber1','ACTIVE')
        ");
  
 

  mysql_query("INSERT INTO deployment_history
        (client_d,clientadd_d,project_d,shortlist_d,appno_d,empno_d,status_d,emp_startdate_d,emp_end_date,division_d,department_d,category_d,locator_d,channel_d,employment_status_d,job_title_d,loa_template_d,basic_salary_d,ecola_d,internet_allowance_d,meal_allowance_d,outbase_meal_d,comm_allowance,transpo_allowance,deployment_remarks,no_of_days_work_d,outlet_d,hr_manager_d,hr_designation,supervisor_d,deploying_personnel_d,deploying_designation_d,project_supervisor_d,ps_designation_d,head_d,head_designation_d,idnum,mandatory_status,date_created,disqualified_date_d,letter_remarks_d,loa_number,active)

        VALUES
        ('$client_d1','$address_d1','$project_d1','$shortlist_d1','$appno_d1','$empno_d1','$deploy_stat1','$emp_startdate_d1','$emp_end_date_d1','$X1','$Y1','$category_d1','$locator_d1','$channel_d1','$employment_status_d1','$job_title_d1','$loa_template_d1','$basic_salary_d1','$ecola_d1','$internet_allowance_d1','$meal_allowance_d1','$outbase_meal_d1','$comm_allowance1','$transpo_allowance1','$deployment_remarks1','$no_of_days_work_d1','$outlet_d1','$hrrep_d1','$hr_designation_d1','$fs_d1','$deploying_personnel_d1','$deploying_designation_d1','$project_supervisor_d1','$ps_designation_d1','$head_d1','$head_designation_d1','$idnum1','$mandatory_status1','$date_created1','$disqualified_date_d1','$desqualified_remarks_d1','$loanumber1','ACTIVE')
        ");
  
 
    
      mysql_query("UPDATE employees
          SET
          
          actionpoint = 'DEPLOYED',
          reasonofaction = '$project_d1',
          dateofaction='$datenow',
          end_con='$emp_end_date_d1'
          WHERE
          appno = '$appno_d1'
          ");


// characterize, if old emp with attrition , clear ter, res, retreach at employee, put to attrition table


  $resultatt = mysql_query("select * from employees WHERE appno = '$appno_d1' ");

              while($rowatt=mysql_fetch_array($resultatt))
                {
                  //termination
                  if ($rowatt[41]!="")
                  {
                    //insert to attrition table
                    //clear terminaton record at employees table
                          mysql_query("INSERT INTO attrition
                                (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)

                                VALUES
                                ('$appno_d1','$emp_startdate_d1','$emp_end_date_d1','$project_d1','$job_title_d1','$rowatt[41]','$rowatt[42]','TERMINATION','$rowatt[46]')
                                ");
                          

    
                              mysql_query("UPDATE employees
                                  SET
                                  
                                  ter_date = '',
                                  ter_person = '',
                                  ter_reason=''
                                  WHERE
                                  appno = '$appno_d1'
                                  ");


                  }
                //resignation
                  if ($rowatt[43]!="")
                  {
                    //insert to attrition table
                    //clear resignation record at employees table
                              mysql_query("INSERT INTO attrition
                                (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)

                                VALUES
                                ('$appno_d1','$emp_startdate_d1','$emp_end_date_d1','$project_d1','$job_title_d1','$rowatt[43]','$rowatt[44]','RESIGNATION','$rowatt[48]')
                                ");
                          

    
                              mysql_query("UPDATE employees
                                  SET
                                  
                                  res_date = '',
                                  res_person = '',
                                  res_reason=''
                                  WHERE
                                  appno = '$appno_d1'
                                  ");



                  }
                //retrench
                  if ($rowatt[49]!="")
                  {
                    //insert to attrition table
                    //clear retrench record at employees table
                             mysql_query("INSERT INTO attrition
                                (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)

                                VALUES
                                ('$appno_d1','$emp_startdate_d1','$emp_end_date_d1','$project_d1','$job_title_d1','$rowatt[49]','$rowatt[50]','RETRENCH','$rowatt[51]')
                                ");
                          

    
                              mysql_query("UPDATE employees
                                  SET
                                  
                                  retrench_date = '',
                                  retrench_person = '',
                                  retrench_reason=''
                                  WHERE
                                  appno = '$appno_d1'
                                  ");



                  }

       



                }



$kekelpogi="Applicant Deployed Successfuly";

//header("location:deployment.php"); 


    
} 




?>



<html>
<head>

  <title>HRS DEPLOYMENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="http://max/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="deo1.css">

<style>
  
.many1 
{
  position:absolute;
  left: 20%;
  top: 2px;
  color:black;
  width: 40%;
    z-index: 100;
  border: 2px inset Blue;
  opacity: .8;

  padding: 0% 7% 5% 5%;
  background-size: cover;
  border-radius: 1px;
  box-shadow: 1px 5px 10px 5px #000000;
  text-align: right;

  font-family: AR berkley medium; 
  font-size: 20;
 }

</style>

</head>






<body>

<div class="how2">
<div class="many1">
<br><br>
<?php
//echo $_SESSION["dark"];
//echo $_SESSION["shashort"];
//echo $_SESSION["shaproject"];
//echo $_SESSION["shaclient"];


$shashort1x = $_SESSION["shashort"];
$shaproject1x = $_SESSION["shaproject"];
$shaclient1x = $_SESSION["shaclient"];

$idto=$_SESSION["dark"];   




?>

<form action = "" method = "POST">
                                                        <div class="form-group" >
                                                            <label> Select Status : </label>
                                                     
                                                          <select class="" name="deploy_stat"  data-placeholder="" style= "height:35px;width:60%" > ';      
                                                           <option></option>
                                                            <?php

                                                          $resultpro = mysql_query("SELECT * FROM deploy_status order by description ASC ");
                                                                        while($rowpro = mysql_fetch_array($resultpro))
                                                                    {
                                                          
                                                              echo '<option  value="'.$rowpro[1].'">'.$rowpro[1].'</option> 
                                                   
                                                                       ';
                                                                      }                                                                     
                                                          ?>
                                                                     
                                                          
                                                           </select> </div>
                                                           <br>
                                                              <div class="form-group" >
                                                            <label>Employee Start date:</font></label>
                                                          <input type="date" name = "emp_startdate_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Employee End date:</font></label>
                                                          <input type="date" name = "emp_end_date_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                   

                            <div class="form-group" >
                                         <label>Division:</label>
                                               <select class="form-control" name="X" id="X"  data-placeholder="" style= "height:35px;width:60%" > ';      
                                                                           
                                            <?php                               
                                                                           echo '<option>Select Division:</option> ';
                                                                          $resultrg = mysql_query("SELECT * FROM divisions");
                                                                                        while($rowrg = mysql_fetch_array($resultrg))
                                                                                    {
                                                                                       echo '<option  value="'.$rowrg[1].'">'.$rowrg[1].' </option> ';
                                                                                     }
                                                                                  ?>
                                                                                            
                                                           </select> 
                                                           </div>
                                                           <br>

                                                       <div class="form-group" >
                                                           <label> Department : </label>
                                                  <select class="form-control" name="Y" id="Y"   data-placeholder="" style= "height:35px;width:60%" > ;      
                                                         </select>
                                                         </div>

                                                      <br>

                                                      <div class="form-group" >
                                                            <label>Category:</font></label>
                                                         <select class="form-control" name="category_d"   data-placeholder="" style= "height:35px;width:60%" > ';      
                                                                           
                                            <?php                               
                                                                           echo '<option>Select Category:</option> ';
                                                                          $resultrg1 = mysql_query("SELECT * FROM categories");
                                                                                        while($rowrg1 = mysql_fetch_array($resultrg1))
                                                                                    {
                                                                                       echo '<option  value="'.$rowrg1[1].'">'.$rowrg1[1].' </option> ';
                                                                                     }
                                                                                  ?>
                                                                                            
                                                           </select> 
                                                      </div>
                                                      <br>



  
                                                      <div class="form-group" >
                                                            <label>Locator:</font></label>
                                                          <input type="text" name = "locator_d" value="<?php echo $idto; ?>" class="form-control"  placeholder="" style= "height:35px;width:60%;" readonly>
                                                      </div>
                                                      <br>


                                                    <div class="form-group" >
                                                          <label>Project Title:</font></label>
                                                                <input type="text" name = "project_d"  value="<?php echo $shaproject1x; ?>" class="form-control"  placeholder="" style= "height:35px;width:60%;" readonly>
                                                     
                                                      </div>
                                                      <br>

                                                      <div class="form-group" >
                                                          <label>Client Address:</font></label>
                                                                          <?php
                                                                          $resultcl = mysql_query("SELECT * FROM client_company where company_name='$shaclient1x'");
                                                                                        while($rowcl = mysql_fetch_array($resultcl))
                                                                                    {
                                                                               echo '
                                                          <input type="text" name = "address_d"  value="'.$rowcl[5].'" class="form-control"  placeholder="" style= "height:35px;width:60%;" readonly>
                                                                                     ';
                                                                                     }
                                                                          ?>

                                    
                                                      </div>
                                                     <br>

                                                      <div class="form-group" >
                                                            <label>Channel:</font></label>
                                                           <select class="form-control" name="channel_d"    data-placeholder="" style= "height:35px;width:60%" > ';      
                                                                           
                                            <?php                               
                                                                           echo '<option>Select Channel:</option> ';
                                                                          $resultc = mysql_query("SELECT * FROM channels order by description ASC");
                                                                                        while($rowc = mysql_fetch_array($resultc))
                                                                                    {
                                                                                       echo '<option  value="'.$rowc[1].'">'.$rowc[1].' </option> ';
                                                                                     }
                                                                                  ?>
                                                                                            
                                                           </select> 
                                                      </div>
                                                      <br>

                                                      <div class="form-group" >
                                                            <label>Employment Status:</font></label>
                                                          
                                                               <select class="form-control" name="employment_status_d"    data-placeholder="" style= "height:35px;width:60%" > ';      
                                                                           
                                            <?php                               
                                                                           echo '<option>Select Status:</option> ';
                                                                          $resultes = mysql_query("SELECT * FROM employment_status");
                                                                                        while($rowes = mysql_fetch_array($resultes))
                                                                                    {
                                                                                       echo '<option  value="'.$rowes[1].'">'.$rowes[1].' </option> ';
                                                                                     }
                                                                                  ?>
                                                                                            
                                                           </select> 
                                                      </div>
                                                      <br>

                                                      <div class="form-group" >
                                                            <label>Job Title:</font></label>
                                                   
                                                        <select class="form-control" name="job_title_d"  data-placeholder="" style= "height:35px;width:60%" > ';      
                                                                           
                                            <?php                               
                                                                           echo '<option>Select JT:</option> ';
                                                                          $resultjt = mysql_query("SELECT * FROM job_title order by description ASC");
                                                                                        while($rowjt = mysql_fetch_array($resultjt))
                                                                                    {
                                                                                       echo '<option  value="'.$rowjt[2].'">'.$rowjt[2].' </option> ';
                                                                                     }
                                                                                  ?>
                                                                                            
                                                           </select> 
                                                      </div>
                                                      <br>

                                                      <div class="form-group" >
                                                            <label>LOA Template:</font></label>
                                                      <select class="form-control" name="loa_template_d"  data-placeholder="" style= "height:35px;width:60%" > ';      
                                                                           
                                            <?php                               
                                                                           echo '<option>Select template:</option> ';
                                                                          $resultl = mysql_query("SELECT * FROM loa_files where is_deleted ='0'  order by file_name ASC");
                                                                                        while($rowl= mysql_fetch_array($resultl))
                                                                                    {
                                                                                       echo '<option  value="'.$rowl[3].'">'.$rowl[2].' </option> ';
                                                                                     }
                                                                                  ?>
                                                                                            
                                                           </select> 
                                                      </div>
                                                      <br>

                                                      <div class="form-group" >
                                                            <label>Basic Salary:</font></label>
                                                          <input type="text" name = "basic_salary_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Ecola:</font></label>
                                                          <input type="text" name = "ecola_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>

                                                      <div class="form-group" >
                                                            <label>Internet Allowance:</font></label>
                                                          <input type="text" name = "internet_allowance_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Meal Allowance:</font></label>
                                                          <input type="text" name = "meal_allowance_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Outbase Meal:</font></label>
                                                          <input type="text" name = "outbase_meal_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>


                                                     
                                                      <div class="form-group" >
                                                            <label>Comm Allowance:</font></label>
                                                          <input type="text" name = "comm_allowance"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Transpo ALlowance:</font></label>
                                                          <input type="text" name = "transpo_allowance"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Deployment Remarks:</font></label>
                                                          <input type="text" name = "deployment_remarks"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>No of Days Worked:</font></label>
                                                          <input type="text" name = "no_of_days_work_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Outlet:</font></label>
                                                          <input type="text" name = "outlet_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                          <div class="form-group" >
                                                            <label>HR Representative:</font></label>
                                                          <input type="text" name = "hrrep_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                       <div class="form-group" >
                                                            <label>HR Designation:</font></label>
                                                          <input type="text" name = "hr_designation_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                       <div class="form-group" >
                                                            <label>Field Supervisor:</font></label>
                                                          <input type="text" name = "fs_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                        <div class="form-group" >
                                                            <label>Deployed By:</font></label>
                                                          <input type="text" name = "deploying_personnel_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Designation:</font></label>
                                                          <input type="text" name = "deploying_designation_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Project Supervisor:</font></label>
                                                          <input type="text" name = "project_supervisor_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Designation:</font></label>
                                                          <input type="text" name = "ps_designation_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Head:</font></label>
                                                          <input type="text" name = "head_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                      <div class="form-group" >
                                                            <label>Designation:</font></label>
                                                          <input type="text" name = "head_designation_d"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                       <div class="form-group" >
                                                            <label>ID Number:</font></label>
                                                          <input type="text" name = "idnum"  class="form-control"  placeholder="" style= "height:35px;width:60%;">
                                                      </div>
                                                      <br>
                                                          <div class="form-group" >
                                                            <label>Creation Date:</font></label>
                                                          <input type="text" name = "date_created" value="<?php echo $datenow; ?>" class="form-control"  placeholder="" style= "height:35px;width:60%;" readonly>
                                                      </div>
                                                      <br>
              
                                                      
                                               
                                                      
                                  
                                             
                                                         <!-- <label>Client:</font></label>-->
                                                          <input type="hidden" name = "client_d"  value="<?php echo $shaclient1x; ?>" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                     
                                                            <!--<label>Shortlist:</font></label>-->
                                                          <input type="hidden" name = "shortlist_d" value="<?php echo $shashort1x; ?>" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                           
                                                          <input type="hidden" name = "appno_d" value="<?php echo $idto; ?>"  class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                             
                                                            <!--<label>Employee No:</font></label>-->
                                                          <input type="hidden" name = "empno_d" value="<?php echo "e".$idto; ?>" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                             
                                                            <!--<label>Mandatoy Status:</font></label>-->
                                                          <input type="hidden" name = "mandatory_status"  class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                   
                                                            <!--<label>Disqualified Date:</font></label>-->
                                                          <input type="hidden" name = "disqualified_date_d"  class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                             
                                                            <!--<label>Desqualified Remarks:</font></label>-->
                                                          <input type="hidden" name = "desqualified_remarks_d"  class="form-control"  placeholder="" style= "height:45px;width:60%;">                    
                                                      
                                                      
                                              

  <input type = "submit" name = "Regular" value = "Deploy It" class="button1" style= "height:55px;width:30%;">

<input type = "submit" name = "Back" value = "Cancel" class="button1" style= "height:55px;width:30%;">















                                                      
                                                    

                                                  

    </form>                           
                                                      
                                                      
               </div>                                        
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      













</body>
</html>


<?php

  if(isset($kekelpogi))
  {
  echo '<div class = "how3"><div class = "many2">
  <br><br> 

    ';
         
        
     $_SESSION["appno"]=$appno_d1;
     echo '
      <h3>'.$kekelpogi.'</h3><br><br><br>
    <form action = "" method = "POST"><br>
       <input type = "submit" name = "dl_loa" value = "Download LOA" class="btn-info btn-lg" style = "font-size:15;width:250px;height:50px">

       <input type = "submit" name = "Back" value = "Close" class="btn-info btn-lg" style = "font-size:15;width:100px;height:50px">
       
    </form>
    
  </div></div>';
  }

?>





<script language="JavaScript">

$("#X").on("change",function(){

    var x_values = $("#X").find(":selected").val();
  
    $.ajax({
        url:'ajax.php',
        type: 'POST',
        //dataType:'JSON',
        data:{city_code:x_values},
        success: function (result) {
        
          result = JSON.parse(result);

          //Empty option on change
        var select = document.getElementById("Y");
        var length = select.options.length;

                   for ( i = length-1; i >=0; i--) {
                        select.options[i]=null;
                      }
                      //end

                  result.forEach(function(item,index) {

                    //console.log(item[2]);

                    var option = document.createElement("option");
                    option.text=item['city_name'];
                    option.value=item['city_name'];
                    var select = document.getElementById("Y");
                    select.appendChild(option);
                  });
            },

      error: function(result)
    {
      console.log(result)
      }
    });

          });



$("#project_d").on("change",function(){

    var x1_values = $("#project_d").find(":selected").val();
  
    $.ajax({
        url:'ajax1.php',
        type: 'POST',
        //dataType:'JSON',
        data:{city_code1:x1_values},
        success: function (result) {
        
          result = JSON.parse(result);

          //Empty option on change
        var select = document.getElementById("address_d");
        var length = select.options.length;

                   for ( i = length-1; i >=0; i--) {
                        select.options[i]=null;
                      }
                      //end

                  result.forEach(function(item,index) {

                    //console.log(item[2]);

                    var option = document.createElement("option");
                    option.text=item['city_name1'];
                    option.value=item['city_name1'];
                    var select = document.getElementById("address_d");
                    select.appendChild(option);
                  });
            },

      error: function(result)
    {
      console.log(result)
      }
    });

          });



















</script>  
