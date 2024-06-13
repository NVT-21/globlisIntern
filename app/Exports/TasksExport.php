<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class TasksExport implements FromCollection ,WithHeadings
{
    public function collection()
    {
        return Task::with(['project', 'person'])->get()->map(function($task) {
            return [
                'project' => $task->project->name,
                'description' => $task->description,
                'start_time' => $task->start_time,
                'end_time' => $task->end_time,
                'priority' => $this->getPriorityName($task->priority),
                'status' => $this->getStatusName($task->status),
                'person' => $task->person->full_name,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Project',
            'Description',
            'Start Time',
            'End Time',
            'Priority',
            'Status',
            'Person',
        ];
    }

    private function getPriorityName($priority)
    {
        $priorityNames = [
            1 => 'High',
            2 => 'Medium',
            3 => 'Low'
        ];
        return $priorityNames[$priority] ?? 'Unknown';
    }

    private function getStatusName($status)
    {
        $statusNames = [
            1 => 'New',
            2 => 'In Progress',
            3 => 'Completed',
            4 => 'On Hold'
        ];
        return $statusNames[$status] ?? 'Unknown';
    }
}
