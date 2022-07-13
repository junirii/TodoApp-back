<?php
namespace application\controllers;

class TodoController extends Controller{
  public function main(){
    return "index.html";
  }

  public function index(){
    switch(getMethod()){
      case _GET:
        return $this->model->selTodoList();
    
      case _POST:
        // if(isset($_POST["todo"])){
        //   $param = ["todo" => $_POST["todo"]];
        //   $this->model->insTodo($param);
        // }
        if($json = getJson()){
          $param = ["todo" => $json["todo"]];
          return [_RESULT => $this->model->insTodo($param)];
        }

      case _DELETE:
        // if(isset($_GET["itodo"])){
        //   $param = ["itodo" => $_GET["itodo"]];
        //   return [_RESULT => $this->model->delTodo($param)];
        // }
        $urlPath = getUrlPaths();
        $param = [
          "itodo" => 0
        ];

        if(isset($urlPath[2])){
          $param["itodo"] = intval($urlPath[2]);
        }

        return [_RESULT => $this->model->delTodo($param)];
    }
  }
}