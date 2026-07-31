<?php

namespace App\View\Components\Colaborador;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Colaborador;
use Illuminate\Database\Eloquent\Collection;

class ColaboradorCreateEditComponent extends Component
{
    /**
     * Create a new component instance.
     */
        public function __construct(
            public ?Colaborador $colaborador = null, 
            public ?Collection $profissoes = null
        )
        {
            $this->colaborador = $colaborador;
            $this->profissoes = $profissoes;
        }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.colaborador.create-edit');
    }
}
