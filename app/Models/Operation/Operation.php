<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Operation extends Model
{
    public function __construct(array $attributes = [])
    {
        $attributes[OperationProperties::ID] = Str::uuid();
        parent::__construct($attributes);
    }

    use HasFactory;

    protected $table = OperationProperties::TABLE_NAME;
    protected $primaryKey = OperationProperties::ID;
    public $incrementing = false;
    //    public $timestamps = false;


    public static function create(array $data): self
    {
        return new self($data);
    }

    public readonly string $id;
    public readonly string $operation;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
    //        OperationProperties::ID,
        OperationProperties::OPERATION,
    ];

}
