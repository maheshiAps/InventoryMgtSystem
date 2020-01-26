<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <h2>Academic Staff Managements</h2>
                    <div class="form-group row">
                      <div class="col-4">
<?php  
    $vid=$_GET['id'];
    include ('dbcon.php');
    $request=mysqli_query($con,"SELECT * FROM academic WHERE Username ='$vid'");
   
    

 
    ?>
                      <a href="LectureViews.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                      </div>
                      <div class="col-4"></div>
                      <div class="col-4"><a href="EmpEdit.php?id=<?php echo $vid; ?>" class="btn btn-success btn-sm fa fa-edit">Edit</a></div>

                 </div>
                   </div>
                <div class="card">
 
                  <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table id= "myTable" class="table table-responsive-sm table-striped">
              <thead class="table-dark">
                  <tr  >
                    <th colspan="2"> Details:</th>
                    
                  </tr>
                </thead>
                <tbody>

<?php 

  while($row=mysqli_fetch_array($request)){
        $fnm=$row['FullName'];
        $prf=$row['Profession'];
        $username=$row['Username'];
        $work=$row['Work'];
       
        
        $roleid=$row['Role'];
          $f3=mysqli_query($con,"SELECT * FROM role WHERE Id='$roleid'");
        while($r=mysqli_fetch_array($f3)){
          $rolenm=$r['RoleName'];
        }
        $regno=$row['RegNo'];
        $regdate=$row['RegDate'];
        $quli=$row['Qualification'];
       
        
?>
                  <tr>
                    <td>Full Name : </td>
                    <td><?php echo $prf.$fnm ; ?></td>
                  
                  </tr>
                  <tr>
                    <td>Emp Code: </td>
                    <td><?php echo $username; ?></td>
                  
                  </tr>
                  
                  <tr>
                    <td>Role : </td>
                    <td><?php echo $rolenm; ?></td>
                  
                  </tr>
                  
                  <tr>
                    <td>Work : </td>
                    <?php if($work=='1'){
                      echo '<td>Full Time</td>';
                     }else{
                      echo '<td>Part Time</td>';
                     }?>
                   
                  
                  </tr>
                  <tr>
                    <td>Registered Date : </td>
                    <td><?php echo $regdate; ?></td>
                  
                  </tr>


                </tbody>
                <thead class="table-dark">
                  <tr  >
                    <th colspan="2">Qulification Details</th>
                    
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td>Details : </td>
                    <td><?php echo $quli; ?></td>
                  
                  </tr>
                  
                  </tbody>
                
               
                
                <?php                 
}
?>
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
<?php include 'footer.php'; ?>  
  </body>
</html>
