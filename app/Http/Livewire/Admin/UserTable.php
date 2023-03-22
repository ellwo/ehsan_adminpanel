<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{

    use WithPagination;
    public $search="";
    public function render()
    {
         if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $users = User::where('name','LIKE','%'.$this->search.'%')->
            Orwhere('phone','LIKE','%'.$this->search.'%')
          ->with('roles')->paginate(5);

        return view('livewire.admin.user-table',[
            'users'=>$users
        ]);
    }
}
