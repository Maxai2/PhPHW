<?php
    namespace App\Services;
    use App\Abstractions\ITasksService;
    use App\Models\Task;

    class TasksService implements ITasksService {
        public function get() {
            return Task::all();
        }

        public function insert($task) {
            return null;
        }

        // public function all()
        // {
        //     return News::all();
        // }

        // public function create($data)
        // {
        //     return News::create($data);
        // }

        // public function find($id)
        // {
        //     return News::find($id);
        // }

        // public function delete($id)
        // {
        //     return News::destroy($id);
        // }

        // public function update($id, array $data)
        // {
        //     return News::find($id)->update($data);
        // }
    }
?>
