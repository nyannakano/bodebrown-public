<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MesasFormRequest;
use App\Models\Mesa;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MesasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $mesas = Mesa::all();
        $mensagem = $request->session()->get('mensagem');

        return view('mesas.index', compact('mesas', 'mensagem'));
    }

    public function create()
    {
        return view('mesas.create');
    }

    public function store(MesasFormRequest $request)
    {
        $mesa = Mesa::create($request->all());
        $request->session()->flash('mensagem', "Mesa {$mesa->name} cadastrada com sucesso!");
        //QrCode::generate("http://127.0.0.1:8000/cardapio/mesa/{$mesa->name}", "../public/storage/images/qrcode{$mesa->name}.png");
        return redirect()->route('mesas.index');
    }


    public function destroy(Request $request)
    {
        Mesa::destroy($request->id);
        $request->session()->flash('mensagem', "Mesa removida com sucesso!");

        return redirect()->route('mesas.index');
    }

    public function update(Request $request){
        $mesa = Mesa::find($request->id);
        $mesa->name = $request->name;
        $mesa->save();
        $request->session()->flash('mensagem', "Mesa $mesa->name editada com sucesso!");

        return redirect()->route('mesas.index');
    }

}
