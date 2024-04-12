<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->take(5)->get();
        return view('home', compact('products'));
    }
 
    public function adminHome()
    {
        return view('dashboard');
    }
}