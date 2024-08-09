<?php

namespace App\Services;

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoService
{
    public function create(User $user, array $data)
    {
        $data = $this->putFile($data);
        return $user->videos()->create($data);
    }

    public function update(Video $video,array $data)
    {
        if (isset($data['file'])) {
            $data= $this->putFile($data);
        }
        return $video->update($data);

    }

    public function putFile(array $data)
    {
        $path = Storage::putFile('uploadedVideos', $data['file']);
        $data['path'] = $path;
        return $data;
    }
}
