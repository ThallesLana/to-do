<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;

    // table
    protected $table = 'list_to_do';
    // primary key
    protected $primaryKey = 'to_do_id';
    protected $fillable = [
        'text_to_do'
    ];
    public $timestamps = false;

    public function store(
        $textToDo
    ) {
        $todo = new todo();

        $todo->text_to_do = $textToDo;
        $todo->done      = 0;
        $todo->user_id   = 1;

        $todo->save();

        return response()->json(['message' => 'To-Do created successfully', 'data' => $todo]);
    }

    public function list(
        $userId
    ) {
        return todo::select('*')
        ->where('user_id', $userId)
        ->get();
    }

}
