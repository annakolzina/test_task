<form method="GET" action="{{ route('visible', ['document' => $document]) }}">
    @csrf
    <div class="container">
        <div class="col-md-12">
            <div class="form-group row">
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Изменить') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
