<?php
namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Enums\TaskStatus;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id');
        $clients = Client::pluck('id');
        $projects = Project::pluck('id');
        
        if ($users->isEmpty() || $clients->isEmpty() || $projects->isEmpty()) {
            $this->command->warn('Varoitus: Käyttäjiä, asiakkaita tai projekteja ei löydy. Aja ensin muut seederit.');
            return;
        }

        $tasks = [
            [
                'title' => 'Suunnittele tietokannan rakenne',
                'description' => 'Suunnittele ja dokumentoi tietokannan taulut, relaatiot ja indeksit. Tee ER-kaavio ja määrittele kentät.',
                'deadline_at' => now()->addDays(7)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::OPEN->value,
            ],
            [
                'title' => 'Toteuta käyttäjien autentikointi',
                'description' => 'Rakenna kirjautumis- ja rekisteröitymistoiminnot. Sisältää salasanan nollauksen ja sähköpostivahvistuksen.',
                'deadline_at' => now()->addDays(10)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Luo REST API endpointit',
                'description' => 'Toteuta CRUD-operaatiot API:lle. Dokumentoi endpointit ja lisää validoinnit.',
                'deadline_at' => now()->addDays(14)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::OPEN->value,
            ],
            [
                'title' => 'Suunnittele käyttöliittymän wireframet',
                'description' => 'Luo wireframet kaikille pääsivuille. Huomioi responsiivisuus ja käytettävyys.',
                'deadline_at' => now()->addDays(5)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Kirjoita yksikkötestit',
                'description' => 'Toteuta yksikkötestit backend-logiikalle. Tavoitteena vähintään 80% koodin kattavuus.',
                'deadline_at' => now()->addDays(21)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::PENDING->value,
            ],
            [
                'title' => 'Integroi maksujärjestelmä',
                'description' => 'Lisää Stripe/Paytrail-maksuintegraatio. Testaa maksuprosessi ja käsittele virhetilanteet.',
                'deadline_at' => now()->addDays(18)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::WAITING_CLIENT->value,
            ],
            [
                'title' => 'Optimoi tietokannan kyselyt',
                'description' => 'Analysoi hitaat kyselyt ja lisää tarvittavat indeksit. Käytä eager loadingia N+1-ongelman välttämiseksi.',
                'deadline_at' => now()->addDays(12)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::OPEN->value,
            ],
            [
                'title' => 'Toteuta raportointitoiminnot',
                'description' => 'Luo dashboardiin graafiset raportit. Käytä Chart.js tai vastaavaa kirjastoa.',
                'deadline_at' => now()->addDays(25)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::OPEN->value,
            ],
            [
                'title' => 'Asenna staging-ympäristö',
                'description' => 'Konfiguroi staging-palvelin ja CI/CD-pipeline. Testaa automaattinen deployment.',
                'deadline_at' => now()->subDays(3)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::CLOSED->value,
            ],
            [
                'title' => 'Toteuta sähköposti-ilmoitukset',
                'description' => 'Lisää automaattiset sähköposti-ilmoitukset tapahtumista. Käytä jonoja raskaiden tehtävien käsittelyyn.',
                'deadline_at' => now()->addDays(16)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Kirjoita käyttöohje',
                'description' => 'Dokumentoi järjestelmän käyttö loppukäyttäjille. Sisällytä kuvakaappauksia ja esimerkkejä.',
                'deadline_at' => now()->addDays(30)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::PENDING->value,
            ],
            [
                'title' => 'Toteuta hakutoiminto',
                'description' => 'Lisää full-text haku tietokantaan. Harkitse Elasticsearch/Meilisearch käyttöä.',
                'deadline_at' => now()->addDays(20)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::BLOCKED->value,
            ],
            [
                'title' => 'Suorita tietoturva-auditointi',
                'description' => 'Tarkista SQL-injektiot, XSS-haavoittuvuudet ja CSRF-suojaus. Päivitä riippuvuudet.',
                'deadline_at' => now()->addDays(8)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Luo admin-paneeli',
                'description' => 'Rakenna ylläpitäjille tarkoitettu hallintapaneeli käyttäjien ja sisällön hallintaan.',
                'deadline_at' => now()->addDays(22)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::OPEN->value,
            ],
            [
                'title' => 'Toteuta tiedostojen upload',
                'description' => 'Lisää mahdollisuus ladata tiedostoja. Toteuta validointi, kuvien optimointi ja tallennuksen Amazon S3.',
                'deadline_at' => now()->addDays(11)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::WAITING_CLIENT->value,
            ],
            [
                'title' => 'Korjaa CSS-responsiivisuus',
                'description' => 'Varmista että sivusto toimii moitteettomasti mobiilissa, tabletissa ja desktopissa.',
                'deadline_at' => now()->subDays(5)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::CLOSED->value,
            ],
            [
                'title' => 'Integroi analytiikka',
                'description' => 'Lisää Google Analytics ja määritä tavoitteet. Toteuta GDPR-yhteensopiva cookie-banner.',
                'deadline_at' => now()->addDays(9)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::PENDING->value,
            ],
            [
                'title' => 'Toteuta Excel-vienti',
                'description' => 'Mahdollista raporttien vienti Excel-muotoon. Käytä Laravel Excel -pakettia.',
                'deadline_at' => now()->addDays(15)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Käännä sovellus englanniksi',
                'description' => 'Toteuta monikielisyys käyttämällä Laravel localization -ominaisuutta. Käännä kaikki tekstit.',
                'deadline_at' => now()->addDays(28)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::BLOCKED->value,
            ],
            [
                'title' => 'Suorita load-testaus',
                'description' => 'Testaa järjestelmän suorituskyky kuormituksessa. Tunnista pullonkaulat ja optimoi.',
                'deadline_at' => now()->subDays(1)->format('Y-m-d H:i:s'),
                'status' => TaskStatus::CLOSED->value,
            ],
        ];

        foreach ($tasks as $taskData) {
            Task::create(array_merge($taskData, [
                'user_id' => $users->random(),
                'client_id' => $clients->random(),
                'project_id' => $projects->random(),
            ]));
        }
    }
}