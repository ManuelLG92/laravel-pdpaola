<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    public function __construct(array $attributes = [])
    {
        $attributes[TransactionProperties::ID] = Str::uuid();
        parent::__construct($attributes);
    }

    use HasFactory;

    protected $table = TransactionProperties::TABLE_NAME;
    protected $primaryKey = TransactionProperties::ID;
    public $incrementing = false;
    //    public $timestamps = false;

    use HasFactory;

    public readonly string $id;
    public readonly string $productId;
    public readonly string $operationId;
    public readonly bool $isCanceled;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
    //        TransactionProperties::ID,
        TransactionProperties::PRODUCT_ID,
        TransactionProperties::IS_CANCELED,
        TransactionProperties::OPERATION_ID,
    ];

    public static function create(array $data): self
    {
        return new self($data);
    }

}
