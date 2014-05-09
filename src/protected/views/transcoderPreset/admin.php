<?php

/* @var $this TranscoderPresetController */
/* @var $dataProvider CActiveDataProvider */

?>

<h2>Manage transcoder presets</h2>

<?php echo FormHelper::helpBlock('Here you can see all configured transcoder presets. 
		A preset is a format that is presented to the browser - the browser then 
		chooses which source it actually plays depending on which ones it supports. 
		This means that you can have only one preset per codec.'); ?>

<?php echo TbHtml::linkButton('Create new preset', array(
	'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
	'url'=>array('create'))); ?>

<hr />

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'transcoder-preset-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'name',
		'video_codec',
		'video_bitrate',
		'resolution',
		'audio_codec',
		'audio_bitrate',
		'audio_channels',
		array(
			'name'=>'audio_channels',
			'value'=>function($data) {
				/* @var $data TranscoderPreset */
				return $data->audio_channels == 0 ? 'Original' : $data->audio_channels;
			}
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
		),
	),
));