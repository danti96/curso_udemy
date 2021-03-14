<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    //creamos una propiedad para indicar que queremos usar los estilos de bootstrap
    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(8);
        return view('livewire.admin.users-index', compact('users'));
    }

    public function limpiarPage()
    {
        $this->reset('page');
    }
}