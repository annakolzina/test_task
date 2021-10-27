<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="name"  autofocus value="{{old('name', $user->name)}}">
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="email"  autofocus value="{{old('email', $user->email)}}">
    </div>
</div>
@if(\Illuminate\Support\Facades\Auth::user()->role==1)
    <div class="form-group row">
        <label for="role" class="col-md-4 col-form-label text-md-right">Администратор</label><br/><br/>
        <input type="checkbox" class="mt-2" name="role" @if($user->role) checked @endif>
    </div>
@endif
