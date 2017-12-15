<?php
function getLoginUser($con,$id,$pass){
  $sql = "SELECT id,first_name,last_name from m_user where id ='".$id."' and password = '".$pass."'";
  $responce = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($responce);
  return $row;
}
