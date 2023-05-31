<?php

namespace App\Http\Controllers;
use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class todoController extends Controller
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

    public function list(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'int|required'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        };
        $todoModel = new todo();
        $todo = $todoModel->list(
            $request->input('user_id')
        );

        return response()->json(['todos' => $todo], 201);
    }
}
