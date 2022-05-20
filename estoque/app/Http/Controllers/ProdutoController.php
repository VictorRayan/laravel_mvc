<?php

    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use Symfony\Component\HttpFoundation\RequestStack;
    use App\Http\Requests\ProdutoRequest;

    class ProdutoController extends Controller{

        
        public function lista(){
            $select = DB::select('select * from produtos');
            
            return view('produto.listagem')->with('produtos', $select);
        }

        public function mostrar(Request $request){
            
            $id=0;
            if($request->route('id')){
               // $id=$request->query('id'); //would be used if want to use the parameter into no semantic url
               $id=$request->route('id');
            }

            //Using ? to refer external paramters protects the system of SQL Injection.
            $select = DB::select('select * from produtos where id=?', [$id]);

            if(empty($select)){
                return 'Esse produto não existe';
            }
            else{
                
                return view('produto.detalhes')->with('produtos', $select[0]);
            }
            
        }
        public function novo(){
            return view('produto.novo_prod');
        }

        public function adiciona(ProdutoRequest $request){
            
            $nome = $request->post('inputProdName');
            $descricao = $request->post('inputProdDesc');
            $quantidade = $request->post('inputProdQuant');
            $valor = $request->post('inputProdVal');

            $info='';
            $sql_insert = DB::insert("insert into produtos(nome, descricao, 
                quantidade, valor) values(?, ?, ?, ?)", array($nome, $descricao, $quantidade, 
                $valor));
            
            try {
                if($sql_insert) $info='Produto adicionado';
            } catch (\Throwable $th) {
                $info='Erro ao tentar adicionar produto,
                tente novamente mais tarde :(';
            }
            //return redirect('/lista')->with('info', $info);
            return redirect()
                ->action([ProdutoController::class, 'lista'])
                ->with('info', $info);
            /*instead of redirect to URI, its will redirects to action (method)
            decreasing the execution time and applying better pratices*/
        }


        public function remover(Request $request){
            $id = 0;
            if($request->route('id')){
                $id=$request->route('id');
            }
            $select = DB::select('select * from produtos where id=?', array($id));
            $remove = DB::delete('delete from produtos where id=?', array($id));

            if($remove){
                return redirect()
                    ->action([ProdutoController::class, 'lista'])
                    ->with('info', "Produto ". $select[0]->nome ." removido com sucesso!");
            }

        }

        public function alterar(Request $request){
            $id = $request->route('id');
            return view('produto.alterar')
                ->with('id', $id);
        }

        public function makeUpdate(ProdutoRequest $request){
            $id = $request->route('id');
            $nome = $request->post('inputProdName');
            $quantidade = $request->post('inputProdQuant');
            $descricao = $request->post('inputProdDesc');
            $preco = $request->post('inputProdVal');
            

            $update = DB::update('update produtos 
                                set nome = ?,
                                    quantidade = ?,
                                    valor = ?,
                                    descricao = ?
                                where id = ?', 
                                array(
                                    $nome,
                                    $quantidade,
                                    $preco,
                                    $descricao,
                                    $id
                                ));

            $msg = "";

            if($update){
                $msg = "Produto ".$nome." alterado com sucesso!";
            }
            else{
                $msg = "Falha ao tentar alterar o produto ".$nome;
            }


            return redirect()
                    ->action([ProdutoController::class, 'lista'])
                    ->with('info', $msg);
        }
    }

?>