<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 26.11.15
 * Time: 16:07
 */ ?>

<?= Form::open(['url' => action('AdminController@test'), 'method' => 'POST', 'files' => true]) ?>
{{ Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name']) }}
{{ Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) }}


<?= Form::file('avatar') ?>
<?= Form::submit('save') ?>
<?= Form::close() ?>

<img src="<?= $user->avatar->url() ?>" >
<img src="<?= $user->avatar->url('medium') ?>" >
<img src="<?= $user->avatar->url('thumb') ?>" >