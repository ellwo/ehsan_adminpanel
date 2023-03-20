<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    //


    function index(){

        return view('admin.department.show');
    }
}
