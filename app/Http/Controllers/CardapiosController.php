<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardapiosController extends Controller
{
    public function index()
    {

        $categorias = Categoria::where('categorias.cat_del', '=', '0')
            ->join('produtos', 'categorias.id', '=', 'produtos.cat_id')
            ->where('produtos.pro_del', '=', '0')
            ->select('categorias.*')
            ->distinct()
            ->orderBy('cat_order', 'asc')
            ->get();
        $produtos = Produto::orderBy('cat_id', 'desc')->get();

        return view('cardapios.index', compact('categorias', 'produtos'));
    }

    public function create()
    { /* para gerar o qrcode do cardapio */
        QrCode::size(1000)->format('png')
            ->merge('storage/images/logo.png', .3, true)->errorCorrection('H')
            ->generate("https://kubainteligencia.com.br/bodebrown/cardapio", 'storage/images/qrcode.png');
        return view('cardapios.qrcode');
    }
}
