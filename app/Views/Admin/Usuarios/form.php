<div class="form-row">

<div class="form-group col-md-4">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" nome="nome" id="nome" value="<?php echo $usuario->nome;?>" >
</div>

<div class="form-group col-md-2">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" nome="cpf" id="cpf" value="<?php echo $usuario->cpf;?>" >
</div>

<div class="form-group col-md-3">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" nome="telefone" id="telefone" value="<?php echo $usuario->telefone; ?>" >
</div>

<div class="form-group col-md-3">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" nome="email" id="email" value="<?php echo $usuario->email; ?>" >
</div>



</div>






<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<div class="form-group">
    <label for="exampleInputConfirmPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
</div>
<div class="form-check form-check-flat form-check-primary">
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input">
        Remember me
    </label>
</div>


<button type="submit" class="btn btn-primary mr-2">Submit</button>
<button class="btn btn-light">Cancel</button>