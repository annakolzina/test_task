<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{

    protected $fillable = ['title', 'file', 'author', 'is_visible'];

    use HasFactory;

    public function scopeOwn($query, $value = null, $type = null)
    {
        if($value== null && $type==null){
            return $query->where('author', Auth::id());
        }else{
            return $query->where('author', Auth::id())->orderBy($value, $type);
        }

    }

    public function scopeMany($query, $value = null, $type = null)
    {
        if($value== null && $type==null){
            return $query->where('is_visible', 1);
        }else{
            return $query->where('is_visible', 1)->orderBy($value, $type);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

}
