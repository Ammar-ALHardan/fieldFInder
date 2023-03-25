<?php


header("Content-Type: application/json");
include 'connection.php';
$email=$_POST['email'];
$password=$_POST['password'];

# query --1--

$query = "select * from users where email = '$email' AND password = '$password'";
$resultd =mysqli_query($connection,$query);
$rowcount=mysqli_num_rows($resultd);

// # query --2--

// $queryparent="select * from admin where email = '$email' AND password = '$password'";
// $resultp =mysqli_query($connection,$queryparent);
// $rowcountp=mysqli_num_rows($resultp);

if($rowcount>0){
    $output = [];
    $output['Token']="User's";
    $item =$resultd->fetch_assoc();
    $output['data'] = $item;
    $id = $output['data']['id'];
    echo json_encode($output);
}
 
// elseif($rowcountp>0){
//     $outputt = [];
//     $outputt['Token']="Admin";
//     $items =$resultp->fetch_assoc();
//     $outputt['data'] = $items;
//     echo json_encode($outputt);
// }  
else{

    echo json_encode(['error'=>'Email or Password invaild']);
}


?>

