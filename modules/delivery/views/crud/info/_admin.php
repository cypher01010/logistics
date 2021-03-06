<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$customerLink = NULL;
if($model->customer_id != '') {
	$customerObject = $userObject->findOne($model->customer_id);
	$customerLink = '<a href="' . \Yii::$app->getUrlManager()->createUrl(['user/crud/view', 'id' => $customerObject->id]) . '" target="_blank">' . $customerObject->name . '</a>';
}

$driverLink = NULL;
if($model->driver_id != '') {
	$driverObject = $userObject->findOne($model->driver_id);
	$driverLink = '<a href="' . \Yii::$app->getUrlManager()->createUrl(['user/crud/view', 'id' => $driverObject->id]) . '" target="_blank">' . $driverObject->name . '</a>';
}
?>
<h3>Admin Details</h3>
<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		[
			'attribute'=>'customer_id',
			'label' => 'Customer',
			'format' => 'raw',
			'value' => ($model->customer_id == '') ? '(not set)' : $customerLink,
		],
		[
			'attribute'=>'driver_id',
			'label' => 'Driver',
			'format' => 'raw',
			'value' => ($model->driver_id == '') ? '(not set)' : $driverLink,
		],
	],
	'options' => ['class' => 'delivery-table-info table table-striped table-bordered detail-view']
]) ?>

<h3>Sender's Details</h3>
<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		'sender_name',
		'sender_company',
		'sender_contact',
		'sender_postal_code',
		'sender_blk_street_name',
		'sender_bldg_name',
		'sender_unit_no',
	],
	'options' => ['class' => 'delivery-table-info table table-striped table-bordered detail-view']
]) ?>

<h3>Recipient's Details</h3>
<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		'receiver_name',
		'receiver_company',
		'receiver_contact',
		'postal_code',
		'blk_street_name',
		'bldg_name',
		'unit_no',
	],
	'options' => ['class' => 'delivery-table-info table table-striped table-bordered detail-view']
]) ?>

<h3>Package Details</h3>
<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		[
			'attribute'=>'date_delivery',
			'header' => 'Delivery Date',
			'format' => 'raw',
			'value' => ($model->date_delivery == '') ? '(not set)' : date(\Yii::$app->controller->dateFormatDisplay(), strtotime($model->date_delivery)),
		],
		'delivery_time',
        'remarks',
		'type_products',
		'cartoon_size',
		'cartoon_weight',
		'no_cartoons',
		[
			'attribute'=>'document',
			'label' => 'Document',
			'format' => 'raw',
			'value' => ($model->document == '') ? '(not set)' : '<a href="/uploads/' . $model->document . '" target="_blank">Open Document</a>',
		],
		'tracking_id',
		'delivery_book_id',
	],
	'options' => ['class' => 'delivery-table-info table table-striped table-bordered detail-view']
]) ?>

<h3>Other Details</h3>
<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		//'package_type',
		'status',
		[
			'attribute'=>'image_signature',
			'label' => 'Signature',
			'format' => 'raw',
			'value' => ($model->image_signature == '') ? '(not set)' : '<a href="#modal-signature" data-toggle="modal" data-image-url="' . \Yii::$app->getUrlManager()->createUrl(['delivery/crud/signature', 'id' => $model->id]) . '" id="link-signature">view</a>',
		],
	],
	'options' => ['class' => 'delivery-table-info table table-striped table-bordered detail-view']
]) ?>