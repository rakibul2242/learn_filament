<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Enrollment;

class CourseDetail extends Component
{
    public Course $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }
    public function enroll()
    {
        $user = auth()->user();

        if (!$user) {
            session()->flash('error', 'Please log in to enroll.');
            return redirect('/admin/login'); // 🔁 Go to Filament login
        }

        $alreadyEnrolled = Enrollment::where('user_id', $user->id)->where('course_id', $this->course->id)->exists();

        if ($alreadyEnrolled) {
            session()->flash('message', 'Already enrolled in this course.');
            return;
        }

        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $this->course->id,
        ]);

        session()->flash('message', 'Enrollment successful!');
    }

    public function render()
    {
        return view('livewire.course-detail');
    }
}
