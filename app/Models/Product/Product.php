<?php

namespace App\Models\Product;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{

    public function __construct(array $attributes = [])
    {
        $attributes[ProductProperties::ID] = Str::uuid();
        parent::__construct($attributes);
    }

    use HasFactory;

    protected $table = ProductProperties::TABLE_NAME;
    protected $primaryKey = ProductProperties::ID;
    public $incrementing = false;
    //    public $timestamps = false;

    //TODO: Should be convenient usage of value objects instead of primitives.
    //TODO: So, We'd define own rules for our attributes.
    public readonly string $id;
    public readonly string $name;
    public readonly int $stock;
    public readonly int $price;

    public static function create(array $data): self
    {
        return new self($data);
    }

    public function updateStock(int $stock): void
    {
        $this->stock = $this->stock  + $stock;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
    //        ProductProperties::ID,
        ProductProperties::NAME,
        ProductProperties::STOCK,
        ProductProperties::PRICE,
    ];

}
