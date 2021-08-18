<?php
session_start();
//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=myblog', 'root', 'dangtran9399');

$query = "
SELECT *
   FROM post
   INNER JOIN log_comment
   ON post.post_id = log_comment.post_id; 
";
$email = $_SESSION['email'];
$statement = $connect->prepare($query);
$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{

 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>'.$mail.'</b> on <i>'.$row["date"].'</i></div>
  <div class="panel-body">'.$row["comment"].'</div>
  <div class="panel-body">'.$row["tiltle"].'</div>
  <div class="panel-footer" align="right"><button type="submit" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 10, $marginleft = 0)
{
 $query = "
 SELECT * FROM log_comment WHERE parent_comment_id = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 10)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading">By <b>'.$mail.'</b> on <i>'.$row["date"].'</i></div>
    <div class="panel-body">'.$row["comment"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
   </div>
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>