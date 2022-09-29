@if($post->exists)
<form action="{{route('admin.posts.update',$post)}}" method="POST">
    @method('PUT')
@else
<form action="{{route('admin.posts.store')}}" method="POST">
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @csrf
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title',$post->title)}}" require minlength="3" maxlength="50" >
              </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">Nessuna categoria</option>
                    @foreach($categories as $category)
                        <option 
                            @if(old('category_id',$post->category_id)== $category->id) selected @endif 
                            value="{{$category->id}}">
                            {{$category->label}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="content">Descrizione</label>
                <textarea  class="form-control" id="content" name="content" required>{{old('content',$post->content)}}</textarea>
            </div>
        </div>
        <div class="col-11">
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="url" class="form-control" id="image-field" name="image" value="{{old('image', $post->image)}}">
              </div>
        </div>
        <div class="col-1">
            <img  class="img-fluid" src="{{$post->image ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4KK-Q2mcxD1oB5e3SPK-Sa0_eqpXkUaFe7t2gEuvYqA&s'}}" alt="post image preview" id="preview">
        </div>
    </div>
    <hr>
    <footer class="d-flex justify-content-between">
        <a href="{{route('admin.posts.index')}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-rotate-left"></i>Indietro</i></a>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salva</button>
    </footer>
</form>
    