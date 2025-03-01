<div>
    {{-- Comments Form with improved styling --}}
    <div class="mt-12 pt-8 border-t border-gray-200 animate-fade-in" style="animation-delay: 0.6s">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Join the conversation</h2>
        <form action="" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your
                        Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Your
                        Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>
            </div>

            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Your
                    Comment</label>
                <textarea name="comment" id="comment" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
            </div>

            <div>
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-md">
                    Post Comment
                </button>
            </div>
        </form>
    </div>
    {{-- Display Comments --}}
    <div class="mt-10 space-y-6 animate-fade-in" style="animation-delay: 0.7s">
        <h3 class="text-xl font-bold text-gray-800 mb-2">Comments ({{ $post?->comments?->count() ?? 0
            }})
        </h3>

        @if(isset($post?->comments) && $post?->comments?->count() > 0)
        @foreach($post->comments as $comment)

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3"> @if($comment->user && $comment->user->avatar) <img
                        src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}"
                        class="w-10 h-10 rounded-full border-2 border-white shadow-sm"> @else <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                            </path>
                        </svg>
                    </div> @endif <div>
                        <h4 class="font-medium text-gray-800">{{ $comment->user->name ?? $comment->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @auth
                    @if(Auth::id() === ($comment->user_id ?? null))
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium" onclick="return confirm('Are you sure you want to delete this comment?')">
                                Delete
                            </button>
                    </form>
                    @endif
                @endauth
            </div>
            <p class="text-gray-600 leading-relaxed">{{ $comment->comment }}</p>
        </div>
        @endforeach
        @else
        <div class="text-center py-8 text-gray-500">
            <svg class="mx-auto h-12 w-12 text-gray-400"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                </path>
            </svg>
            <p class="mt-2">No comments yet. Be the first to share your thoughts!</p>
        </div>
        @endisset
    </div>
</div>
