<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ad;
use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class AdTable extends Component
{

    public $search='';
    public $deleted_ad='no';
    use WithPagination;
    public function render()
    {

        $ads=Offer::orderBy('updated_at','desc')->paginate(5);
        return view('admin.ad.ad-table',['ads'=>$ads]);
    }



    public function delete_ad($id)
    {
      $ad=  Offer::find($id);
      if($ad!=null)

      $ad->delete();

      session()->flash('status','تم الحذف بنجاح');

        # code...
    }
}
