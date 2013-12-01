<?php
include 'include/db.php';

?>
<?php include 'include/header.php'; ?>
		<div class="content">
			<div class="mainbar">
				<form class="ask-question" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h2>问题概述</h2>
						<input class="ask-title" name="title" type="text"></input>
					<h2>问题描述</h2>
					<div class="editor">
						<textarea name="preEditor">在此处输入问题的详细描述</textarea>
						<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
						<script>CKEDITOR.replace( 'preEditor' );</script>				
					</div>
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
