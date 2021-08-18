<?php

//add_comment.php
session_start();
$connect = new PDO('mysql:host=localhost;dbname=myblog', 'root', 'dangtran9399');

$error = '';
$comment_content = '';
$userid = $_SESSION["user_id"];
$date = date("Y-m-d h:i:sa");
function GUID() {
    return strtoupper(bin2hex(openssl_random_pseudo_bytes(16)));}
// $date = date("Y-m-d h:i:sa");
 $comment_id= GUID();

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment not be empty </p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO log_comment 
 (commment_id,parent_comment_id, comment,user_id,date) 
 VALUES (:commment_id ,:parent_comment_id, :comment,:user_id,:date)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
    ':commment_id'=> $comment_id,
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'    => $comment_content,
   ':user_id' => $userid,
   ':date'=> $date
  )
 );
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>