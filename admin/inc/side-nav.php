<?php
    if(isset($key)&&$key == "hhdsfs1263z"){

    
    ?>
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">MY <b>BLOG</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<i class="fa fa-user" aria-hidden="true"></i>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				
				<h4><?php echo $_SESSION['username'] ; ?></h4>
			</div>
			<ul style="padding-left: 0px;">
				<li>
					<a href="Users.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>Users</span>
					</a>
				</li>
				<li>
					<a href="Post.php">
						<i class="fa  fa-window-restore" aria-hidden="true"></i>
						<span>Post</span>
					</a>
				</li>
				<li>
					<a href="Category.php">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>Category</span>
					</a>
				</li>
				<li>
					<a href="Comment.php">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>Comment</span>
					</a>
				</li>
				<li>
					<a href="Message.php">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>Message</span>
					</a>
				</li>
				<li>
					<a href="Page.php">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Page</span>
					</a>
				</li>
				<li>
					<a href="../logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">
            <?php
            }
            ?>