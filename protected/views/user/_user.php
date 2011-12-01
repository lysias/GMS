<div class="form">

        <div style="float:right">
                <?= CHtml::image(file_exists('/images/user/' . $model->id) ? '/images/user/' . $model->id : '/images/no_image.jpg', $model->nick, array(
                    'style'=>'width: 150px;'
                )) ?>
        </div>


        <div class="row">
                <h3><?= $model->nick ?></h3>
        </div>


</div><!-- form -->