<?php

namespace Database\Seeders;

use App\Models\Credit;
use App\Models\Information;
use App\Models\Question;
use App\Models\Reference;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Reference::create([
            'value'=>'Saldarriaga, Enrique M., Cesar P. Cárcamo, Joseph B. Babigumira, y Patricia J. García. «The Annual costs of treating genital warts in the Public Healthcare Sector in Peru». BMC Health Services Research 21, n.º 1 (14 de octubre de 2021): 1092. https://doi.org/10.1186/s12913-021-07120-w.',
            'order'=>1,
        ]);
        Reference::create([
            'value'=>'Saldarriaga, Enrique M., Cesar P. Cárcamo, Joseph B. Babigumira, y Patricia J. García. «The Annual costs of treating genital warts in the Public Healthcare Sector in Peru». BMC Health Services Research 21, n.º 1 (14 de octubre de 2021): 1092. https://doi.org/10.1186/s12913-021-07120-w.',
            'order'=>2,
        ]);
        Credit::create([
            'name'=>'John Smith',
            'role'=>'Escritor tecnico',
            'description'=>'Lorememesamda sdnsajbdahsj kb sabd hasbdjksa bndkjas dnsjkandjksandjasnd kjsandj asndjsnajdknaskjdnqwinqlkwdnqdjkqdinasdnasiodnasjkdnajdnwqjnas',
            'picture'=>'img/credits/1.jpg',
            'order'=>1
        ]);
        Credit::create([
            'name'=>'Sarah Connor',
            'role'=>'Profesora principal',
            'description'=>'Lorememesamda sdnsajbdahsj kb sabd hasbdjksa bndkjas dnsjkandjksandjasnd kjsandj asndjsnajdknaskjdnqwinqlkwdnqdjkqdinasdnasiodnasjkdnajdnwqjnas',
            'picture'=>'img/credits/2.jpg',
            'order'=>2
        ]);
        Question::create([
            'question'=>'Que es 1 + 1',
            'answer'=>'2',
            'order'=>1,
        ]);
        Question::create([
            'question'=>'Que es 1 + 5',
            'answer'=>'6 es la respuesta',
            'order'=>2,
        ]);
        Storage::makeDirectory('cursos');
        Information::create([
            'color_logo'=>'img/logo/logo.png',
            'black_logo'=>'img/logo/black_logo.png',
            'white_logo'=>'img/logo/white_logo.png',
            'welcome_title'=>'Bienvenido',
            'welcome_text_1'=>'El COVID-19 es una enfermedad infecciosa que afecta principalmente el tracto respiratorio. La aparición de esta pandemia el Estado ha tomado diferentes medidas. Estas disposiciones, conocidas como medidas de distanciamiento social y aislamiento domiciliario, buscan prevenir y controlar la expansión de la enfermedad y evitar que aumenten de manera significativa el número de víctimas. Sin embargo, aún se observa el incremento de casos positivos en el país. Por ello, es sustancial',
            'welcome_text_2'=>'Presentamos este curso (NOMBRE), que ofrece conceptos y otros contenidos relacionados con los cuidados básicos frente a un caso probable de COVID-19. De este modo, mediante el entrenamiento en estos temas, buscamos obtener un cuidador entrenado en prácticas de cuidado frente al COVID-19 dentro de un hogar, y generar cambios positivos y sostenibles; asimismo, una disminución de incidencia de casos.',
            'welcome_video'=>'<iframe width="560" height="315" src="https://www.youtube.com/embed/DPY7is-jEZo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'consent_img_1'=>'img/consent/1.png',
            'consent_img_2'=>'img/consent/2.png',
            'consent_img_3'=>'img/consent/3.png',
            'end_title'=>'Muchas gracias!',
            'end_text_1'=>'',
            'end_text_2'=>'',
            'certificate_img'=>'img/certificate/diploma.jpg',
            'certificate_fontsize'=>'14px',
            'certificate_pos_x'=>'5rem',
            'certificate_pos_y'=>'5rem',
        ]);

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CourseSeeder::class);

    }
}
