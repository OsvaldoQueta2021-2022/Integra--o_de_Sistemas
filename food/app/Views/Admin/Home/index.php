<?php echo $this->extend('Admin/layout/principal') ?>


<?php echo $this->section('titulo') ?> <?php echo $titulo;?> <?php echo $this->endSection() ?>


<?php echo $this->section('estilos') ?>

<!--Aqui enviamos para o template principal os estilos-->

<?php echo $this->endSection() ?>


<?php echo $this->section('conteudo') ?>

<!--Aqui enviamos para o template principal os conteúdos-->

<?php echo $titulo;?> <!-- Este título comcifrão significa que está vindo do controlo-->

<?php echo $this->endSection() ?>




<?php echo $this->section('scripts') ?>

<!--Aqui enviamos para o template principal os scripts-->

<?php echo $this->endSection() ?>