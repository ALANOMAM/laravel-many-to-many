<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
  //qui creo una variabile "user" che prende i dati dopo che l'utente si iscrive e la collego alla 
  //pagina intro di amministrazione 
   public function introPage() {

        $user = Auth::user();

        return view('admin.introPage', compact("user"));
    }
    
  //questa funzione insieme all rotta che la chiama  mi crea un collegamento alla pagina 
  //"users.blade.php" dove ho deciso di mettere la lista dei mei utenti iscritti
    public function users() {
      $user = Auth::user();

        return view('admin.users', compact("user"));
    }
  
    
}
