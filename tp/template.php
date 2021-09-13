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
        <b>О РУКОВОДИТЕЛЕ:</b> <?=$data['info'];?>
    </p>
    <button type="button" class="btn-sub" data-bs-toggle="modal" data-bs-target="#mailTeach"><?=$data['title'];?></button>
    <!-- Написать Ведушему направления -->
    <div class="modal fade grey" id="mailTeach" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mailTeachLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mailTeachLabel">связаться с руководителем</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= admin_url('admin-ajax.php?action=send_email_ajax'); ?>" class="ajax-send-form">
                        <div class="row mt-2">
                            <div class="col">
                                <input type="text" name="fio" class="form-control ajax-input" placeholder="ФИО" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <input type="email" name="email" class="form-control ajax-input" placeholder="E-Mail" required>
                            </div>
                            <div class="col">
                                <input type="phone" name="phone" class="form-control ajax-input" placeholder="Телефон" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <textarea class="form-control ajax-input" name="message" id="" cols="20" rows="5" required></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="to_email" value="<?=$data['email'];?>">
                        <input type="hidden" name="subject" value="Запрос с формы - связаться с руководителем">

                        <button class="btn-sub mt-2">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>