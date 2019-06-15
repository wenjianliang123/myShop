<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //数据表名称
    protected $table = 'user';


    //时间戳
    /*
     * 指示模型是否自动维护时间戳
     *
     * @var bool
     *
     * 默认情况下，Eloquent 预期你的数据表中存在 created_at 和 updated_at 。
     * 如果你不想让 Eloquent 自动管理这两个列， 请将模型中的 $timestamps 属性设置为 false：
    */
    public $timestamps = false;

    /*
    *
    *模型的连接名称
    *
    *@var字符串
    */

    protected $connection = 'mysql_shop';
    /*
     * 如果你需要自定义存储时间戳的字段名，
     * 可以在模型中设置 CREATED_AT 和 UPDATED_AT 常量的值来实现：
    */
    const CREATED_AT = 'register_time';

    /*
     * 定义主键
     *
     * */
    protected $primaryKey = 'user_id';
}
