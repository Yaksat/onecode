<?php

use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ValidationController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'age' => ['nullable', 'integer', 'min:18', 'max:150'],
            'amount' => ['required', 'numeric', 'min:1', 'max:10000000'],
            'gender' => ['nullable', 'string', 'in:male,female'],
            'zip' => ['required', 'digits:6'], //123456
            'subscription' => ['nullable', 'boolean'], //true,false, 0,1,'0','1'
            'agreement' => ['accepted'], //'yes', 'on', '1', 1, true, 'true'
            'password' => ['required', 'string', 'min:7', 'confirmed'], //password_confirmation
            //'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols(), 'confirmed'], //password_confirmation
            'password_confirmation' => ['required', 'string', 'min:7', 'confirmed'], //password_confirmation
            'current_password' => ['required', 'string', 'current_password'],
            'email' => ['required', 'string', 'max:100', 'email', 'exists:users'],
            //'country_id' => ['required', 'integer', 'exists:countries,id'],
            'country_id' => ['required', 'integer', Rule::exists('countries','id')->where('active',true)],

            //'phone' => ['required', 'string', 'unique:users,phone'], //проверяем, чтобы этого телефона не было в бд. Правило обратное exists

            // new Phone - это кастомное правило валидации, которое проверяет формат номера телефона
            //Создаем это правил из командной строки: php artisan make:rule Phone
            'phone' => ['required', 'string', new Phone, Rule::unique('users')->ignore($user)], ////проверяем, чтобы этого телефона не было в бд (кроме текущего юзера, т.е. для текущего юзера это не проверяется).
            'website' => ['nullable', 'string', 'url'], //https://example.com
            'uuid' => ['nullable', 'string', 'uuid'], //sdfsdf-sdfsdf-sdfsdf-sdfsdf
            'ip' => ['nullable', 'string', 'ip'],
            'avatar' => ['required', 'file', 'image', 'max:1024'],
            'birth_date' => ['nullable', 'string', 'date'],
            'start_date' => ['required', 'string', 'date', 'after_or_equal:today'],
            'finish_date' => ['required', 'string', 'date', 'after:start_date'],
            // Предлагаем пользователю воспользоваться какими-нибудь услугами. Например доставка,гарантия и т.д.
            // ставит чекбоксы и к нам придут id этих услуг в массиве.
            'services' => ['nullable', 'array', 'min:1', 'max:10'], //[1,2,3,4,5]
            // Теперь можно проверить каждый элемент массива
            'services.*' => ['required', 'integer'], //[1,2,3,4,5]
            'delivery' => ['required', 'array', 'size:2'], // ['date' => '2021-10-09', 'time' => '12:30:00']
            'delivery.date' => ['required', 'string', 'date_format:Y.m.d'], //2021.10.09
            'delivery.time' => ['required', 'string', 'date_format:H:i:s'], //12:30:00
            'secret' => ['required', 'string', function ($attribute, $value, \Closure $fail) {
                if ($value !== config('example.secret')) {
                    $fail(__('Неверный секретный ключ.'));
                }
            }],
        ]);

        dd($validated);
    }
}
