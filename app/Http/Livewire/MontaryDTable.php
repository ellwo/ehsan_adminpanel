<?php

namespace App\Http\Livewire;

use App\Models\Donor;
use App\Models\MonetaryDonation;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class MontaryDTable extends Component
{

    public $user_id=-1;
    public $colmun_name="";
    public $dept_id="no";
    public $dateorder="no";
    public $search="";
    public $showform=0;
    public $edite_don=-1;
    public $deleteDept="no";
    public $r_note="";
    public $from_date=null;
    public $to_date=null;


    public function mount($user_id=-1,$colmun_name=""){
        $this->user_id=$user_id;
        $this->colmun_name=$colmun_name;
    }


    public function render()
    {


        $montries=[];
        $users=User::has('monetarydonations')->get();
        $donors=Donor::has('monetarydonations')->get();

        // has('roles',function($q){
        //     $q->where('roles.name','normal');
        // })->get();
        if($this->user_id==-1)
{
    $montries=MonetaryDonation::Sum('amount')->orderBy('created_at','desc')->paginate(10);

    // ->groupBy(
    //      function($date){
    //        return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by months
    //      }
    //  );
}
       else{
        $montries=MonetaryDonation::where($this->colmun_name,'=',$this->user_id)->orderBy('created_at','desc')->paginate(10);
       }

        return view('admin.monetarydonation.table',compact('montries','users','donors'))
        ->layout('components.dashboard.index');
    }




    public function setWho($id,$cn){
        $this->user_id=$id;
        $this->colmun_name=$cn;
    }


    public function setDept_id($dept_id){
        $this->dept_id=$dept_id;
        $this->showform=1;
    }
    public function cancelEdit(){
        $this->dept_id="no";
        $this->showform=0;
    }

    public  function setDeleteDept($idd){
        $this->deleteDept=$idd;
    }

    public function cancelDelete(){
        $this->deleteDept="no";
    }
    public function DeleteDept(){

        if($this->deleteDept!="no") {
        $dept=    MonetaryDonation::withSum('amount')->find($this->deleteDept);

        $dept->products()->delete();
        $dept->delete();

            session()->flash('statt','ok');
            session()->flash('message','تم الحذف');
            $this->deleteDept="no";

        }
    }


    public function makedonresave(){

        if($this->edite_don!=-1)
        {
            $d=MonetaryDonation::find($this->edite_don);
            if($d!=null){
            $d->state=1;
            $d->r_note=$this->r_note;
            $d->resave_by=auth()->user()->id;
            $d->save();


            session()->flash('status','تم التعديل بنجاح بنجاح');
            session()->flash('tital','عملية التعديل ');

        }
        }

    }

}
