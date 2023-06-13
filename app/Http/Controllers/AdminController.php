<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function tabelaUsuarios(){
        $usuarios = User::all();

        return view('admin.tabela_usuarios', compact('usuarios'));
    }

    public function tabelaNoticias(){
        $noticias = Noticia::all();

        return view('admin.tabela_noticias', compact('noticias'));
    }

    public function editarUser($id)
{
    $usuario = User::findOrFail($id);

    return view('admin.editar_usuario', compact('usuario'));
}

public function updateUser(Request $request)
{

    $usuarioId = $request->input('usuarioId');
    $usuario = User::find($usuarioId);

    if($usuario){
    $usuario->name = $request->input('nome');
    $usuario->email = $request->input('email');
    
    $senha = $request->input('senha');
        if (!empty($senha)) {
            $usuario->password = Hash::make($senha);
        }
    $usuario->save();
}

return redirect()->route('admin.usuarios')->with('usuarioUpdate', '402');;


}

public function destroyUser($id)
{
    $usuario = User::findOrFail($id);
    $usuario->noticias()->delete();
    $usuario->delete();

    return redirect()->route('admin.usuarios')->with('usuarioDelete', '402');
}

public function editarNoticia($id)
{
    $noticia = Noticia::findOrFail($id);

    return view('admin.editar_noticia', compact('noticia'));
}

public function updateNoticia(Request $request)
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

return redirect()->route('admin.noticias')->with('noticiaUpdate', '402');;


}

public function destroyNoticia($id)
{
    $noticia = Noticia::findOrFail($id);
    $noticia->delete();

    return redirect()->route('admin.noticias')->with('noticiaDelete', '402');
}
}
