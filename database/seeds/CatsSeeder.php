<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'catName' => 'Default',
        'description' => 'Welcome to Fey Anthology',
        'options' => json_encode(array
        (
          'type' => 'None',
          'public' => 1,
          'allow_new_contributors' => 1,
          'frontpage_description' => 'This is a test description',
          'updates' => 'v0.0 : This is a Test Update',
          'aboutpage_description' => '<p>Fey Anthology is a categorical database for user-contributed bookmarks.<br>
          ie. links to stories, websites, etc. having an overarching theme</p>
          <p>It uses PHP (Laravel), AngularJS, and PostgreSQL</p>

          <p>
          Basic user roles:
          <ul>
            <li><b>Guests</b> and <b>Registered Users</b> can view and search the database.</li>
            <li><b>Contributors</b> to a category can submit new links for approval.</li>
            <li><b>Moderators</b> can approve or reject user submissions and contributor requests, as well as edit or delete existing links.</li>
            <li><b>Archive Managers</b> can promote new moderators.</li>
            </ul>
          </p>
          <a href="{{ url(\'/browse\') }}">Browse the database</a>',
          )
        ),
      ]);

      DB::table('categories')->insert([
        'catName' => 'Stories',
        'description' => 'Stories about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Story',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);

      DB::table('categories')->insert([
        'catName' => 'Art',
        'description' => 'Art about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Art',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);
      DB::table('categories')->insert([
        'catName' => 'Blogs',
        'description' => 'Blogs about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Blog',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);
      DB::table('categories')->insert([
        'catName' => 'Websites',
        'description' => 'Websites about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Website',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);

      DB::table('categories')->insert([
        'catName' => 'Videos',
        'description' => 'Videos about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Video',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);


    }
}




 ?>
