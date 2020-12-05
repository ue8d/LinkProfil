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

    public function linkStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->link_name = $data['link_name'];
        $this->link = $data['link'];
        $this->save();

        return;
    }

    public function getEditLink(Int $user_id, Int $userLink_id)
    {
        return $this->where('user_id', $user_id)->where('id', $userLink_id)->first();
    }

    public function linkUpdate(Int $link_id, Array $data)
    {
        $this->where('id',$link_id)->update(['link_name'=>$data['link_name'],'link'=>$data['link'],]);

        return;
    }
}
