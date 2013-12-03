<?php
include 'include/header.php';
?>
<?php
if($_GET['redirect_to'])
{
	if(!isset($_SESSION['userid']))
	{
	
	}
	else
	{
	header("Location: ".$_GET['redirect_to']);
	}
}
else
{
	header("Location: error.php");
}
?>


<h1>请先登录</h1>

<?php
include 'include/footer.php';
?>
