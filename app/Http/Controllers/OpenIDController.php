<?php

namespace App\Http\Controllers;

use Backpack\Base\app\Models\BackpackUser;
use Illuminate\Support\Facades\Auth;

class OpenIDController extends Controller
{
    public function ntpcopenid()
    {
        $openid = app('ntpcopenid');
        return redirect($openid->authUrl());
    }

    public function get_ntpcopenid()
    {

        $openid = app('ntpcopenid');

        switch ($openid->mode) {
            case 'cancel': // 取消授權
                return 'User Canceled';
                break;

            case 'id_res': // 同意授權
                if (!$openid->validate()) {
                    // 驗證未過
                    // 導向至登入畫面
                    return redirect('auth/login');
                }

                // 驗證通過，檢查是否允許登入
                if ($openid->canLogin()) {
                    // 允許登入
                    // 取得 user data 陣列
                    $data = $openid->getUserData('*');

                    //搜尋使用者是否存在，沒有就新增
                    $user = BackpackUser::firstOrNew(['email' => $data['contact/email']]);

                    //  註冊使用者
                    if (!$user->exists) {
                        $user->name     = $data['namePerson'];
                        $user->email    = $data['contact/email'];
                        $user->password = password_hash($data['birthDate'], PASSWORD_DEFAULT);

                        $user->save();
                        if ($data['pref/timezone'][0]['role'] == "學生") {
                            $user->assignRole('學生');
                        } elseif ($data['pref/timezone'][0]['role'] == "教師") {
                            $user->assignRole('教師');
                        }
                    }

                    //  登入使用者
                    Auth::login($user);
                    // 將取得的資料，轉成陣列存入session中
                    session($data);
                }
                // 不允許登入，例如導回登入頁面或顯示訊息
                return redirect('/');
                break;

            default: // 其他，如直接輸入網址瀏覽
                return redirect('/');
                break;
        }

    }
}
