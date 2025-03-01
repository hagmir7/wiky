<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class BookFilter extends Component
{
    use WithPagination;

    public int $perPage = 15;

    public function updatingBooks()
    {
        $this->resetPage();
    }

    #[Computed]
    public function books()
    {
        return Book::published()
            ->latest()
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.book-filter');
    }
}
