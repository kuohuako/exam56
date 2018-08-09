@extends('layouts.app')

@section('content')
    <h1>隨機題庫系統<small>（共 {{$exams->total()}} 筆資料）</small></h1>

    <div class="list-group">
        @forelse($exams as $exam)
            
            <a href="exam/{{$exam->id}}" class="list-group-item list-group-item-action">
                {{$exam->updated_at->format('Y年m月d日')}}{{$exam->title}}
                @if(!$exam->enable)
                    <span class="badge badge-danger">關</span>
                @endif
            </a>

        @empty
            <div class="alert alert-danger">
                尚無任何測驗
            </div>
        @endforelse
    </div>

    <div class="my-3">
        {{ $exams->links() }}
    </div>

@endsection
