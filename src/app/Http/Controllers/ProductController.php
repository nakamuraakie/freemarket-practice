<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        $products = Product::paginate(6);
        return view('index', compact('products'));
    }


    public function search(Request $request)
    {
    $keyword = $request->input('keyword', '');

    $products = Product::query()
        ->when($keyword, function ($query, $keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })
        ->paginate(6);

    return view('index', compact('products', 'keyword'));
    }


    public function show($id)
    {
    $product = Product::findOrFail($id);
    return view('detail', compact('product'));
    }

    public function create()
    {

    return view('add');

    }


    public function edit($id)
    {
    $product = Product::findOrFail($id);
    return view('edit', compact('product'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'season' => 'required|in:春,夏,秋,冬',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);


        $data = $validated;

        if ($request->hasFile('image')) {

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index');
    }

    public function update(Request $request, $id)
{
    // 商品を取得
    $product = Product::findOrFail($id);

    // バリデーションルール
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'season' => 'required|in:春,夏,秋,冬',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    // バリデーションを通ったデータで商品を更新
    $data = $validated;

    // 画像がアップロードされている場合
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    // 商品データを更新
    $product->update($data);

    // 商品一覧ページへリダイレクト
    return redirect()->route('products.index')->with('success', '商品が正常に更新されました。');
}


}