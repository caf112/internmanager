@csrf 
    <dl class="form-list">
        <dt>企業名</dt>
            <dd><input type="text" name="title" value="{{ old('title', $program->title) }}"></dd>
        <dt>日付</dt>
            <dd><input type="date" name="date" value="{{ old('date', $program->date) }}"> </dd>
        <dt>時間</dt>
            <dd><input type="time" name="time" value="{{ old('time', $program->time) }}"> </dd><!--tableを日時に変更後、datetime-localに変更-->
        <dt>期間</dt>
            <dd><input type="radio" name="period" value="1DAY">1DAY</dd>
            <dd><input type="radio" name="period" value="1週間未満">1週間未満</dd>
            <dd><input type="radio" name="period" value="短期">短期</dd>
            <dd><input type="radio" name="period" value="長期">長期</dd>
        <dt>内容</dt>
            <dd><textarea name="content" rows="5">{{ old('content', $program->content) }}</textarea></dd>
        <dt>場所</dt>
            <dd><textarea name="place" rows="5">{{ old('content', $program->place) }}</textarea></dd>
    </dl>