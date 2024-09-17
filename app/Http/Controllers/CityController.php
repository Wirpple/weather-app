<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CityController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            City::create($request->all());

            return response()->json(['message' => 'Город успешно добавлен']);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Ошибка валидации',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return City::all();
    }
}
