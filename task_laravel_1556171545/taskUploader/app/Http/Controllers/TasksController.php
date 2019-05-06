<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Abstractions\ITasksService;
    use Illuminate\Support\Facades\Storage;
    use App\Models\Task;

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
            $taskName = $req->validate([
                'taskName' => 'required|max:100'
            ]);

            $link = "";
            @mkdir('storage/tasks');

            $type = $req->validate([
                'taskType' => 'required'
            ]);

            if ($type["taskType"] == 'file') {
                // $imageCont = $req->file($req->input('taskContentImage'));
                $imageCont = $_FILES["taskContentImage"];

                $destPath = '/storage/tasks/'.$imageCont['name'][0];
                $storage_path = '/public/tasks/'.$imageCont['name'][0];
                dd($req->file($req->input('taskContentImage')->store()));

                Storage::disk('local')->copy($imageCont['tmp_name'][0], $storage_path);

                $link = $destPath;
            } else {
                $textCont = $req->validate([
                    'taskContentText' => 'required'
                ]);

                $link = '/storage/tasks/'.$taskName['taskName'][0].'.txt';
                $destPath = '/public/tasks/'.$taskName['taskName'][0].'.txt';
                Storage::put($destPath, $textCont['taskContentText'][0]);
            }

            $task = [
                'title' => $taskName['taskName'][0],
                'link' => $link
            ];

            $this->tasksService->insert($task);
            return redirect('tasks');
        }
    }

?>
