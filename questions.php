<?php include 'include/header.php'; ?>

		<div class="content">
			<div class="mainbar">
<?php
$sql = "SELECT `question`.`questionid`, count( `answer`.`answerid` ) AS count_answer FROM `question` LEFT JOIN `answer` ON `question`.`questionid` = `answer`.`question_questionid` GROUP BY `question`.`questionid` ORDER BY `question`.`view` DESC";
$result = mysqli_query($con, $sql);
$count_answers = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach($count_answers as &$count_answer)
{
	$questionid = $count_answer['questionid'];
	$count_answer = $count_answer['count_answer'];
	$sql = "SELECT `question`.`vote`, `question`.`view`, `question`.`title`, `question`.`create_time`, `question`.`user_userid`, `user`.`username` FROM (`question`, `user`) WHERE `question`.`user_userid` = `user`.`userid` and `question`.`questionid` = '$questionid'";
	$result = mysqli_query($con, $sql);
	$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
				<div class="question-summary">
					<div class="question-status">
						<div class="votes">
						<div class="mini-counts"><?php echo $rows['vote'] ?></div>
							<div>赞同</div>
						</div>
						<div class="status unanswered">
							<div class="mini-counts"><?php echo $count_answer ?></div>
							<div>回答</div>
						</div>
						<div class="views">
							<div class="mini-counts"><?php echo $rows['view'] ?></div>
							<div>点击</div>
						</div>
					</div>
					<div class="summary">
						<h3><a href="question.php?questionid=<?php echo $questionid ?>"><?php echo $rows['title'] ?></a></h3>
					</div>
					<div class="tags">
<?php
	$sql = "SELECT `tag`.`tagid`,`tag`.`name` FROM (`question_tag`,`tag`) WHERE `question_tag`.`question_questionid`='$questionid' and `question_tag`.`tag_tagid` = `tag`.`tagid`";
	$result = mysqli_query($con, $sql);
	$tags = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach($tags as &$tag)
	{
?>
					<a href="tag.php?tagid=<?php echo $tag['tagid']?>" class="tag"><?php echo $tag['name'] ?></a>
<?php
	}
?>
					</div>
					<div class="question-info">
						<span class="time"><?php echo $rows['create_time'] ?></span>
						<a href="" class=""><?php echo $rows['username'] ?></a>
					</div>
				</div>
<?php
}
?>

			</div>
<?php include 'include/sidebar.php'; ?>
		</div>
<?php include 'include/footer.php'; ?>
