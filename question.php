<?php
include 'include/db.php';
$tbl_name = "question";
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	$questionid = $_GET['questionid'];
	$sql = "SELECT `title`, `content`, `reward`, `vote`, `view`, `create_time`, `user_userid` from `$tbl_name` WHERE questionid='$questionid'";
	echo $sql;
	$result = mysqli_query($con, $sql);
	if($result)
	{
		$row = mysqli_fetch_array($result);
		$question_title = $row['title'];
		$question_content = $row['content'];
		$question_reward = $row['reward'];
		$question_vote = $row['vote'];
		$question_view = $row['view'];
		$question_create_time = $row['create_time'];
		$question_userid = $row['user_userid'];
	}

	$sql = "SELECT `username` from `user` WHERE userid='$userid'";
	$result = mysqli_query($con, $sql);
	if($result)
	{
		$row = mysqli_fetch_array($result);
		$quetion_username = $row['username'];
	}
}
?>

<?php include 'include/header.php'; ?>
		<div class="content">
			<div class="mainbar">
				<div class="question-title">
				<h1><?php echo $question_title ?></h1>
				</div>
				<div class="question">
					<div class="vote">
					</div>
					<div class="post">
						<div class="post-text">
							<?php echo $question_content ?>
						</div>
					</div>
					<div class="post-tags">
						<a href="" class="tag">html</a>
						<a href="" class="tag">css</a>
						<a href="" class="tag">javascript</a>
					</div>
				</div>
				<h2>所有答案</h2>
				<div class="answer">
					<div class="post-text">
						<p>你可以试试这个，Bootstrap的可视化编辑工具。<a href="http://www.bootcss.com/p/layoutit">www.bootcss.com/p/layoutit/</a></p>
						<p><img src="answer.png" alt="layoutit"/></p>
					</div>
				</div>
				<h2>您的答案</h2>
				<div class="editor">
					<textarea name="preEditor">在此处输入您的回答</textarea>
					<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
					<script>CKEDITOR.replace( 'preEditor' );</script>				
				</div>
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
