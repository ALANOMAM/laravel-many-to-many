<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use App\Models\Technology;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();

         return view("admin/posts/index", compact("posts")); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    //prendo tutti i tipi e li passo alla vista create dei posts
         $types = Type::all();

         // prelevo tutte le tecnologie dal database e li passo alla vista
        $technologies = Technology::all();

        return view("admin/posts/create", compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

          //dd($request);

        $request->validated();

        $newPostElement = new Post();

         
        $newPostElement->Nome = $request['Nome'];  
        $newPostElement->Descrizione = $request['Descrizione'];
        //controliamo se nella riquest dell'immagine c'è un file in arrivo
        //questo perchè essendo nullable posso anche lasciare tutto vuoto volendo
        if($request->hasFile('Immagine_di_copertina')){
          
            $path = Storage::disk('public')->put('post_images', $request->Immagine_di_copertina);
            
            $newPostElement->Immagine_di_copertina = $path;
        }
      
         //il pezzo che mi collega alla creazione nel database
         $newPostElement->type_id = $request['type_id'];

        $newPostElement->Link_repo_GitHub = $request['Link_repo_GitHub'];
        
        $newPostElement->save();

        // quando dobbiamo inserire dei dati presenti in una tabella ponte (con relazione many to many)
        // dobbiamo fare tutto DOPO il ->save()

        // importante: quando colleghiamo un metodo alle techs (in questo caso) siamo obbligati ad inserire le parentesi
        // normalmente, se dobbiamo solo leggere i tags invece non sono necessarie
        $newPostElement->technologies()->attach($request->technologies);

        return redirect()->route("admin.posts.show", $newPostElement->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        
         //dd($post->technologies);
         //dd($post->type_id);

        return view("admin/posts/show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $post = Post::find($id);

        //selezionare i tipi nell'edit
        $types = Type::all();
        //selezionare le tecnologie nell'edit
        $technologies = Technology::all();

        return view("admin/posts/edit",compact('post','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( string $id,StorePostRequest $request)
    {
        $request->validated();

        $newPostElement2 =  Post::find($id);

         
        $newPostElement2->Nome = $request['Nome'];  
        $newPostElement2->Descrizione = $request['Descrizione'];


         //controliamo se nella riquest dell'immagine c'è un file in arrivo
        //questo perchè essendo nullable posso anche lasciare tutto vuoto volendo
        if($request->hasFile('Immagine_di_copertina')){
            //ci salviamo il percorso dell'immagine in una variabile che chiameremo "path"
            //e contemporaneamente salviamo l'immagine nel server.(cioe nella cartella public in "app/public/storage")
            //la cartella dove salveremo tutto si chiamerà "post_images"
            $path = Storage::disk('public')->put('post_images', $request->Immagine_di_copertina);
            
            $newPostElement2->Immagine_di_copertina = $path;
        }
         
        //NB PER ORA LASCIAMO LA UPDATE CON QUESTA SOLUZIONE TEMPORANEA, RIGUARDEREMO MEGLIO PIU AVANTI INSIEME
        //A ELIMINAZIONE DELL'IMMAGINE 
        //$newPostElement2->Immagine_di_copertina = $request['Immagine_di_copertina'];
        
        //il pezzo che mi collega alle modifiche del database
        $newPostElement2->type_id = $request['type_id'];

        $newPostElement2->Link_repo_GitHub = $request['Link_repo_GitHub'];
        
        $newPostElement2->save();

         // modifichiamo le tecnologie collegate al post
         //"sync" ci aggiorna la tabella ponte eliminando e aggiungendo le tec selezionate
         // visto che in una data modifica può darsi che voremmo togliere delle tec e non solo aggiungere
         $newPostElement2->technologies()->sync($request->technologies); 

        return redirect()->route("admin.posts.show", $newPostElement2->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        
        $post->delete();

        return redirect()->route("admin.posts.index", $post->id);
    }
}
