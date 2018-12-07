<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
//  Метод вывода всех Тэгов.

    public function index()
    {
        return Tag::all();
    }

//  Метод вывода конкретнго Тэга.

    public function show(Tag $tag)
    {
        return $tag;
    }

//  Метод отправки содержимого форм в БД.

    public function store()
    {
        request()->validate(['name' => 'required']);

        return Tag::create(request(['name']));
    }

//  Метод сохранения изменений Тэга.

    public function update(Tag $tag)
    {
        $tag->update(request()->all());

        return response()->json($tag,200);
    }

//  Метод удаления Тэга.

    public function destroy($id) {

        Tag::findOrFail($id)->delete();

        return 204;
    }

}
