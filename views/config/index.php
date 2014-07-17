<?php
/** Created by griga at 25.11.13 | 14:01.
 * @var $model Config
 */

$this->breadcrumbs = [
    t('Config')=>'/admin/sys/config',
    t('Application settings')
];
?>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h3><?= t('Application settings'); ?></h3>
            <?php $this->widget('\yg\tb\ModalRemoteLink', [
                'href' => app()->createUrl('sys/config/create'),
                'label' => '<span class="glyphicon glyphicon-plus"></span> '.t('add'),
                'htmlOptions' => [
                    'id' => 'config-add-launcher',
                    'class' => 'btn btn-success btn-xs',
                    'data-modal-success-rise'=>'configAdded',
                ]
            ]);?>
            <?php

            $this->widget('\yg\tb\GridView', [
                'id' => 'config-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => [
                    'key',
                    'value',
                    [
                        'class' => '\yg\tb\AjaxButtonColumn',
                        'updateModalSuccessRise'=>'configAdded',
                        'controllerId'=>'config',
                        'moduleId'=>'sys',
                    ],
                ]
            ]); ?>

        </div>
    </div>
<script type="text/javascript">
    $(function(){
        $('#config-grid').parent().on('configAdded', function(event, data){
            $.fn.yiiGridView.update("config-grid");
        });
    })
</script>