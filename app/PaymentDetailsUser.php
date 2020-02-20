<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*************
 * | Модель таблицы payment_details_users
 * | квизиты зарегестрированных пользователей для быстрого заполнения контактных форм. Заполняется в лк пользователя home
 **********/

class PaymentDetailsUser extends Model
{
    //Столбцы
    protected $fillable = [
        'user_id',
        'name',
        'secondname',
        'addname',
        'delivery',
        'country',
        'zipcode',
        'region',
        'autonomous',
        'district',
        'city',
        'address',
        'phone',
        'email',
        'comment'
    ];
}
