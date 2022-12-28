<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutosFormRequest;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;


class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $produtos = Produto::where('pro_del', '=', 0)
            ->orWhere('pro_del', '=', 2)->get();
        $categorias = Categoria::all()->where('cat_del', '=', 0);
        $mensagem = $request->session()->get('mensagem');

        return view('produtos.index', compact('produtos', 'mensagem', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all()->where('cat_del', '=', 0);
        return view('produtos.create', compact('categorias'));
    }

    public function store(ProdutosFormRequest $request)
    {
        $produto = Produto::create([
            'pro_name' => $request->pro_name,
            'pro_price' => $request->pro_price,
            'pro_description' => $request->pro_description,
            'cat_id' => $request->input('categoria'),
            'pro_image' => $this->verificaImagem($request),
            'pro_order' => '1'
        ]);

        $request->session()->flash('mensagem', "Produto {$produto->pro_name} cadastrado com sucesso!");

        return redirect()->route('produtos.index');
    }


    public function destroy(Request $request)
    {
        //Essa linha vai alterar o pro_del para 1, o pro_del significa se foi deletado (1) ou se não foi (0), é melhor fazer
        //assim para não perder alguma informação deletada sem querer. Na hora de exibir, é só colocar um where pro_del<>1
        //Produto::destroy($request->id);
        $produto = Produto::find($request->id);
        Produto::where('id', '=', $request->id)->update(array('pro_del' => 1, 'pro_image' => null));
        Storage::disk('local')->delete('public/'.$produto->pro_image);
        $request->session()->flash('mensagem', "Produto removido com sucesso!");
        return redirect()->route('produtos.index');
    }

    public function edit()
    {
        $categorias = Categoria::all();
        return view('edit', compact('categorias'));
    }

    public function update(Request $request)
    {
        $produto = Produto::find($request->id);
        $produto->pro_name = $request->name;
        $produto->pro_price = $request->pro_price;
        $produto->pro_description = $request->pro_description;
        $produto->cat_id = $request->input('categoria');


        if ($request->input('check') == 'checked') {
            Storage::disk('local')->delete('public/'.$produto->pro_image);
            $produto->pro_image = null;
            $produto->save();
            $request->session()->flash('mensagem', "Produto $produto->pro_name editado com sucesso!");
            return redirect()->route('produtos.index');
        } else {
            if (!$request->hasFile("pro_image")) {
                $produto->save();
                $request->session()->flash('mensagem', "Produto $produto->pro_name editado com sucesso!");
                return redirect()->route('produtos.index');
            }
        }

        Storage::disk('local')->delete('public/'.$produto->pro_image);

        $produto->pro_image = $this->verificaImagem($request);
        $produto->save();
        $request->session()->flash('mensagem', "Produto $produto->pro_name editado com sucesso!");

        return redirect()->route('produtos.index');
    }

    public function verificaImagem(Request $request)
    {
        if ($request->pro_image == null){
            return ;
        }
        if (
            $request->pro_image->isValid() &&
            $request->pro_image->extension() == 'jpg' ||
            $request->pro_image->extension() == 'jpeg' ||
            $request->pro_image->extension() == 'png'
        ) {
            $path = Storage::putFile("proimages", $request->file("pro_image"));

            $data['pro_image'] = $path;

            return $path;
        }
        return null;
    }


    public function status(Request $request)
    {
        $produto = Produto::find($request->id);

        if($produto->pro_del === 0) {
            Produto::where('id', '=', $request->id)->update(array('pro_del' => 2));
            $request->session()->flash('mensagem', "Produto inativado com sucesso!");
            return redirect()->route('produtos.index');
        } else {
            Produto::where('id', '=', $request->id)->update(array('pro_del' => 0));
            $request->session()->flash('mensagem', "Produto ativado com sucesso!");
            return redirect()->route('produtos.index');
        }
    }

}
