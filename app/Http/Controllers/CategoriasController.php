<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriasFormRequest;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $categorias = Categoria::all()->where('cat_del', '=', 0);
        $mensagem = $request->session()->get('mensagem');

        return view('categorias.index', compact('categorias', 'mensagem'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriasFormRequest $request)
    {

        $categoria = Categoria::create([
            'cat_name' => $request->cat_name,
            'cat_order' => $request->cat_order,
            'cat_del' => '0'
        ]);
        $request->session()->flash('mensagem', "Categoria {$categoria->cat_name} cadastrada com sucesso!");

        return redirect()->route('categorias.index');
    }


    public function destroy(Request $request)
    {
        //Essa linha vai alterar o pro_del para 1, o pro_del significa se foi deletado (1) ou se não foi (0), é melhor fazer
        //assim para não perder alguma informação deletada sem querer. Na hora de exibir, é só colocar um where pro_del<>1
        //Categoria::destroy($request->id);
        Categoria::where('id', '=', $request->id)->update(array('cat_del' => 1));
        $request->session()->flash('mensagem', "Categoria removida com sucesso!");
        return redirect()->route('categorias.index');
    }

    public function update(Request $request){
        $categoria = Categoria::find($request->id);
        $categoria->cat_name = $request->name;
        $categoria->cat_order = $request->cat_order;
        $categoria->save();
        $request->session()->flash('mensagem', "Categoria $categoria->cat_name editada com sucesso!");

        return redirect()->route('categorias.index');
    }
}
