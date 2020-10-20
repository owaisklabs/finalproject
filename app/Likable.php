<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
    
trait Likable
{

    public function scopeWithLikes(Builder $query)
    {
        // Eloquent Model Query

        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );

        // Simple Sql Query 
        // select * from tweets left join
        // (select tweet_id, sum(liked) dislikes from likes group by tweet_id)
        // likes on likes.tweet_id = tweet.id
    }

    public function like($user = null , $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ?  $user->id : auth()->id(),
        ], [
            'liked' => $liked
        ]);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();

        // The below one will use the loop technique to find the likes which will take pretty much time.so we will 
        // use the above way to only show the user its like tweets only which is faster way.
        //$this->likes()->where('user_id', $user->id)->exists();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
}