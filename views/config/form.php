<?php /** @var $form \yg\tb\ActiveForm */
/** @var Config $model */

$this->breadcrumbs = array(
    t('Config') => '/admin/sys/config/',
    t($model->isNewRecord ? 'New record' : 'Update record'),
);

$form = $this->beginWidget('\yg\tb\ActiveForm', array(
    'id' => 'config-form',
)); ?>
<h3><?= t($model->isNewRecord ? 'New record' : 'Update record') ?></h3>
<hr/>
<div class="well">
    <h4><?= t('Config item') ?></h4>
    <?= $form->hiddenField($model, 'id') ?>
    <?= $form->textControl($model, 'key') ?>
    <?= $form->textAreaControl($model, 'value') ?>


</div>
<?= $form->actionButtons($model); ?>
<?php $this->endWidget(); ?>
