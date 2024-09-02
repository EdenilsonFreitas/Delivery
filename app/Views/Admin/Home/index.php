<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>








<?php echo $this->section('estilos'); ?>
<!--Aqui enviamos para o templete principal os estilios-->
<?php echo $this->endSection(); ?>






<?php echo $this->section('conteudo'); ?>
<!--Aqui enviamos para o templete principal os conteudos-->
<?php echo $titulo; ?>
<?php echo $this->endSection(); ?>


<?php echo $this->section('scripts'); ?>
<!--Aqui enviamos para o templete principal os scripts-->

<?php echo $this->endSection(); ?>