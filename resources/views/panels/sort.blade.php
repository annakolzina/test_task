<div class="dropdown show mt-2">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Сортировать
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{route('document.own', ['type' => 'asc', 'value' => 'title', 'my' => $own[0]])}}">Название по возрастанию</a>
        <a class="dropdown-item" href="{{route('document.own', ['type' => 'desc', 'value' => 'title', 'my' => $own[0]])}}">Название по убыванию</a>
        <a class="dropdown-item" href="{{route('document.own', ['type' => 'asc', 'value' => 'created_at', 'my' => $own[0]])}}">Дата по возрастанию</a>
        <a class="dropdown-item" href="{{route('document.own', ['type' => 'desc', 'value' => 'created_at', 'my' => $own[0]])}}">Дата по убыванию</a>
        @if($own[0]==2)
            <a class="dropdown-item" href="{{route('document.own', ['type' => 'asc', 'value' => 'author', 'my' => 2])}}">Авторы по возрастанию</a>
            <a class="dropdown-item" href="{{route('document.own', ['type' => 'desc', 'value' => 'author', 'my' => 2])}}">Авторы по убыванию</a>
        @endif
    </div>
</div>
