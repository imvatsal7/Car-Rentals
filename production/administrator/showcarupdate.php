<!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
 <?php
include("../../connection/config.php");


    if(isset($_POST["car_number"])){
    $car_number = $_POST["car_number"];
    
    $sql = "SELECT * from cars c, cartypes t, brand b where c.CarTypeID=t.CarTypeID and c.BrandID=b.BrandID and c.CarNumber = '$car_number' order by CarDateTime desc";
    $res = mysqli_query($mysqli,$sql) or die('Error, query failed');
      
    if($res->num_rows > 0)
    {
    $row = $res->fetch_assoc();
    ?>
 <div class="row">
      <!--personal info-->
            <div class="col-md-6">
            <div id="personalInfo" style="">
 <div class="form-group">
            <input type="text" name="carnumb" class="form-control" id="carnumb" value="<?php echo $row['CarNumber']?>" placeholder="Car" onkeypress="return RestrictSpace()" required="required">   
        </div>

     <div class="form-group">
       <select class="cartype form-control" style="width:100%" name="cartype" id="cartype" value="" required="required">
        <option value="<?php echo $row['CarTypeID']?>"><?php echo $row['CarType']?></option>
    </select>
   </div>

   <div class="form-group">
       <select class="brand form-control" style="width:100%" name="brand" id="brand"  required="required">
        <option value="<?php echo $row['BrandID']?>"><?php echo $row['Brand']?></option>
    </select>
   </div>

   <div class="form-group">
            <input type="text" name="car" class="form-control" id="car" value="<?php echo $row['CarName']?>" placeholder="Car" required="required">   
        </div>

        <div class="form-group">
            <input type="text" name="description" class="form-control" id="car" value="<?php echo $row['Description']?>" maxlength="40" placeholder="Description" required="required">   
        </div>

        <div class="form-group">
            <input type="number" name="price" class="form-control" id="price" value="<?php echo $row['Price']?>" step="any" data-bv-digits="true" placeholder="Price Per Hour" required="required">   
        </div>

        <div class="form-group">
       <select class="enginecapa form-control" style="width:100%" name="enginecapa" id="enginecapa" required="required">
        <option value="<?php echo $row['EngineCapacity']?>"><?php echo $row['EngineCapacity']?></option>
        <option value="Under 1.0">Under 1.0</option>
        <option value="1.1 to 2.0">1.1 to 2.0</option>
        <option value="2.1 to 3.0">2.1 to 3.0</option>
        <option value="Above 3.1">Above 3.0</option>
    </select>
   </div>

        <div class="form-group">
            <input type="text" name="model" class="form-control" id="model" value="<?php echo $row['Model']?>" placeholder="Model" required="required">   
        </div>

        <div class="form-group">
            <input type="text" name="color" class="form-control" id="color" value="<?php echo $row['Color']?>" placeholder="Color" required="required">   
        </div>

        <div class="form-group">
            <input type="text" name="manuyear" class="form-control" id="manuyear" value="<?php echo $row['YearOfManufac']?>" placeholder="Year Of Manufacture" required="required">   
        </div>

        <div class="form-group">
            <input type="file" name="file" class="form-control" id="file" placeholder="Upload file" required="required">   
        </div>
        </div>
      </div>

     <div class="col-md-6">
            <!--div id="personalInfo" style=""></div-->
      <div class="form-group">
       <select class="gastype form-control" style="width:100%" name="gastype" id="gastype" required="required">
        <option value="<?php echo $row['TypeOfGas']?>"><?php echo $row['TypeOfGas']?></option>
        <option value="LPG">LPG</option>
        <option value="Petrol">Petrol</option>
        <option value="Diesel">Diesel</option>
    </select>
   </div>
        <div class="form-group">
       <select class="mileage form-control" style="width:100%" name="mileage" id="mileage" required="required">
        <option value="<?php echo $row['Mileage']?>"><?php echo $row['Mileage']?></option>
        <option value="0 - 5000">0 - 5000</option>
        <option value="5000 - 10000">5000 - 10000</option>
        <option value="10000 - 20000">10000 - 20000</option>
    </select>
   </div>
   <div class="form-group">
            <input type="text" name="inspector" class="form-control" id="inspector" value="<?php echo $row['Inspector']?>" placeholder="Inspector" required="required">   
        </div>
        <div class="form-group">
            <input type="text" name="insuretype" class="form-control" id="insuretype" value="<?php echo $row['InsuranceType']?>" placeholder="Insurance Type" required="required">   
        </div>
        <div class="form-group">
            <input type="text" name="servdate" class="form-control" id="servdate" value="<?php echo $row['LastDateOfServ']?>" placeholder="Last Date Of Service" required="required" readonly="readonly">   
        </div>
        <div class="form-group">
            <input type="text" name="nextservdate" class="form-control" id="nextservdate" value="<?php echo $row['NextService']?>" placeholder="Next Service Due" required="required" readonly="readonly">   
        </div>
        <div class="form-group">
            <input type="text" name="kdefects" class="form-control" id="kdefects" value="<?php echo $row['KnownDefects']?>" placeholder="Known Defects" required="required"> 
        </div>
        <div class="form-group">
             <select class="aircon form-control" style="width:100%" name="aircon" id="aircon"  required="required">
        <option value="<?php echo $row['AirConditioning']?>"><?php echo $row['AirConditioning']?></option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select> 
    </div>
        <div class="form-group">
        <select class="heat form-control" style="width:100%" name="heat" id="heat" required="required">
        <option value="<?php echo $row['Heat']?>"><?php echo $row['Heat']?></option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select> 
    </div>
    <div class="form-group">
        <select class="transmission form-control" style="width:100%" name="transmission" id="transmission" required="required">
        <option value="<?php echo $row['Transmission']?>"><?php echo $row['Transmission']?></option>
        <option value="Automatic">Automatic</option>
        <option value="Manual">Manual</option>
      </select> 
    </div>
 </div>
</div>
<?php 
   }
else{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Sorry! No record(s) available.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
 }
}
?>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
  $('.cartype').select2({
        placeholder: 'Select Car Type',
        ajax: {
          url: '../../production/administrator/cartype.php',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
       $('.brand').select2({
        placeholder: 'Select Brand',
        ajax: {
          url: '../../production/administrator/brand.php',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
       $('.enginecapa').select2({
        placeholder: 'Select Engine Capacity'
       });
       $('.gastype').select2({
        placeholder: 'Select Type Of Gas'
       });
       $('.mileage').select2({
        placeholder: 'Select Mileage'
       });
       $('.aircon').select2({
        placeholder: 'Select Air conditioning'
       });
       $('.heat').select2({
        placeholder: 'Select Heat'
       });
       $('.transmission').select2({
        placeholder: 'Select Transmission'
       });
   //Date picker
    $('#servdate').datepicker({
      format: 'yyyy-mm-dd'
    });
    $('#nextservdate').datepicker({
      format: 'yyyy-mm-dd'
    });
    function RestrictSpace() {
    if (event.keyCode == 32) {
        return false;
    }
}

$(function() {
        $("#phone").mask("+233999999999");
    $("#tel").mask("+19999999999");

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });
</script>