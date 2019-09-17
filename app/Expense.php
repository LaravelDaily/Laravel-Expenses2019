<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;

    public $table = 'expenses';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'expense_date',
    ];

    protected $fillable = [
        'name',
        'amount',
        'created_at',
        'updated_at',
        'deleted_at',
        'category_id',
        'description',
        'expense_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getExpenseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpenseDateAttribute($value)
    {
        $this->attributes['expense_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
