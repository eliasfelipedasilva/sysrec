<?php

use App\Http\Controllers\OrderController;
use App\Neo4j\Neo4j;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get("/produtos", "HomeController@produto")->name("produto");

Route::get("/produtos/{id}", "ProductController@filterCat")->name("produtoCategoria");

Route::get("/produtoDetalhe/{id}", "HomeController@produtoDetalhe")->name("produtoDetalhe");

Route::get("/sobre", "HomeController@about")->name("about");

Route::get("/contato","HomeController@contact")->name("contact");

Route::get("/carrinho/{id}", "HomeController@cart")->name("cartId");

Route::get("/carrinho","CartController@index")->name("cart");

Route::get("/carrinhoExcluir/{id}","CartController@excluir")->name("cartExcluir");

Route::get("/cliente","HomeController@client")->name("client");

Route::get("/finalizar", "OrderController@finalizar")->name("finalSale");

Route::get("/registrar","HomeController@register")->name("register");

Route::post("/registrarCliente","ClientController@register")->name("clientRegister");


// Rota Fornecedor
Route::get("/registrarFornecedor","SupplierController@index")->name("supplier");

Route::post("/registrarFornecedorSubmit","SupplierController@register")->name("supplierRegister");

// Rota Categoria
Route::get("/registrarCategoria","CategoryController@index")->name("category");

Route::post("/registrarCategoriaSubmit","CategoryController@register")->name("categoryRegister");

// Rota Produtos -> Informar dados para cadastrar.
Route::get("/registrarProdutos","ProductController@product")->name("product");
// Rota Produtos -> Salvar no banco os dados cadastrados.
Route::post("/registrarProductSubmit","ProductController@register")->name("productRegister");

// Rota Produtos -> Salvar no banco os dados cadastrados.
Route::post("/registrarProductSubmitUpdate","ProductController@update")->name("productUpdate");

// Rota Produtos -> Selecionar produto pra edição.
Route::get("/selecionarProdutoParaEdicao", "ProductController@selection")->name("productSelection");

// Rota Produto -> Modificar os dados desejados
 Route::get("/editarProdutos", "ProductController@edit")->name("productEdit");



 // Rota Produto -> Selecionar os produtos através da Categoria
Route::get("selecionarProdutoParaEdicao/categoria/{category}", "ProductController@filterProductCategory");

Route::get("selecionarProdutoParaEdicao/produto/{id_produto}","ProductController@findProduct");

// Rota Produtos -> Selecionar produto pra edição.
Route::get("/selecionarCategoriaParaEdicao", "CategoryController@selection")->name("categorySelection");

 // Rota Categoria -> Selecionar a  Categoria
 Route::get("/selecionarCategoriaParaEdicao/categoria/{category}", "CategoryController@findCategory");

  // Rota Category -> Modificar os dados desejados
  Route::post("/editarCategorias", "CategoryController@edit")->name("categoryUpdate");

 // Rota Fornecedor -> Selecionar fornecedor
 Route::get("  /selecionarFornecedorParaEdicao/Fornecedor/{supplier}", "SupplierController@findSupplier");

 // Rota Fornecedores -> Salvar no banco os dados cadastrados.
Route::post("/alterarForncedor","SupplierController@updateSupplier")->name("supplierUpdate");

 // Rota Fornecedor -> Selecionar Fornecedor pra edição.
Route::get("/selecionarFornecedorParaEdicao", "SupplierController@selection")->name("supplierSelection");


    
// Rota Cliente
Route::any("/alterarCliente","clientController@update")->name("clientUpdate");

Route::any("/editarCliente","clientController@consultaCliente")->name("updateClient");

Route::any("/principal","clientController@autenticar")->name("clienteLogin");

Route::get("/sairCliente","clientController@logout")->name("logoutCliente");

Route::get("/panelCliente","clientController@panelCliente")->name("clientPanel");

Route::get("/consultaVenda","clientController@consultSale")->name("consultSale");

Route::get("/consultaAjax/{id}", "clientController@consultAjax");

// Rota administrativa
Route::get("/admin","AdminController@index")->name("admin");

Route::any("/painelAdmin","AdminController@autenticar")->name("adminPanel");

Route::get("/sairAdmin","AdminController@logout")->name("logout");

Route::get("/frete/{cep}", "CartController@frete");


// Rota Avaliação

Route::get("/avaliacaoProduto/{id}", "ClientController@avaliacaoProduto")->name("avaliacaoProduto");

Route::post("/avaliacaoProduto", "ClientController@resultadoAvaliacao")->name("resultadoAvaliacao");

Route::get('/graph', function () {

//     $prop = ([
//         'infos' => ['name' => 'Geladeira', 'Price' => 4000.00]
//      ]);
     
    // $prop2 = ([
    //     'infos' => ['first_name' => $request->get("first_name"),
    //                  'last_name' => $request->get("last_name"),
    //                  'cpf' => $request->get("cpf"),
    //                  'rg' => $request->get("rg"),
    //                  'sex' => $request->get("sex"),
    //                  'telephone' => $request->get("telephone"),
    //                  'phone_number' => $request->get("phone_numbere"),
    //                  'birth_date' => $request->get("birth_date"),
    //                  'state' => $request->get("state"),
    //                  'city' => $request->get("city"),
    //                  'postal_code' => $request->get("postal_code"),
    //                  'street' => $request->get("street"),
    //                  'street_number' => $request->get("street_number"),
    //                  'complement' => $request->get("complement"),
    //                  'email' => $request->get("email"),
    //                  ]
    //  ]);



//      //name, cpf, rg, sex, telephone, phone_number,date_birth, address (o endereço deve conter: state, city, postal_code, street , street_number, complement), email.
//      $where = ([
//         'Node' => 'Cliente',
//         'Id' => 'teste',
//         'NodeTwo' => 'Produto',
//         'IdTwo' => 'Iphone 7',
//         'Rel' => 'COMPROU'

//      ]);

//      $recom = ([
//         'Node' => 'Cliente',
//         'Id' => 'Elias',
//      ]);

//      $node = ([
//         'Node' => 'Cliente',
//         'Id' => 'teste',
//      ]);

//      $rel = ([
//       'idOne' => '160',
//       'idTwo' => '162',
//        ]);

//     //$r = Neo4j::createNodeProperty("Produto",$prop);
//       $s = Neo4j::createNodeProductProperty("Product",$prop,$rel);
//     //$c = Neo4j::createRelationship($where);
//     //$c = Neo4j::collaborativeFiltration($recom);
//     //$c = Neo4j::deleteNode($node,True);
//       // $neo4j = Neo4j::conectar();
//       // $query = 'MATCH (m:Cliente) RETURN m,m.name as name';
      // $c = $neo4j->run($query);
    //   $data = Neo4j::matchNode("supplier");
    //     foreach ($data as $record)
    //     {
    //         $id[] = $record->value('id'). PHP_EOL;
    //         $name[] = $record->value('name') . PHP_EOL;
    //   echo"<br>";
    //     }

    //     print_r($name);
    //     echo"<br>";

    //     $arr = array(
    //         'id' => $id,
    //         'name' => $name
    //     );

        
     
      return null;
});


