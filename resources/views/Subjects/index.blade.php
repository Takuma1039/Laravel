{{-- 学生の名前とその学生に関連する複数の教科を表示する --}}
<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student_Subject</title>
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        [<a href="/students/create">create</a>]
        <div class='students'>
            {{-- 生徒の数だけ繰り返す --}}
            @foreach($students as $student)
                名前:
                <h3 class='name'>{{ $student->name }}</h3>  
                学籍番号:
                <h5 class="id">{{$student->id}}</h5>
                学年:
                <h5 class='grade'>{{ $student->grade }}</h5>
                年齢:
                <h5 class='age'>{{ $student->age }}</h5>
                
                好きな教科:
                <h5 class='subject'>
                {{-- ある生徒に関連する教科の数だけ繰り返す --}}
                @foreach($student->subjects as $subject)   
                    {{ $subject->subject_name }}
                @endforeach
                </h5>

                <form action="/students/{{ $student->id }}" id="form_{{ $student->id }}" method="post">
                        @csrf <!--他のサイトからのリクエスト送信などを許容しないため-->
                        @method('DELETE') <!--DELETEリクエストをFormタグのmethod属性で定義するため-->
                        <!--buttonはデフォルトがsubmitなので、type="button"と定義しない場合、ボタンを押したときに送信されてしまう-->
                        <button type="button" onclick="deleteStudent({{ $student->id }})">delete</button>
                </form>
            @endforeach
        </div>
    </body>
    <script> //javascript
            function deleteStudent(id) {
                'use strict'
                //カッコ内の文字をポップアップとして表示する
                if(confirm('削除すると復元できません。\n本当に削除しますか?')) {
                    document.getElementById(`form_${id}`).submit(); //文字列で変数を使うために${}を扱う
                }
            }
    </script>
</html>