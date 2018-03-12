<?php

use Illuminate\Database\Seeder;
use App\Categ_groups;
class Categ_groupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categ_groups=[
            [
                'group_id'=>'1',
                'categ_id'=>'17'
                
            ],
            [
                'group_id'=>'1',
                'categ_id'=>'19'
                
            ],
            [
                'group_id'=>'1',
                'categ_id'=>'18'
                
            ],
            [
                'group_id'=>'1',
                'categ_id'=>'20'
                
            ],
            [
                'group_id'=>'1',
                'categ_id'=>'13'
                
            ],
            [
                'group_id'=>'1',
                'categ_id'=>'11'
                
            ],
            [
                'group_id'=>'1',
                'categ_id'=>'7'
                
            ],
            [
                'group_id'=>'1',
                'categ_id'=>'8'
                
            ],
            [
                'group_id'=>'1',
                'categ_id'=>'2'
                
            ],

            [
                'group_id'=>'2',
                'categ_id'=>'4'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'1'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'17'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'9'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'13'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'12'
                
            ],

            [
                'group_id'=>'2',
                'categ_id'=>'5'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'11'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'14'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'8'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'15'
                
            ],
            [
                'group_id'=>'2',
                'categ_id'=>'6'
                
            ],

        ];
        foreach ($categ_groups as $key => $value) {
            Categ_groups::create($value);
        }

    }
}
