<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Abstractions\ITasksService;
    use Illuminate\Support\Facades\Storage;
    use App\Models\Task;

    class TasksController extends Controller
    {
        private $tasksService;
        private $info = '';

        function __construct(ITasksService $service) {
            $this->tasksService = $service;
        }

        public function index() {
            $tasks = $this->tasksService->get();
            return view('index')->with('tasks', $tasks)->with('info', $this->info);
        }

        public function create() {
            return view('create');
        }

        public function insert(Request $req) {
            $validatedData = $req->validate([
                'taskName' => 'required|max:100',
                'taskType' => 'required',
                'taskContentImage' => 'required',
                'taskContentText' => 'required'
            ]);

            // $validatedData = $req->all();

            var_dump($validatedData);

            $taskName = $validatedData['taskName'];
            $link = "";
            @mkdir('storage/tasks');

            if ($validatedData['taskType'] == 'file') {
                $this->info = $_FILES['taskContentImage'];
                if (isset($_FILES['taskContentImage'])) {
                    $destPath = '/storage/tasks'.$_FILES['taskContentImage']['name'];
                    $storage_path = '/public/tasks'.$_FILES['taskContentImage']['name'];
                    Storage::copy($_FILES['taskContentImage']['tmp_name'], $storage_path);

                    $link = $destPath;
                }
            } else {
                $link = '/storage/tasks/'.$taskName.'.txt';
                $destPath = '/public/tasks/'.$taskName.'.txt';
                Storage::put($destPath, $validatedData['taskContentText']);
            }

            $task = [
                'title' => $taskName,
                'link' => $link
            ];

            $this->tasksService->insert($task);
            return redirect('tasks');
        }
    }

?>
