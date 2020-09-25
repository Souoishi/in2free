<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        DB::table('debate_topics')->insert([
            [
                'topic' => 'who is the best CR7 or Messi',
                'category' => 'sports',
            ],
            [
                'topic' => 'Japan should  have military independent from US?',
                'category' => 'politics',
            ],
            [
                'topic' => 'Japan should get rid of nuclear power plants',
                'category' => 'politics',
            ],
            [
                'topic' => 'Japanese government responses to covid-19 is effective',
                'category' => 'politics',
            ],
            [
                'topic' => 'Abenomics definitely helped accelerate economic growth in Japan',
                'category' => 'economy',
            ],
            [
                'topic' => 'Japan should focuses on  inbound tourism industry as a key industry in the future',
                'category' => 'economy',
            ],
            [
                'topic' => 'Japan should raise more tax and improve social welfare',
                'category' => 'economy',
            ],
            [
                'topic' => 'Rock is dead',
                'category' => 'music',
            ],
            [
                'topic' => 'Back street boys vs  one direction which is better?',
                'category' => 'music',
            ],
            [
                'topic' => 'lyrical rapper vs mumble rapper ?',
                'category' => 'music',
            ],
            [
                'topic' => 'Japan  should accept more foreigners to secure workforce of the future ?',
                'category' => 'social issues',
            ],
            [
                'topic' => "public university should be free for it's citizens",
                'category' => 'social issues',
            ],
            [
                'topic' => 'government should introduce in the near future ?',
                'category' => 'social issues',
            ],
            [
                'topic' => 'animal testing should be banned',
                'category' => 'social issues',
            ],
            [
                'topic' => 'anonymity on social media should not be allowed',
                'category' => 'social issues',
            ],
            [
                'topic' => 'governmen should suppurt Tech Growth',
                'category' => 'technology',
            ],
            [
                'topic' => 'ai technology will replace humans in the workforce',
                'category' => 'technology',
            ],
            [
                'topic' => 'financial transactions should move to be calshless',
                'category' => 'technology',
            ],
            [
                'topic' => 'should students are alllowed to use electric deveices (laptop ,  pad, smart phone ) in lecture? ',
                'category' => 'eucation',
            ],
            [
                'topic' => 'is online school better than onsite school(traditional ones)?',
                'category' => 'eucation',
            ],
            [
                'topic' => 'should programming courses be a compulsory subject in primary or middle school ?',
                'category' => 'eucation',
            ],
            [
                'topic' => 'Does joining to sport club help student ?  In what ways and how ?',
                'category' => 'eucation',
            ]
        ]);
    }
}
