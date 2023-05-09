<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['username']    = htmlspecialchars($_POST['username']);
        $_SESSION['email'] = htmlspecialchars($_POST['email']);
        $_SESSION['password']    = htmlspecialchars($_POST['password']);
        $_SESSION['password2']  = htmlspecialchars($_POST['password2']);
        if(isset($_POST['email'])){
            if(!empty($_POST['email'])){
                if(!preg_match('#^[a-zA-Z1-9]+@[a-z]+.[a-z]+$#',$_POST['email'])){
                    header('location:registerFailed.php');
                }else{
                    $cnx = new PDO("mysql:host=localhost;dbname=miniproject;port=3306;charset=UTF8",'root','');
                    $req = $cnx->prepare("INSERT INTO USER(username,email,password) VALUES(?,?,?) ");
                    $req->execute(array($_SESSION['username'],$_SESSION['email'],$_SESSION['password']));
                    header('location:loginSuccess.php');
                }
            
            }
        }
    }
    

?>