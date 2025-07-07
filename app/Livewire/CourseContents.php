<?php

namespace App\Livewire;

use App\Models\Content;
use App\Models\Course;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CourseContents extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public Course $course;

    /** Query only this course’s contents */
    protected function getTableQuery(): Builder
    {
        return Content::query()->where('course_id', $this->course->id);
    }

    /** Column definitions */
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->wrap()
                ->weight('medium'),

            Tables\Columns\BadgeColumn::make('type')
                ->colors([
                    'primary'  => 'text',
                    'success'  => 'video',
                    'warning'  => 'quiz',
                ])
                ->sortable(),

            Tables\Columns\TextColumn::make('duration')
                ->label('Duration (min)')
                ->alignEnd(),
        ];
    }

    /** Row action ⟶ opens a Filament modal */
    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')
                ->label('Open')
                ->icon('heroicon-o-eye')
                ->modalHeading(fn (Content $rec) => $rec->title)
                ->modalSubmitAction(false)           // read‑only
                ->modalContent(fn (Content $rec) => view(
                    'livewire.content-modal',
                    ['content' => $rec]
                )),
        ];
    }

    public function render()
    {
     return view('livewire.course-contents');
    }
}
