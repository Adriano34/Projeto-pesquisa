<?php
 require_once 'layout/header.php';
?>
<h2>criar</h2>
<form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nome da empresa</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Telefone</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Site</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">UF</label>
    <select id="inputState" class="form-select">
      <option selected></option>
      <option>...</option>
    </select>
  </div>
 <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck"> 
        <br>Arla</br>
      </label>
      <label class="form-check-label" for="gridCheck">
      <br>Câmbio</br>
      </label>
      <label class="form-check-label" for="gridCheck">
        Implemento
      </label>
      <label class="form-check-label" for="gridCheck">
        IPVA
      </label>
      <label class="form-check-label" for="gridCheck">
        Lavagem
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Entrar</button>
  </div>
</form>

    <!-- End Example Code -->
<?php
 require_once 'layout/footer.php';
?>