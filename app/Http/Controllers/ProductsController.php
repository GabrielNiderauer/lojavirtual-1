<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    #https://laravel.com/docs/11.x/eloquent#retrieving-models
    // Método para a página inicial
    public function home()
    {
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    }

    // Método para a aba de produtos (acessível apenas por usuários logados)
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
        #aqui falar sobre outros tipos de query
        #return view('products.index', ['products' => Product::where('quantity', '>', 0)->orderByDesc('name')->get()]);
        #$products = Product::where('quantity', '>', 0)->orderByDesc('name')->get();
        #Product::where('quantity', '>', 0)->with('type')->orderByDesc('name')->get();
    }

    //abre o formulário vazio para um novo registro
    public function create()
    {
        return view('products.create', ['types' => Type::all()]);
    }

    //função chamada no submit do form..será um POST com os dados
    public function store(Request $request)
    {

        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->type_id = $request->type_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/products', $imageName);
            $product->image_name = $imageName;
        }

        $product->save();

        return redirect('/products')->with('success', 'Produto salvo com sucesso!');
    }

    public function edit($id)
    {
        //find é o método que faz select * from products where id= ?
        $product = Product::find($id);
        //retornamos a view passando a TUPLA de produto consultado
        return view('products.edit', ['product' => $product, 'types' => Type::all()]);
    }

    public function update(Request $request)
    {

        $product = Product::find($request->id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->type_id = $request->type_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/products', $imageName);
            $product->image_name = $imageName;
        }

        $product->save();

        return redirect('/products')->with('success', 'Produto atualizado com sucesso!'); // Retorno para a página de produtos
    }

    public function destroy($id)
    {
        //select * from product where id = ?
        $product = Product::find($id);
        //deleta o produto no banco
        $product->delete();
        return redirect('/products')->with('success', 'Produto excluído com sucesso!');
    }
}
