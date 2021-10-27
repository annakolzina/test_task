@if($errors->count())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach($errors->all() as $error)
                <li class="mt-4">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
