<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class EnrolledStudents extends Component
{
    use WithPagination;

    public Course $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $students = $this->course->students()->paginate(10);
        return view('livewire.enrolled-students', compact('students'));
    }
}
