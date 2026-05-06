<?php
namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use App\Enums\ProjectStatus;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $clients = Client::pluck('id')->toArray();
        
        if (empty($users) || empty($clients)) {
            $this->command->warn('Varoitus: Käyttäjiä tai asiakkaita ei löydy. Aja ensin UserSeeder ja ClientSeeder.');
            return;
        }

        $projects = [
            [
                'title' => 'Verkkokaupan kehitys',
                'description' => 'Modernin verkkokaupan toteutus Laravel ja Vue.js teknologioilla. Sisältää tuotehallinta, ostoskori, maksuintegraatiot ja admin-paneelin.',
                'deadline_at' => now()->addDays(45)->format('Y-m-d'),
                'status' => ProjectStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Mobiilisovelluksen backend-kehitys',
                'description' => 'REST API:n toteutus mobiilisovellukselle. Käyttäjähallinta, push-notifikaatiot ja tietokannan suunnittelu.',
                'deadline_at' => now()->addDays(30)->format('Y-m-d'),
                'status' => ProjectStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Yrityssivuston uudistus',
                'description' => 'Responsive-yrityssivuston suunnittelu ja toteutus WordPress-alustalla. SEO-optimointi ja sisällönhallinta.',
                'deadline_at' => now()->addDays(20)->format('Y-m-d'),
                'status' => ProjectStatus::OPEN->value,
            ],
            [
                'title' => 'CRM-järjestelmän räätälöinti',
                'description' => 'Asiakkaan tarpeisiin räätälöity CRM-järjestelmä asiakassuhteiden ja myyntiprosessien hallintaan.',
                'deadline_at' => now()->addDays(60)->format('Y-m-d'),
                'status' => ProjectStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Ajanvarausjärjestelmä',
                'description' => 'Online-ajanvarausportaali terveydenhuollon asiakkaalle. Kalenterihallinta, muistutukset ja raportointi.',
                'deadline_at' => now()->addDays(25)->format('Y-m-d'),
                'status' => ProjectStatus::OPEN->value,
            ],
            [
                'title' => 'E-learning alusta',
                'description' => 'Verkkokoulutusalustan kehitys videosisällöille, testeille ja edistymisen seurantaan. Sisältää käyttäjäroolit ja sertifikaatit.',
                'deadline_at' => now()->subDays(5)->format('Y-m-d'),
                'status' => ProjectStatus::COMPLETED->value,
            ],
            [
                'title' => 'Varastonhallintajärjestelmä',
                'description' => 'Varaston seurantaan ja hallintaan tarkoitettu järjestelmä. Sisältää tuote- ja tilausseurannan sekä raportoinnin.',
                'deadline_at' => now()->addDays(40)->format('Y-m-d'),
                'status' => ProjectStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Sosiaalisen median dashboard',
                'description' => 'Analytiikka-dashboard useille sosiaalisen median alustoille. API-integraatiot ja visuaaliset raportit.',
                'deadline_at' => now()->subDays(10)->format('Y-m-d'),
                'status' => ProjectStatus::COMPLETED->value,
            ],
            [
                'title' => 'Tapahtumanhallinta-sovellus',
                'description' => 'Tapahtumakalenterin ja lippumyyntijärjestelmän toteutus. QR-koodiskannaus ja osallistujahallinta.',
                'deadline_at' => now()->addDays(15)->format('Y-m-d'),
                'status' => ProjectStatus::OPEN->value,
            ],
            [
                'title' => 'Chat-bot integraatio',
                'description' => 'AI-pohjaisen asiakaspalvelubottien integroiminen verkkosivustolle ja sisäisiin järjestelmiin.',
                'deadline_at' => now()->addDays(35)->format('Y-m-d'),
                'status' => ProjectStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Laskutusjärjestelmä',
                'description' => 'Automaattinen laskutus- ja kirjanpitojärjestelmä pienyrityksille. PDF-laskujen luonti ja sähköpostitus.',
                'deadline_at' => now()->subDays(15)->format('Y-m-d'),
                'status' => ProjectStatus::COMPLETED->value,
            ],
            [
                'title' => 'Kiinteistönvälitysportaali',
                'description' => 'Kiinteistöilmoitusten julkaisu- ja hakualusta. Karttanäkymä, kuvakirjasto ja yhteydenotto-lomakkeet.',
                'deadline_at' => now()->addDays(50)->format('Y-m-d'),
                'status' => ProjectStatus::OPEN->value,
            ],
            [
                'title' => 'HR-portaalin kehitys',
                'description' => 'Henkilöstöhallintajärjestelmä työntekijöiden tietojen, lomien ja suoritusten hallintaan.',
                'deadline_at' => now()->addDays(55)->format('Y-m-d'),
                'status' => ProjectStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Blogi-alustan modernisaatio',
                'description' => 'Vanhan blogialustan päivittäminen moderniin teknologiapinoon. Headless CMS ja React frontend.',
                'deadline_at' => now()->addDays(28)->format('Y-m-d'),
                'status' => ProjectStatus::OPEN->value,
            ],
            [
                'title' => 'API-dokumentaatioportaali',
                'description' => 'Kehittäjille suunnattu API-dokumentaatio ja testausympäristö interaktiivisilla esimerkeillä.',
                'deadline_at' => now()->subDays(3)->format('Y-m-d'),
                'status' => ProjectStatus::COMPLETED->value,
            ],
            [
                'title' => 'Reseptisovellus',
                'description' => 'Reseptien jakamiseen ja tallentamiseen tarkoitettu yhteisöllinen sovellus. Haku, kategoriat ja arvostelut.',
                'deadline_at' => now()->addDays(22)->format('Y-m-d'),
                'status' => ProjectStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Projektinhallinta-työkalu',
                'description' => 'Kevyt projektinhallintatyökalu tiimeille. Tehtävät, aikataulut ja yhteistyöominaisuudet.',
                'deadline_at' => now()->addDays(38)->format('Y-m-d'),
                'status' => ProjectStatus::OPEN->value,
            ],
            [
                'title' => 'Kuljetusseuranta-järjestelmä',
                'description' => 'Reaaliaikainen kuljetusten seurantajärjestelmä GPS-integraatiolla ja reittioptimoinnilla.',
                'deadline_at' => now()->addDays(42)->format('Y-m-d'),
                'status' => ProjectStatus::IN_PROGRESS->value,
            ],
            [
                'title' => 'Newsletter-hallintajärjestelmä',
                'description' => 'Uutiskirjeiden luonti, lähetys ja analytiikka. Tilaajalista, segmentointi ja A/B-testaus.',
                'deadline_at' => now()->subDays(20)->format('Y-m-d'),
                'status' => ProjectStatus::COMPLETED->value,
            ],
            [
                'title' => 'IoT-datan visualisointi',
                'description' => 'Dashboard IoT-laitteiden datan keräämiseen ja visualisointiin. Reaaliaikainen seuranta ja hälytykset.',
                'deadline_at' => now()->addDays(48)->format('Y-m-d'),
                'status' => ProjectStatus::OPEN->value,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create(array_merge($projectData, [
                'user_id' => $users[array_rand($users)],
                'client_id' => $clients[array_rand($clients)],
            ]));
        }
    }
}