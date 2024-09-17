<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/cities",
 *     summary="Получение списка всех городов",
 *     tags={"Города"},
 *     @OA\Response(
 *         response=200,
 *         description="Список всех городов",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="Moscow"),
 *                 @OA\Property(property="latitude", type="number", format="float", example=55.7558),
 *                 @OA\Property(property="longitude", type="number", format="float", example=37.6173)
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Post(
 *     path="/api/cities",
 *     summary="Добавление нового города",
 *     tags={"Города"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="name", type="string", example="Moscow"),
 *             @OA\Property(property="latitude", type="number", format="float", example=55.7558),
 *             @OA\Property(property="longitude", type="number", format="float", example=37.6173)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Город успешно добавлен",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Город успешно добавлен")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Ошибка валидации"
 *     )
 * )
 */
class CityController extends Controller
{
    //
}
