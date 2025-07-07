<?php

namespace App\Livewire;
use App\Models\Course;
use App\Models\Content;
use Livewire\Component;

class ContentList extends Component
{
     public Course $course;
    public string $filterType = '';

    protected $queryString = ['filterType'];

    public function render()
    {
        $contents = Content::query()
            ->where('course_id', $this->course->id)
            ->when($this->filterType, fn ($q) => $q->where('type', $this->filterType))
            ->orderBy('id', 'asc')
           ->latest()
            ->paginate(5);

        return view('livewire.content-list', compact('contents'));
    }
}
