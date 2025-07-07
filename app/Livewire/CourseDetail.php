<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseDetail extends Component
{
    public Course $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.course-detail');
    }
}
