<?php
/**
 * @desc Created by FavorTGD.
 * @author : FavorMylikes<l786112323@gmail.com>
 * @since : 2016/2/28 18:00
 */
use \common\widgets\FlashMessages;
$session=Yii::$app->getSession();
$session->addFlash('danger','aa');
$session->addFlash('danger','bb');
echo FlashMessages::widget(['class'=>'flashes','delay'=>1500,'options'=>['style'=>'list-style-type:none;padding-right: 21px;margin-right: 21px;overflow: hidden']]);
?>