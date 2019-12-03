<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCategory;
use App\SubCategory;
use App\Course;
use App\Contact;
use App\Cost;
use Validator;

class CategoriesController extends Controller
{
    public function getMainCategories(Request $request){

       $categories = MainCategory::where('id',$request->id)->first();
       

       if($categories->count() > 0){
          $subCategories = SubCategory::where('main_category_id', $categories->id)->get();
	       	return response()->json(['Main_Category_name'=> $categories->name ,'Sub_Categories'=> $subCategories , 'Status' => 1]);
       }else{
	       	return response()->json(['Main_Categories'=> '' ,'Sub_Categories' => '', 'Status' => 0]);
       }
    }

    public function getSubCategoryCourses(Request $request){

    	$subCategory = SubCategory::where('id',$request->id)->first();
       	         
    	if($subCategory !== null){ 
          $courses = Course::where('sub_category_id',$subCategory->id)->get();   
	       	return response()->json(['Sub_Category_name'=> $subCategory->name ,'Courses'=> $courses , 'Status' => 1]);
        }else{
	       	return response()->json(['Sub_Category_name'=> $subCategory->name ,'Courses' => '', 'Status' => 0]);
        }


    }

    public function getCourse(Request $request){

       $course   = Course::where('id',$request->id)->first();
       

       if($course !== null){
       $costs    = Cost::where('course_id',$course->id)->get();
       $contacts = Contact::where('course_id',$course->id)->get();
          return response()->json(['course' => $course , 'costs'=> $costs , 'contacts' => $contacts , 'status' => 1]);
       }else{
         return response()->json(['course' => '' , 'costs'=> '' , 'contacts' => '' , 'status' => 0]);

       }

    }

    // public function insertCourse(){
    // 	$validator = Validator::make($request->all(),[
	   //     'name'=>'required',
	   //     'image'=>'required|image',
	   //     'center_name'=>'required',
	   //     'center_phone'=>'required',
	   //     'whats_app'=>'required',
	   //     'brief'=>'required',
	   //     'address'=>'required',
	   //     'sub_category_id' =>'integer|required'
    //    ]);

    	
    // }

    public function searchCourse(Request $request){
        $sub_cat = SubCategory::where('name','like','%'.$request->search . '%')
        ->orWhere('description','like','%'.$request->search . '%')
        ->get();
      // $subCategory = SubCategory::search($request->search_key)->get();
      // $course      = Course::search($request->search_key)->get();
      if($subCategory !== null || $course !== null){
         return response()->json(['sub_category' => $subCategory , 'course' => $course]);
      }else{
         return response()->json(['sub_category' => '' , 'course' => '']);
      }

    }

    
}
