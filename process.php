<?php
$connect = new PDO('mysql:host=localhost;dbname=myblog', 'root', 'dangtran9399');

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data



// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($_POST['tiltle'])){
    $errors['tiltle'] = 'Title is required.';
}   
    else
{
 $tiltle = $_POST["tiltle"];
}

if (empty($_POST['content'])){
    $errors['content'] = ' Comment not be empty.';
}
    else
{
 $content = $_POST["content"];
}

if (empty($_POST['image'])){
    $errors['image'] = 'Image alias is required.';
}
    else
{
 $image = $_POST["image"];
}

// return a response ===========================================================

// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message
    
    // DO ALL YOUR FORM PROCESSING HERE
    // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)
    $query = "INSERT INTO post(tiltle,content,image) VALUES ('$tiltle','$content','$image')";
    $statement = $connect->prepare($query);
    $statement->execute();
    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Success!';
    
}

// return all our data to an AJAX call
echo json_encode($data);
