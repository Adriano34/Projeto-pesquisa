<?php $this->view('layout/header'); ?>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome da empresa</th>
          <th scope="col">Telefone</th>
          <th scope="col">site</th>
          <th scope="col">Municipio/UF</th>
          <th scope="col">Acões</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Empresa ...</td>
          <td>(55) 95959959959 ...</td>
          <td>Site</td>
          <td>Brasilia/DF</td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td colspan="3">@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>

<?php $this->view('layout/footer'); ?>