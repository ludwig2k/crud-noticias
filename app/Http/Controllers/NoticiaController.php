<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index(){

        return view('noticias_criar');

    }

    public function store(Request $request)
{
    $userId = auth()->user()->id;

    $validatedData = $request->validate([
        'titulo' => 'required|max:255',
        'descricao' => 'required',
        'tag' => 'required',
        'imagem' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $noticia = new Noticia();
    $noticia->user()->associate($userId);
    $noticia->titulo = $validatedData['titulo'];
    $noticia->descricao = $validatedData['descricao'];
    $noticia->tag = $validatedData['tag'];
    $noticia->data = now();

    if ($request->hasFile('imagem')) {
        $imagePath = $request->file('imagem')->store('noticia_images', 'public');
        $noticia->imagem = $imagePath;
    }

    $noticia->save();

    return redirect()->route('home')->with('noticiaSalva', '402');
}

    public function verNoticia($id){    

    $noticia = Noticia::findOrFail($id);
    return view('noticia_ver', compact('noticia'));

    }
    
    public function minhasNoticias()
{
    $user = auth()->user();
    $noticias = $user->noticias;
    return view('minhas_noticias', compact('noticias'));
}

public function editarIndex($id)
{
    $noticia = Noticia::findOrFail($id);

    return view('editar_noticia', compact('noticia'));
}

public function update(Request $request)
{

    $noticiaId = $request->input('noticiaId');
    $noticia = Noticia::find($noticiaId);

    if($noticia){
    $noticia->titulo = $request->input('titulo');
    $noticia->descricao = $request->input('descricao');   
    $noticia->tag = $request->input('tag'); 
    if ($request->hasFile('imagem')) {
        $imagePath = $request->file('imagem')->store('images', 'public');
        $noticia->imagem = $imagePath;
    }   
    $noticia->save();
}

    return redirect()->route('noticia.user')->with('noticiaUpdate', '402');


}

public function destroy($id)
{
    $noticia = Noticia::findOrFail($id);
    $noticia->delete();

    return redirect()->route('noticia.user')->with('noticiaDelete', '402');
}

}
