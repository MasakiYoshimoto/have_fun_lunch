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
    return $row['id_user'];
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
//shuffle.phpに関するSQL
function getWishFirstPair($con){
  $sql = "SELECT id_user_w, id_user_m
          FROM wish_list
          LIMIT 1";
  $response = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($response);
  return $row;
}
function resetUserGroup($con){
  $sql = "DELETE FROM user_group";
  return mysqli_query($con, $sql);
}
function insertUserGroup($con, $selected_users, $group_id){
  foreach ($selected_users as $value) {
    $sql = "INSERT INTO user_group(user_id, group_id)
            VALUES($value, $group_id)";
    $response = mysqli_query($con, $sql);
    if($response === false){
      return false;
    }
  }
  return $response;
}
function deleteWishList($con, $selected_users){
  foreach ($selected_users as $value) {
    $sql = "DELETE
            FROM wish_list
            WHERE $value = id_user_m
            OR $value = id_user_w";
    $response = mysqli_query($con, $sql);
    if($response === false){
      return false;
    }
  }
  return $response;
}
function deleteUserList($selected_users, $user_list){
  foreach ($selected_users as $selected_user) {
    foreach ($user_list as $key => $value) {
      if((int)$selected_user === (int)$value['id_user']){
      unset($user_list[$key]);# code...
      }
    }
  }
  return $user_list;
}
//changepass.phpに関するSQL
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
//resules.phpに関するSQL
function getResults($con){
  $sql = "SELECT our_group.*, m_user.first_name, m_user.last_name, m_section.section_name
          FROM `user_group` AS my_group
          INNER JOIN user_group AS our_group
          ON my_group.group_id = our_group.group_id
          INNER JOIN m_user ON m_user.id_user = our_group.user_id
          INNER JOIN m_section ON m_user.section_code = m_section.section_code
          WHERE my_group.user_id ={$_SESSION['user_info']['id_user']};";
  $response = mysqli_query($con,$sql);
  $list = array();
  while($row = mysqli_fetch_assoc($response)){
    $list[] = $row;
  }
  return $list;
}
