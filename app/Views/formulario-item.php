<?php $this->view('layout/header'); ?>

<h2><?php if(isset($item)) {
    
}?>Criar itens</h2>
<form method="post" action="/itens/salvar">
    <div class="row">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $item->getNome();?>">
        </div>

        <div class="col-md-4">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao"><?php echo $item->getDescricao();?></textarea>
        </div>

        <div class="col-md-8">
            <label for="unidade_medida" class="form-label">Unidade Medida</label>
            <input type="text" class="form-control" id="unidade_medida" name="unidade_medida" value="<?php echo $item->getUnidadeMedida();?> ">
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Tipo</label>
            <select id="inputState" class="form-select" name="tipo">
                <option value="empresas" <?php 
                    if($item->getTipo() == "empresas") {
                        echo "selected";
                        }
                    ?>>Empresas</option>
                    
                <option value="online" <?php
                        if($item->getTipo() == "online") {
                            echo "selected";
                        }
                    ?>>Online</option>
            </select>
        </div>
        
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</form>

<?php $this->view('layout/footer'); ?>
