

<?php

    if(isset($_POST['search']))
     {
        error_reporting(0);
            $id =  $_POST['id'];
            $con = mysqli_connect('localhost' , 'root');
             mysqli_select_db($con , 'emp');
            $q ="SELECT * FROM ems where id='$id'";
            $t= mysqli_query($con,$q);
            $result = mysqli_fetch_assoc($t);
            // $name=$result['emp_name'];
            // echo $name;
   
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Development</title>
    <link  rel="stylesheet" type="text/css" href="style.css" >


</head>

<body>
<?php error_reporting(0); ?>
    <div class="center">
        <h1 align="center">Employee Data Entry Automation Software</h1>
        <form method="post" action="form.php">
        <div class="form">
            <input type="text" name="id" class="inputfield" placeholder="Search Id"
            value="<?php if(isset($_POST['search'])){ echo $result['id'];}?>" >
            <input type="text" name="name" class="inputfield" placeholder="Employee Name"
            value="<?php if(isset($_POST['search'])){ echo $result['emp_name'];}?>">
            <select class="inputfield" name="gender" >
                <option>Select Gender</option>
                <option
                value="male" <?php if($result['emp_gender']== 'Male')
                {
                    echo "selected";
                }?>
                >Male</option>
                <option
                value="female" <?php if($result['emp_gender']== 'Female')
                {
                    echo "selected";
                }?>
                >Female</option>
                <option
                value="Others" <?php if($result['emp_gender']== 'Others')
                {
                    echo "selected";
                }?>
                >Others</option>
            </select>
            <input type="text" name="email" class="inputfield" placeholder="Email Address" value="<?php if(isset($_POST['search'])){ echo $result['emp_email'];}?>">
            <select class="inputfield" name="depart" value="<?php if(isset($_POST['search'])){ echo $result['emp_dept'];}?>">
                <option>Select Department</option>
                <option 
                value="IT" <?php if($result['emp_dept']== 'IT')
                {
                    echo "selected";
                }?>
                >IT</option>
                <option
                value="HR" <?php if($result['emp_dept']== 'HR')
                {
                    echo "selected";
                }?>
                >HR</option>
                <option
                value="Accounts" <?php if($result['emp_dept']== 'Accounts')
                {
                    echo "selected";
                }?>
                >Accounts</option>
                <option
                value="Sales" <?php if($result['emp_dept']== 'Sales')
                {
                    echo "selected";
                }?>
                >Sales</option>
                <option
                
                value="Marketings" <?php if($result['emp_dept']== 'Marketings')
                {
                    echo "selected";
                }?>>Marketings</option>
            </select>
            <textarea placeholder="Address" name="address" ><?php if(isset($_POST['search'])){ echo $result['emp_add'];} ?> </textarea>
        
            <input type="submit" class="btn1"  name="search" value="Search">
            <input type="submit" class="btn2" name="save"  value="Save">
            <input type="submit" class="btn3" value="Modify" name="update">
            <input type="submit" class="btn4"  value="Delete"  name="delete" onclick="checkdelete()" >
            <input type="reset" class="btn5"  value="Clear" name="clear">
           
        </div>
    </div>
    
</body>
</html>

<script>
    function checkdelete()
    {
        return confirm('Waitt...Are u sure to delete this record ?? ');
    }
</script>

<?php

if(isset($_POST['save']))

{
    error_reporting(0);
   // $id    =  $_POST['id'];
   $name    =  $_POST['name'];
   $gender  =  $_POST['gender'];
   $email   =  $_POST['email'];
   $depart  =  $_POST['depart'];
   $address =  $_POST['address'];

   $con = mysqli_connect('localhost' , 'root');

   mysqli_select_db($con , 'emp');
   $q ="INSERT INTO ems(emp_name,emp_gender,emp_email,emp_dept,emp_add) VALUES('$name' , '$gender' , '$email' , '$depart' ,  '$address')";
   $t= mysqli_query($con,$q);
   if($t)
   {
    echo "<script>alert('data inserted')</script>";
   }
  else
   {
    echo "<script>alert('data not inserted')</script>";
   }
   
}

?>

<?php  
//delete's  code here--------------------------->
if(isset($_POST['delete']))
{

    error_reporting(0);
    $id =  $_POST['id'];

   $con = mysqli_connect('localhost' , 'root');

   mysqli_select_db($con , 'emp');
   $q="DELETE  FROM ems WHERE id = '$id'";
   $t= mysqli_query($con,$q);
   if($t)
   {
    echo "<script>alert('data deleted')</script>";
   }
   else
   {
    echo "<script>alert('data not deleted')</script>";
   }
   
}

?>

<?php

if(isset($_POST['update']))

{
    error_reporting(0);
   $id    =  $_POST['id'];
   $name    =  $_POST['name'];
   $gender  =  $_POST['gender'];
   $email   =  $_POST['email'];
   $depart  =  $_POST['depart'];
   $address =  $_POST['address'];

   $con = mysqli_connect('localhost' , 'root');

   mysqli_select_db($con , 'emp');
   $q ="UPDATE ems SET id =  $id ,emp_name = '$name' ,emp_gender = '$gender' ,emp_email = '$email',emp_dept = '$depart' ,emp_add = '$address' WHERE id =  $id ";
   $t= mysqli_query($con,$q);
   if($t)
   {
    echo "<script>alert('data updated')</script>";
   }
  else
   {
    echo "<script>alert('data not update')</script>";
   }
   
}

?>

