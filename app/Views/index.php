<?php
 require_once 'layout/header.php';
?>

    <h2>Inicio</h2>
    <label for="exampleDataList" class="form-label">pesquisa de precos</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="escreva para pesquisar...">
    <datalist id="datalistOptions">
      <option value="San Francisco">
      </option><option value="New York">
      </option><option value="Seattle">
      </option><option value="Los Angeles">
      </option><option value="Chicago">
    </option></datalist>
    
<?php
 require_once 'layout/footer.php';
?>