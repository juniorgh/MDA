<?php

namespace App\View\Components\Profissao;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Profissao;

class ProfissaoCreateEditComponent extends Component
{
    /**
     * Create a new component instance.
     */
        public function __construct(public ?Profissao $profissao = null, public ?Colaborador $colaboradores = null)
        {
            $this->profissao = $profissao;
            $this->colaboradores = $colaboradores;
        }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profissao.create-edit');
    }
}
