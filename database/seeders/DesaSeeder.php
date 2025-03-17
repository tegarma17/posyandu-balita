<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Kec. Tarik
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2001', 'nama' => 'Mliriprowo']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2002', 'nama' => 'Kedungbocok']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2003', 'nama' => 'Singogalih']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2004', 'nama' => 'Tarik']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2005', 'nama' => 'Mergobener']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2006', 'nama' => 'Mergosari']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2007', 'nama' => 'Kendalsewu']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2008', 'nama' => 'Klantingsari']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2009', 'nama' => 'Kalimati']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2010', 'nama' => 'Gempolklutuk']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2011', 'nama' => 'Banjarwungu']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2012', 'nama' => 'Balongmacekan']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2013', 'nama' => 'Gampingrowo']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2014', 'nama' => 'Sebani']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2015', 'nama' => 'Kramattemenggung']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2016', 'nama' => 'Mindugading']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2017', 'nama' => 'Kemuning']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2018', 'nama' => 'Janti']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2019', 'nama' => 'Segodobancang']);
        Desa::create(['kecamatan_id' => '1', 'kd_desa' => '35.15.01.2020', 'nama' => 'Kedinding']);

        // Kec. Prambon
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2001', 'nama' => 'Prambon']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2002', 'nama' => 'Kajartengguli']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2003', 'nama' => 'Gedangrowo']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2004', 'nama' => 'Wirobiting']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2005', 'nama' => 'Simpang']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2006', 'nama' => 'Bulang']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2007', 'nama' => 'Gampang']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2008', 'nama' => 'Jatikalang']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2009', 'nama' => 'Jatialun-alun']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2010', 'nama' => 'Pejangkungan']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2011', 'nama' => 'Kedungsugo']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2012', 'nama' => 'Kedungwonokerto']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2013', 'nama' => 'Bendotretek']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2014', 'nama' => 'Wonoplintahan']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2015', 'nama' => 'Kedungkembar']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2016', 'nama' => 'Jedongcangkring']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2017', 'nama' => 'Cangkringturi']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2018', 'nama' => 'Simogirang']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2019', 'nama' => 'Temu']);
        Desa::create(['kecamatan_id' => '2', 'kd_desa' => '35.15.02.2020', 'nama' => 'Watutulis']);

        // Kec. Krembung
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2001', 'nama' => 'Tambakrejo']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2002', 'nama' => 'Keper']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2003', 'nama' => 'Kedungsumur']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2004', 'nama' => 'Kedungrawan']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2005', 'nama' => 'Tanjekwagir']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2006', 'nama' => 'Mojoruntut']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2007', 'nama' => 'Gading']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2008', 'nama' => 'Wangkal']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2009', 'nama' => 'Jenggot']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2010', 'nama' => 'Waung']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2011', 'nama' => 'Ploso']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2012', 'nama' => 'Rejeni']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2013', 'nama' => 'Kandangan']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2014', 'nama' => 'Krembung']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2015', 'nama' => 'Lemujut']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2016', 'nama' => 'Cangkring']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2017', 'nama' => 'Keret']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2018', 'nama' => 'Wonomlati']);
        Desa::create(['kecamatan_id' => '3', 'kd_desa' => '35.15.03.2019', 'nama' => 'Balonggarut']);

        // Kec. Porong
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.1003', 'nama' => 'Porong']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.1004', 'nama' => 'Juwetkenongo']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.1006', 'nama' => 'Gedang']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2001', 'nama' => 'Kebonagung']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2002', 'nama' => 'Kedungsolo']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2007', 'nama' => 'Kesambi']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2008', 'nama' => 'Kebakalan']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2009', 'nama' => 'Lajuk']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2010', 'nama' => 'Kedungboto']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2011', 'nama' => 'Candipari']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2012', 'nama' => 'Pamotan']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2015', 'nama' => 'Glagaharum']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2016', 'nama' => 'Plumbon']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2018', 'nama' => 'Wunut']);
        Desa::create(['kecamatan_id' => '4', 'kd_desa' => '35.15.04.2019', 'nama' => 'Pesawahan']);

        // Kec. Jabon
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2001', 'nama' => 'Panggreh']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2002', 'nama' => 'Trompoasri']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2003', 'nama' => 'Kedungrejo']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2004', 'nama' => 'Semambung']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2005', 'nama' => 'Kedungpandan']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2006', 'nama' => 'Kupang']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2007', 'nama' => 'Tambakkalisogo']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2008', 'nama' => 'Balongtani']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2009', 'nama' => 'Jemirahan']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2010', 'nama' => 'Dukuhsari']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2011', 'nama' => 'Kedungcangkring']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2014', 'nama' => 'Keboguyang']);
        Desa::create(['kecamatan_id' => '5', 'kd_desa' => '35.15.05.2015', 'nama' => 'Permisan']);

        // Kec. Tanggulangin
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2001', 'nama' => 'Kalisampurno']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2002', 'nama' => 'Ketapang']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2004', 'nama' => 'Kalitengah']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2005', 'nama' => 'Gempolsari']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2006', 'nama' => 'Sentul']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2007', 'nama' => 'Penatarsewu']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2008', 'nama' => 'Banjarasri']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2009', 'nama' => 'Banjarpanji']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2010', 'nama' => 'Kedungbanteng']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2011', 'nama' => 'Kalidawir']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2012', 'nama' => 'Putat']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2013', 'nama' => 'Ngaban']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2014', 'nama' => 'Kludan']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2015', 'nama' => 'Boro']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2016', 'nama' => 'Kedensari']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2017', 'nama' => 'Ketegan']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2018', 'nama' => 'Ganggangpanjang']);
        Desa::create(['kecamatan_id' => '6', 'kd_desa' => '35.15.06.2019', 'nama' => 'Randegan']);

        // Kec. Candi
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2001', 'nama' => 'Karangtanjung']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2002', 'nama' => 'Sumorame']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2003', 'nama' => 'Ngampelsari']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2004', 'nama' => 'Balonggabus']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2005', 'nama' => 'Balongdowo']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2006', 'nama' => 'Kendalpecabean']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2007', 'nama' => 'Kedungpeluk']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2008', 'nama' => 'Kalipecabean']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2009', 'nama' => 'Klurak']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2010', 'nama' => 'Kebonsari']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2011', 'nama' => 'Gelam']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2012', 'nama' => 'Candi']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2013', 'nama' => 'Sugihwaras']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2014', 'nama' => 'Kedungkendo']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2015', 'nama' => 'Durungbanjar']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2016', 'nama' => 'Durungbedug']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2017', 'nama' => 'Jambangan']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2018', 'nama' => 'Sidodadi']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2019', 'nama' => 'Sepande']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2020', 'nama' => 'Sumokali']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2021', 'nama' => 'Tenggulunan']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2022', 'nama' => 'Bligo']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2023', 'nama' => 'Wedoroklurak']);
        Desa::create(['kecamatan_id' => '7', 'kd_desa' => '35.15.07.2024', 'nama' => 'Larangan']);

        // Kec.Sidoarjo
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1004', 'nama' => 'Sidokare']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1005', 'nama' => 'Celep']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1006', 'nama' => 'Sekardangan']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1007', 'nama' => 'Gebang']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1009', 'nama' => 'Bulusidokare']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1010', 'nama' => 'Pucanganom']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1011', 'nama' => 'Pekauman']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1012', 'nama' => 'Lemahputro']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1013', 'nama' => 'Sidokumpul']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1014', 'nama' => 'Sidoklumpuk']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1017', 'nama' => 'Pucang']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1018', 'nama' => 'Magersari']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1020', 'nama' => 'Cemengkalang']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.1022', 'nama' => 'Urangagung']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2001', 'nama' => 'Lebo']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2002', 'nama' => 'Suko']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2003', 'nama' => 'Banjarbendo']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2008', 'nama' => 'Rangkahkidul']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2015', 'nama' => 'Blurukidul']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2016', 'nama' => 'Kemiri']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2019', 'nama' => 'Jati']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2021', 'nama' => 'Cemengbakalan']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2023', 'nama' => 'Sarirogo']);
        Desa::create(['kecamatan_id' => '8', 'kd_desa' => '35.15.08.2024', 'nama' => 'Sumput']);

        // Kec.Tulangan
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2001', 'nama' => 'Janti']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2002', 'nama' => 'Kebaron']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2003', 'nama' => 'Kenongo']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2004', 'nama' => 'Gelang']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2005', 'nama' => 'Jiken']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2006', 'nama' => 'Pangkemiri']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2007', 'nama' => 'Kepatihan']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2008', 'nama' => 'Tulangan']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2009', 'nama' => 'Kepadangan']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2010', 'nama' => 'Tlasih']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2011', 'nama' => 'Kajeksan']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2012', 'nama' => 'Singopadu']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2013', 'nama' => 'Kemantren']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2014', 'nama' => 'Kepunten']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2015', 'nama' => 'Kepuhkemiri']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2016', 'nama' => 'Grinting']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2017', 'nama' => 'Modong']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2018', 'nama' => 'Grogol']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2019', 'nama' => 'Medalem']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2020', 'nama' => 'Sudimoro']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2021', 'nama' => 'Kedondong']);
        Desa::create(['kecamatan_id' => '9', 'kd_desa' => '35.15.09.2022', 'nama' => 'Grabagan']);

        // Kec. Wonoayu
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2001', 'nama' => 'Tanggul']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2002', 'nama' => 'Simoketawang']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2003', 'nama' => 'Popoh']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2004', 'nama' => 'Jimbarankulon']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2005', 'nama' => 'Jimbaranwetan']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2006', 'nama' => 'Ketimang']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2007', 'nama' => 'Pilang']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2008', 'nama' => 'Sumberejo']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2009', 'nama' => 'Mojorangagung']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2010', 'nama' => 'Wonokasian']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2011', 'nama' => 'Ploso']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2012', 'nama' => 'Mulyodadi']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2013', 'nama' => 'Wonoayu']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2014', 'nama' => 'Semambung']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2015', 'nama' => 'Simoangin-angin']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2016', 'nama' => 'Wonokalang']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2017', 'nama' => 'Pagerngumbuk']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2018', 'nama' => 'Plaosan']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2019', 'nama' => 'Lambangan']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2020', 'nama' => 'Sawocangkring']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2021', 'nama' => 'Becirongengor']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2022', 'nama' => 'Karangpuri']);
        Desa::create(['kecamatan_id' => '10', 'kd_desa' => '35.15.10.2023', 'nama' => 'Candinegoro']);

        // Kec. Krian
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2001', 'nama' => 'Kemasan']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2002', 'nama' => 'Tambakkemerakan']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2003', 'nama' => 'Krian']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2004', 'nama' => 'Tropodo']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2005', 'nama' => 'Sedenganmijen']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2006', 'nama' => 'Katerungan']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2007', 'nama' => 'Jerukgamping']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2008', 'nama' => 'Gamping']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2009', 'nama' => 'Terik']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2010', 'nama' => 'Junwangi']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2011', 'nama' => 'Terungkulon']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2012', 'nama' => 'Terungwetan']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2013', 'nama' => 'Jatikalang']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2014', 'nama' => 'Keboharan']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2015', 'nama' => 'Ponokawan']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2016', 'nama' => 'Sidomojo']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2017', 'nama' => 'Kraton']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2018', 'nama' => 'Sidomulyo']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2019', 'nama' => 'Tempel']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2020', 'nama' => 'Watugolong']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2021', 'nama' => 'Barengkrajan']);
        Desa::create(['kecamatan_id' => '11', 'kd_desa' => '35.15.11.2022', 'nama' => 'Sidorejo']);

        // Kec. Balongbendo
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2001', 'nama' => 'Wonokupang']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2002', 'nama' => 'Sumokembangsri']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2003', 'nama' => 'Singkalan']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2004', 'nama' => 'Bakungpringgodani']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2005', 'nama' => 'Wonokarang']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2006', 'nama' => 'Seduri']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2007', 'nama' => 'Bakalanwringinpitu']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2008', 'nama' => 'Gagangkepuhsari']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2009', 'nama' => 'Suwaluh']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2010', 'nama' => 'Watesari']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2011', 'nama' => 'Seketi']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2012', 'nama' => 'Kemangsen']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2013', 'nama' => 'Jabaran']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2014', 'nama' => 'Balongbendo']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2015', 'nama' => 'Jeruklegi']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2016', 'nama' => 'Penambangan']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2017', 'nama' => 'Waruberon']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2018', 'nama' => 'Bogempinggir']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2019', 'nama' => 'Kedungsukodani']);
        Desa::create(['kecamatan_id' => '12', 'kd_desa' => '35.15.12.2020', 'nama' => 'Bakungtemenggungan']);

        // Kec. Taman
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.1005', 'nama' => 'Taman']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.1015', 'nama' => 'Geluran']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.1017', 'nama' => 'Kalijaten']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.1018', 'nama' => 'Ketegan']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.1019', 'nama' => 'Sepanjang']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.1020', 'nama' => 'Bebekan']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.1021', 'nama' => 'Wonocolo']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.1022', 'nama' => 'Ngelom']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2001', 'nama' => 'Bohar']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2002', 'nama' => 'Wage']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2003', 'nama' => 'Kedungturi']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2004', 'nama' => 'Jemundo']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2006', 'nama' => 'Sadang']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2007', 'nama' => 'Sambibulu']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2008', 'nama' => 'Bringinbendo']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2009', 'nama' => 'Sidodadi']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2010', 'nama' => 'Kramatjegu']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2011', 'nama' => 'Trosobo']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2012', 'nama' => 'Pertapanmaduretno']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2013', 'nama' => 'Tawangsari']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2014', 'nama' => 'Gilang']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2016', 'nama' => 'Kletek']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2023', 'nama' => 'Tanjungsari']);
        Desa::create(['kecamatan_id' => '13', 'kd_desa' => '35.15.13.2024', 'nama' => 'Krembangan']);

        // Kec. Sukodono
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2001', 'nama' => 'Wilayut']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2002', 'nama' => 'Kebonagung']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2003', 'nama' => 'Anggaswangi']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2004', 'nama' => 'Jumputrejo']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2005', 'nama' => 'Suruh']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2006', 'nama' => 'Pekarungan']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2007', 'nama' => 'Pademonegoro']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2008', 'nama' => 'Cangkringsari']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2009', 'nama' => 'Jogosatru']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2010', 'nama' => 'Ngaresrejo']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2011', 'nama' => 'Sambungrejo']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2012', 'nama' => 'Plumbungan']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2013', 'nama' => 'Sukodono']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2014', 'nama' => 'Kloposepuluh']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2015', 'nama' => 'Masanganwetan']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2016', 'nama' => 'Suko']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2017', 'nama' => 'Masangankulon']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2018', 'nama' => 'Panjunan']);
        Desa::create(['kecamatan_id' => '14', 'kd_desa' => '35.15.14.2019', 'nama' => 'Bangsri']);

        // Kec. Buduran
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2001', 'nama' => 'Entalsewu']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2002', 'nama' => 'Pagerwojo']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2003', 'nama' => 'Sidokerto']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2004', 'nama' => 'Buduran']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2005', 'nama' => 'Siwalanpanji']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2006', 'nama' => 'Sidomulyo']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2007', 'nama' => 'Prasung']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2008', 'nama' => 'Sawohan']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2009', 'nama' => 'Damarsi']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2010', 'nama' => 'Dukuhtengah']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2011', 'nama' => 'Banjarsari']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2012', 'nama' => 'Wadungasih']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2013', 'nama' => 'Banjarkemantren']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2014', 'nama' => 'Sukorejo']);
        Desa::create(['kecamatan_id' => '15', 'kd_desa' => '35.15.15.2015', 'nama' => 'Sidokepung']);

        // Kec.Gedangan
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2001', 'nama' => 'Ganting']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2002', 'nama' => 'Karangbong']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2003', 'nama' => 'Tebel']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2004', 'nama' => 'Kragan']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2005', 'nama' => 'Gemurung']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2006', 'nama' => 'Punggul']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2007', 'nama' => 'Wedi']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2008', 'nama' => 'Ketajen']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2009', 'nama' => 'Gedangan']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2010', 'nama' => 'Sruni']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2011', 'nama' => 'Keboansikep']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2012', 'nama' => 'Keboananom']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2013', 'nama' => 'Bangah']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2014', 'nama' => 'Sawotratap']);
        Desa::create(['kecamatan_id' => '16', 'kd_desa' => '35.15.16.2015', 'nama' => 'Semambung']);

        // Kec.Sedati
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2001', 'nama' => 'Kwangsan']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2002', 'nama' => 'Pepe']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2003', 'nama' => 'Buncitan']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2004', 'nama' => 'Kalanganyar']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2005', 'nama' => 'Tambakcemandi']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2006', 'nama' => 'Gisikcemandi']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2007', 'nama' => 'Cemandi']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2008', 'nama' => 'Pulungan']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2009', 'nama' => 'Betro']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2010', 'nama' => 'Sedatiagung']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2011', 'nama' => 'Sedatigede']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2012', 'nama' => 'Pabean']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2013', 'nama' => 'Semampir']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2014', 'nama' => 'Pranti']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2015', 'nama' => 'Segorotambak']);
        Desa::create(['kecamatan_id' => '17', 'kd_desa' => '35.15.17.2016', 'nama' => 'Banjarkemuning']);

        // Kec. Waru
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2001', 'nama' => 'Pepelegi']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2002', 'nama' => 'Waru']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2003', 'nama' => 'Kureksari']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2004', 'nama' => 'Ngingas']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2006', 'nama' => 'Tambaksawah']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2007', 'nama' => 'Tambakrejo']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2008', 'nama' => 'Tambakoso']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2009', 'nama' => 'Tambaksumur']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2010', 'nama' => 'Wadungasri']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2011', 'nama' => 'Kepuhkiriman']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2012', 'nama' => 'Berbek']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2013', 'nama' => 'Wedoro']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2014', 'nama' => 'Janti']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2015', 'nama' => 'Kedungrejo']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2016', 'nama' => 'Medaeng']);
        Desa::create(['kecamatan_id' => '18', 'kd_desa' => '35.15.18.2017', 'nama' => 'Bungurasih']);
    }
}
