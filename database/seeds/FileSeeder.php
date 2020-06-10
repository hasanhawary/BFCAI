<?php

use App\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            "user.png",
            "Chapter 01.pdf",
            "multiplication.jpg",
            "user.png",
            "Chapter 01.pdf",
            "multiplication.jpg",
            "user.png",
            "Chapter 01.pdf",
        ];

        $size = [
            '96184',
            '3155356',
            '39013',
            '96184',
            '3155356',
            '39013',
            '96184',
            '3155356',
        ];

        $file = [
            'user.png',
            'Chapter 01.pdf',
            'multiplication.jpg',
            'user.png',
            'Chapter 01.pdf',
            'multiplication.jpg',
            'user.png',
            'Chapter 01.pdf',
        ];

        $path = [
            'messages/files',
            'messages/files',
            'messages/files',
            'messages/files',
            'messages/files',
            'messages/files',
            'messages/files',
            'messages/files',
        ];

        $full_file = [
            'messages/files/user.png',
            'messages/files/Chapter 01.pdf',
            'messages/files/multiplication.jpg',
            'messages/files/user.png',
            'messages/files/Chapter 01.pdf',
            'messages/files/multiplication.jpg',
            'messages/files/user.png',
            'messages/files/Chapter 01.pdf',
        ];

        $mime_type = [
            'image/png',
            'application/pdf',
            'image/jpeg',
            'image/png',
            'application/pdf',
            'image/jpeg',
            'image/png',
            'application/pdf',
        ];

        $file_type = [
            'messages',
            'messages',
            'messages',
            'messages',
            'messages',
            'messages',
            'messages',
            'messages',
        ];

        for ($i = 0; $i < 8; $i++) {
            File::create([
                'name' => $name[$i],
                'size' => $size[$i],
                'file' => $file[$i],
                'path' => $path[$i],
                'full_file' => $full_file[$i],
                'mime_type' => $mime_type[$i],
                'file_type' => $file_type[$i],
                'relation_id' => $i + 1,
            ]);
        }
        $relation_id = [
            8, 7, 6, 5, 4, 3, 2, 1,
        ];
        for ($i = 7; $i >= 0; $i--) {
            File::create([
                'name' => $name[$i],
                'size' => $size[$i],
                'file' => $file[$i],
                'path' => $path[$i],
                'full_file' => $full_file[$i],
                'mime_type' => $mime_type[$i],
                'file_type' => $file_type[$i],
                'relation_id' => $relation_id[$i],
            ]);
        }
    }
}
