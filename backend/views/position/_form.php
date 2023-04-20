<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Position $model */
/** @var yii\widgets\ActiveForm $form */
?>



<?php $form = ActiveForm::begin(); ?>

<div class="row mb-15" >
    <div class="col-md-12">
        <div class="card-box">
            <form action="#">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Lavozim nomi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'position_name')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'status')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


