<?php
function getLoginUser($con,$id_user,$pass){
  $sql = "SELECT id_user,first_name,last_name FROM m_user WHERE id_user = {$id_user} and password = '{$pass}'";
  $responce = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($responce);
  return $row;
}
function countsUser($con){
  $sql ="SELECT id_user
         FROM t_join";
  $response = mysqli_query($con,$sql);
  $user_counts = mysqli_num_rows ($response);
  return $user_counts;
}
function getUserInfo($con){
  $sql ="SELECT t_join.id_user,section_code,first_name,last_name
        FROM t_join
        INNER JOIN m_user ON m_user.id_user = t_join.id_user";
  $response = mysqli_query($con,$sql);
  $list = array();
  while($row = mysqli_fetch_assoc($response)){
    $list[] = $row;
  }
  return $list;
}
