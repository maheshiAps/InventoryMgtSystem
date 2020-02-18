<?php include 'header.php'; ?> 
       <div class="container-fluid">
          <div class="animated fadeIn">
          
            <div class="card">
              <div class="card-body">
                <div class="row">
                   <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    
                     <h2> Chemical Management</h2>
                     <a href="chemicaladdviews.php" class="btn btn-danger fa fa-eye btn-sm">views</a>
                  </div>


<?php include 'dbcon.php';

  
$select=mysqli_query($con,"SELECT * FROM chemical");
while($row2=mysqli_fetch_array($select)){
  $id=$row2['Id'];
  $id++;
 }


   
 ?> 
                  <div class="card-body">
                    

      
                        
<form action="" method="post" id="user_form">
 
        <div class="tab-content" id="myTab1Content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="form-contorl row">
                      <div class="col-3">
                          
                          <input class="form-control" type="text" placeholder="" name="apcode" id="apcode" readonly value="<?php echo 'Next Id: '.$id++ ;?>" >
                         
                      </div>
                     <!--   <div class="col-3">
                          
                         <h5><label for="dpt">Department</label></h5> 
                            <select class="form-control" id="dpt" name="dpt" size="" value="">
                            <option value="">Select Dept</option>
                            <option value="pst">PST</option>
                            <option value="fst">FST</option>

                          </select>
                         
                      </div> -->
                    <!--   <div class="col-3">
                          
                          <h5><label for="btch">Batch No</label></h5>
                            <select class="form-control" id="btch" name="btch" size="" value="">
                            <option value="">Select Batch</option>
                            <option value="13">2013/14</option>
                            <option value="14">2014/15</option>
                            <option value="15">2015/16</option>
                            <option value="16">2016/17</option>

                          </select>
                         
                      </div> -->


                     </div>  


                        
  <h4>CHEMICAL ADDING :-</h4>
  <button type="button" name="add" id="add" class="btn btn-dark fa fa-plus btn-xs">Add Chemical</button>
                  <br><br>
                     
                      <div class="table-resposive">
                        <table class="table table-striped table bordered" id="user_data">
                          <tr>
                            
                            
                            <th>Chem Name</th>
                            <th>Type</th>
                            <th>Qty</th>
                            <th></th>
                            <th></th>
                            
                          </tr>
                        </table>
                        <div align="center">
                          <input type="submit" name="insert" id="insert" class="btn btn-primary" value="insert">
                        </div>
                       
                      </div>
                       

</form> 
                       <div id="user_dialog" title="Add Data">
                         
                         
                           <div class="form_group" >
                            <label for="chem">Chem Name</label>
                            <select class="form-control" id="chem" name="chem" size="" value="">
                              <option value="">Select Chemical</option>
<!-- //including database connection   -->                          
<?php 
          $query1=mysqli_query($con,"SELECT * FROM chemlist ");
          while($row=mysqli_fetch_array($query1)){
            $id=$row['Id'];
            $chemnm=$row['ChemName'];
            echo '<option value="'.$id.'">'.$chemnm.'</option>';

}


           ?>
                            </select>
                             <span id="error_chem" class="text-danger"></span>
                             
                          </div>
                          <div class="form_group" >
                            <label for="astype">Assets Type</label>
                            <select class="form-control" id="astype" name="astype" size="" value="">
                            <option value="">Select Type</option>
                            <option value="low">Low Qaulity</option>
                            <option value="high">Hight Quality</option>

                          </select>
                            
                             <span id="error_astype" class="text-danger"></span>
                          </div>
                         
                          <div class="form_group">
                            <label for="qty">Valume/Qty</label>
                            <input type="text" class="form-control" name="qty"  id="qty">
                            <span id="error_qty" calss="text_danger"></span>
                            <span id="qty_chem" class="text-danger"></span>
                          </div>
                        
                          <div class="form-group" align="center">
                           <br>
                            <input type="hidden" name="row_id" id="hidden_row_id">
                            <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                          </div>

                      </div>
                      <div id="action_alert" title="Action">

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
<?php include 'footer.php'; 
include 'scripts.php'; ?> 

