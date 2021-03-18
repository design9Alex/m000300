<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Minmax\Base\Web\SiteParameterItemRepository;
class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch ($this->method()) {
            case 'PUT':
                return true;
            case 'POST':
                return true;
            default:
                return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $check=[
            /*
            'details[諮詢服務]': {required: true},
            'details[參加類別]': {required: true},
            'details[國家]': {required: true},
            'details[公司]': {required: true},
            'details[標題]': {required: true},
            'details[firstname]': {required: true},
            'details[lastname]': {required: true},
            'details[區碼]': {required: true},
            'details[電話]': {required: true},
            'details[email]': {required: true},
            'details[產品]': {required: true},
             */
            'details.諮詢服務' => 'required|string',
            'details.參加類別' => 'required|string',
            'details.國家' => 'required|string',
            'details.公司' => 'required|string',
            'details.標題' => 'required|string',
            'details.firstname' => 'required|string',
            'details.lastname' => 'required|string',
            'details.區碼' => 'required|string',
            'details.電話' => 'required|string',
            'details.email' => 'required|email',
            'details.產品' => 'required|string',


            /*
            'details.name' => 'required|string',
            'details.email' => 'required|email',
            'details.聯絡電話' => 'required|string',
            'content' => 'required|string',
            'captcha' => ['required', Rule::in([session('web_captcha_contact')])],
            */
        ];

        switch ($this->method()) {
            case 'PUT':
            case 'POST':
            default:
                return $check;
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [

            'details.諮詢服務' => '諮詢服務',
            'details.參加類別' => '參加類別',
            'details.國家' => '國家',
            'details.公司' => '公司',
            'details.標題' => '標題',
            'details.firstname' => 'firstname',
            'details.lastname' => 'lastname',
            'details.區碼' => '區碼',
            'details.電話' => '電話',
            'details.email' => 'email',
            'details.產品' => '產品',

            /*
            'details.諮詢服務' => __('web.contact-us-form.subject'),
            'details.name' => __('web.contact-us-form.name'),
            'details.email' => __('web.contact-us-form.email'),
            'details.聯絡電話' => __('contact-us-form.phone'),
            'content' => __('web.contact-us-form.advise'),
            'captcha' => __('web.captcha'),
            */
        ];
    }
}
