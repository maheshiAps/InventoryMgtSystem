<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">

<?php  

    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM academic WHERE status ='1'");

     
    ?>
    <div class="card-header">
                    <div class="form-group row">
                      <div class="col-6">
                        <h2>Academic Staff Management</h2>
                    <a href="lectureAdd.php" class="btn btn-danger btn-sm fa fa-plus">New</a></div>
                 
                 </div>   
                </div> 
                <div class="card">
                  
                  <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                    <table  id ="myTable"class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th>Person Name</th>
                    
                    <th>RegNo</th>
                    <th>Role</th>
                    <th>Work</th>
                    <th>Username</th>
                   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php 

  while($row=mysqli_fetch_array($request)){
        $fnm=$row['FullName'];
        $empcode=$row['Username'];
        
        $prf=$row['Profession'];
       
        $regno=$row['RegNo'];
        $work=$row['Work'];
        
        $roleid=$row['Role'];
        $f3=mysqli_query($con,"SELECT * FROM role WHERE Id='$roleid'");
        while($r=mysqli_fetch_array($f3)){
          $rolenm=$r['RoleName'];
        }
       
       
        ?>
                  <tr>

                    <td><?php echo $prf.$fnm; ?></td>
                   
                    <td><?php echo $regno; ?></td>
                    <td><?php echo $rolenm; ?></td>
                    <?php if($work=='1'){
                      echo '<td>Full Time</td>';
                     }else{
                      echo '<td>Part Time</td>';
                     }?>
                    
                    <td><?php echo $empcode; ?></td>
                    
                    <td><a href="LectureView.php?id=<?php echo $empcode; ?>" class="btn btn-success btn-sm fa fa-eye">View</a></td>
                    
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
