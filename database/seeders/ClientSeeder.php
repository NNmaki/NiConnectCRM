<?php
namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'contact_name' => 'Mika Virtanen',
                'contact_email' => 'mika.virtanen@koodiapu.fi',
                'contact_phone_number' => '040 123 4567',
                'company_name' => 'Koodiapu Oy',
                'company_address' => 'Koodikatu 5',
                'company_city' => 'Helsinki',
                'company_zip' => '00100',
                'company_vat' => 'FI12345678'
            ],
            [
                'contact_name' => 'Laura Korhonen',
                'contact_email' => 'laura.korhonen@webstudio.fi',
                'contact_phone_number' => '050 234 5678',
                'company_name' => 'WebStudio Finland',
                'company_address' => 'Designtie 12',
                'company_city' => 'Tampere',
                'company_zip' => '33100',
                'company_vat' => 'FI23456789'
            ],
            [
                'contact_name' => 'Jani Nieminen',
                'contact_email' => 'jani.nieminen@digitaali.fi',
                'contact_phone_number' => '045 345 6789',
                'company_name' => 'Digitaali Solutions',
                'company_address' => 'Teknologiakuja 3',
                'company_city' => 'Oulu',
                'company_zip' => '90100',
                'company_vat' => 'FI34567890'
            ],
            [
                'contact_name' => 'Sanna Mäkinen',
                'contact_email' => 'sanna.makinen@softatalo.fi',
                'contact_phone_number' => '044 456 7890',
                'company_name' => 'Softatalo Oy',
                'company_address' => 'Ohjelmistopolku 8',
                'company_city' => 'Turku',
                'company_zip' => '20100',
                'company_vat' => 'FI45678901'
            ],
            [
                'contact_name' => 'Petri Lehtonen',
                'contact_email' => 'petri.lehtonen@cloudcode.fi',
                'contact_phone_number' => '041 567 8901',
                'company_name' => 'CloudCode Systems',
                'company_address' => 'Pilviaukio 15',
                'company_city' => 'Espoo',
                'company_zip' => '02100',
                'company_vat' => 'FI56789012'
            ],
            [
                'contact_name' => 'Anni Koskinen',
                'contact_email' => 'anni.koskinen@appidev.fi',
                'contact_phone_number' => '050 678 9012',
                'company_name' => 'AppiDev Nordic',
                'company_address' => 'Sovelluskatu 22',
                'company_city' => 'Jyväskylä',
                'company_zip' => '40100',
                'company_vat' => 'FI67890123'
            ],
            [
                'contact_name' => 'Timo Järvinen',
                'contact_email' => 'timo.jarvinen@datahub.fi',
                'contact_phone_number' => '045 789 0123',
                'company_name' => 'DataHub Innovations',
                'company_address' => 'Tietokantatie 7',
                'company_city' => 'Lahti',
                'company_zip' => '15100',
                'company_vat' => 'FI78901234'
            ],
            [
                'contact_name' => 'Kaisa Laine',
                'contact_email' => 'kaisa.laine@pixelworx.fi',
                'contact_phone_number' => '040 890 1234',
                'company_name' => 'PixelWorx Studio',
                'company_address' => 'Grafiikkakatu 19',
                'company_city' => 'Kuopio',
                'company_zip' => '70100',
                'company_vat' => 'FI89012345'
            ],
            [
                'contact_name' => 'Antti Salo',
                'contact_email' => 'antti.salo@devmaster.fi',
                'contact_phone_number' => '044 901 2345',
                'company_name' => 'DevMaster Group',
                'company_address' => 'Kehittäjänkuja 11',
                'company_city' => 'Vaasa',
                'company_zip' => '65100',
                'company_vat' => 'FI90123456'
            ],
            [
                'contact_name' => 'Johanna Heikkinen',
                'contact_email' => 'johanna.heikkinen@fullstack.fi',
                'contact_phone_number' => '050 012 3456',
                'company_name' => 'FullStack Finland Oy',
                'company_address' => 'Koodaajanpolku 25',
                'company_city' => 'Pori',
                'company_zip' => '28100',
                'company_vat' => 'FI01234567'
            ],
        ];

        foreach ($clients as $clientData) {
            Client::create($clientData);
        }
    }
}