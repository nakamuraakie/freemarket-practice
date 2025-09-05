<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
</head>
<body>
    <header class="site-header">
        <h1 class="logo">mogitate</h1>
    </header>

    <div class="container">
        <h2>商品登録</h2>

        @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form action="{{ route('products.store') }}" method="POST" >
            @csrf


            <div class="form-group">
                <label for="name">商品名<span class="required">必須</span></label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="商品名を入力">
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">値段<span class="required">必須</span></label>
                <input type="text" name="text" id="price" required value="{{ old('price') }}" placeholder="価格を入力">
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="image">商品画像<span class="required">必須</span></label>
                <input type="file" name="image" id="image">
                @error('image')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
            <label>季節 <span class="required">必須</span></label>
            <div class="season-options">
            <label>
            <input type="radio" name="season" value="spring" {{ old('season') == 'spring' ? 'checked' : '' }}> 春
            </label>
            <label>
            <input type="radio" name="season" value="summer" {{ old('season') == 'summer' ? 'checked' : '' }}> 夏
            </label>
            <label>
            <input type="radio" name="season" value="autumn" {{ old('season') == 'autumn' ? 'checked' : '' }}> 秋
            </label>
            <label>
            <input type="radio" name="season" value="winter" {{ old('season') == 'winter' ? 'checked' : '' }}> 冬
            </label>
            </div>
                @error('season')
                <div class="error">{{ $message }}</div>
                @enderror



            <div class="form-group">
                <label for="description">商品説明<span class="required">必須</span></label>
                <textarea name="description" id="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                @error('description')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-container">
        <button type="submit">登録</button>
        <button type="button" onclick="window.history.back()">戻る</button>
    </div>
</body>
</html>
