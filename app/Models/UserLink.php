<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLink extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'user_links';

    public function getUserLinks(Int $user_id)
    {
        return $this->all()->where('user_id', '=', $user_id);
    }
}
