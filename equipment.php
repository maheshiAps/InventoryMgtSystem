<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    
                     <h2> Equipment Management</h2>
                      <a href="chemicalViews.php" class="btn btn-danger fa fa-eye">Views</a></div>
                      <a href=""></a>

                  </div>


<?php
 include 'dbcon.php';

 ?> 
                  <div class="card-body">
                    <form class="form-horizontal" action="" method="post">
                     
                      <div class="form-group row">
                        <div class="col-4" for="chemnm">
                          <lable>Equipment Name:
                          <input class="form-control" type="text" placeholder="" name="eqnm" required></lable>
                        
                        </div>
                         
                         <div class="col-3" for="stocklevel">
                          <lable>Min Stock:
                          <input class="form-control" type="text" placeholder="" name="stocklevel" required></lable>
                        
                        </div>

                          <div class="form-actions">
                        
                        <button class="btn btn-warning btn-sm" name="submit" type="submit">Submit</button>
                        <button class="btn btn-danger btn-sm"  name="cancel" type="reset">Cancel</button>
                        </div>

                         <?php 
      if(isset($_POST['submit'])){
      
        $eqnm=$_POST['eqnm'];
        
        $stocklevel=$_POST['stocklevel'];
        $insert=mysqli_query($con,"INSERT INTO equipementlist(EquipmentName,Minpoint) VALUES('$eqnm','$stocklevel')");//database connection opened
      //   echo "<script>alert('Cehimal added successfully');
      //   window.location.href='chemicalViews.php';

      // </script>";
      
      if(!$insert){
          echo 'Data Insertion Failed'.mysqli_error();
          
        }
      mysqli_close($con);//database connection closed but automatically closed by mysqli  
      }
     ?> 

 </form>  


                  </div>
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
