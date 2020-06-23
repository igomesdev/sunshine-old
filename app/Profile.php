<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    /**
     * @return array
     */
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : '/profile/MxY2XmUNl9557IRpV3IDSckPXtUCJAPXQGqhenDI.jpeg';
        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
