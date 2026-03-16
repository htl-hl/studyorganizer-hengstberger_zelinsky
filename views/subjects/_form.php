<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Subjects $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $teachersList */
/** @var app\models\Teachers[] $teachers */
?>

<div class="subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subjectname')->textInput(['maxlength' => true, 'style' => 'width: 400px;']) ?>

    <?= $form->field($model, 'teacherIds')->checkboxList($teachersList, [
            'item' => function($index, $label, $name, $checked, $value) use ($teachers) {
                $teacher = null;
                foreach ($teachers as $t) {
                    if ($t->teacherID == $value) {
                        $teacher = $t; break;
                    }
                }
                $inactive = $teacher && !$teacher->isActive;
                return '<div class="form-check">'
                        . Html::checkbox($name, $checked, [
                                'value' => $value,
                                'disabled' => $inactive,
                                'style' => 'transform: scale(1.5); margin-right: 5px;'
                        ])
                        . '<span style="' . ($inactive ? 'font-style:italic;' : '') . '">'
                        . $label . ($inactive ? ' (inaktiv)' : '')
                        . '</span></div>';
            }
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
