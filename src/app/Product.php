<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    /**
     * @return mixed
     */
    public static function getActive()
    {
        return self::where('active', 1)
            ->orderBy('category_id')
            ->orderBy('created_at', 'DESC')
            ->orderBy('price')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public static function search(array $attributes)
    {
        $prodsquery = Product::where('active', 1);

        if (isset($attributes['title']))
            $prodsquery->where('title', 'like', '%'.$attributes['title'].'%')
                       ->orWhere('description', 'like', '%'.$attributes['title'].'%');

        if (isset($attributes['category']))
            $prodsquery->where('category_id', $attributes['category']);

        return $prodsquery->get();
    }
}
