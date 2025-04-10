
<section>
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-4">
              <div class=" card  form-group">
                <div class="card-body">
                    <?= $this->Flash->render() ?>
                    <h3 class="card-title">Login</h3>
                    <?= $this->Form->create() ?>
                    <?= $this->Form->control('email', ['required' => true,'class'=>'form-control']) ?>
                    <?= $this->Form->control('password', ['required' => true,'class'=>'form-control']) ?>
                    <div class="mt-5 d-grid gap-2 d-md-flex justify-content-md-center">
                      <?= $this->Form->submit(__('Login'),['class'=>'btn btn-outline-primary']); ?>
                    </div>
                  </div>
                <?= $this->Form->end() ?>
                <div class='card-footer mt-8'>
                  <?= $this->Html->link(__('Registrasi Akun Baru'),['action'=>'register'],['class'=>'mt-4 btn btn-outline-secondary d-md-flex justify-content-md-center ']) ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <?= $this->Html->image('login.jpg',['width'=> 400, 'class'=>'float-left']) ?>
            </div>
        </div>
    </div>
</section>
