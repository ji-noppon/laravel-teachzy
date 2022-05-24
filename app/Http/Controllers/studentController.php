<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\student;
use Illuminate\Support\Facedes\DB;

class studentController extends Controller
{
    public function index(){
        $students = student::all()->sortBy('no'); //sortBy = น้อยไปมาก sortByDesc = มากไปน้อย
        return view('student.index',compact('students'));  
        //$students = student::all();
        //return view('student.index');
    }
    public function addStudent(Request $request){

         $request->validate([
          'firstname' => 'required',
          'lastname' => 'required|max:200',
          'no'       => 'required|unique:students|max:10', 
        //  field from table ต้องตรงกับ name ของ inputtype ด้วย  =>  ต้องกรอก|ไม่ซ้ำ:ชื่อตาราง|กำหนดความยาว 
         ],
         [
           'firstname.required' => 'กรุณากรอกชื่อนักเรียน',

           'lastname.required' => 'กรุณากรอกนามสกุลนักเรียน',

           'no.required' => 'กรุณากรอกเลขที่นักเรียน',
           'no.unique' => 'เลขที่นักเรียนซ้ำ',
         ]);  

        //dd($request->inputFirstName, $request->inputLastName,$request->inputNo);
      $student =  new student ;
      $student->firstname = $request->firstname;
      $student->lastname  = $request->lastname;
      $student->no        = $request->no;
      $student->save();  
      return redirect()->back()->with('success','บันทึกเรียบร้อย'); 

    }

    public function editStudent(Request $request){
      $studentById = student::find($request->no);
      //dd($studentById->firstname);
      return view('student.edit' ,compact('studentById'));
    }

    public function updateStudent(Request $request ,$id){
      $request->validate([
        'firstname' => 'required',
        'lastname' => 'required|max:200',
        'no'       => 'required||max:10', 
      //  field from table ต้องตรงกับ name ของ inputtype ด้วย  =>  ต้องกรอก|ไม่ซ้ำ:ชื่อตาราง|กำหนดความยาว 
       ],
       [
         'firstname.required' => 'กรุณากรอกชื่อนักเรียน',

         'lastname.required' => 'กรุณากรอกนามสกุลนักเรียน',

         'no.required' => 'กรุณากรอกเลขที่นักเรียน',
       ]); 
/*        $studentById = student::find($id);
       dd($studentById->no); */
        student::find($id)->update([
          'firstname'   =>  $request -> firstname,
          'lastname'    =>  $request -> lastname,
          'no'          =>  $request -> no,
       ]);
       return redirect()->route('student')->with('success','อัพเดทข้อมูลเรียบร้อย');  
    }


    public function deleteStudent($id){
      student::find($id)->delete();
      return redirect()->route('student')->with('success','ลบข้อมูลเรียบร้อย');  
    } 
}
