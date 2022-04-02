<!DOCTYPE html>
<html>
<head>
     <title>simple_crud</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>
<style type="text/css">
    td{
        background-color: #a5bb9b;
    }

</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
                //function sa city sa baba
    function getcity(val){
        
        $.ajax({
            type:"POST",
            url: "city.php",
            data: 'regid='+val, 
            success: function(data){
                    //id ss baba
                $("#city-list").html(data);
            }

        })

    }
</script>

<body style="background-color: #a5bb9b; color:white">

<?php require_once 'action.php';

$mysqli = new mysqli('localhost', 'root', '', 'simple_crud') or die(mysqli_error($mysqli));

$result =$mysqli->query("SELECT *from student_profile") or die($mysqli->error);

$res =$mysqli->query("SELECT * FROM region ") or die($mysqli->error);
?>

<?php if (isset($_SESSION['sucmess'])): ?>
    <div class="alert alert-<?=$_SESSION['msgtype']?>">
        <?php echo $_SESSION['sucmess']; 
          unset($_SESSION['sucmess']);
        ?>
    </div>
<?php endif ?>

<?php if ($update==true): ?>
    





    <div style="text-align: center; background-color: #74ad5c; color: black;">
     <h1><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>    <h2 style="font-family: Arbutus; font-size: 30px; ">Personal Info</h2></h1> 
</div>
<?php else: ?>
<div style="text-align: center; background-color: #74ad5c; color: black">
    <h2 style="font-family: Arbutus; font-size: 50px; ">STUDENT PROFILE</h2>
</div>


<?php endif ?>

  
</div>

     <div class="row justify-content-center">
     <form action ="action.php" method="POST">
     <div class="row along-items-start">
         <div class="col" >
        


        <div class="form-group">
            <div style="color: black; font-weight: bold;">

            <label > First Name: </label>
            </div>
            <input style= "background-color: #74ad5c ; color: black" type ="textbox" name ="fname" class="form-control" value="<?php echo $fname; ?>">
        </div>
        <div class="form-group">
             <div style="color: black; font-weight: bold;">
             <label> Middle Name: </label>
             </div>
            <input style= "background-color: #74ad5c ; color: black" type ="textbox" name ="mname" class="form-control"value="<?php echo $mname; ?>">
        </div>      
         <div class="form-group">
              <div style="color: black; font-weight: bold;">  
              <label> Last Name: </label>
              </div>
            <input style= "background-color: #74ad5c ; color: black" type ="textbox" name ="lname" class="form-control"value="<?php echo $lname; ?>">
        </div>

        <div class="form-group">
              <div style="color: black; font-weight: bold;">  
              <label> Birthday </label>
              </div>
            <input type ="date" name ="birthday" class="form-control" value="<?php echo $birthday; ?>">
        </div>
        </div>

            
        <div class="col" style="float: center;">
                      
         <div class="form-group">
            <div style="color: black; font-weight: bold;">  
            <label> Address 1: </label>
            </div>
                <input style= "background-color: #74ad5c ; color: black" type ="textbox" name ="addone"class="form-control"value="<?php echo $addone; ?>">
        </div>
        <div class="form-group" >
            <div style="color: black; font-weight: bold;">  
            <label> Address 2: </label>
            </div>
            <input style= "background-color:#74ad5c; color: black" type ="textbox" name ="addtwo" class="form-control"value="<?php echo $addtwo; ?>" >
        </div>

        <div class="form-group" style="color: black; font-weight: bold;">

            <label>Region</label>

            <select name="region" id="region-list" class="form-control" onchange="getcity(this.value);">

            <option value="<?php if (!empty($region)){ echo $region;} ?>">
                <?php if (!empty($region)){ echo $region;} ?>
            </option>
        
                <?php while ($row = $res-> fetch_assoc()):?>
                 <option value="<?php echo $row['ID']?>"><?php echo $row['Region']?>
                    
                </option>

               <?php endwhile; ?> 

            </select>
        </div>

         <div class="form-group" style="color: black; font-weight: bold;">
            <label>City</label>
            <select name="city" id="city-list" class="form-control" value="<?php echo $city  ?>">
               <option value="<?php if (!empty($city)){ echo $city;} ?>">
                <?php if (!empty($city)){ echo $city;} ?>
            </option>
        
            </select>
       
    </div>

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <div class="form-group" style="text-align: center;">

     <?php if ($update==true): ?>
        <button type="submit" name="update" class="btn btn-warning;" style="background-color: #315a39 ; width:500px; ; color: white"> <h6>Update Profile</h6></button> 
     <?php else: ?> 
         <button type="submit" name="enter" class="btn btn-primary;" style="background-color: #315a39 ; width:500px;color: white"><h6>ENTER</h6> </button>
     <?php endif ?> 
     </div>
 </div>

</form> 
</div>

    <!-- lagye profile icon sa update -->
<div class="container;">
    
      <div class="row justify-content-center">
    <table class="table table-striped" style="background-color: #74ad5c; color: black; border-style: solid; border-color: black; width: 50%;"> 
       <thead>
            <tr>
                 <th>Student ID</th>
                 <th>First Name</th>
                 <th>Middle Name</th>
                 <th>Last Name</th>
                 <th>Birthday</th>
                 <th>Age</th>
                 <th>Region</th>
                 <th>City</th>
                 <th>Address 1</th>
                 <th>Address 2</th>
                
                 
            </tr>
       </thead>
        
       <?php while ($row = $result-> fetch_assoc()): ?>
            <tr>
            <td> <?php echo $row['ID']; 
                ?> </td>
            <td> <?php echo $row['First_Name']; 
                ?> </td>
            <td> <?php echo $row['Middle_Name']; 
                ?> </td>
            <td> <?php echo $row['Last_Name']; 
                ?> </td>
            <td> <?php echo $row['Birthday']; 
                ?> </td>    
            <td> <?php echo $row['Age']; 
                ?> </td>    
             <td> <?php echo $row['Region']; 
                ?> </td>   
             <td> <?php echo $row['City']; 
                ?> </td> 
            <td> <?php echo $row['Address_1']; 
                ?> </td>
            <td> <?php echo $row['Address_2']; 
                ?> </td>
            <td> <a href="index.php?view=<?php echo $row['ID'];?>" class="btn btn-info" style="background-color:#315a39;">View Profile </a> </td>
 

            <td> 
                <!-- confirmation paganahin -->
                <a onclick="return confirm('Confirm Deletion?')" href="action.php?delete=<?php echo $row['ID'];?>" 
                   class="btn btn-danger" 
                   data-toggle="confirm" 
                   data-title="Wait!"  
                   data-message="Are you sure?"
                   data-type="success">Delete Profile</a> </td>

                          <!--         <div id="id01" class="modal">
                  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                  <form class="modal-content" action="/action_page.php">
                    <div class="container">
                      <h1>Delete Account</h1>
                      <p>Are you sure you want to delete your account?</p>

                      <div class="clearfix">
                        <button type="button" class="cancelbtn">Cancel</button>
                        <button type="button" class="deletebtn">Delete</button>
                      </div>
                    </div>
                  </form>
                    </div> -->
            </tr>


       <?php endwhile; ?> 




    </table>

 </div>
</div>

      
</body>
</html>