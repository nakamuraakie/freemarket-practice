<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} の編集</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>
<body>

<header class="site-header">mogitate</header>

<main class="container">

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- 上部：画像と商品情報 -->
        <div class="edit-top">
            <!-- 画像 -->
            <div class="edit-image">
                <label for="image">商品画像</label>
                <input type="file" name="image" id="image" accept="image/*">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @endif
            </div>

            <!-- 商品情報 -->
            <div class="edit-info">
                <div class="form-group">
                    <label for="name">商品名</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" required>
                    @error('price')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>季節</label>
                    <div class="season-options">
                        <label><input type="radio" name="season" value="春" {{ old('season', $product->season) == '春' ? 'checked' : '' }}> 春</label>
                        <label><input type="radio" name="season" value="夏" {{ old('season', $product->season) == '夏' ? 'checked' : '' }}> 夏</label>
                        <label><input type="radio" name="season" value="秋" {{ old('season', $product->season) == '秋' ? 'checked' : '' }}> 秋</label>
                        <label><input type="radio" name="season" value="冬" {{ old('season', $product->season) == '冬' ? 'checked' : '' }}> 冬</label>
                        @error('season')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- 商品説明 -->
        <div class="form-group edit-description">
            <label for="description">商品説明</label>
            <textarea name="description" id="description" required>{{ old('description', $product->description) }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- ボタン -->
        <div class="form-actions">
            <button type="submit" class="btn-save">変更を保存</button>
            <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
        </div>

    </form>

</main>

</body>
</html>
