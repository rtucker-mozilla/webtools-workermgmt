
    <?php echo form::open('/authenticate/login',array('class'=>'app_form', 'accept-charset'=>'utf-8')); ?>
    <fieldset><legend><img src="<?php echo URL::base(); ?>/media/img/ico-bugz.gif">Log in with your Bugzilla Account</legend>
      <?php echo form::hidden('form_token', $_SESSION['form_token'] = uniqid()); ?>
      <div class="input">
        <?php echo form::label('bz_username', 'Bugzilla E-mail Address:'); ?>
        <?php echo form::input('bz_username=id', $bz_username); ?>
        <?php client::validation('bz_username'); ?>
      </div>
      <div class="input">
        <?php echo form::label('bz_password', 'Bugzilla Password:'); ?>
        <?php echo form::password('bz_password=id', $bz_password); ?>
        <?php client::validation('bz_password'); ?>
      </div>
      <div>
        <input class="submit" type="submit" name="submit" value="Login" />
      </div>
    <?php echo form::close(); ?>
    </fieldset>