<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 14/07/2021
 * Time: 21:12
 */

?>
<div class="card-base-connect-subject-mennager">
    <img src="<?=$data['img'];?>" alt="" srcset="" class="yelow-frame radius">
    <h4><?=$data['teach_name'];?></h4>
    <p>
        <b>ОБРАЗОВАНИЕ:</b> <?=$data['education'];?>
    </p>
    <p>
        <b>О ПРЕПОДАВАТЕЛЕ:</b> <?=$data['info'];?>
    </p>
    <button class="btn-sub green" data-toggle="modal" data-target="#mailTeach"><?=$data['title'];?></button>
</div>
