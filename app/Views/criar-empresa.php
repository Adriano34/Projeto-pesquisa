<?php
 require_once 'layout/header.php';
?>
<h2>criar</h2>
<form>
    <div class="row">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome da empresa</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>

        <div class="col-md-4">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone">
        </div>

        <div class="col-md-8">
            <label for="site" class="form-label">Site</label>
            <input type="text" class="form-control" id="site" name="site">
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">UF</label>
            <select id="inputState" class="form-select">
                <option selected></option>
                <option>...</option>
            </select>
        </div>
        
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Cidade</label>
            <select id="inputState" class="form-select">
                <option selected></option>
                <option>...</option>
            </select>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col">
            <label for="preco_recapagem">Preço Arla</label>
            <input type="number" class="form-control" id="preco_arla" name="preco_arla" placeholder="Preço Arla">
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name='comercializa[]' type="checkbox" id="comercializa_arla" value='comercializa_arla'>
                <label class="form-check-label" for="comercializa_arla">Comercializa Arla?</label>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col">
            <label for="preco_recapagem">Preço Câmbio</label>
            <input type="number" class="form-control" id="preco_arla" name="preco_cambio" placeholder="Preço Câmbio">
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name='comercializa[]' type="checkbox" id="comercializa_cambio" value='comercializa_cambio'>
                <label class="form-check-label" for="comercializa_cambio">Comercializa Câmbio?</label>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col">
            <label for="preco_recapagem">Preço Implemento</label>
            <input type="number" class="form-control" id="preco_implemento" name="preco_implemento" placeholder="Preço Implemento">
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name='comercializa[]' type="checkbox" id="comercializa_implemento" value='comercializa_implemento'>
                <label class="form-check-label" for="comercializa_implemento">Comercializa Implemento?</label>
            </div>
        </div>
    </div>
        
    <div class="row align-items-center">
        <div class="col">
            <label for="preco_recapagem">Preço Lavagem</label>
            <input type="number" class="form-control" id="preco_lavagem" name="preco_lavagem" placeholder="Preço Lavagem">
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name='comercializa[]' type="checkbox" id="comercializa_lavagem" value='comercializa_lavagem'>
                <label class="form-check-label" for="comercializa_lavagem">Comercializa Lavagem?</label>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col">
            <label for="preco_recapagem">Preço Motor</label>
            <input type="number" class="form-control" id="preco_motor" name="preco_motor" placeholder="Preço Motor">
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name='comercializa[]' type="checkbox" id="comercializa_motor" value='comercializa_motor'>
                <label class="form-check-label" for="comercializa_motor">Comercializa Motor?</label>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col">
            <label for="preco_recapagem">Preço Pneus</label>
            <input type="number" class="form-control" id="preco_pneus" name="preco_pneus" placeholder="Preço Pneus">
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name='comercializa[]' type="checkbox" id="comercializa_pneus" value='comercializa_pneus'>
                <label class="form-check-label" for="comercializa_pneus">Comercializa Pneus?</label>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col">
            <label for="preco_recapagem">Preço Recapagem</label>
            <input type="number" class="form-control" id="preco_recapagem" name="preco_recapagem" placeholder="Preço Recapagem">
        </div>

        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name='comercializa[]' type="checkbox" id="comercializa_recapagem" value='comercializa_recapagem'>
                <label class="form-check-label" for="comercializa_recapagem">Comercializa Recapagem?</label>
            </div>
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