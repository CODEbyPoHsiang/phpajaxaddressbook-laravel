<?php

use Illuminate\Database\Seeder;
use App\Member;
class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->truncate();
        Member::unguard();
        factory(Member::class, 20)->create(); //要生成的假資料筆數
        Member::reguard();
        
        //
    }
}
