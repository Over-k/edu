<?php 
function check_login(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}
