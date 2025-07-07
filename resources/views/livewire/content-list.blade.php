<div class="mt-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b pb-2">Course Contents</h2>

    <div class="flex flex-wrap gap-3 mb-8">
        @foreach (['' => 'All', 'text' => 'Text', 'video' => 'Video', 'quiz' => 'Quiz'] as $type => $label)
            <button wire:click="$set('filterType', '{{ $type }}')"
                class="px-4 py-2 rounded-full border transition duration-200 text-sm font-medium
                    {{ $filterType === $type ? 'bg-blue-600 text-white border-blue-600 shadow-md' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    @if ($contents->count())
        <div class="grid gap-6">
            @foreach ($contents as $content)
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-6 transition hover:shadow-md">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $content->title }}</h3>

                        <span
                            class="text-xs font-semibold uppercase tracking-wide px-3 py-1 rounded-full
                            @if ($content->type === 'text') bg-blue-100 text-blue-700
                            @elseif($content->type === 'video') bg-green-100 text-green-700
                            @elseif($content->type === 'quiz') bg-yellow-100 text-yellow-700 @endif">
                            {{ ucfirst($content->type) }}
                        </span>
                    </div>

                    <div class="mt-2 text-sm text-gray-700 space-y-2">
                        @if ($content->type === 'text')
                            <div class="prose prose-sm max-w-none text-gray-800">{!! $content->content_text !!}</div>
                        @elseif ($content->type === 'video')
                            <div class="aspect-video rounded overflow-hidden shadow-sm">
                                <iframe class="w-full h-full" src="{{ $content->video_url }}" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                            <p class="mt-2 text-gray-600 text-xs">Duration: {{ $content->duration }} min</p>
                        @elseif ($content->type === 'quiz')
                            <div class="bg-yellow-50 p-3 rounded text-sm border border-yellow-200 whitespace-pre-line">
                                {{ $content->quiz_data }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="mt-8">
                {{ $contents->links() }}
            </div>
        </div>
    @else
        <div class="text-center py-10 text-gray-500">
            <p>No content found for this course.</p>
        </div>
    @endif
</div>
