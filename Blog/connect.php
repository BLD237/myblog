<?php
if($dbconnect  = new mysqli("localhost", "root", "", "myblog")){
//print("connect");
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

}else{



}





?>