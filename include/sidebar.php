<?php
include 'include/db.php';
$tbl_name = "tag";
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect");
?>

			<div class="sidebar">
				<div class="module">
					<h4 id="hot-tags">热门标签</h4>
					<div id="hot-tags-list">
<?php
$sql = "SELECT `tag`.`tagid`, `tag`.`name`, count( * ) AS count FROM (`question_tag`,`tag`) WHERE `question_tag`.`tag_tagid` = `tag`.`tagid` GROUP BY `tagid` ORDER BY count DESC, `tagid` DESC LIMIT 7";
$result = mysqli_query($con, $sql);
$tags = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($tags as &$tag)
{
?>
					<a href="tag.php?tagid=<?php echo $tag['tagid']?>" class="tag"><?php echo $tag['name'] ?></a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count"><?php echo $tag['count'] ?></span>
						</span>
						<br>
<?php
}
unset($tag);
?>
					</div>	
				</div>
			</div>
