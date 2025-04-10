<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>


<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      DPMPTSP Bone Bolango | <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake','panada','main']) ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
  <div class="top-nav-box">
    <nav class="top-nav">
        <div class="top-nav-title">
          <?= $this->Html->image('bb.png',['width'=> 40, 'class'=>'float-left']) ?>
            <a href="<?= $this->Url->build('/') ?>">  <span> Dinas </span>Penanaman Modal Dan PTSP <span>Bone Bolango</span></a>
        </div>
        <div class="float-right">
        <?php
            if ($identitasuser)
            {
                echo"<i class='bi bi-person-circle'></i>";
                echo ($identitasuser->get('username'));
                echo $this->Html->link(__('Logout'),['controller'=>'users','action'=>'logout'],['class'=>'loginoutnav']);
                echo"<i class='bi bi-box-arrow-right'></i>";
            } else {

              echo $this->Html->link(__('Login'),['controller'=>'users','action'=>'login'],['class'=>'loginoutnav']);
            }
         ?>
       </div>
    </nav>
  </div>
    <main class="main">
        <div class="container">
          <section id='navmenu' class="navmenu admin-nav dark-background" >
              <ul>
                  <li><?= $this->Html->link(__('User'),['prefix'=>'Admin','controller'=>'users','action'=>'index'],['class'=>'adminnav-item']) ?></li>
                  <li><?= $this->Html->link(__('Profile'),['prefix'=>'Admin','controller'=>'profiles','action'=>'index'],['class'=>'adminnav-item']) ?></li>
                  <li><?= $this->Html->link(__('Penelitian'),['prefix'=>'Admin','controller'=>'research','action'=>'index'],['class'=>'active adminnav-item']) ?></li>
                  <li><?= $this->Html->link(__('Verifikasi'),['prefix'=>'Admin','controller'=>'researchVerifications','action'=>'index'],['class'=>'adminnav-item']) ?></li>
                  <li><?= $this->Html->link(__('Surat Keputusan'),['prefix'=>'Admin','controller'=>'researchSks','action'=>'index'],['class'=>'adminnav-item']) ?></li>
              </ul>
          </section>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>


</body>
</html>
