<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    


    public function all(){

        $all=Product::all();
        return $all;
    }
    public function search($id){

        $all=Product::find($id);
        return $all;
    }
    public function store(Request $r){

        $all=Product::create($r->all());
        return $all;
    }
}
