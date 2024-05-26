<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class CartButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $cart_qty = 0;
    public function __construct()
    {
        if (auth()->user()) {
            $total_item = DB::select('select sum(qty) as total from carts where user_id = ?', [auth()->user()->id]);
            $this->cart_qty = $total_item[0]->total == null ? 0 : $total_item[0]->total;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-button');
    }
}
