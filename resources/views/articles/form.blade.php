<div class="card-body">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title"
                value="{{ isset($article) ? $article->title : ''}}">
        </div>
        <div class="form-group">
            <label for="title">Body</label>
            <textarea name="body" id="body" cols="20" rows="10"
                class="form-control">{{ isset($article) ? $article->body : ''}}
            </textarea>
        </div>
        <div class="form-group">
            <label for="published">Published?</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="published" value="1"
                {{ isset($article) && $article->published==1 ? 'checked' : ''}}>
                <label class="form-check-label">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="published" value="0"
                {{ isset($article) && $article->published==0 ? 'checked' : ''}}>
                <label class="form-check-label">No</label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('articles:index')}}" class="btn btn-link">Cancel</a>
        </div>
    </form>
</div>