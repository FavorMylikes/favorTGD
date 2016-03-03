<?php
/**
 * @desc Created by FavorTGD.
 * @author : FavorMylikes<l786112323@gmail.com>
 * @since : 2016/3/1 18:51
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<?php $form = ActiveForm::begin(['id' => 'form-signup','layout' => 'horizontal']); ?>

<?= $form->field($model, 'email')->label(false)->textInput(['placeholder'=>$model->getAttributeLabel('email'),'autofocus' => true]) ?>

<?= $form->field($model, 'password')->label(false)->passwordInput(['placeholder'=>$model->getAttributeLabel('password')]) ?>

<?= $form->field($model, 'password2')->label(false)->passwordInput(['placeholder'=>$model->getAttributeLabel('password2')]) ?>

<?php
echo $form->field($model, 'verifyCode')->label(false)->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-lg-12">{input}</div><div class="col-lg-12">{image}</div></div>',
        'options'=>['class' => 'form-control','placeholder'=>$model->getAttributeLabel('verifyCode'),],
        'imageOptions'=>['style'=>'margin-top: 5px;']
    ]
)
?>
<div class="form-group">
    <div class="row col-sm-6 col-sm-offset-3">
        <?= Html::submitButton('注册', ['class' => 'btn btn-info', 'name' => 'signup-button','style'=>"width:100%;"]) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
