<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">

<?php  

    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM chemissue ");

     
    ?>
    <div class="card-header">
                    <div class="form-group row">
                      <div class="col-6">
                        <h2>Chemical Issue Management</h2>
                    <a href="issuechemical.php" class="btn btn-danger btn-sm fa fa-plus">New</a></div>
                 
                 </div>   
                </div> 
                <div class="card">
                  
                  <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                    <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th>Chem Name</th>
                    
                    <th>Qty</th>
                    <th>Department</th>
                    <th>Batch</th>
                    <th>Username</th>
                   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php 

  while($row=mysqli_fetch_array($request)){
        $chemid=$row['ChemName'];
        $qty=$row['Qty'];

        
        $emp=$row['Emp'];
       
        $dpt=$row['Dpt'];
        $batch=$row['Batch'];
        
       
        $f3=mysqli_query($con,"SELECT * FROM chemlist WHERE Id='$chemid'");
        while($r=mysqli_fetch_array($f3)){
          $chemnm=$r['ChemName'];
          $chemtypeid=$r['ChemType'];
        }
         
        
        $f2=mysqli_query($con,"SELECT * FROM chemtype WHERE Id='$chemtypeid'");
        while($r=mysqli_fetch_array($f2)){
          $unit=$r['Unit'];
        
        }
        ?>
                  <tr>

                    <td><?php echo $chemnm; ?></td>
                   
                    <td><?php echo $qty.$unit; ?></td>
                    <td><?php echo $dpt; ?></td>
                    
                    <td><?php echo '20'.$batch; ?></td>
                    <td><?php echo $emp; ?></td>
                    
                    <td><a href="issueview.php?id=<?php echo $empcode; ?>" class="btn btn-success btn-sm fa fa-eye">View</a></td>
                    
                  </tr>
        <?php } ?>
                </tbody>
          </table>
                       </div>
                      </div>
                </div>
                <!-- /.row-->
                
              </div>
              
            </div>
            <!-- /.card-->
           
            <!-- /.row-->
           
            <!-- /.row-->
          </div>
        </div>
      </main>
     
    </div>
<?php
 include 'footer.php'; 
 include 'scripts.php'; 
?>  
 <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
   
    } );
  </script>
  </body>
</html>
