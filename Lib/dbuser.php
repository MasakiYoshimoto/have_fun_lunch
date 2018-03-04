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
  $sql ="SELECT t_join.id_user,section_name,first_name,last_name
        FROM t_join
        INNER JOIN m_user ON m_user.id_user = t_join.id_user
        INNER JOIN m_section ON m_user.section_code = m_section.section_code";
  $response = mysqli_query($con,$sql);
  $list = array();
  while($row = mysqli_fetch_assoc($response)){
    $list[] = $row;
  }
  return $list;
}
function getTjoinUserInfo($con,$id_user){
  $sql ="SELECT id_user
          FROM t_join
          WHERE id_user = {$id_user}";
  $response = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($response);
  if(count($row) > 0 ){
    return $row[0]['id_user'];
  } else {
    return 0;
  }
}
//select.phpに関するSQL
function InsertWishList($con,$id_user_w){
  $id_user_m = $_SESSION['user_info']['id_user'];
  $sql = "INSERT INTO wish_list(id_user_m,id_user_w)
          VALUES($id_user_m,$id_user_w)";
  $response = mysqli_query($con,$sql);
  return $response;
}
function existWishListMe($con) {
  $id_user_m = $_SESSION['user_info']['id_user'];
  $sql = "SELECT wish_id
          FROM wish_list
          WHERE id_user_m = $id_user_m";
  $response = mysqli_query($con,$sql);
  $user_counts = mysqli_num_rows ($response);
  return $user_counts > 0;
}

function getpassword($con){
  $sql = "SELECT password
          FROM m_user
          WHERE id_user = {$_SESSION['user_info']['id_user']}";
  $response = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($response);
  return $row['password'];
}
function changepass($con,$newpass){
  $sql = "UPDATE m_user
          SET password = '$newpass'
          WHERE id_user = {$_SESSION['user_info']['id_user']};";
  $response = mysqli_query($con,$sql);
  return $response;
}
