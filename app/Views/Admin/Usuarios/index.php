<?php echo $this->extend('Admin/layout/principal'); ?>

<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>




<?php echo $this->section('estilos'); ?>
<!--Aqui enviamos para o templete principal os estilios-->
<?php echo $this->endSection(); ?>






<?php echo $this->section('conteudo'); ?>

<div class="row">
    
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $titulo; ?></h4>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Cpf</th>
                                <th>ativo</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($usuarios as $usuario) : ?>

                            <tr>
                                <td><?php echo $usuario->nome; ?></td>
                                <td><?php echo $usuario->email; ?></td>
                                <td><?php echo $usuario->cpf; ?></td>
                                <td> <?php echo ($usuario-> ativo ? '<label class="badge badge-primary">Sim</label>' : '<label class="badge badge-danger">Não</label>'); ?> </td>
                               
                                
                            </tr>
                            
                            <?php endforeach; ?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section('scripts'); ?>
<!--Aqui enviamos para o templete principal os scripts-->

<?php echo $this->endSection(); ?>