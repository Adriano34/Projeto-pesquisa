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
        if (isset($_GET['id'])) {
            $itemdao = new ItemDao();

            $id = $_GET['id'];
            $item = $itemdao->listarPorId($id);

            if (!empty($item)) {
                $this->view('formulario-item', compact('item'));
            } else {
                echo 'Item não encontrado!';
            }
        } else {
            echo 'É necessário informar o ID para esta operação!';
        }
    }
}
