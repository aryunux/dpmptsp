<div class="row">
  <div class="content column column-40">
    <div class=" users form">
      <?= $this->Flash->render() ?>
      <h3>Login</h3>
      <?= $this->Form->create() ?>
      <fieldset>
      <?= $this->Form->control('email', ['required' => true]) ?>
      <?= $this->Form->control('password', ['required' => true]) ?>
      </fieldset>
      <?= $this->Form->submit(__('Login')); ?>
      <?= $this->Form->end() ?>
    </div>
    <div>
      <?= $this->Html->link('Registrasi Akun Baru',['action'=>'add']) ?>
    </div>
  </div>
</div>
