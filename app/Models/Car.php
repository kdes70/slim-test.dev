<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'make',
        'model',
        'year',
        'price'
    ];

    public static function getAll()
    {
        return self::query()->orderBy('id', 'asc')->get();
    }

    public static function findId(int $id)
    {
        return self::query()->findOrFail($id);
    }

    /**
     * Получаем сгрупированый список марок авто
     */
    public static function findCarsMake(): Car
    {
        return self::select('make')
            ->groupBy('make')
            ->get();
    }

    /**
     * Получаем сгрупированый список моделей марки авто
     */
    public static function getModelCar(string $model)
    {
        return self::select(['model'])
            ->where(['make' => $model])
            ->groupBy('model')
            ->get();
    }
}