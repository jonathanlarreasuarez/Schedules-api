<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *    title="Schedule Application API",
 *    version="1.0.0",
 *    description="Documentation Schedule Application.",
 *    @OA\Contact(
 *       email="jonathanlarreasuarez@gmail.com"
 *   ),
 * )
 *  @OAS\SecurityScheme(
 *      securityScheme="api_key_security",
 *      type="http",
 *      scheme="bearer"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
