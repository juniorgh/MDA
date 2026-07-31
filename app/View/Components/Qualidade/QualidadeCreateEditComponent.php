<?php

namespace App\View\Components\Qualidade;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Qualidade;

class QualidadeCreateEditComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(public ?Qualidade $qualidade = null,public $id = '')
        {

        }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.qualidade.qualidade-create-edit-component');
    }
}
