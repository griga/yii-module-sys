<?php /** @var $form \yg\tb\ActiveForm */
/** @var Config $model */

$this->breadcrumbs = array(
    t('System') => '/admin/sys/',
    t('Templates') => '/admin/sys/template/',
    t($model->isNewRecord ? 'New record' : 'Update record'),
);

$form = $this->beginWidget('\yg\tb\ActiveForm', array(
    'id' => 'template-form',
)); ?>
<h3><?= t($model->isNewRecord ? 'New record' : 'Update record') ?></h3>
<hr/>
<div class="well">
    <h4><?= t('Config item') ?></h4>
    <?= $form->textControl($model, 'key') ?>
    <?= $form->textAreaControl($model, 'name',[
        'multilingual'=>true,
    ]) ?>
    <?= $form->textAreaControl($model, 'comment') ?>
</div>
<div class="well">
    <h4><?= t('Content') ?></h4>
    <?php $this->widget('\yg\tb\RedactorWidget', [
        'model' => $model,
        'attribute' => 'content',
        'height' => 400
    ]);?>
    <?= $form->error($model, 'content') ?>

</div>
<?= $form->actionButtons($model); ?>
<?php $this->endWidget(); ?>
