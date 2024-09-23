<?php

namespace App\Models;

class Job {
   public static function all(): array
   {
        return [
            [
                'id' => 1,
                'title' => 'Web Developer',
                'description' => 'We are looking for a web developer to join our team.',
            ],
            [
                'id' => 2,
                'title' => 'Web Designer',
                'description' => 'We are looking for a web designer to join our team.',
            ],
            [
                'id' => 3,
                'title' => 'Project Manager',
                'description' => 'We are looking for a project manager to join our team.',
            ]
        ];
   }

   public static function find(int $id): array
   {
        return Arr::first(static::all(), fn($job) => $job['id'] == $id);
   }
}