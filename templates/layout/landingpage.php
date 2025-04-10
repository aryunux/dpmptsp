<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css(['landingpage','panada','bs/bootsrap']) ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="<?= $this->Url->build('/') ?>"><?= $this->Html->image('bb.png',['width'=> 40, 'class'=>'float-left']) ?>DPMPTSP BONE BOLANGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><?= $this->Html->link(__('DAFTAR'),['controller'=>'users','action'=>'register'],['class'=>'nav-link']) ?></li>
                        <li class="nav-item"><?= $this->Html->link(__('LOGIN'),['controller'=>'users','action'=>'login'],['class'=>'nav-link']) ?></li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="main">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
        </main>

        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; DPMPTSP Bone Bolango 2025</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <?= $this->Html->script(['landingpage']) ?>
    </body>
</html>
