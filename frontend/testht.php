<?php if($_SESSION["mbr_id"]===$comment["mbr_id"]){?>
    <a href="../backend/del_msg.php?method=del&id=<?php echo $comment["content_id"]?>" class="btn btn-danger mybtn" >刪除</a>
    <a href="../backend/edit_msg.php?id=<?php echo $comment["content_id"]?>" class="btn btn-primary mybtn">編輯</a>
    <?php foreach ($comments as $comment) { ?>
                <li class="list-group-item">
                <h4><?php echo $comment['mbr_account']; ?></h4>
				<p><?php echo $comment['create_at']; ?></p>
                <p><?php echo $comment['content']; ?></p>
                </li>
                <?php } ?>
<?php } else {
     foreach ($comments as $comment) { ?>
        <li class="list-group-item">
        <h4><?php echo $comment['mbr_account']; ?></h4>
        <p><?php echo $comment['create_at']; ?></p>
        <p><?php echo $comment['content']; ?></p>
        </li>
        <?php } 
}?>