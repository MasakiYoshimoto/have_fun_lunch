<?php
function getLoginUser($con,$id_user,$pass){
  $sql = "SELECT id_user,first_name,last_name FROM m_user WHERE id_user = {$id_user} and password = '{$pass}'";
  $responce = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($responce);
  return $row;
}
