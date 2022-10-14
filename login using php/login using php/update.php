<?php
 
 include ('connection.php');

if(isset($_POST['updateidsend'])){
    $updateid=$_POST['updateidsend'];

    $sql="Select * from `userstudent` where regno=$updateid";
    $result=mysqli_query($con,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);
}
else{
    $response['status']=200;
    $response['message']="invalid";

}
?>
