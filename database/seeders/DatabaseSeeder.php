<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage; // Se utiliza para generar carpetas si no existe
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * deleteDirectory, eliminar si existe la carpeta cursos
         * makeDirectory, indicar que carpeta quieres crear en public storage
         * */
        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');


        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(LevelSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(PriceSeeder::class);
        /**
         * antes de crear curso, debe existir primero la tabla
         * plataforma (platform)
         */
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
    }
}