<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProductSelect extends Component
{public $query;
    public $contacts;
    public $highlightIndex;

    public $product_id=-1;
    public $show_drop=0;
    public function mount($product_id=-1)
    {
        $this->product_id=$product_id;
        $this->resetselect();
        if($product_id!=-1){
        $p=Product::find($product_id);
        $this->query=$p->name??'';
        }
    }





    public function togelshow(){
        $this->show_drop=!$this->show_drop;
    }

    public function resetselect()
    {
        $this->query = '';
        $this->contacts = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
        $this->query=$this->contacts[$this->highlightIndex]['name'];
        $this->product_id=$this->contacts[$this->highlightIndex]['id'];
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;

        $this->query=$this->contacts[$this->highlightIndex]['name'];
        $this->product_id=$this->contacts[$this->highlightIndex]['id'];
    }

    public function selectContact($product_id)
    {
        $this->product_id=$product_id;
        $this->show_drop=0;
        // $contact = $this->contacts[$this->highlightIndex] ?? null;
        // if ($contact) {
        //  //   $this->redirect(route('show-contact', $contact['id']));
        // }
    }

    public function updatedQuery()
    {
        $this->contacts = Product::where('name', 'like', '%' . $this->query . '%')
            ->Orwhere('id','=',$this->query)
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.search-product-select');
    }
}
