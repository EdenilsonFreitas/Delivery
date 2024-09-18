<div class="form-row">

    <div class="form-group col-md-4">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo esc($usuario->nome);?>">
    </div>

    <div class="form-group col-md-2">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control cpf" name="cpf" id="cpf" value="<?php echo esc($usuario->cpf);?>">
    </div>

    <div class="form-group col-md-3">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control sp_celphones" name="telefone" id="telefone"
            value="<?php echo esc($usuario->telefone); ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo esc($usuario->email); ?>">
    </div>


</div>


<div class="form-row">


    <div class="form-group col-md-3">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div class="form-group col-md-3">
        <label for="confirmation_password">Confirmação de Senha</label>
        <input type="password" class="form-control" name="password_confirmation" id="confirmation_password">

    </div>

    <div class="form-group col-md-3">
        <label for="is_admin">Perfil de acesso</label>
        <select class="form-control" name="is_admin">

            <?php if($usuario->id):?>
            <option value="1" <?php echo ($usuario-> is_admin? 'selected' : ''); ?>>Administrador</option>
            <option value="0" <?php echo (!$usuario-> is_admin ? 'selected' : ''); ?>>Cliente</option>
            

            <?php else: ?>
            <option value="1">Sim</option>
            <option value="0" selected="">Não</option>

            <?php endif; ?>


        </select>

    </div>

    <div class="form-group col-md-3">
        <label for="ativo">Ativo</label>
        <select class="form-control" name="ativo">

            <?php if($usuario->id):?>
            <option value="1" <?php echo ($usuario-> ativo ? 'selected' : ''); ?>>Sim</option>
            <option value="0" <?php echo (!$usuario-> ativo ? 'selected' : ''); ?>>Não</option>
            

            <?php else: ?>

            <option value="1">Sim</option>
            <option value="0" selected="">Não</option>

            <?php endif; ?>


        </select>

    </div>

</div>





<button type="submit" class="btn btn-primary">
    <i class="mdi mdi-floppy mr-2"></i>Salvar
</button>

<a href="<?= site_url("admin/usuarios/show/{$usuario->id}"); ?>"
    class="btn btn-light text-dark   btn-icon-text btn-icon-prepend"> <i
        class="mdi mdi-arrow-left  btn-icon-prepend"></i>Voltar </a>