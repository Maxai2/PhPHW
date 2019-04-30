<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Abstractions\ITasksService;

    class TasksController extends Controller
    {
        private $tasksService;

        function __construct(ITasksService $service) {
            $this->tasksService = $service;
        }

        public function index() {
            $tasks = $this->tasksService->get();
            return view('index')->with('tasks', $tasks);
        }

        public function create() {
            return view('create');
        }

        public function insert(Request $req) {
            $name = $req->input('taskName');

            $this->tasksService->insert();


            // return redirect('tasks');
        }
    }

?>
