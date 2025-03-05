<!-- kommentek betoltese, ez hivodik meg minden kommentre -->
<div class="comment-wrapper">
    <div class="comment">
        <div class="userDetails">
            <img src="../_rootprofpics/<?php echo $data['profpic'] ?>" alt="pfp">
            <div>
                <p class="username"><?php echo $data["name"] ?></p>
                <p class="sentDate"> <?php echo $data["date"]; ?> </p>
                <p class="commentText"> <?php echo $data["comment"]; ?> </p>
            </div>
        </div>
    </div>
</div>
