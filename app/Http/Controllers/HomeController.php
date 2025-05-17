<?php
namespace App\Http\Controllers;
use Spatie\PdfToImage\Pdf;

use App\Models\Cours;
use App\Models\Epreuve;
use App\Models\Livre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home(){
        return view('home.dashboard');
    }

    public function cours(){
        $cours = Cours::all();
        return view('home.cours', compact('cours'));
    }

    public function livres(){
        $livres = Livre::all();
        return view('home.livres', compact('livres'));
    }
    
    public function epreuves(){
        $epreuves = Epreuve::all();
        return view('home.epreuves', compact('epreuves'));
    }
}
