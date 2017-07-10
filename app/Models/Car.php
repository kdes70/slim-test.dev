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
     * Получаем список марок авто
     */
    public static function findCarsMake()
    {
        return self::select('make')
            ->distinct()
            ->orderBy('make')
            ->get();
    }

    /**
     * Получаем сгрупированый список моделей марки авто
     */
    public static function getModelCar(string $model)
    {
        return self::select('model')
            ->where(['make' => $model])
            ->groupBy('model')
            ->get();
    }

    public static function getMakeModelList(string $make, string $model)
    {
        return self::query()
            ->where(['make' => $make])
            ->where(['model' => $model])
            ->get();
    }

    public static function storeCar(array $data)
    {
         self::insert([
            'make'  => $data['make'],
            'model' => $data['model'],
            'year'  => (int)$data['year'],
            'price' => $data['price'],
        ]);
    }
}