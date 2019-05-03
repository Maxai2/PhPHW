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

                // dd($imageCont['taskContentImage']);
                dd($imageCont);

                $destPath = '/storage/tasks/'.$imageCont['name'];
                $storage_path = '/public/tasks/'.$imageCont['name'];

                dd($imageCont);
                Storage::copy($imageCont['tmp_name'], $storage_path);

                $link = $destPath;
            } else {
                $textCont = $req->validate([
                    'taskContentText' => 'required'
                ]);

                $link = '/storage/tasks/'.$taskName['taskName'].'.txt';
                $destPath = '/public/tasks/'.$taskName['taskName'].'.txt';
                Storage::put($destPath, $textCont['taskContentText']);
            }

            $task = [
                'title' => $taskName['taskName'],
                'link' => $link
            ];

            $this->tasksService->insert($task);
            return redirect('tasks');
        }
    }

?>
