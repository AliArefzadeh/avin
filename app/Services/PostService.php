<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class PostService
{

    public function create(User $user, array $data)
    {
        $data = $this->putFile($data);
        return $user->posts()->create($data);
    }

    public function update(Post $post,array $data)
    {
        if (isset($data['path'])) {
            $data= $this->putFile($data);
        }
        return $post->update($data);

    }

    public function putFile(array $data)
    {
        $path = Storage::putFile('uploadedImages', $data['path']);
        $data['thumbnail'] = $path;
        return $data;
    }
}
