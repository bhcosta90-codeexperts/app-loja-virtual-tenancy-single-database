<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected Product $model,
        protected Category $category
    ) {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->model->paginate();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->get('id', 'name');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Store $store)
    {
        $data = $request->all();

        $product = $store->first()->products()->create($data);

        $product->categories()->sync($request->categories);

        session()->flash('message', ['type' => 'success', 'body' => 'Sucesso ao cadastrar produto']);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = $this->category->get('id', 'name');
        return view('admin.products.create', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        $product->categories()->sync($request->categories);

        session()->flash('message', ['type' => 'success', 'body' => 'Sucesso ao atualizar produto']);

        return redirect()->route('products.edit', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('message', ['type' => 'success', 'body' => 'Sucesso ao remover produto']);
        return redirect()->route('products.index');

    }
}
