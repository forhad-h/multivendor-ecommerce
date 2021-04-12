<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @method static create(array $onlyGo)
 * @method static status()
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_top_title',
        'description_one',
        'description_two',
        'status',
        'created_by',
        'updated_by',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($setting){
            $setting->created_by = Auth::id() ?? 1;
            $setting->updated_by = Auth::id() ?? 1;
        });
        static::updating(function ($setting){
            $setting->updated_by = Auth::id();
        });
    }
}