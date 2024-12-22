<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostFilter extends Component
{
    public $search = '';
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function test()
    {
        // Handle search button click if needed
    }
    public function render()
    {
        $posts = Post::query()
            ->with(['user', 'book', 'categories', 'media'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%')
                        ->orWhereHas('book', function ($q) {
                            $q->where('title', 'like', '%' . $this->search . '%');
                        })
                        ->orWhereHas('categories', function ($q) {
                            $q->where('name', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->latest()
            ->paginate(6);

        return view('livewire.post-filter', [
            'posts' => $posts
        ]);
    }
}
