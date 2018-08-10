@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{$test->exam->title}}</h1>
    <div class="row">
        <div class="col-sm-6">
            <h2>測驗日期：<u>{{ $test->created_at->format('Y年m月d日 H:i:s') }}</u></h2>
        </div>
        <div class="col-sm-6 text-right">
            <h2>
                <u> {{ $test->grade }} </u>年<u> {{ $test->class }} </u>班<u> {{ $test->num }} </u>號
                姓名：<u>{{ $test->user->name }}</u>
                得分：<b class="
                @if($test->score >= 60)
                    text-info
                @else
                    text-danger
                @endif
                ">{{ $test->score }}</b> 分
            </h2>
        </div>
    </div>
    
        <hr>    

    @foreach($content as $i => $data)
        <dl>
            <dt class="h3">
                @if($data['ans']==$data['topic']->ans)
                    <img src="{{asset('yes.png')}}" alt="yes" title="正確答案為 {{$data['topic']->ans}}">
                @else
                    <img src="{{asset('no.png')}}" alt="no" title="正確答案為 {{$data['topic']->ans}}">
                @endif
                ({{ $data['ans'] }})
                {{-- {{$data->ans}} --}}
                <span class="badge badge-success">{{ $i }}</span>
                {{-- {{$data->topic->topic}}                 --}}
                {{ $data['topic']->topic }}                
            </dt>
            <dd class="opt">
                    {{ bs()->radioGroup("ans[{$data['topic']->id}]", [
                        1 => "&#10102; {$data['topic']->opt1}", 
                        2 => "&#10103; {$data['topic']->opt2}",  
                        3 => "&#10104; {$data['topic']->opt3}",  
                        4 => "&#10105; {$data['topic']->opt4}", 
                        ])
                        ->selectedOption($data['topic']->ans)
                        ->addRadioClass(['my-1','mx-3'])}}
            </dd>
        </dl>
    @endforeach

@endsection