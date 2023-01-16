<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
.error-message{
    color:red;
}

    </style>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user, ['enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('password');
                    // echo $this->Form->control('gender');
                     echo '<label for="color-red">Gender</label>'; 
                    echo $this->Form->radio(
                        'gender',
                        ['male'=>'male', 'female'=>'female', 'Others'=>'Others'],
                        // ['empty' => 'Gender']
                    );
                    echo $this->Form->control('images',['type'=>'file']);
                    echo $this->Form->control('updated_time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
  <?= $this->Html->script('usersval') ?> 
  <?= $this->fetch('script') ?>