<script>
  $(document).ready(function(){
    $('#user_dialog').dialog({
      autoOpen:false,
      width:500
    });
    $('#add').click(function(){
      $('#user_dialog').dialog('option','title','Add Asset');
      // $('#fac').val('');
      // $('#dpt').val('');
      // $('#loctype').val('');
      $('#chem').val('');
      $('#astype').val('');
      // $('#assestnm').val('');
      $('#qty').val('');
      // $('#price').val('');
      $('#error_qty').text('');
      // $('#error_price').text('');
      $('#error_chem').text('');
      // $('#error_dpt').text('');
      // $('#error_loctype').text('');
      // $('#error_loc').text('');
      $('#error_astype').text('');
      // $('#error_assestnm').text('');
      // $('#fac').css('border-color','');
      // $('#dpt').css('border-color','');
      // $('#sp').css('border-color','');
      $('#save').text('Save');

      $('#user_dialog').dialog('open');

    });
    $('#save').click(function(){

      var chem='';
      // var dpt='';
      // var loctype='';
      // var loc='';
      var astype='';
      // var assestnm='';
      var qty='';
      // var price='';
      // var error_fac='';
      // var error_dpt='';
      var error_chem='';
      var error_astype='';
      var error_qty='';
      var error_qty='';
      var error_price='';
      if(!$('#chem').val()){
        error_chem='Chemical name required';
        $('#error_chem').text(error_chem);
        $('#chem').css('border-color','#cc0000');
        chem='';
      }else{
          error_chem='';
           $('#error_chem').text(error_chem);
           $('#chem').css('border-color','');
           chem=$('#chem').val();
      }
      //  if(!$('#dpt').val()){
      //   error_dpt='Department required';
      //   $('#error_dpt').text(error_dpt);
      //   $('#dpt').css('border-color','#cc0000');
      //   dpt='';
      // }else{
      //     error_dpt='';
      //      $('#error_dpt').text(error_dpt);
      //      $('#dpt').css('border-color','');
      //      dpt=$('#dpt').val();
      // }
      //  if(!$('#loctype').val()){
      //   error_loctype='Location Type required';
      //   $('#error_loctype').text(error_loctype);
      //   $('#loctype').css('border-color','#cc0000');
      //   loctype='';
      // }else{
      //     error_loctype='';
      //      $('#error_loctype').text(error_loctype);
      //      $('#loctype').css('border-color','');
      //      loctype=$('#loctype').val();
      // }
      //   if(!$('#loc').val()){
      //   error_loc='Location  required';
      //   $('#error_loc').text(error_loc);
      //   $('#loe').css('border-color','#cc0000');
      //   loc='';
      // }else{
      //     error_loc='';
      //      $('#error_loc').text(error_loc);
      //      $('#loc').css('border-color','');
      //      loc=$('#loc').val();
      // }
     
       if(!$('#astype').val()){
        error_astype='Assest Type required';
        $('#error_astype').text(error_astype);
        $('#astype').css('border-color','#cc0000');
        astype='';
      }else{
          error_astype='';
           $('#error_astype').text(error_astype);
           $('#astype').css('border-color','');
           astype=$('#astype').val();
      }
      //  if(!$('#assestnm').val()){
      //   error_assestnm='Assest required';
      //   $('#error_spassestnm').text(error_assestnm);
      //   $('#assestnm').css('border-color','#cc0000');
      //   assestnm='';
      // }else{
      //     error_assestnm='';
      //      $('#error_assestnm').text(error_assestnm);
      //      $('#assestnm').css('border-color','');
      //      assestnm=$('#assestnm').val();
      // }

       if($('#qty').val()==""){
        error_qty='qty required';
        $('#error_qty').text(error_qty);
        $('#qty').css('border-color','#cc0000');
        qty='';
      }else{
          error_qty='';
           $('#error_qty').text(error_qty);
           $('#qty').css('border-color','');
           qty=$('#qty').val();
      }
      //  if($('#price').val()==""){
      //   error_price='price required';
      //   $('#error_price').text(error_price);
      //   $('#price').css('border-color','#cc0000');
      //   price='';
      // }else{
      //     error_price='';
      //      $('#error_price').text(error_price);
      //      $('#price').css('border-color','');
      //      price=$('#price').val();
      //      unit=price*qty;
           
      // }
           if(error_price!='' || error_qty!='' || error_assestnm!='' || error_astype!='' ||  error_fac!='' ||  error_dpt!=''||  error_loc!='' ||  error_loctype!=''){
        return false;
      }else{
        if($('#save').text()=='Save'){
          // alert($('#save').text());
          

          var count=count+1;
        
          var output='<tr id="row_'+count+'">';

          output+='<td>'+chem+'<input type="hidden" name="hidden_chem[]" id="chem'+count+'" value="'+chem+'"> </td>';
          //  output+='<td>'+dpt+'<input type="hidden" name="hidden_dpt[]" id="dpt'+count+'" value="'+dpt+'"> </td>';
          // output+='<td>'+loctype+'<input type="hidden" name="hidden_loctype[]" id="loctype'+count+'" value="'+loctype+'"> </td>';
          // output+='<td>'+loc+'<input type="hidden" name="hidden_loc[]" id="loc'+count+'" value="'+loc+'"> </td>';
          output+='<td>'+astype+'<input type="hidden" name="hidden_astype[]" id="astype'+count+'" class="astype" value="'+astype+'"> </td>';
          // output+='<td>'+assestnm+'<input type="hidden" name="hidden_assestnm[]" id="assestnm'+count+'" value="'+assestnm+'"> </td>';
          output+='<td>'+qty+'<input type="hidden" name="hidden_qty[]" id="qty'+count+'" value="'+qty+'"> </td>';
          // output+='<td>'+unit+'<input type="hidden" name="hidden_price[]" id="price'+count+'" value="'+unit+'"> </td>';
       
          output+='<td><button type="button" name="view_details" class="btn btn-warning btn-xs fa fa-eye view_details" id="'+count+'" > </button></td>';
          output+='<td><button type="button" name="remove_details" class="btn btn-danger btn-xs fa fa-trash remove_details" id="'+count+'" > </button></td>';

          output += '</tr>';
                   
         
          $('#user_data').append(output);

        }
        else{
          var row_id=$('#hidden_row_id').val();
          output+='<td>'+chem+'<input type="hidden" name="hidden_chem[]" id="chem'+row_id+'" value="'+chem+'"> </td>';
           output+='<td>'+astype+'<input type="hidden" name="hidden_astype[]" id="astype'+row_id+'" value="'+astype+'"> </td>';
          
          output+='<td>'+qty+'<input type="hidden" name="hidden_qty[]" id="qty'+row_id+'" value="'+qty+'"> </td>';
          // output+='<td>'+price+'<input type="hidden" name="hidden_price[]" id="price'+row_id+'" value="'+price+'"> </td>';
          output+='<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'" > View</button></td>';
          output+='<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'" > Remove</button></td>';
          $('#row_'+row_id+'').html(output);
        }
        $('#user_dialog').dialog('close');
      }


    });
    $(document).on('click', '.view_details', function(){
        var row_id = $(this).attr("id");
        var astype = $('#astype'+row_id+'').val();
        // var assestnm = $('#assestnm'+row_id+'').val();
        // var loctype = $('#loctype'+row_id+'').val();
        // var loc = $('#loc'+row_id+'').val();
        // var fac = $('#fac'+row_id+'').val();
        var chem = $('#chem'+row_id+'').val();
        // var price = $('#price'+row_id+'').val();
        var qty = $('#qty'+row_id+'').val();
        $('#astype').val(astype);
        // $('#assestnm').val(assestnm);
        // $('#loctype').val(loctype);
        // $('#loc').val(loc);
        $('#chem').val(chem);
        // $('#dpt').val(dpt);
        $('#qty').val(qty);
        // $('#price').val(price);
        $('#save').text('Edit');
        $('#hidden_row_id').val(row_id);
        $('#user_dialog').dialog('option', 'title', 'Edit Data');
        $('#user_dialog').dialog('open');
    });

    $(document).on('click', '.remove_details', function(){
        var row_id = $(this).attr("id");
        if(confirm("Are you sure you want to remove this row data?"))
        {
            $('#row_'+row_id+'').remove();
        }
        else
        {
            return false;
        }
    });

    $('#action_alert').dialog({
        autoOpen:false
    });

    $('#user_form').on('submit', function(event){
        event.preventDefault();
        var count_data = 0;
        $('#chem').each(function(){
            count_data = count_data + 1;
        });
        if(count_data > 0)
        {
            var form_data = $(this).serialize();
            $.ajax({
                url:"addcheminsert.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    $('#user_data').find("tr:gt(0)").remove();
                    $('#action_alert').html('<p>Data Request Successfully</p>');
                    $('#action_alert').dialog('open');
                }
            })
        }
        else
        {
            $('#action_alert').html('<p>Please Add atleast one data</p>');
            $('#action_alert').dialog('open');
        }
    });

  });
</script>
 <script>
    
    $(document).ready(function(){
      // $('#spptype').change(function(){
      //   var stype1=$(this).val(); //$(#utype).val()
      //   $.ajax({
      //     type:"POST",
      //     url:"ss.php",//path.filename
      //     data:{id:stype1},//assign utype into id-id:ut2, id2:ut3
      //     cache:false,
      //     success:function(rdata){ //return data
      //       $('#spnm').html(rdata);
      //     }
      //   });
      // });
        $('#chem').change(function(){
        var stype1=$(this).val(); //$(#utype).val()
        $.ajax({
          type:"POST",
          url:"checkchemqty.php",//path.filename
          data:{id:stype1},//assign utype into id-id:ut2, id2:ut3
          dataType:"json",
          // cache:false,
          success:function(data){ //return data
          
            $('#qty_chem').text('Avaliable Qty : '+data[0]["qty"]);
            $('#qty_chem').addClass('bg-warning');
          }
        });
      });
    });
  </script>
  </body>
</html>
