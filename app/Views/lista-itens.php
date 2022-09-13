<?php $this->view('layout/header'); ?>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Unidade Medida</th>
          <th scope="col">Tipo</th>
          <th scope="col">Acões</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($itens as $item) :?>
          <tr class="item_row">
            <td> <?= $item->getId(); ?></td>
            <td> <?= $item->getNome(); ?></td>
            <td> <?= $item->getUnidadeMedida(); ?></td>
            <td> <?= $item->getTipo(); ?></td>
            <td>
              <a href="/itens/editar?id=<?= $item->getId(); ?>" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Editar</a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>

<?php $this->view('layout/footer'); ?>