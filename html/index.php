<?php

$conn=mysqli_connect("mysql","root","root");
if(!$conn){
    echo "eror";
} else{
    echo"norm";
}