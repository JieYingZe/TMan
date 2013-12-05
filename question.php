<?php include 'include/header.php'; ?>
<?php
include 'include/db.php';
$tbl_name = "question";
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	$questionid = $_GET['questionid'];
	$sql = "SELECT `title`, `content`, `reward`, `vote`, `view`, `create_time`, `user_userid` from `$tbl_name` WHERE questionid='$questionid'";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1)
	{
		$row = mysqli_fetch_array($result);
		$question_title = $row['title'];
		$question_content = $row['content'];
		$question_reward = $row['reward'];
		$question_vote = $row['vote'];
		$question_view = $row['view'];
		$question_create_time = $row['create_time'];
		$question_userid = $row['user_userid'];
		$sql = "UPDATE `question` set `view` = `view` + 1 WHERE questionid='$questionid'";
		$result = mysqli_query($con, $sql);
	}
	elseif($count == 0)
	{
		header("Location: pagenotfound.php");
	}
	else
	{
		header("Location: error.php");
	}
	$sql = "SELECT `username` from `user` WHERE userid='$question_userid'";
	$result = mysqli_query($con, $sql);
	if($result)
	{
		$row = mysqli_fetch_array($result);
		$question_username = $row['username'];
	}
	$sql = "SELECT `answerid`, `content`, `vote`, `create_time`, `user_userid` FROM `answer` WHERE question_questionid = '$questionid' OEDER BY vote DESC";
	$result = mysqli_query($con, $sql);
	$answers = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$sql = "SELECT `tag`.`name` FROM (`question_tag`, `tag`) WHERE `question_tag`.question_questionid = '$questionid' AND `question_tag`.tag_tagid = `tag`.tagid";
	$result = mysqli_query($con, $sql);
	$tags = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

		<div class="content">
			<div class="mainbar">
				<div class="question-title">
				<h1><?php echo $question_title ?></h1>
				</div>
				<div class="question">
					<div class="post">
						<div class="post-text">
							<?php echo $question_content ?>
						</div>
					</div>
					<div class="vote">
						<a class="ion ion-thumbsup"></a>
					</div>
					<div class="post-tags">
<?php
foreach($tags as &$tag)
{
?>
						<a href="" class="tag"><?php echo $tag['name'] ?></a>
<?php
}
unset($tag);
 ?>
					</div>
					<div class="question-info">
						<span class="time"><?php echo $question_create_time ?></span>
						<a href="" class=""><?php echo $question_username ?></a>
					</div>
				</div>
				<div>
					<h2>所有答案</h2>
				</div>

<?php
foreach($answers as &$answer)
{
?>
				<div class="answer">
					<div class="post-text">
						<?php echo $answer['content']?>
					</div>
					<div class="vote">
						<a class="ion ion-thumbsup"></a>
					</div>
					<div class="answer-info">
						<span class="time"><?php echo $answer['create_time'] ?></span>
<?php
	$answer_userid = $answer['user_userid'];
	$sql = "SELECT `username` from `user` WHERE userid= $answer_userid";
	$result = mysqli_query($con, $sql);
	if($result)
	{
		$row = mysqli_fetch_array($result);
		$answer_username = $row['username'];
	}
?>
						<a href="" class=""><?php echo $answer_username ?></a>	
					</div>
				</div>
<?php
}
?>
				<div>
					<h2>您的答案</h2>
				</div>
				<form method="POST" action="answer.php">
					<div class="editor">
						<textarea name="content">在此处输入您的回答</textarea>
						<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
						<script>CKEDITOR.replace( 'content' );</script>				
					</div>
						<input type="hidden" name="questionid" value="<?php echo $questionid ?>" ></input>
					<button class="btn" type="summit">发表回答</button>
				</form>
			</div>
<?php include 'include/sidebar.php'; ?>
		</div>
<?php include 'include/footer.php'; ?>
