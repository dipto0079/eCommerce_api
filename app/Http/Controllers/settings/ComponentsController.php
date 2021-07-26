<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentsController extends Controller
{
    public function view($lang_id)
    {
    $language_id = $lang_id;
//    $components = DB::table('language_components')->get();
//    $components = DB::table('language_changed')
//        ->join('language_components','language_changed.component_id','=','language_components.comp_id')
//            ->select('language_changed.*','language_components.*')
//            ->where('language_changed.language_id',$language_id)
//            ->get();

//    return view('backend.components.view',compact('components','language_id'));
    return view('backend.components.view',compact('language_id'));
    }

    public function update(Request $request,$language_id)
    {
        $data = $request->data;
//        $language_change = DB::table('language_changed')->where('language_id',$language_id)->get();
        $component = DB::table('language_components')->get();
        foreach ($component as $single)
        {

            if (DB::table('language_changed')
                ->where('language_id',$language_id)
                ->where('component_id',$single->comp_id)->count() > 0){

                $update = array(
                    'component_value'=> $data[$single->comp_id],
//                    'component_id'=> $single->comp_id,
                );

                DB::table('language_changed')
                    ->where('language_id',$language_id)
                    ->where('component_id',$single->comp_id)
                    ->update($update);

                $notification=array(
                    'messege'=>'Successfully Components Updated',
                    'alert-type'=>'success'
                );
            }
            else{
                $insert = array(
                    'component_value'=>  $data[$single->comp_id],
                    'component_id'=> $single->comp_id,
                    'language_id'=> $language_id
                );

                DB::table('language_changed')
                    ->insert($insert);

                $notification=array(
                    'messege'=>'Successfully Components Updated',
                    'alert-type'=>'success'
                );
            }


        }
        return redirect()->route('language.add')->with($notification);

    }








//    public function store(Request $request)
//    {
//        $data = $request->data;
//        $language_id = $request->language_id;
//        $component = DB::table('language_components')->get();
//        //$output=array();
//        foreach ($component as $single)
//        {
//            $insert = array(
//                'language_name'=> $data[$single->comp_id],
//                'component_id'=> $id = $single->comp_id,
//                'language_id'=> $language_id
//            );
//            $insertt=DB::table('language_changed')->insert($insert);
//        }
//
////        return response()->json($output);
//
//        if ($insertt) {
//            $notification=array(
//                'messege'=>'Successfully Language Added',
//                'alert-type'=>'success'
//            );
//        }else{
//            $notification=array(
//                'messege'=>'Something Went Wrong',
//                'alert-type'=>'error'
//            );
//        }
//        return redirect()->back()->with($notification);
//    }

}
