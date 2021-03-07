<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement(
            DB::raw("INSERT INTO `main_cities` (`id`, `name`, `state_id`) VALUES 
 (31273, 'Barkhan', 2723),
(31274, 'Bela', 2723),
(31275, 'Bhag', 2723),
(31276, 'Chaman', 2723),
(31277, 'Chitkan', 2723),
(31278, 'Dalbandin', 2723),
(31279, 'Dera Allah Yar', 2723),
(31280, 'Dera Bugti', 2723),
(31281, 'Dera Murad Jamali', 2723),
(31282, 'Dhadar', 2723),
(31283, 'Duki', 2723),
(31284, 'Gaddani', 2723),
(31285, 'Gwadar', 2723),
(31286, 'Harnai', 2723),
(31287, 'Hub', 2723),
(31288, 'Jiwani', 2723),
(31289, 'Kalat', 2723),
(31290, 'Kharan', 2723),
(31291, 'Khuzdar', 2723),
(31292, 'Kohlu', 2723),
(31293, 'Loralai', 2723),
(31294, 'Mach', 2723),
(31295, 'Mastung', 2723),
(31296, 'Nushki', 2723),
(31297, 'Ormara', 2723),
(31298, 'Pasni', 2723),
(31299, 'Pishin', 2723),
(31300, 'Quetta', 2723),
(31301, 'Sibi', 2723),
(31302, 'Sohbatpur', 2723),
(31303, 'Surab', 2723),
(31304, 'Turbat', 2723),
(31305, 'Usta Muhammad', 2723),
(31306, 'Uthal', 2723),
(31307, 'Wadh', 2723),
(31308, 'Winder', 2723),
(31309, 'Zehri', 2723),
(31310, 'Zhob', 2723),
(31311, 'Ziarat', 2723),
(31312, 'Abdul Hakim', 2728),
(31313, 'Ahmadpur East', 2728),
(31314, 'Ahmadpur Lumma', 2728),
(31315, 'Ahmadpur Sial', 2728),
(31316, 'Ahmedabad', 2728),
(31317, 'Alipur', 2728),
(31318, 'Alipur Chatha', 2728),
(31319, 'Arifwala', 2728),
(31320, 'Attock', 2728),
(31321, 'Baddomalhi', 2728),
(31322, 'Bagh', 2728),
(31323, 'Bahawalnagar', 2728),
(31324, 'Bahawalpur', 2728),
(31325, 'Bai Pheru', 2728),
(31326, 'Basirpur', 2728),
(31327, 'Begowala', 2728),
(31328, 'Bhakkar', 2728),
(31329, 'Bhalwal', 2728),
(31330, 'Bhawana', 2728),
(31331, 'Bhera', 2728),
(31332, 'Bhopalwala', 2728),
(31333, 'Burewala', 2728),
(31334, 'Chak Azam Sahu', 2728),
(31335, 'Chak Jhumra', 2728),
(31336, 'Chak Sarwar Shahid', 2728),
(31337, 'Chakwal', 2728),
(31338, 'Chawinda', 2728),
(31339, 'Chichawatni', 2728),
(31340, 'Chiniot', 2728),
(31341, 'Chishtian Mandi', 2728),
(31342, 'Choa Saidan Shah', 2728),
(31343, 'Chuhar Kana', 2728),
(31344, 'Chunian', 2728),
(31345, 'Dajal', 2728),
(31346, 'Darya Khan', 2728),
(31347, 'Daska', 2728),
(31348, 'Daud Khel', 2728),
(31349, 'Daultala', 2728),
(31350, 'Dera Din Panah', 2728),
(31351, 'Dera Ghazi Khan', 2728),
(31352, 'Dhanote', 2728),
(31353, 'Dhonkal', 2728),
(31354, 'Dijkot', 2728),
(31355, 'Dina', 2728),
(31356, 'Dinga', 2728),
(31357, 'Dipalpur', 2728),
(31358, 'Dullewala', 2728),
(31359, 'Dunga Bunga', 2728),
(31360, 'Dunyapur', 2728),
(31361, 'Eminabad', 2728),
(31362, 'Faisalabad', 2728),
(31363, 'Faqirwali', 2728),
(31364, 'Faruka', 2728),
(31365, 'Fateh Jang', 2728),
(31366, 'Fatehpur', 2728),
(31367, 'Fazalpur', 2728),
(31368, 'Ferozwala', 2728),
(31369, 'Fort Abbas', 2728),
(31370, 'Garh Maharaja', 2728),
(31371, 'Ghakar', 2728),
(31372, 'Ghurgushti', 2728),
(31373, 'Gojra', 2728),
(31374, 'Gujar Khan', 2728),
(31375, 'Gujranwala', 2728),
(31376, 'Gujrat', 2728),
(31377, 'Hadali', 2728),
(31378, 'Hafizabad', 2728),
(31379, 'Harnoli', 2728),
(31380, 'Harunabad', 2728),
(31381, 'Hasan Abdal', 2728),
(31382, 'Hasilpur', 2728),
(31383, 'Haveli', 2728),
(31384, 'Hazro', 2728),
(31385, 'Hujra Shah Muqim', 2728),
(31386, 'Isa Khel', 2728),
(31387, 'Jahanian', 2728),
(31388, 'Jalalpur Bhattian', 2728),
(31389, 'Jalalpur Jattan', 2728),
(31390, 'Jalalpur Pirwala', 2728),
(31391, 'Jalla Jeem', 2728),
(31392, 'Jamke Chima', 2728),
(31393, 'Jampur', 2728),
(31394, 'Jand', 2728),
(31395, 'Jandanwala', 2728),
(31396, 'Jandiala Sherkhan', 2728),
(31397, 'Jaranwala', 2728),
(31398, 'Jatoi', 2728),
(31399, 'Jauharabad', 2728),
(31400, 'Jhang', 2728),
(31401, 'Jhawarian', 2728),
(31402, 'Jhelum', 2728),
(31403, 'Kabirwala', 2728),
(31404, 'Kahna Nau', 2728),
(31405, 'Kahror Pakka', 2728),
(31406, 'Kahuta', 2728),
(31407, 'Kalabagh', 2728),
(31408, 'Kalaswala', 2728),
(31409, 'Kaleke', 2728),
(31410, 'Kalur Kot', 2728),
(31411, 'Kamalia', 2728),
(31412, 'Kamar Mashani', 2728),
(31413, 'Kamir', 2728),
(31414, 'Kamoke', 2728),
(31415, 'Kamra', 2728),
(31416, 'Kanganpur', 2728),
(31417, 'Karampur', 2728),
(31418, 'Karor Lal Esan', 2728),
(31419, 'Kasur', 2728),
(31420, 'Khairpur Tamewali', 2728),
(31421, 'Khanewal', 2728),
(31422, 'Khangah Dogran', 2728),
(31423, 'Khangarh', 2728),
(31424, 'Khanpur', 2728),
(31425, 'Kharian', 2728),
(31426, 'Khewra', 2728),
(31427, 'Khundian', 2728),
(31428, 'Khurianwala', 2728),
(31429, 'Khushab', 2728),
(31430, 'Kot Abdul Malik', 2728),
(31431, 'Kot Addu', 2728),
(31432, 'Kot Mithan', 2728),
(31433, 'Kot Moman', 2728),
(31434, 'Kot Radha Kishan', 2728),
(31435, 'Kot Samaba', 2728),
(31436, 'Kotli Loharan', 2728),
(31437, 'Kundian', 2728),
(31438, 'Kunjah', 2728),
(31439, 'Lahore', 2728),
(31440, 'Lalamusa', 2728),
(31441, 'Lalian', 2728),
(31442, 'Liaqatabad', 2728),
(31443, 'Liaqatpur', 2728),
(31444, 'Lieah', 2728),
(31445, 'Liliani', 2728),
(31446, 'Lodhran', 2728),
(31447, 'Ludhewala Waraich', 2728),
(31448, 'Mailsi', 2728),
(31449, 'Makhdumpur', 2728),
(31450, 'Makhdumpur Rashid', 2728),
(31451, 'Malakwal', 2728),
(31452, 'Mamu Kanjan', 2728),
(31453, 'Mananwala Jodh Singh', 2728),
(31454, 'Mandi Bahauddin', 2728),
(31455, 'Mandi Sadiq Ganj', 2728),
(31456, 'Mangat', 2728),
(31457, 'Mangla', 2728),
(31458, 'Mankera', 2728),
(31459, 'Mian Channun', 2728),
(31460, 'Miani', 2728),
(31461, 'Mianwali', 2728),
(31462, 'Minchinabad', 2728),
(31463, 'Mitha Tiwana', 2728),
(31464, 'Multan', 2728),
(31465, 'Muridke', 2728),
(31466, 'Murree', 2728),
(31467, 'Mustafabad', 2728),
(31468, 'Muzaffargarh', 2728),
(31469, 'Nankana Sahib', 2728),
(31470, 'Narang', 2728),
(31471, 'Narowal', 2728),
(31472, 'Noorpur Thal', 2728),
(31473, 'Nowshera', 2728),
(31474, 'Nowshera Virkan', 2728),
(31475, 'Okara', 2728),
(31476, 'Pakpattan', 2728),
(31477, 'Pasrur', 2728),
(31478, 'Pattoki', 2728),
(31479, 'Phalia', 2728),
(31480, 'Phularwan', 2728),
(31481, 'Pind Dadan Khan', 2728),
(31482, 'Pindi Bhattian', 2728),
(31483, 'Pindi Gheb', 2728),
(31484, 'Pirmahal', 2728),
(31485, 'Qadirabad', 2728),
(31486, 'Qadirpur Ran', 2728),
(31487, 'Qila Disar Singh', 2728),
(31488, 'Qila Sobha Singh', 2728),
(31489, 'Quaidabad', 2728),
(31490, 'Rabwah', 2728),
(31491, 'Rahim Yar Khan', 2728),
(31492, 'Raiwind', 2728),
(31493, 'Raja Jang', 2728),
(31494, 'Rajanpur', 2728),
(31495, 'Rasulnagar', 2728),
(31496, 'Rawalpindi', 2728),
(31497, 'Renala Khurd', 2728),
(31498, 'Rojhan', 2728),
(31499, 'Saddar Gogera', 2728),
(31500, 'Sadiqabad', 2728),
(31501, 'Safdarabad', 2728),
(31502, 'Sahiwal', 2728),
(31503, 'Samasatta', 2728),
(31504, 'Sambrial', 2728),
(31505, 'Sammundri', 2728),
(31506, 'Sangala Hill', 2728),
(31507, 'Sanjwal', 2728),
(31508, 'Sarai Alamgir', 2728),
(31509, 'Sarai Sidhu', 2728),
(31510, 'Sargodha', 2728),
(31511, 'Shadiwal', 2728),
(31512, 'Shahkot', 2728),
(31513, 'Shahpur MainCity', 2728),
(31514, 'Shahpur Saddar', 2728),
(31515, 'Shakargarh', 2728),
(31516, 'Sharqpur', 2728),
(31517, 'Shehr Sultan', 2728),
(31518, 'Shekhupura', 2728),
(31519, 'Shujaabad', 2728),
(31520, 'Sialkot', 2728),
(31521, 'Sillanwali', 2728),
(31522, 'Sodhra', 2728),
(31523, 'Sohawa', 2728),
(31524, 'Sukheke', 2728),
(31525, 'Talagang', 2728),
(31526, 'Tandlianwala', 2728),
(31527, 'Taunsa', 2728),
(31528, 'Taxila', 2728),
(31529, 'Tibba Sultanpur', 2728),
(31530, 'Toba Tek Singh', 2728),
(31531, 'Tulamba', 2728),
(31532, 'Uch', 2728),
(31533, 'Vihari', 2728),
(31534, 'Wah', 2728),
(31535, 'Warburton', 2728),
(31536, 'Wazirabad', 2728),
(31537, 'Yazman', 2728),
(31538, 'Zafarwal', 2728),
(31539, 'Zahir Pir', 2728),
(31540, 'Adilpur', 2729),
(31541, 'Badah', 2729),
(31542, 'Badin', 2729),
(31543, 'Bagarji', 2729),
(31544, 'Bakshshapur', 2729),
(31545, 'Bandhi', 2729),
(31546, 'Berani', 2729),
(31547, 'Bhan', 2729),
(31548, 'Bhiria MainCity', 2729),
(31549, 'Bhiria Road', 2729),
(31550, 'Bhit Shah', 2729),
(31551, 'Bozdar', 2729),
(31552, 'Bulri', 2729),
(31553, 'Chak', 2729),
(31554, 'Chambar', 2729),
(31555, 'Chohar Jamali', 2729),
(31556, 'Chor', 2729),
(31557, 'Dadu', 2729),
(31558, 'Daharki', 2729),
(31559, 'Daro', 2729),
(31560, 'Darya Khan Mari', 2729),
(31561, 'Daulatpur', 2729),
(31562, 'Daur', 2729),
(31563, 'Dhoronaro', 2729),
(31564, 'Digri', 2729),
(31565, 'Diplo', 2729),
(31566, 'Dokri', 2729),
(31567, 'Faqirabad', 2729),
(31568, 'Gambat', 2729),
(31569, 'Garello', 2729),
(31570, 'Garhi Khairo', 2729),
(31571, 'Garhi Yasin', 2729),
(31572, 'Gharo', 2729),
(31573, 'Ghauspur', 2729),
(31574, 'Ghotki', 2729),
(31575, 'Golarchi', 2729),
(31576, 'Guddu', 2729),
(31577, 'Gulistan-E-Jauhar', 2729),
(31578, 'Hala', 2729),
(31579, 'Hingorja', 2729),
(31580, 'Hyderabad', 2729),
(31581, 'Islamkot', 2729),
(31582, 'Jacobabad', 2729),
(31583, 'Jam Nawaz Ali', 2729),
(31584, 'Jam Sahib', 2729),
(31585, 'Jati', 2729),
(31586, 'Jhol', 2729),
(31587, 'Jhudo', 2729),
(31588, 'Johi', 2729),
(31589, 'Kadhan', 2729),
(31590, 'Kambar', 2729),
(31591, 'Kandhra', 2729),
(31592, 'Kandiari', 2729),
(31593, 'Kandiaro', 2729),
(31594, 'Karachi', 2729),
(31595, 'Karampur', 2729),
(31596, 'Kario Ghanwar', 2729),
(31597, 'Karoondi', 2729),
(31598, 'Kashmor', 2729),
(31599, 'Kazi Ahmad', 2729),
(31600, 'Keti Bandar', 2729),
(31601, 'Khadro', 2729),
(31602, 'Khairpur', 2729),
(31603, 'Khairpur Nathan Shah', 2729),
(31604, 'Khandh Kot', 2729),
(31605, 'Khanpur', 2729),
(31606, 'Khipro', 2729),
(31607, 'Khoski', 2729),
(31608, 'Khuhra', 2729),
(31609, 'Khyber', 2729),
(31610, 'Kot Diji', 2729),
(31611, 'Kot Ghulam Mohammad', 2729),
(31612, 'Kotri', 2729),
(31613, 'Kumb', 2729),
(31614, 'Kunri', 2729),
(31615, 'Lakhi', 2729),
(31616, 'Larkana', 2729),
(31617, 'Madeji', 2729),
(31618, 'Matiari', 2729),
(31619, 'Matli', 2729),
(31620, 'Mehar', 2729),
(31621, 'Mehrabpur', 2729),
(31622, 'Miro Khan', 2729),
(31623, 'Mirpur Bathoro', 2729),
(31624, 'Mirpur Khas', 2729),
(31625, 'Mirpur Mathelo', 2729),
(31626, 'Mirpur Sakro', 2729),
(31627, 'Mirwah', 2729),
(31628, 'Mithi', 2729),
(31629, 'Moro', 2729),
(31630, 'Nabisar', 2729),
(31631, 'Nasarpur', 2729),
(31632, 'Nasirabad', 2729),
(31633, 'Naudero', 2729),
(31634, 'Naukot', 2729),
(31635, 'Naushahro Firoz', 2729),
(31636, 'Nawabshah', 2729),
(31637, 'Oderolal Station', 2729),
(31638, 'Pacca Chang', 2729),
(31639, 'Padidan', 2729),
(31640, 'Pano Aqil', 2729),
(31641, 'Perumal', 2729),
(31642, 'Phulji', 2729),
(31643, 'Pirjo Goth', 2729),
(31644, 'Piryaloi', 2729),
(31645, 'Pithoro', 2729),
(31646, 'Radhan', 2729),
(31647, 'Rajo Khanani', 2729),
(31648, 'Ranipur', 2729),
(31649, 'Ratodero', 2729),
(31650, 'Rohri', 2729),
(31651, 'Rustam', 2729),
(31652, 'Saeedabad', 2729),
(31653, 'Sakrand', 2729),
(31654, 'Samaro', 2729),
(31655, 'Sanghar', 2729),
(31656, 'Sann', 2729),
(31657, 'Sarhari', 2729),
(31658, 'Sehwan', 2729),
(31659, 'Setharja', 2729),
(31660, 'Shah Dipalli', 2729),
(31661, 'Shahdadkot', 2729),
(31662, 'Shahdadpur', 2729),
(31663, 'Shahpur Chakar', 2729),
(31664, 'Shahpur Jahania', 2729),
(31665, 'Shikarpur', 2729),
(31666, 'Sinjhoro', 2729),
(31667, 'Sita Road', 2729),
(31668, 'Sobhodero', 2729),
(31669, 'Sujawal', 2729),
(31670, 'Sukkur', 2729),
(31671, 'Talhar', 2729),
(31672, 'Tando Adam', 2729),
(31673, 'Tando Allah Yar', 2729),
(31674, 'Tando Bagho', 2729),
(31675, 'Tando Ghulam Ali', 2729),
(31676, 'Tando Jam', 2729),
(31677, 'Tando Jan Mohammad', 2729),
(31678, 'Tando Mitha Khan', 2729),
(31679, 'Tando Muhammad Khan', 2729),
(31680, 'Tangwani', 2729),
(31681, 'Thano Bula Khan', 2729),
(31682, 'Thari Mirwah', 2729),
(31683, 'Tharushah', 2729),
(31684, 'Thatta', 2729),
(31685, 'Ther I', 2729),
(31686, 'Ther I Mohabat', 2729),
(31687, 'Thul', 2729),
(31688, 'Ubauro', 2729),
(31689, 'Umarkot', 2729),
(31690, 'Warah', 2729),

 (31692, 'Rochester', 2729),
 
 (31694, 'Yonkers', 2729),
 (31695, 'Syracuse', 2729),
 (31696, 'Albany', 2729),
 (31697, 'New Rochelle', 2729),
 (31691, 'Buffalo', 2729),
 (31698, 'Mount Vernon', 2729),
 (31699, 'Schenectady', 2729),
 (31700, 'Utica', 2729),
 (31701, 'White Plains', 2729),
 (31702, 'Hempstead', 2729),
 (31703, 'Troy', 2729),
 (31704, 'Niagara Falls', 2729),
 (31705, 'Binghamton', 2729),
 (31706, 'Freeport', 2729),
 (31707, 'Valley Stream', 2729)
 ;"));
    }
}
