<?php
include '../env.php';
session_start();
$title = trim($_REQUEST ['title']);
$author = trim($_REQUEST ['author']);
$description = trim($_REQUEST ['description']);
$errors = [];

if(empty ($title)){
    $errors['title_error'] = 'Title Field is Required';
}else{
    if(strlen($title)>50){
        $errors['title_error']= 'Komai Likh';
    }
}
if(empty($description)){
    $errors['description_error']= 'Description Field is Required';    
} else{
    if(strlen($description)>500){
        $errors['description_error']= 'Komai Likh';
    }
}
if(empty ($author)){
    $errors ['author_error']= 'Author Field is Required';
}else {
    if(strlen($author)>50){
        $errors['author_error']= 'Komai Likh';
    }
    
}
if(count($errors)>0){
    $_SESSION = $errors;
    header('Location: ../create.php');
}else {
    $query = "INSERT INTO posts (title, author, description) VALUES ('$title','$author','$description')";
    
    $result = mysqli_query($conn, $query);
    header("Location: ./../index.php");
    if($result){
        $_SESSION = "Post has been inserted sucessfully";
        header("Location: ./../index.php");
    }else {
        $_SESSION = "Something wrong";
        header("Location: ./../index.php");
    }
}
?>