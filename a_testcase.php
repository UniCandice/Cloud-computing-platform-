<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
  <title><?php echo "CFD Cloud Management Center";?></title>
  <link rel="stylesheet" href="menu.css">
  <link rel="stylesheet" href="table.css">
  <script type="text/javascript" src="menu.js"></script>
</head>
<body>
<h5 align="right">
<?php echo "UserName:&nbsp;&nbsp;".$_SESSION['username'];?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="./changepassword.php">Password</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="./index.php">LoginOut</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</h5>
<h1 align="center">CFD Cloud Management Center</h1>
<br/>
<?php print include("menu_main.php"); ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<hr/>
<br/>

<form action="a_fwrite.php" method="post">
<table class="testcase">
<tr>
   <td>User</td>
<?php
echo '<td><input type="text" name="testuser" value="'.$_SESSION['username'].'"></td>';
?>
</tr>
<tr>
   <td><label for="file">Solver</label></td>
   <td><input type="file" name="usrfile[]" id="file"/></td>
</tr>
<tr>
   <td>Case</td>
   <td>
      <dl class="dl_testcase">

<?php
require_once("common.php");

$con=mysql_connect(my_host,my_user,my_password);
if (!$con){
   die('Counld not connect: '.mysql_error());
}
mysql_select_db(my_db,$con);

$result=mysql_query("select * from cfd_case");
while($row=mysql_fetch_array($result)){
   echo '<dt><input type="checkbox" name="case[]" value='.$row[name].' />'.$row[name].'</dt>';
}
mysql_close($con);
?>
</dl>
</td>
</tr>
<tr>
  <td></td>
  <td><input type="submit" name="commit" value="Submit"></td>
</tr>
</table>
</form>
</body>
</html>

