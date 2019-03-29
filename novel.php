
<!--Novel section-->
    
    <form method="post" id="novelCheckInOut">
      <div class="modal fade" id="novel" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Novel Book Section:
              </h4>
          </div>
          <div class="modal-body">
              
              <!--Novel message-->
              <div id="novelmessage"></div>
              
            <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr class="success">
                                <th>Books Name</th>
                                <th>Author Name</th>
                                <th>Total No. of Books</th>
                                <th>No. of Available Books</th>
                                <th>Check In and Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            
                            //query for list of books corresponding to user_id
                            $sql = "SELECT * FROM novel ORDER BY bookname ASC";
                            $result = mysqli_query($link, $sql);
                            if(!$result){
                                echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
                                exit;
                            }
                            
                            if($result){
    
                                if(@mysqli_num_rows($result) > 0){
                                    
                                    $divId = 0;
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
                                    //storing variable
                                    $bookname = $row["bookname"];
                                    $authorname = $row["authorname"];
                                    $total = $row["totalbooks"];
                                    $available = $row["availablebook"];
        
                                    echo "
                                        <tr style='text-align: center'>
                                        <td>$bookname</td>
                                        <td>$authorname</td>
                                        <td>$total</td>
                                        <td>$available</td>
                                        <td>
                                        <div>
                                        <label for='novelcheck'>
                                        <input type='radio' name='novelcheck$divId' value='Issue'>
                                        Issue</label>
                                        </div>
                                        <div>
                                        <label for='novelcheck'>
                                        <input type='radio' name='novelcheck$divId' value='Return' >
                                        Return</label>
                                        </div>
                                        </td>
                                        </tr>";
                                    $divId = $divId + 1;
                                }
                                }
                                else{
                                    echo "<div class='alert alert-warning'><strong>No Book Currently Available, Please try again later.</strong></div>";
                                }
                            }
                            else{
                                echo "<div class='alert alert-warning><strong>An Error occured.></strong></div>";
                                exit;
                            }
                            
                            ?>
                            
                        </tbody>
                    </table>
                </div>
             
              
          <div class="modal-footer">
              <input class="btn green" name="submit" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>
    </form>