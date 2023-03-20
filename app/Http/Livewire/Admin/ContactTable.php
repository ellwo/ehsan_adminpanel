<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactTable extends Component
{
    use WithPagination;
    public function render()
    {
        $contacts=Contact::orderBy('created_at')->paginate(5);
        return view('admin.contact.contact-table',['contacts'=>$contacts]);
    }
}
