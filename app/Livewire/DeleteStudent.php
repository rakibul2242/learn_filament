<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class DeleteStudent extends Component
{
    public $studentId;

    public function delete()
    {
        $student = User::findOrFail($this->studentId);

        if ($student->role === 'student') {
            $student->delete();
            session()->flash('message', 'Student deleted successfully.');
            $this->dispatch('studentDeleted');
        }
    }

    public function render()
    {
        return view('livewire.delete-student');
    }
}
