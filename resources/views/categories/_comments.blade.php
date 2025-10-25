{{-- resources/views/categories/_comments.blade.php --}}
@foreach ($comments as $comment)
    <div class="flex space-x-3">
        {{-- Avatar --}}
        <img src="https://randomuser.me/api/portraits/men/{{ $comment->user->id % 100 }}.jpg"
             alt="{{ $comment->user->name }}"
             class="w-10 h-10 rounded-full flex-shrink-0">

        {{-- Body --}}
        <div class="flex-1">
            {{-- Header --}}
            <div class="flex items-center space-x-2 mb-1">
                <h4 class="font-medium text-gray-900">{{ $comment->user->name }}</h4>
                <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
            </div>

            {{-- Star rating --}}
            <div class="flex items-center space-x-1 mb-1">
                @for ($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $comment->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                @endfor
            </div>

            {{-- Comment text --}}
            <p class="text-gray-700 mb-2">{{ $comment->content }}</p>

            {{-- ===== Replies from seller (or other users) ===== --}}
            @foreach ($comment->replies as $reply)
                <div class="ml-6 mt-2 mb-2 border-l-4 pl-4 border-blue-400 bg-gray-50 rounded">
                    <div class="flex items-center space-x-2 mb-1">
                        <strong class="{{ $reply->user->isSeller() ? 'text-blue-600' : 'text-gray-900' }}">
                            {{ $reply->user->isSeller() ? 'Seller' : $reply->user->name }}
                        </strong>
                        <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-700 text-sm">{{ $reply->content }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Divider --}}
    <div class="border-t border-gray-200 my-6"></div>
@endforeach
