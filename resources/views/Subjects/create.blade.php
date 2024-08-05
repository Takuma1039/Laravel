<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Student_Subject</title>
    </head>
    <x-app-layout>
    <x-slot name="header">
        　Create
    </x-slot>
    <body>
    {{-- 学生情報のフォームと、好きな教科の選択画面 --}}
        <form action="/students" method="POST">
            @csrf
            <div>
                <h2>名前</h2>
                <input type="text" name="student[name]" placeholder="名前" value="{{ old('student.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('student.name') }}</p>
            </div>

            <div>
                <h2>学年</h2>
                <input type="text" name="student[grade]" placeholder="学年" value="{{ old('student.grade') }}"/>
                <p class="grade__error" style="color:red">{{ $errors->first('student.grade') }}</p>
            </div>

            <div>
                <h2>年齢</h2>
                <input type="text" name="student[age]" placeholder="年齢" value="{{ old('student.age') }}"/>
                <p class="age__error" style="color:red">{{ $errors->first('student.age') }}</p>
           </div>
            
            <div>
                <h2>好きな教科</h2>
                @foreach($subjects as $subject)
                    <label>
                        {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                        <input type="checkbox" value="{{ $subject->id }}" name="subjects_array[]">{{$subject->subject_name}}</input>
                    </label>
                @endforeach         
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">back</a>
        </div>
    </body>
    </x-app-layout>
</html>