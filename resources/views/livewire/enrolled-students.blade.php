<main class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto max-w-7xl px-4">
        <a href="{{ route('courses.list') }}"
            class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Courses
        </a>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">

                <div class="h-full w-full">
                    @if ($course->thumbnail)
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                            class="w-full h-full object-cover md:rounded-l-2xl">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500 text-lg">
                            No Image Available
                        </div>
                    @endif
                </div>

                <div class="p-6">
                    <h2 class="text-3xl font-semibold text-gray-900 mb-2">{{ $course->title }}</h2>
                    <p class="text-gray-800 mb-1 text-lg font-semibold">{{ $course->short_desc }}</p>
                    <div class="prose prose-blue max-w-none text-gray-800 mb-2">
                        {!! $course->description !!}
                    </div>


                    <div class="flex flex-wrap flex-col text-sm text-gray-700 mb-4 gap-1">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                                    fill="none" />
                            </svg>
                            <span>Duration: <strong>{{ $course->duration ?? 'N/A' }}</strong></span>
                        </div>

                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-4 0-7 2-7 5 0 3 3 5 7 5s7-2 7-5c0-3-3-5-7-5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                            </svg>
                            <span>Price: <strong>${{ number_format($course->price, 2) }}</strong></span>
                        </div>

                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.121 17.804A4.992 4.992 0 019 15h6a4.992 4.992 0 013.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Instructor:
                                <strong>{{ $course->instructor?->name ?? 'No instructor' }}</strong></span>
                        </div>
                    </div>

                    <div class="mt-8">
                        @if (session()->has('message'))
                            <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-4 rounded">
                                {{ session('message') }}
                            </div>
                        @endif

                        <button wire:click="enroll"
                            class="w-full cursor-pointer text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                            Enroll Now
                        </button>
                        <div class="mt-4">
                            <a href="{{ route('courses.enrolled', $course->id) }}"
                                class="w-full block text-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 rounded-xl transition-all duration-300 shadow-sm border">
                                View Enrolled Students
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <h2 class="text-xl font-bold mb-4">Enrolled Students</h2>

            @if ($students->count())
                <ul class="space-y-2">
                    @foreach ($students as $student)
                        <li class="bg-white p-4 rounded shadow">
                            <div class="font-semibold text-gray-800">{{ $student->name }}</div>
                            <div class="text-sm text-gray-600">{{ $student->email }}</div>
                        </li>
                          @livewire('delete-student', ['studentId' => $student->id], key($student->id))
                    @endforeach
                </ul>

                <div class="mt-4">
                    {{ $students->links() }}
                </div>
            @else
                <p class="text-gray-500">No students enrolled in this course yet.</p>
            @endif
        </div>
    </div>
</main>
