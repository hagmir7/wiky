<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Post;

class PostComments extends Component
{

    public Post $post;
    public function render()
    {
        return view('livewire.post-comments');
    }
}
