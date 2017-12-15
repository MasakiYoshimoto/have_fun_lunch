<?php
function getLoginUser($con,$id,$pass){
  $sql = "SELECT id,first_name,last_name
          FROM m_user
          WHERE id ='".$id."' and password = '".$pass."'";
  $responce = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($responce);
  return $row;
}
