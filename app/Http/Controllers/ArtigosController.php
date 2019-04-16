<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use App\Auth;

class ArtigosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $item  = str_replace(' ', '+', $request->text);
        $url   = "http://www.uplexis.com.br/blog/?s={$item}";
        $html  = file_get_html($url);
        $count = 0;
        $posts = [];
        
        
        foreach($html->find("div[class='col-12 post']") as $postDiv) {
            
            $title = trim(strip_tags((string) $html->find("div.title", $count++)));
            $link  = (string) str_replace("window.location.href=", "", str_replace("'", '', $postDiv->onclick));
            $posts[] = [
                'title' => $title,
                'link'  => $link
            ];
        }
        
        return view('artigo.index')->with(['posts'=> $posts, 'data' => $request->text]);
    }

    public function store(Request $request) {

        $posts = json_decode($request->posts, true);
        
        foreach($posts as $post) {
            $artigo = new Artigo;
            $artigo->id_usuario = $request->id_usuario;
            $artigo->titulo     = $post['title'];
            $artigo->link       = $post['link'];
            $artigo->save();    
        }

        return redirect('/home');
    
    }
}
