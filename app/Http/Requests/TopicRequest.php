<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('建立測驗');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'topic' => 'required|max:191',
            'opt1'  => 'required|max:191',
            'opt2'  => 'required|max:191',
            'ans'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => '「:attribute」為必填欄位',
            'max'      => '「:attribute」最多只能 :max 個字',
        ];
    }

    public function attributes()
    {
        return [
            'topic' => '題目內容',
            'opt1'  => '選項1',
            'opt2'  => '選項2',
            'ans'   => '答案',
        ];
    }
}
