<?php 
if(isset($_POST['email'])) { 
 $query_users_db = "SELECT * FROM users_db WHERE email=".$db1->GetSQLValueString($_POST['email'],'text')." or uname=".$db1->GetSQLValueString($_POST['uname'],'text')."";
$users_db = mysqli_query($GLOBALS['__Connect'],$query_users_db) or die(mysqli_error($GLOBALS['__Connect']));
$row_users_db = mysqli_fetch_assoc($users_db);
$totalRows_users_db = mysqli_num_rows($users_db);
if($totalRows_users_db == 0){
$insertSQL = sprintf("INSERT INTO users_db (uname,email,active,pword,role, credits) VALUES(%s,%s,'true',%s,%s,%s)",
                       $db1->GetSQLValueString($_POST['uname'], "text"),
                       $db1->GetSQLValueString($_POST['email'], "text"),
					   $db1->GetSQLValueString($_POST['pass'], "text"),
					   $db1->GetSQLValueString($_POST['role'], "text"),
					   $db1->GetSQLValueString('0', "text"));

  

  
  mysqli_query($GLOBALS['__Connect'],$insertSQL) or die(mysqli_error($GLOBALS['__Connect']));
  $smarty->assign('updated',true);
}else{
$smarty->assign('taken',true);
}}

mysqli_select_db($GLOBALS['__Connect'], database_portfolio);
 $query_users_db = "SELECT * FROM ads order by id desc";
$users_db = mysqli_query($GLOBALS['__Connect'],$query_users_db) or die(mysqli_error($GLOBALS['__Connect']));
$row_users_db = mysqli_fetch_assoc($users_db);
$totalRows_users_db = mysqli_num_rows($users_db);
$i = 0;
do {
$users_db2[$i]['name'] = $row_users_db['name'];
$users_db2[$i]['code'] = $row_users_db['code'];
$users_db2[$i]['position'] = $row_users_db['position'];
$users_db2[$i]['id'] = $row_users_db['id'];
;
$i ++;
} while ($row_users_db = mysqli_fetch_assoc($users_db));

$smarty->assign('ads',$users_db2);
mysqli_free_result($users_db);

if(isset($_GET['id']))
{
mysqli_select_db($GLOBALS['__Connect'], database_portfolio);
 $query_users_db = "SELECT * FROM ads WHERE id=".intval($_GET['id']);
$users_db = mysqli_query($GLOBALS['__Connect'],$query_users_db) or die(mysqli_error($GLOBALS['__Connect']));
$row_users_db = mysqli_fetch_assoc($users_db);
$totalRows_users_db = mysqli_num_rows($users_db);
$i = 0;
if($totalRows_users_db > 0){
$smarty->assign('edit',true);
do {
$users_db2[$i]['name'] = $row_users_db['name'];
$users_db2[$i]['code'] = $row_users_db['code'];
$users_db2[$i]['position'] = $row_users_db['position'];
$users_db2[$i]['id'] = $row_users_db['id'];
;
$i ++;
} while ($row_users_db = mysqli_fetch_assoc($users_db));
$smarty->assign('editads',$users_db2);
}
else
{

}

mysqli_free_result($users_db);
}
?>
