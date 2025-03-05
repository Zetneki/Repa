<!-- receptek betoltese, ez hivodik meg minden receptre -->
<div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img/<?php echo $data['picture'] ?>" alt="Avatar">
                    <h1><?php echo $data['name'] ?></h1>
                </div>
                <div class="flip-card-back">
                    <?php echo $data['text'] ?>
                </div>
            </div>
        </div>