<?php

namespace App;

trait Followable
{
    
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    // $user->toggleFollow($otherUser);
    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);

        // Before explore page method 
        // if($this->following($user))
        // {
        //     return $this->unfollow($user);
        // }
        // return $this->follow($user);
    }

    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
                ->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class, 
            'follows' , 
            'user_id' , 
            'following_user_id'
        );
    }

}