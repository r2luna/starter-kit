<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Brain\Auth\Processes\AuthProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            AuthProcess::dispatch([
                'email'    => $request->email,
                'password' => $request->password,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return Auth::user();
    }
}
