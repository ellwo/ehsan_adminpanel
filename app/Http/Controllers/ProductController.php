<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProductController extends Controller
{
    //


    public function index()
    {
        # code...
        return redirect()->route('products-table');
    }

    public function create()   {
        # code...
        return view('admin.products.create');
    }

    public function edit(Product $product)
    {
        # code...

        return view('admin.products.edite',['product'=>$product]);
    }


    public function store(Request $request)
    {


        $this->validate($request,[
            'name'=>'required',
            'img'=>'required',
            'department_id'=>'required',
            'price'=>'required',

        ]);


        $note=null;
        $n_key=$request["n_key"]??[];$n_value=$request["n_value"]??[];
        for($i=0; $i<count($n_key); $i++){

           if($n_key[$i]!=null && $n_value!=null)
           $note[$n_key[$i]]=$n_value[$i];
        }

        $product=Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'note' => $note,
            'discrip'=>$request['note'],
            'img' => $request['img'],
            'department_id' => $request['department_id'],
            'imgs' => $request['imgs'],
            'brand_id'=>$request['brand_id'],
            'user_id'=>auth()->user()->id,
            'required_ep'=>$request['required_ep']??false
        ]);

        // $parts=explode(',',$request->parts);

        //  if(count($parts)>0 && $parts[0]!="")
        // $product->parts()->attach($parts);

        return redirect()->route('products')->with('status','تم الاضافة بنجاح');




        // if ($request['name'] == null ||
        //     $request['price'] == null ||
        //     $request['imgurl'] == null ||
        //     $request['department_id'] == null) {

        //     $errorinput = [];

        //     if ($request['imgurl'] == null)
        //         $errorinput['imgurl'] = "يجب اضافة صورة";

        //     if ($request['name'] == null)
        //         $errorinput['name'] = "يجب اضافة اسم";


        //     return $data = ['statt' => 'error', 'message' => 'Some Data are missed', 'errorinput' => $errorinput];
        // }


        if ($request->isMethod('POST')) {

            $pro = Product::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'note' => $request['note'],
                'Mimg' => $request['imgurl'],
                'department_id' => $request['department_id'],
                'imgs' => []
            ]);

            if ($request->has('imgsurl') && $request['imgsurl'] != null) {
                $imgsurl = explode('|', $request['imgsurl']);
                $pro->imgs = $imgsurl;
                $pro->save();
            }
            Cache::flush();

            session()->flash('statt', 'ok');
            session()->flash('message', 'تم الحفظ بنجاح ');


            return $data = ['statt' => 'ok'];


        }

    }




        public function update(Request $request,Product $product){


            $this->validate($request,[
                'name'=>'required',
                'img'=>'required',
                'department_id'=>'required',
            ]);


            $note=[];
            $n_key=$request["n_key"]??[];$n_value=$request["n_value"]??[];
            for($i=0; $i<count($n_key); $i++){

               if($n_key[$i]!=null && $n_value!=null)
               $note[$n_key[$i]]=$n_value[$i];
            }

            $product->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'note' => $note,
                'discrip'=>$request['note'],
                'img' => $request['img'],
                'department_id' => $request['department_id'],
                'imgs' => $request['imgs'],
                'required_ep'=>$request['required_ep']
            ]);

            $parts=explode(',',$request->parts);

             if(count($parts)>0 && $parts[0]!="")
            {
                $product->parts()->detach();
                $product->parts()->attach($parts);

            }

             return redirect()->route('products')->with('status','تم الاضافة بنجاح');



            if ($request['name'] == null ||
                $request['price'] == null ||
                $request['imgurl'] == null ||
                $request['department_id'] == null) {

                $errorinput = [];

                if ($request['imgurl'] == null)
                    $errorinput['imgurl'] = "يجب اضافة صورة";

                if ($request['name'] == null)
                    $errorinput['name'] = "يجب اضافة اسم";


                return $data = ['statt' => 'error', 'message' => 'Some Data are missed', 'errorinput' => $errorinput];
            }


            if ($request->isMethod('POST')) {


                $pro=Product::find($request['editproid']);
                $pro->update([
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'note' => $request['note'],
                    'Mimg' => $request['imgurl'],
                    'department_id' => $request['department_id'],
                ]);

                if ($request->has('imgsurl') && $request['imgsurl'] != null) {
                    $imgsurl = explode('|', $request['imgsurl']);

                 //   dd(count($imgsurl));

                    foreach ($pro->imgs as $im){
                        $imgsurl[]=$im;

                    }

                    $pro->imgs=$imgsurl;

                }
                $pro->save();

                Cache::flush();

                session()->flash('statt', 'ok');
                session()->flash('message', 'تم الحفظ بنجاح ');


                return $data = ['statt' => 'ok'];


            }



    }





    public  function deleteimg(Request $request){


        $imgurl=$request['imgurl'];

        if($imgurl!=null)
        {

            try {
                    File::delete($imgurl);
                return $data=['statt'=>'ok','message'=>'Deleted Successful'];

            }
            catch (\Exception $e){
                return  $data=['statt'=>'no','message'=>$e->getMessage()];
            }

        }

        else
            return $data=['statt'=>'no','message'=>'imgurl is notFound'];


    }







    }

