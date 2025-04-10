<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

?>
<section>
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-4">
              <div class=" card  form-group">
                <div class="card-body">
                    <?= $this->Flash->render() ?>
                    <h3 class="card-title">Daftar</h3>
                    <?= $this->Form->create($user) ?>
                    <?php
                        echo $this->Form->control('username',['class'=>'form-control']);
                        echo $this->Form->control('email',['class'=>'form-control']);
                        echo $this->Form->control('password',['class'=>'form-control']);
                    ?>
                    <div class="mt-2 d-grid gap-2 d-md-flex justify-content-md-center">
                      <?= $this->Form->submit(__('Submit'),['class'=>'btn btn-outline-primary']); ?>
                    </div>
                  </div>
                <?= $this->Form->end() ?>
                <div class='card-footer'>
                  <?= $this->Html->link(__('Login'),['action'=>'login'],['class'=>'btn btn-outline-secondary d-md-flex justify-content-md-center']) ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <?= $this->Html->image('register.jpg',['width'=> 450, 'class'=>'float-left']) ?>
            </div>
        </div>
    </div>
</section>
