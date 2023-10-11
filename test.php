<?php 
include("connect.php");
    session_start();

if(isset($_POST['next']))
{
  $source1 = $_POST['source2'];
echo $source1;
}
echo '
 <form action = "" method = "POST">
    							 <div class="form-group">
                                                      <label>Source :</font></label>
                                                      <select class="form-control cbo" name="source2"  data-placeholder="Select Source" style= "height:45px;width:250px" > ;      
                                                           
                                                           ';
                                                           echo '<option>Select Source</option>';
                                                          $results =mysql_query("SELECT * FROM sources");
                                                                        while($rows=mysql_fetch_array($results))
                                                                    {
                                                                       echo '<option value="'.$rows[1].'">'.$rows[1].'</option>';
                                                                     }
                                                                  echo '          
                                                           </select>
                                                    </div>
  
                        <input type = "submit" name = "next" value = "Save" class="btn btn-info btn-lg" style = "height:50px;width:80%;">
                 </form>               
';
