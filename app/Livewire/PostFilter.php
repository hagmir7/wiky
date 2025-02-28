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

    #[Url(history: true)]
    public string $search = '';

    public int $perPage = 6;

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
        $this->search = '';
        $this->resetPage();
    }

    /**
     * Get filtered posts.
     */
    #[Computed]
    public function posts()
    {
        return Post::query()
            ->with(['user', 'book', 'categories', 'media'])
            ->when($this->search, function (Builder $query) {
                $searchTerm = '%' . trim($this->search) . '%';

                return $query->where(function (Builder $q) use ($searchTerm) {
                    $q->whereHas('book', function (Builder $q) use ($searchTerm) {
                        $q->where('name', 'like', $searchTerm)
                            ->orWhereHas('author', function (Builder $q) use ($searchTerm) {
                                $q->where('full_name', 'like', $searchTerm);
                            });
                    })
                        ->orWhereHas('categories', function (Builder $q) use ($searchTerm) {
                            $q->where('name', 'like', $searchTerm);
                        });
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
        return view('livewire.post-filter');
    }
}
