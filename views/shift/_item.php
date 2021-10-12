<?php
use  kartik\select2\Select2;
use kartik\widgets\TimePicker;

$data = [
     6 => 'Minggu',
     0 => 'Senin',
     1 => 'Selasa',
    2 => 'Rabu',
    3 => 'Kamis',
     4 => 'Jumat',
     5 => 'Sabtu',
];

?>
<td>
<?= $form->field($model, "[$key]hari")->widget(Select2::classname(), [
    'data' => $data,
    'options' => [
        'placeholder' => 'Pilih Hari ...',
    ],
    'pluginOptions' => [
        'allowClear' => true,
    ],
])->label(false); ?>

</td>
<td>
<?= $form->field($model, "[$key]masuk_kerja")->widget(TimePicker::className(),[ 'pluginOptions' => [
        'showSeconds' => false,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ]])->label(false);
 ?>

</td>
<td>
<?= $form->field($model, "[$key]pulang_kerja")->widget(TimePicker::className(),[ 'pluginOptions' => [
        'showSeconds' => false,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ]])->label(false); ?>

</td>

    <td>

    <a data-action="delete" id='delete3'><span class="fa fa-trash">
</td>