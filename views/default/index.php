<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel profitcode\blocks\models\BlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('blocks', 'Blocks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('blocks', 'Add block'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'class' => \yii\grid\DataColumn::className(),
                'label' => Yii::t('blocks', 'System name'),
                'value' => function ($model) {
                    return $model->getSystemName();
                }
            ],
            [
                'class' => \yii\grid\DataColumn::className(),
                'label' => Yii::t('blocks', 'Variable for template'),
                'value' => function ($model) {
                    return '{{' . $model->getSystemName() . '}}';
                }
            ],
            'title',            
            'format',
            'active:boolean',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
