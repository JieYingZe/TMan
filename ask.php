<?php 
	include 'include/header.php'; 
?>
<?php
if(isset($_SESSION['userid']))
{
	include 'include/db.php';
	$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect");
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	
		$question_title = $_POST['title'];
		$question_content = $_POST['content'];
		$question_tags = $_POST['tags'];
		$userid = $_SESSION['userid'];
		$sql = "INSERT INTO `question` (`title`, `content`, `reward`, `user_userid`) VALUES ('$question_title', '$question_content', '0', '$userid')";
		$result = mysqli_query($con, $sql);
		$questionid = mysqli_insert_id($con);
		if($result)
		{
			foreach($question_tags as &$tag)
			{
				$sql = "SELECT `tagid` FROM `tag` WHERE name='$tag'";
				$result = mysqli_query($con, $sql);
				$count = mysqli_num_rows($result);
				if($count == 1)
				{
					$row = mysqli_fetch_array($result);
					$tagid = $row['tagid'];
				}
				elseif($count == 0)
				{
					$sql = "INSERT INTO `tag` (`name`) VALUES ('$tag')";
					$result = mysqli_query($con, $sql);
					if($result)
					{
						$tagid = mysqli_insert_id($con);
					}

				}
				$sql = "INSERT INTO `question_tag` (`question_questionid`, `tag_tagid`) VALUES ('$questionid', '$tagid')";
				$result = mysqli_query($con, $sql);
			}
			unset($tag);
			header("Location: question.php?questionid=$questionid");
		}
	}
}
else
{
	header("Location: pleaselogin.php?redirect_to=".$_SERVER["PHP_SELF"]);
}
?>

		<div class="content">
			<div class="mainbar">
				<form class="ask-question" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h2>问题概述</h2>
						<input class="ask-title" name="title" type="text"></input>
					<h2>问题描述</h2>
					<div class="editor">
						<textarea name="content"></textarea>
						<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
						<script>CKEDITOR.replace( 'content' );</script>				
					</div>
					<h2>主题标签</h2>
						<div class="ask-tags" id="ask-tags">
							<span id="tag-collection"></span>
							<input class="ask-tags-input" id="ask-tags-input" type="text"></input>
						</div>
						<script type="text/javascript" src="prototype.js"></script>
						<script type="text/javascript" src="tag-input.js"></script>
					<button class="btn" type="summit">发表问题</button>
				</form>
			</div>
			<div class="sidebar">
				<div class="module">
					<h4 id="hot-tags">热门标签</h4>
					<div id="hot-tags-list">
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
					</div>	
				</div>
			</div>
		</div>
<?php include 'include/footer.php'; ?>
