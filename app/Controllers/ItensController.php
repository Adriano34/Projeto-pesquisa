<?php
namespace App\Controllers;
use App\Dao\ItemDao;
use App\Models\Item;

class ItensController extends Controller
{
    public function index()
    {
        $itemdao = new ItemDao();
        $itens = $itemdao->listarTodos();

        $this->view('lista-itens', compact('itens'));
    }

    public function criar()
    {
        $this->view('formulario-item');
    }

    public function salvar() {
        $item = new Item();
        $item->setNome($_POST['nome']);
        $item->setDescricao($_POST['descricao']);
        $item->setUnidadeMedida($_POST['unidade_medida']);
        $item->setTipo($_POST['tipo']);

       $itemdao = new ItemDao();
       $itemdao->create($item);

       header("Location:/?pagina=itens");
    }
    public function editar()
    {
        $itemdao = new ItemDao();
        $item = $itemdao->listarPorId($_GET['id']);
        $this->view('formulario-item', compact('item'));
    }
}
