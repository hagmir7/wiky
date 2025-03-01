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


    public int $perPage = 12;
    public $totalBlogs = 0;

    /**
     * Reset pagination when updating the search field.
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Clear all filters and reset pagination.
     */
    public function clearFilters(): void
    {
        $this->reset(['search']);
        $this->resetPage();
    }


    public function loadMore()
    {
        $this->perPage += 12;
    }

    /**
     * Get filtered posts.
     */
    #[Computed]
    public function posts(): mixed
    {
        return Post::query()
            ->with(['user', 'book', 'categories'])
            ->when($this->search, function (Builder $query) {
                $searchTerm = '%' . trim($this->search) . '%';
                $query->where(function (Builder $q) use ($searchTerm) {
                    $q->whereHas('book', fn (Builder $q) => $q->where('name', 'like', $searchTerm)
                        ->orWhereHas('author', fn (Builder $q) => $q->where('full_name', 'like', $searchTerm)))
                        ->orWhereHas('categories', fn (Builder $q) => $q->where('name', 'like', $searchTerm));
                });
            })
            ->latest()
            ->paginate($this->perPage);
    }

    /**
     * Render the Livewire component view.
     */
    public function render(): View
    {
        return view('livewire.post-filter', [
            'posts' => $this->posts,
        ]);
    }
}
