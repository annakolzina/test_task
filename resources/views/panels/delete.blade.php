<form method="POST" action={{route($values[0], [$values[1] => $values[2]])}}>
    @csrf
    @method('DELETE')
    <div class="form-group">
        <button type="submit" class="btn btn-danger offset-2" >Удалить</button>
    </div>
</form>
