<div class="dropdown show mt-2">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Сортировать
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{route('document.many', ['type' => 'asc', 'value' => 'title', 'class' => $value[0]])}}">Название по возрастанию</a>
        <a class="dropdown-item" href="{{route('document.many', ['type' => 'desc', 'value' => 'title', 'class' => $value[0]])}}">Название по убыванию</a>
        <a class="dropdown-item" href="{{route('document.many', ['type' => 'asc', 'value' => 'created_at', 'class' => $value[0]])}}">Дата по возрастанию</a>
        <a class="dropdown-item" href="{{route('document.many', ['type' => 'desc', 'value' => 'created_at', 'class' => $value[0]])}}">Дата по убыванию</a>
        @if($value[0]==2)
            <a class="dropdown-item" href="{{route('document.many', ['type' => 'asc', 'value' => 'author', 'class' => 2])}}">Авторы по возрастанию</a>
            <a class="dropdown-item" href="{{route('document.many', ['type' => 'desc', 'value' => 'author', 'class' => 2])}}">Авторы по убыванию</a>
        @endif
    </div>
</div>
