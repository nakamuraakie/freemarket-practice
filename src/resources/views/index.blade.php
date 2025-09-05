
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>

<header class="site-header">
    mogitate
</header>

<div class="container">


    <aside class="sidebar">
        <h3>商品検索</h3>
        <form action="{{ route('products.search') }}" method="GET" autocomplete="off" class="search-box">
            <input type="text" name="keyword" placeholder="商品名で検索" value="{{ $keyword ?? '' }}">
            <button type="submit">検索</button>
        </form>

        <h3>価格順で表示</h3>
        <form action="{{ route('products.search') }}" method="GET" class="search-box">
            <select name="sort" onchange="this.form.submit()">
                <option value="" disabled selected>価格で並び替え</option>
                <option value="asc" @if(request('sort')=='asc') selected @endif>安い順</option>
                <option value="desc" @if(request('sort')=='desc') selected @endif>高い順</option>
            </select>
        </form>
    </aside>


    <main class="main">
        <div class="main-header">
            <a href="{{ route('products.register') }}" class="btn-add-product">＋商品を追加</a>
        </div>

        <div class="products-grid">
            @forelse($products as $product)
                <a href="{{ route('products.show', $product->id) }}" class="product">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    <span class="product-name">{{ $product->name }}</span>
                    <span class="product-price">¥{{ number_format($product->price) }}</span>
                </a>
            @empty
            @endforelse
        </div>

        @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $products->links('pagination.custom') }}
        @endif


</div>

</body>
</html>
