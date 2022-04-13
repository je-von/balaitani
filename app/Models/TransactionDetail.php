<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public $incrementing = false;
    protected $primaryKey = ['transaction_id', 'user_id'];
    public $timestamps = false;
    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
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
