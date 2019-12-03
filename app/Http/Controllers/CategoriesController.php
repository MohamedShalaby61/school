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

       $categories = MainCategory::where('name',$request->name)->first();
       $subCategories = SubCategory::where('main_category_id', $categories->id)->get();

       if($categories->count() >= 1 && $subCategories->count() >= 1){
	       	return response()->json(['Main_Category_name'=> $categories->name ,'Sub_Categories'=> $subCategories , 'Status' => 1]);
       }else{
	       	return response()->json(['Main_Categories'=> '' ,'Sub_Categories' => '', 'Status' => 0]);
       }
    }

    public function getSubCategoryCourses(Request $request){

    	$subCategory = SubCategory::where('name',$request->name)->first();
       	$courses = Course::where('sub_category_id',$subCategory->id)->get();         
    	if($subCategory->isNotEmpty && $courses->isNotEmpty){    
	       	return response()->json(['Sub_Category_name'=> $subCategory->name ,'Courses'=> $courses , 'Status' => 1]);
        }else{
	       	return response()->json(['Sub_Category_name'=> $subCategory->name ,'Courses' => '', 'Status' => 0]);
        }


    }

    public function getCourse(Request $request){

       $course   = Course::where('name',$request->name)->first();
       $costs    = Cost::where('course_id',$course->id)->get();
       $contacts = Contact::where('course_id',$course->id)->get();

       if($course !== null){
          return response()->json(['course' => $course , 'costs'=> $costs , 'contacts' => $contacts , 'status' => 1]);
       }else{
         return response()->json(['course' => '' , 'costs'=> '' , 'contacts' => '' , 'status' => 0]);

       }

    }

    public function insertCourse(){
    	$validator = Validator::make($request->all(),[
	       'name'=>'required',
	       'image'=>'required|image',
	       'center_name'=>'required',
	       'center_phone'=>'required',
	       'whats_app'=>'required',
	       'brief'=>'required',
	       'address'=>'required',
	       'sub_category_id' =>'integer|required'
       ]);
    }

    
}
