 @csrf 
    <dl class="form-list">
        <dt>企業名</dt>
            <dd><input type="text" name="title" value="{{ old('title', $article->title) }}"></dd>
        <dt>日時</dt>
            <dd><input type="date" name="date" value="{{ old('date', $article->date) }}"> </dd><!--tableを日時に変更後、datetime-localに変更-->
        <dt>期間</dt>
            <dd><input type="radio" name="period" value="P1">1Day</dd>
            <dd><input type="radio" name="period" value="P2">1週間未満</dd>
            <dd><input type="radio" name="period" value="P3">短期</dd>
            <dd><input type="radio" name="period" value="P4">長期</dd>
        <dt>選考</dt>
            <dd><input type="radio" name="selection" value="S2">選考あり</dd>
            <dd><input type="radio" name="selection" value="S1">選考なし</dd>
            <dd><input type="radio" name="selection" value="S3">選考落ち</dd>
        <dt>業種</dt>
            <dd>
                <select name="industry">
                <option value="農林・水産">農林・水産</option>
                <option value="林業">林業</option>
                <option value="漁業">漁業</option>
                <option value="鉱業">鉱業</option>
                <option value="建設業">建設業</option>
                <option value="建築業">建築業</option>
                <option value="製造業">製造業</option>
                <option value="電気・ガス">電気・ガス</option>
                <option value="卸売・小売・飲食業">卸売・小売・飲食業</option>
                <option value="金融・保険業">金融・保険業</option>
                <option value="不動産業">不動産業</option>
                <option value="サービス業">サービス業</option>
                <option value="分類不能産業">分類不能産業</option>
                </select>
            </dd>
        <dt>企業説明</dt>
            <dd><textarea name="explanation" rows="5">{{ old('explanation', $article->explanation) }}</textarea></dd>
        <dt>インターン内容</dt>
            <dd><textarea name="content" rows="5">{{ old('content', $article->content) }}</textarea></dd>
        <dt>感想</dt>
            <dd><textarea name="body" rows="5">{{ old('body', $article->body) }}</textarea></dd>
        <dt>評価</dt>
            <dd><input type="radio" name="evaluation" value="A">A</dd>
            <dd><input type="radio" name="evaluation" value="B">B</dd>
            <dd><input type="radio" name="evaluation" value="C">C</dd>
    </dl>