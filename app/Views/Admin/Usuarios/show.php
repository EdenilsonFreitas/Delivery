<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>




<?php echo $this->section('estilos'); ?>

<?php echo $this->endSection(); ?>






<?php echo $this->section('conteudo'); ?>

<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-primary pb-0 pt-4 ">
            
            <h4 class="card-title text-white"> <?php echo esc($titulo); ?></h4>

            </div>

            <div class="card-body">
               

                <p class="card-text "><?php echo esc($usuario->nome); ?></p>


               

                
            </div>
        </div>
    </div>

</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section('scripts'); ?>


<?php echo $this->endSection(); ?>