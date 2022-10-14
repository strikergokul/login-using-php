<?php 

include ('connection.php');


if(isset($_POST['displaysend'])){
    $table='<table class="table">
    <thead>
      <tr class="table-dark">
        <th scope="col">Register Number</th>
        <th scope="col">Username</th>
        <th scope="col">Operation</th>
      </tr>
    </thead>';
    $sql="Select * from `userstudent`";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $regno=$row['regno'];
        $username=$row['username'];
        $table.='<tr>
        <td scope="row">'.$regno.'</td> 
        <td>'.$username.'</td>
        <td>
            <button class="btn btn-success data-bs-toggle="modal" data-bs-target="#updatemodal"><a href="updatestudentdetail.php?updateid='.$regno.'" class="text-light">Update</a></button>
            <button class="btn btn-danger" onclick="deleteuser('.$regno.')">Delete</button>
        </td>
        </tr>';
    }
    $table.='</table>';
    echo $table;
}


?>





