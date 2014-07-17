<?php
/** Created by griga at 25.11.13 | 14:01.
 * @var $model Template
 */

$this->breadcrumbs = [
    t('System')=>'/admin/sys/',
    t('Templates')
];

$this->widget('ext.yg.GridFilterClearButtons', array(
    'gridId'=>'template-grid',
))

?>

<div class="row">
    <div class="col-sm-12">
        <h3><?php echo t('Templates'); ?></h3>
        <a class="btn btn-success btn-xs" href="/admin/sys/template/create"><span class="glyphicon glyphicon-plus"></span> <?= t('add') ?></a>
        <?php $this->widget('\yg\tb\GridView', array(
            'id' => 'template-grid',
            'dataProvider' => $model->multilang()->search(),
            'ajaxUpdate' => false,
            'filter' => $model,
            'columns' => array(
                'key',
                'name',
                array(
                    'class' => '\yg\tb\ButtonColumn',
                ),
            )
        )); ?>
    </div>
</div>