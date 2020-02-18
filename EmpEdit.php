<?php include 'header.php'; ?>
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                 <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h2>Lecture Management</h2>
                    <a href="LectureViews.php" class="btn btn-danger btn-sm fa fa-eye">Views</a>
                     
                  </div>


<?php include 'dbcon.php';
    $vid=$_GET['id'];
    
    $request=mysqli_query($con,"SELECT * FROM academic WHERE Username ='$vid'");
   
  

  while($row=mysqli_fetch_array($request)){
        $fnm=$row['FullName'];
        $empcode=$row['Username'];
       
        $prf=$row['Profession'];
        $work=$row['Work'];
        
       
        $regno=$row['RegNo'];
        $quli=$row['Qualification'];
        
        $roleid=$row['Role'];
        $f3=mysqli_query($con,"SELECT * FROM role WHERE Id='$roleid'");
        while($r=mysqli_fetch_array($f3)){
          $rolenm=$r['RoleName'];
        }
      }
          ?>




                  <div class="card-body">
                    <form class="form-horizontal needs-validation" novalidate method="post" action="" id="reg">
                      <h4>PERSON ASSETS DETAILS :-</h4>
                      <div class="form-group row">
                        <div class="col-4">
                         <lable>Professional :</lable>
                          <select class="form-control" id="prf" size="" name="prf" required value="">
                            
                            <option value="<?php echo $prf;?>"><?php echo $prf; ?></option>
                            <option value="pofe.">Prof.</option>
                            <option value="doc.">Doc.</option>
                            <option value="mr.">Mr.</option>
                            <option value="mrs.">Mrs.</option>
                            <option value="ms.">Ms.</option>
                           
                          </select>
                      </div>
                      <div class="col-4">
                          <lable>Full Name :
                          <input class="form-control" type="text" placeholder="" name="fnm" id="fname" required value="<?php echo $fnm; ?>">
                          <div class="valid-feedback">Valid</div>
                          <div class="invalid-feedback">Invalid</div>
                          <span id="txtFname"></span>
                        </div>
                          
                        
                        <div class="col-4">
                           <lable>Reg No :
                          <input class="form-control" type="text"  name="regno" id="regno" required value="<?php echo $regno; ?>">
                          
                          
                        </div>
                         <div class="col-4">
                         <lable>Role :</lable>
                          <select class="form-control" id="role" name="role" size="" >
                            

<?php 
          $query1=mysqli_query($con,"SELECT * FROM role WHERE Id='$roleid' ");
          while($row=mysqli_fetch_array($query1)){
            $id=$row['Id'];
            $rolenm=$row['RoleName'];
            echo '<option value="'.$id.'">'.$rolenm.'</option>';

}


           ?>                         
<?php 
          $query1=mysqli_query($con,"SELECT * FROM role ");
          while($row=mysqli_fetch_array($query1)){
            $id=$row['Id'];
            $rolenm=$row['RoleName'];
            echo '<option value="'.$id.'">'.$rolenm.'</option>';

}


           ?>
                            
                           
                          </select>
                      </div>
                       <div class="col-4">
                         <lable>Work :</lable>
                          <select class="form-control" id="work" name="work">
                            
                            <?php if($work=='1'){
                      echo '<option value="1">Full Time</option>';
                     }else{
                      echo '<option value="2">Part Time</option>';
                     }?>
                   
                            
                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>

                            
                           
                          </select>
                      </div>
                       <div class="col-4">
                           <lable>Qualifications :
                        <textarea name="quli" clos="5" rows="10" class="form-control" value=""><?php echo $quli; ?></textarea>
                          
                          
                        </div>
                      </div>

           

          <h4>OFFICIAL DETAILS :-</h4>
                      <div class="form-group row">
                        
                        
                        
                    <div class="col-4">
                          <lable>User Name :
                          <input class="form-control" name="uname" id="uname" value="<?php echo $empcode; ?>" type="text" maxlength="20" value="" required readonly>
                        </div>

                     
                        <div class="col-3">
                          <lable>Password :
                          <input class="form-control" type="password" id="pw" name="pw" required >
                          <span id="txtPw"></span>

                        </div>
                        <div class="col-3">
                          <lable>Confirm :
                          <input class="form-control" type="password" id="repw" name="repw" required >
                          <span id="txtRepw"></span>
                        </div>
                  </div>
                      <div class="form-actions">
                        
                        <button class="btn btn-warning btn-sm" name="submit" type="submit">Update</button>
                        <button class="btn btn-danger btn-sm"  name="Reset" type="Reset">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div> 
                </div>
             
                
              </div>
              
            </div>

<?php 
      if(isset($_POST['submit'])){
        include('dbcon.php');
        $prf=$_POST['prf'];
        $fnm=$_POST['fnm'];
      

        $regno=$_POST['regno'];
        $role=$_POST['role'];
        $quli=$_POST['quli'];
        $uname=$_POST['uname'];
        $work=$_POST['work'];
       
        $password=$_POST['pw'];
        $key='FNDN@@!#3442EININCxewfqfNISNNCEjdnfjdsFEFFEFSAEd2121121';//unique key
        $enp=hash('SHA256',$password.$key);
      
        
        $insert=mysqli_query($con,"UPDATE academic SET FullName='$fnm',Profession='$prf',RegNo='$regno',Role='$role',Qualification='$quli',Password='$enp', Work='$work' WHERE Username='$vid'");//database connection opened
         echo "<script>alert('Recode Updated successfully');
                      window.location.href='LectureViews.php';

                      </script>";
       
      if(!$insert){
          echo 'Data updation Failed'.mysqli_error();
          
        }
      mysqli_close($con);//database connection closed but automatically closed by mysqli  
      }
     ?> 




          
          </div>
        </div>
      </main>
     
    </div>
<?php include 'footer.php'; ?> 
<script src=".js/validate.js"></script>
<script>
    (function()
    {
      'use strict';
      window.addEventListener('load',function(){
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms,function(form){
          form.addEventListener('submit',function(event){
            if(form.checkValidity() === false){
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },false);
        });
      },false);
    })();
  </script> 
 
  </body>
</html>
