<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

abstract class ApiControllers
{
// абстрактный контроллер который будет всем передавать методы
// нужен для того чтоб не дублировать код
// добавляем методы
protected $model;

public function get(Request $request){
    $limit = (int) $request->get('limit', 100);
    $offset = (int) $request->get('offset', 0) ;

    $result = $this->model->limit($limit)->offset($offset)->get();

    $this->sendResponse($result,'OK',200);
}
public function detail(string $objectName = null){

}
public function update(int $objectId){

}
public function delete(int $objectId){

}
public function create(){

}

}
