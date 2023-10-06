<?php
session_start();
include '../env.php';
$postId = $_REQUEST ['id'];
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
    header("Location: ../edit.php?id= '$postId'");
}else {
    $query = "UPDATE posts SET title= '$title' , author = '$author', description = '$description' where if = '$postId'";
    
    $result = mysqli_query($conn, $query);
    header("Location: ./../edit.php");
    if($result){
        $_SESSION = "Post has been inserted sucessfully";
        header("Location: ./../edit.php");
    }else {
        $_SESSION = "Something wrong";
        header("Location: ./../edit.php?id = $postId");
    }
}
?>
<?php
    session_unset();
?>