<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Client;

class HomeController extends Controller
{
    public function index()
    {
        if (!empty(session('id')) && Client::verificaCompraCliente(session('id'))) {
            $para = (empty(session('id'))) ? 'null' : session('id');
            $data = Order::matchNodeOrder($para);
            $dataRecom = Product::produtosHome();
            if(Client::qtdClientes()->getRecord()->value('qtd') > 2){
                $recom = Client::cosineSimilarity(Session('id'))->getRecord()->value('recom');
                $dataRecom = Product::baseCosine($recom);
            }
            
            return view('home', ['data' => $data->getRecords(), 'dataRecom' => $dataRecom->getRecords()]);
        }else{
            $para = (empty(session('id'))) ? 'null' : session('id');
            if($para == 'null'){
                $data = Order::matchNodeOrder($para);
                $dataRecom = Product::produtosHome();
                return view('home', ['data' => $data->getRecords(), 'dataRecom' => $dataRecom->getRecords()]);
            }
                $data = Order::matchNodeOrder($para);
                if(!Client::verificaCompraCliente(session('id'))){
                    $dataRecom = Product::produtosHome();
                }else{
                    $dataRecom = Product::bestSellers();
                }
        }
        
        return view('home', ['data' => $data->getRecords(), 'dataRecom' => $dataRecom->getRecords()]);
    }

    public function produto(Request $request)
    {
        $dataSup = Product::matchNodeProduct("Product");
        $count = count($dataSup->getRecords());
        $category = Category::matchNode("Category");
        $para = (empty(session('id'))) ? 'null' : session('id');
        $data = Order::matchNodeOrder($para);
        $data = empty($data->getRecords()) ? null : $data->getRecords();
        return view('product', ['dataSup' => $dataSup->getRecords(), 'category' => $category->getRecords(), 'count' => $count, 'data' => $data]);
    }

    public function produtoDetalhe($id)
    {
        $p = Product::matchNodeId("Product", $id);
        $dataRel = Product::matchNodeRel($id);
        $para = (empty(session('id'))) ? 'null' : session('id');
        $data = Order::matchNodeOrder($para);
        $avaliacao = Product:: productRating($id);
        return view('productDetail', ['p' => $p->getRecord(), 'dataRel' => $dataRel->getRecords(), 'data' => $data->getRecords(), 'rating' => $avaliacao->getRecord()]);
    }

    public function about()
    {
        $para = (empty(session('id'))) ? 'null' : session('id');
        $data = Order::matchNodeOrder($para);

        return view('about', ['data' => $data->getRecords()] );
    }

    public function contact()
    {
        $para = (empty(session('id'))) ? 'null' : session('id');
        $data = Order::matchNodeOrder($para);
        return view('contact', ['data' => $data->getRecords()]);
    }

    public function cart($id)
    {
        if (!empty(session('id'))) {
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d H:i');
            $data = ([
                'infos' => [
                    'compra' => 0,
                    'idCli' => intVal(Session('id')),
                    'idPro' => intVal($id)
                ]
            ]);
            $rel = ([
                'idCli' => Session('id'),
                'idPro' => $id,
                'date' => $data
            ]);
            $dados = Order::createNodeOrderProperty($data, $rel);
            $dataRel = Product::matchNodeRel($dados->getRecord()->value('idP'));
            return view('cart', ['data' => $dados->getRecords(), 'dataRel' => $dataRel->getRecords()]);
        } else {
            $data = Order::matchNodeOrder('null');
            return view('client', ['data' => $data->getRecords()]);
        }
    }

    public function client()
    {
        if (!isClient()) {
            return view('client');
        } else {
            $para = (empty(session('id'))) ? 'null' : session('id');
            $data = Order::matchNodeOrder($para);
            return view('clientPanel', ['data' => $data->getRecords()]);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function category()
    {
        return view('category');
    }
}
