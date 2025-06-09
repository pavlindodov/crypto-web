<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Crypto;

class FavoriteButton extends Component
{
    public $crypto;

    public function __construct(Crypto $crypto)
    {
        $this->crypto = $crypto;
    }

    public function render()
    {
        return view('components.favorite-button');
    }
}
