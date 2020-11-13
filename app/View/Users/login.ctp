<div style="background:#f1f2f3; padding: 2rem;height: 100%;">
    <div style="height: 100%; display:flex; justify-content: center; align-items: center; flex-direction: column;">
        <div style="background: #fff; width: 500px; max-width: 100%; border-radius: 1rem; padding: 1rem; box-shadow: 0px 3px 20px 0px rgba(13, 21, 75, 0.3);">
            <div class="users form">
                <?php echo $this->Flash->render('auth'); ?>
                <?php echo $this->Form->create('User');?>
                    <fieldset>
                        <legend>
                            <h1><?php echo __('Preencha seus dados.'); ?></h1>
                        </legend>

                        <hr>

                        <?php echo $this->Form->input('username', array('class' => 'form-control'));
                        echo $this->Form->input('password', array('class' => 'form-control'));
                    ?>
                    </fieldset>
                <?php echo $this->Form->end(__('Login'));?>
            </div>
        </div>
    </div>
</div>