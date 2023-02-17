<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- 引入Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<!-- 頁首 -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="./001.html">我的網站</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="./001.html">首頁</a></li>
				<!-- <li><a href="#">留言板</a></li> -->
			</ul>
			<form action="../backend/log_out.php" method="POST">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="./log_in.html">登入</a></li>
				<!-- <li><a href="./test.html">登出</a></li> -->
				<!-- <button type="submit" >登出</button> -->
				<li><a href="./test.html">註冊</a></li>
			</ul>
			</form>
		</div>
	</nav>

	<?php
	session_start();
	require_once("../backend/connect_db.php");
	$sql = 'SELECT * FROM message';
	$stmt = $db_link->prepare($sql);
	$stmt->execute();
	$comments = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$comments[] = $row;
	}
	?>






	<!-- 留言板 -->
	<div class="container">
		<h1>留言板</h1>
		<div class="panel panel-default">
			<div class="panel-heading">發表新留言</div>
			<div class="panel-body">
				<form action="../backend/get_message.php" method="POST">
					<!-- <div class="form-group">
						<label for="name">姓名:</label>
						<input type="text" class="form-control" name="nickname" placeholder="輸入姓名">
					</div> -->


					<!-- <div class="form-group">
						<label for="message">留言內容:</label>
						<textarea class="form-control" name="message" placeholder="輸入留言內容"></textarea>
					</div> -->
					<div><h4>登入以發表新留言</h4></div>
					
					<!-- <button type="submit" class="btn btn-primary">發表留言</button> -->
				</form>
			</div>
		</div>


		<div class="panel panel-default">
			<div class="panel-heading">留言列表</div>
			<ul class="list-group">

				<!-- <form action="../backend/edit_msg.php" method="post"> -->
					<?php foreach ($comments as $comment) { ?>
						<li class="list-group-item">

							


								<h4><?php echo $comment['mbr_account']; ?></h4>
								<p><?php echo $comment['edit_time']; ?></p>
								<p><?php echo $comment['content']; ?></p>
						</li>
				
				<?php } ?>
				<!-- <li class="list-group-item">
					<h4>張三</h4>
					<p>今天天氣真好。</p>
				</li>
				<li class="list-group-item">
					<h4>李四</h4>
					<p>我也這麼覺得。</p>
				</li>
				<li class="list-group-item">
					<h4>李四</h4>
					<p>我也這麼覺得。</p>
				</li> -->
			</ul>
		</div>
	</div>
</body>

</html>