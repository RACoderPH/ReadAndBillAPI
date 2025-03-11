<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YourModel */

$this->title = 'Update Account Details';
$this->params['breadcrumbs'][] = $this-> title;
?>
<div>
    <div class='d-flex justify-content-between pt-4 mb-4'>
        <div>
            <h2><?= Html::encode($this-> title) ?></h2>
        </div>
        <div>&nbsp;</div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?php
    foreach ($model->attributes as $attribute => $value) {
        if (!in_array($attribute, ['id'])) { //list fields to be excluded or not editable
            $field = $form->field($model, $attribute, [
                'labelOptions' => ['class' => 'fw-bold'],
                'options' => ['class' => 'mt-4']
            ]);

            $column = $model->getTableSchema()->getColumn($attribute);
            if ($column->type === 'date') {
                echo $field->input('date');
            } elseif (preg_match('/int/', $column->dbType)) { //int, tinyint, smallint, etc
                echo $field->input('number', ['step' => '1']); // Ensures that only integers are input
            } else {
                echo $field->textInput();
            }
        }
    }
    ?>

    <div class="form-group mt-4">
        <?= Html::submitButton('Save Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
