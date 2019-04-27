<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abstractions\ITaskService;

class TaskController extends Controller
{
    private $taskService;

    function __construct(ITaskService $service) {
        $this->taskService = $service;
    }

    public function index() {
        $tasks = $this->taskService->get();
        return view('index')->with('tasks', $tasks);
    }

    public function insert() {
        $book = $this->booksService->find($id);
        return view('details')->with('book', $book);
    }
}
