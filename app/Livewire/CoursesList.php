<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class CoursesList extends Component
{
    public function render()
    {
        return view('livewire.courses-list', [
            'courses' => Course::latest()->get(),
        ]);
    }
}
