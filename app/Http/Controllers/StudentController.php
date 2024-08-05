<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Subject;

class StudentController extends Controller
{
    public function store(StudentRequest $request, Student $student)
    {
        $input_student = $request['student'];
        $input_subjects = $request->subjects_array;  //subjects_arrayはnameで設定した配列名
        //先にstudentsテーブルにデータを保存
        //dd($input_student);
        //dd($input_subjects);
        $student->fill($input_student)->save();
        //attachメソッドを使って中間テーブルにデータを保存
        $student->subjects()->attach($input_subjects); 
        return redirect('/');
    }
    
    public function create(Subject $subject)
    {
        //変数の中身の確認
        //dd($subject);
        return view("Subjects.create")->with(['subjects' => $subject->get()]);
    }
    
    public function index(Student $student, Subject $subject)
    {
       // dd($student); //確認用に追加
        return view("Subjects.index")->with(['students' => $student->get()]);
        //return view("Subjects.index")->with(['subjects' => $subject->get()]);
    }
    
    public function delete(Student $student)
    {
        $student->delete();
        return redirect('/'); //リダイレクト(画面遷移)
    }
}
