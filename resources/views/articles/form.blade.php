 @csrf 
    <dl class="form-list">
        <dt>企業名</dt>
            <dd><input type="text" name="title" value="{{ old('title', $article->title) }}"></dd>
        <dt>日時</dt>
            <dd><input type="date" name="date" value="{{ old('date', $article->date) }}"> </dd><!--tableを日時に変更後、datetime-localに変更-->
        <dt>内容</dt>
            <dd><textarea name="content" rows="5">{{ old('content', $article->content) }}</textarea></dd>
        <dt>感想</dt>
            <dd><textarea name="body" rows="5">{{ old('body', $article->body) }}</textarea></dd>
        <dt>評価</dt>
            <dd><input type="radio" name="evaluation" value="A">A</dd>
            <dd><input type="radio" name="evaluation" value="B">B</dd>
            <dd><input type="radio" name="evaluation" value="C">C</dd>
    </dl>