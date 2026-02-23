<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages=['Hakkımızda','Kariyer'];
        $count=0;
        foreach( $pages as $page ){
            $count++;
            DB::table('pages')->insert([
            'title'=> $page,
            'slug'=>Str::slug($page),
            'image'=>'https://images.businessnewsdaily.com/app/uploads/2019/01/09065935/Put-together-a-business-plan-1024x777.png',
            'content'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                        It has survived not only five centuries, but also the leap into electronic typesetting, 
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'order'=>$count,
             'created_at'=>now(),
             'updated_at'=>now()
        ]);
        
        }
    }
}
