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
    <button type="button" class="btn-sub green" data-bs-toggle="modal" data-bs-target="#mailTeach"><?=$data['title'];?></button>
    <!-- Написать Ведушему направления -->
    <div class="modal fade grey" id="mailTeach" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mailTeachLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mailTeachLabel">связаться с руководителем</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="155">
                            <input type="hidden" name="_wpcf7_version" value="5.4">
                            <input type="hidden" name="_wpcf7_locale" value="ru_RU">
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f155-o1">
                            <input type="hidden" name="_wpcf7_container_post" value="0">
                            <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="ФИО">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="E-Mail">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Телефон">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <textarea class="form-control" name="text" id="" cols="20" rows="5">Сообщения</textarea>
                            </div>
                        </div>
                        <button class="btn-sub green mt-2">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
