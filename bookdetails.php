
<!--Book Details-->

<div class="modal fade" id="bookdetails" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 id="myModalLabel">
                Book Details :
              </h4>
          </div>
          <div class="modal-body">
              
        <!--Book details message-->
        <div id = "bookmessage"></div>
        
        <div class="table-reponsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <thead>
                            <tr class="success">
                                <th>S. No.</th>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>Category</th>
                                <th>Total Books</th>
                                <th>Available Books</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            
                            //query for list of books
                            $sql = "SELECT * FROM booklist ORDER BY category ASC";
                            $result = mysqli_query($link, $sql);
                            if(!$result){
                                echo "<div class='alert alert-danger'>Error running in query.Please try again later!</div>";
                                exit;
                            }
                            
                            if($result){
    
                                if(@mysqli_num_rows($result) > 0){
                                    $sno = 0;
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
                                    //storing variable
                                    $book_id = $row["book_id"];
                                    $bookname = $row["bookname"];
                                    $authorname = $row["authorname"];
                                    $cat = $row["category"];
                                    $category = ucfirst($cat);
                                    $totalbooks = $row["totalbooks"];
                                    $availablebooks = $row["availablebooks"];
                                    $sno = $sno + 1;
        
                                    echo "
                                        <tr style='text-align: center'>
                                        <td>$sno</td>
                                        <td>$book_id</td>
                                        <td>$bookname</td>
                                        <td>$authorname</td>
                                        <td>$category</td>
                                        <td>$totalbooks</td>
                                        <td>$availablebooks</td>
                                        </tr>";
                                }
                                }
                                else{
                                    echo "<div class='alert alert-warning'><strong>No Books currently available in Library!</strong></div>";
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
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancel
            </button>
          </div>
      </div>
  </div>
  </div>
  </div>