

<?php 
include("connect.php");

    session_start();

$appnum1 = $_SESSION['appnum2'];
$appnum3 = $_SESSION['appko'];


if(isset($_POST['Back1']))
{
     header("location:short.php");
}

?>


<html>
<head>
	<title></title>


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

<?php


$view="Applicant Shortlist Details (".$appnum3.")";
echo '

<div class = "how2"><div class = "">
            <form action = "" method = "POST">
            <button class="button btn-success" Name ="Back1" style="float:right;width:150px;height:40px"><span>BACK</span></button>
             </form>

    <center>


          <h2><font color="black">' .$view. ' </font> </h2>

                            <table id="example1" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th> List of Project </th>
                                            </tr>   
                                        </thead>

                                        <tbody> 
                            ';

                            $resulty = mysql_query("SELECT * FROM shortlist_master WHERE  appnumto = '$appnum1'");
                            while($rowy=mysql_fetch_row($resulty))
                            {  

                                                    echo ' <tr> ';
                                                    echo '  <td>  '.$rowy[1].'   </td> ';
                                                    echo' </tr> ';
                            }
                            '

                                 </tbody>
                                    </table> 




    </center>      
        

</div>
</div>


';
?>



</body>
</html>
<script>



$(document).ready(function() {
    $('#example1').DataTable();
} );
</script>