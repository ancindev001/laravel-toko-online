<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    /**
     * Create a new component instance.
     */

    public $name;
    public $photo;
    public $price;
    public $id;

    public function __construct($name, $price, $photo, $id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->photo = $photo;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
