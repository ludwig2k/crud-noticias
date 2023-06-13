<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $itemsPerPage = $request->input('itemsPerPage', 10);
    $tagFilter = $request->input('tagFilter');

    $noticias = Noticia::query();

    if ($tagFilter) {
        $noticias->where('tag', $tagFilter);
    }

    $noticias = $noticias->paginate($itemsPerPage);

    return view('home', compact('noticias', 'itemsPerPage', 'tagFilter'));
}
}
