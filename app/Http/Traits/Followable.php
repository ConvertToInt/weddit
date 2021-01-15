<?php

namespace App\Http\Traits;
use App\Models\Subweddit;

trait Followable {

    public function follow(Subweddit $subweddit) {
        return $this->follows()->save($subweddit);
    }

    public function unfollow(Subweddit $subweddit) {
        return $this->follows()->detach($subweddit);
    }

    public function toggleFollow(Subweddit $subweddit) {

        if ($this->following($subweddit->id)) {
            return $this->unfollow($subweddit);
        }

        return $this->follow($subweddit);
    }

    public function following($subweddit) {
        return $this->follows()
            ->where('subweddit_id', $subweddit)
            ->exists();
    }

    public function follows() {
        return $this->belongsToMany(Subweddit::class, 'follows', 'user_id', 'subweddit_id');
    }
}