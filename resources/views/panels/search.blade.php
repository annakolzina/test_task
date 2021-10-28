<form method="GET" action="{{ route($route[0], ['class' => $value[0]]) }}">
    @csrf
    <div class="container">
        <div class="form-group row">
            <div class="col-md-11">
                <input type="text" class="form-control" name="value"  placeholder="Введите название..." autofocus>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary">
                    {{ __('Поиск') }}
                </button>
            </div>
        </div>
    </div>
</form>
