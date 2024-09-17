<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/weather/{city}",
 *     summary="Получение текущей погоды для города",
 *     tags={"Погода"},
 *     @OA\Parameter(
 *         name="city",
 *         in="path",
 *         required=true,
 *         description="ID города",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Погода для указанного города",
 *         @OA\JsonContent(
 *             @OA\Property(property="coord", type="object",
 *                 @OA\Property(property="lon", type="number", example=37.6182),
 *                 @OA\Property(property="lat", type="number", example=55.7557)
 *             ),
 *             @OA\Property(property="weather", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=800),
 *                     @OA\Property(property="main", type="string", example="Clear"),
 *                     @OA\Property(property="description", type="string", example="clear sky"),
 *                     @OA\Property(property="icon", type="string", example="01d")
 *                 )
 *             ),
 *             @OA\Property(property="main", type="object",
 *                 @OA\Property(property="temp", type="number", format="float", example=24.44),
 *                 @OA\Property(property="feels_like", type="number", format="float", example=23.83),
 *                 @OA\Property(property="temp_min", type="number", format="float", example=24.1),
 *                 @OA\Property(property="temp_max", type="number", format="float", example=24.75),
 *                 @OA\Property(property="pressure", type="integer", example=1032),
 *                 @OA\Property(property="humidity", type="integer", example=34)
 *             ),
 *             @OA\Property(property="visibility", type="integer", example=10000),
 *             @OA\Property(property="wind", type="object",
 *                 @OA\Property(property="speed", type="number", format="float", example=2.4),
 *                 @OA\Property(property="deg", type="integer", example=134),
 *                 @OA\Property(property="gust", type="number", format="float", example=3.51)
 *             ),
 *             @OA\Property(property="clouds", type="object",
 *                 @OA\Property(property="all", type="integer", example=3)
 *             ),
 *             @OA\Property(property="sys", type="object",
 *                 @OA\Property(property="country", type="string", example="RU"),
 *                 @OA\Property(property="sunrise", type="integer", example=1726542336),
 *                 @OA\Property(property="sunset", type="integer", example=1726587750)
 *             ),
 *             @OA\Property(property="name", type="string", example="Moscow Oblast"),
 *             @OA\Property(property="cod", type="integer", example=200)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Город не найден"
 *     )
 * )
 */
class WeatherController extends Controller
{
    //
}
