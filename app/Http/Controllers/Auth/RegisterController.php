<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'text_to_do' => 'string|required|max:255'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        };
        $todoModel = new todo();
        $todo = $todoModel->store(
            $request->input('text_to_do')
        );

        return response()->json(['store' => $todo], 201);
    }
}
