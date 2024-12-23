<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostFilter extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public int $perPage = 6;

    protected $listeners = ['refreshPosts' => '$refresh'];

    public function updating(string $name): void
    {
        if ($name === 'search') {
            $this->resetPage();
            Cache::forget($this->getCacheKey());
        }
    }

    protected function getCacheKey(): string
    {
        return "posts.{$this->search}.{$this->getPage()}";
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'user', 'category']);
        $this->resetPage();
    }

    #[Computed]
    public function posts(): mixed
    {
        return Cache::remember(
            $this->getCacheKey(),
            now()->addMinutes(5),
            fn () => $this->getPostsQuery()->paginate($this->perPage)
        );
    }

    protected function getPostsQuery(): Builder
    {
        $query = Post::query()
            ->with(['user', 'book', 'categories', 'media']);

        if ($this->search) {
            $searchTerm = '%' . trim($this->search) . '%';
            $query->where(function (Builder $q) use ($searchTerm) {
                $q->whereHas('book', function (Builder $q) use ($searchTerm) {
                    $q->where('title', 'like', $searchTerm)
                        ->orWhere('author', 'like', $searchTerm);
                })
                    ->orWhereHas('categories', function (Builder $q) use ($searchTerm) {
                        $q->where('name', 'like', $searchTerm);
                    });
            });
        }

        return $query->latest();
    }

    public function render(): View
    {
        return view('livewire.post-filter', [
            'posts' => $this->posts,
        ]);
    }
}
