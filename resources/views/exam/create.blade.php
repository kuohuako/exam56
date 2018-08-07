@extends('layouts.app') 

@section('content')
    <h1>建立測驗</h1>

    @can('建立測驗')
        {{ bs()->openForm('post', '/exam') }}

            {{ bs()->formGroup()
                ->label('測驗標題', false, 'text-sm-right')
                ->control(bs()->text('title')->placeholder('請填入測驗標題'))
                ->showAsRow() }}

        
            {{-- {{ bs()->select('enable', ['1' => '開啟', '0' => '關閉'], '1') }} --}}
            {{-- {{ bs()->checkbox('enable1')->description('啟用測驗')->checked() }} --}}
            
            {{ bs()->formGroup()
                ->label('是否啟用', false, 'text-sm-right')
                ->control(bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])
                    ->selectedOption(1)
                    ->inline())
                ->showAsRow() }}

            {{ bs()->formGroup()
                ->label('', false, 'text-sm-right')
                ->control(bs()->submit('儲存'))
                ->showAsRow() }}

        {{ bs()->closeForm() }}
    @else    
        {{-- 
        @component('bs::alert', ['type' => 'danger'])
            @slot('heading')
                沒有操作的權限
            @endslot
            <p>請先登入，或有相關權限者始能建立測驗</p>
        @endcomponent 
        --}}

        <div class="alert alert-danger">
            <h2>沒有操作的權限</h2>
            <p>請先登入，或有相關權限者始能建立測驗</p>
        </div>
    @endcan
    
@endsection