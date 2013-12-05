<?php
include 'include/db.php';
$tbl_name = "tag";
$con = mysqli_connect("$host", "$MySQL_username", "$MySQL_password", "$db_name")or die("cannot connect");

$sql = "SELECT `question_tag`.`tag_tagid`, `tag`.`tag.name`, count( * ) AS count FROM `question_tag`,`tag` GROUP BY tagid ORDER BY count DESC, tagid DESC LIMIT 7";
$result = mysqli_query($con, $sql);
$tags = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

			<div class="sidebar">
				<div class="module">
					<h4 id="hot-tags">热门标签</h4>
					<div id="hot-tags-list">
<?php

?>
						<a href="" class="tag">java</a>
						<span class="item-multiplier">
							<span class="item-multiplier-x">×</span>
							<span class="item-multiplier-count">999</span>
						</span>
						<br>
<?php
?>
					</div>	
				</div>
			</div>
