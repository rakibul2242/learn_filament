<main>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold text-center text-gray-800">Available Courses</h1>
        <div class="flex justify-end mb-6">
            <a href="{{ route('filament.admin.resources.courses.create') }}"
                class="inline-flex items-center gap-2 bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Create Course
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($courses as $course)
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition hover:scale-105 hover:shadow-2xl p-4">
                    <div class="h-48 overflow-hidden mb-4">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                            class="w-full h-full object-cover object-center rounded-md">
                    </div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">{{ $course->title }}</h2>
                    <p class="text-gray-600 mb-2 line-clamp-3">{{ $course->short_desc }}</p>

                    <div class="flex flex-wrap flex-col text-sm text-gray-700 mb-4">
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

                    <a href="{{ route('courses.show', $course->id) }}" wire:navigate
                        class="block text-center bg-blue-600 text-white rounded-md py-2 font-semibold hover:bg-blue-700 transition duration-300">
                        View Course
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</main>
