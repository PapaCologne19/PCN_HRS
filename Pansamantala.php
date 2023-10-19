<!-- Modal HTML -->
<div id="myModalmrf" class="modal fade">
    <!--<div class="howx">-->
    <div class="modal-dialog  modal-xl">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Report</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>


        <div class="modal-body">
          <center class="how2">
            <h3 class="fs-2">Summary Report</h3>
            <hr>
            <table id="e99" class="table table-sm align-middle mb-0 border border-info border-start-0 border-end-0 rounded-end" style="width:100%; font-size: 14px !important;">
              <thead>
                <tr>
                  <th> FILLED BY </th>
                  <th> LOCATION </th>
                  <th> POSITION </th>
                  <th> NEEDED </thh>
                  <th> PROVIDED </th>
                  <th> RECEIVED BY: </th>
                </tr>
              </thead>
              <tbody>

                <?php

                $result = mysqli_query($link, "SELECT * FROM mrf");
                while ($row = mysqli_fetch_row($result)) {
                  $uid1 = $row[47];
                  $totalneed = $row[12] + $row[13];
                  $totalprovided = $row[43] + $row[44];


                  // $result_uid = mysqli_query($link, "SELECT * FROM book1 where idnya='$uid1'");
                  // while ($row_uid = mysqli_fetch_assoc($result_uid)) {
                  $fullname = $row[41];

                  if ($row[46] == "YES") {

                    echo ' <tr> ';
                    echo '  <td>  ' . $row[41] . '   </td> ';
                    echo '  <td>  ' . $row[42] . '   </td> ';
                    echo '  <td>  ' . $row[10] . '   </td> ';
                    echo '  <td style=" text-align: center;">  ' . $totalneed . '   </td> ';
                    echo '  <td style=" text-align: center;">  ' . $totalprovided . '   </td> ';

                    echo ' <td> <form action = "" method = "POST">
                                                <input type = "hidden" name = "mrf_val" value = "' . $row[0] . '">
                                                       <button type="submit" name = "r_mrf" class="btn btn-default"><span class="glyphicon glyphicon-edit" ></span> Provide Shortlist</button>
                                                </form>
                                            </td>
                                   </tr> ';
                  } else {
                    echo ' <tr> ';
                    echo '  <td>  ' . $fullname . '   </td> ';
                    echo '  <td>  ' . $row[42] . '   </td> ';
                    echo '  <td>  ' . $row[10] . '   </td> ';
                    echo '  <td style=" text-align: center;">  ' . $totalneed . '   </td> ';
                    echo '  <td style=" text-align: center;">  ' . $totalprovided . '   </td> ';
                    echo '
                                           <td> <form action = "" method = "POST">
                                                <input type = "hidden" name = "mrf_val" value = "' . $row[0] . '">
                                                       <button type="submit" name = "r_mrf" class="btn btn-default"><span class="glyphicon glyphicon-edit" ></span> Accept MRF</button>
                                                </form>
                                            </td>
                                   </tr> ';
                  }
                }
                //} 
                ?>



              </tbody>
            </table>
          </center>
        </div>

        <div class="modal-footer">
          <form action="" method="POST">
            <button class="btn btn-primary" Name="cancel"><span>OK</span></button>

          </form>
          <!--  <a href="https://www.facebook.com/sosy.tindera" class="fa fa-facebook"></a>
                                              <input type="submit" Value =  "Next" class="btn btn-success" id="submit">
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                    <input type="submit" value = "dd" name ="location_to" class="btn btn-primary"  >
                                      -->
          </form>
        </div>

      </div>
    </div>
    <!-- </div> -->
  </div>
