<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = ['product_id', 'user_id'];
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys))
            return parent::setKeysForSaveQuery($query);

        foreach ($keys as $k) {
            $query->where($k, '=', $this->getKeyForSaveQuery($k));
        }
        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if ($keyName == null)
            $keyName = $this->getKeyName();

        if (isset($this->original[$keyName]))
            return $this->original[$keyName];

        return $this->getAttribute($keyName);
    }
}
