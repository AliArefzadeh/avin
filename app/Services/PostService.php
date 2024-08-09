<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function create(User $user,array $data)
    {
        $this->putFile($data);
       return $user->posts()->create($data);
    }

    public function putFile(array $data)
    {
        $path = Storage::putFile()
    }
}
