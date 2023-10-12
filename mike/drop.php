<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
include("../connect.php");

echo '
   <form action = "" method = "POST">
       <div class="form-group" >
                         <label>Region of Coverage:</label>
                               <select class="form-control cbo" name="X" id="X"  data-placeholder="" style= "height:45px;width:60%" > ;      
                                                           
                                                           ';
echo '<option>Select Region:</option> ';
$resultrg = mysqli_query($link, "SELECT * FROM region");
while ($rowrg = mysqli_fetch_array($resultrg)) {
    echo '<option  value="' . $rowrg[3] . '">' . $rowrg[2] . ' </option> ';
}
echo '          
                                                           </select> 
                                                           </div>

  <select class="form-control cbo" name="Y" id="Y"   data-placeholder="" style= "height:45px;width:60%" > ;      
</form>

                                                           ';

?>

<script language="JavaScript">
    $("#X").on("change", function() {
        var x_value = $("#X").val();
        $.ajax({
            url: 'ajax.php',
            data: {
                brand: x_value
            },
            type: 'POST',
            success: function(resp) {
                $("#Y").html(resp);
            },
            error: function(resp) {}
        });
    });
</script>