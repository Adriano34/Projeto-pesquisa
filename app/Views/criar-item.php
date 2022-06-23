<?php
 require_once 'layout/header.php';
?>
<h2>Criar itens</h2>
<form>
    <div class="row">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>

        <div class="col-md-4">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao"></textarea>
        </div>

        <div class="col-md-8">
            <label for="unidade_medida" class="form-label">Unidade Medida</label>
            <input type="text" class="form-control" id="unidade_medida" name="unidade_medida">
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Tipo</label>
            <select id="inputState" class="form-select">
                <option value="empresas">Empresas</option>
                <option value="online">Online</option>
            </select>
        </div>
        
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</form>

<?php
 require_once 'layout/footer.php';
?>