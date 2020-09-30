<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('skills')->delete();
        
        \DB::table('skills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Quality Control',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Communication Skills',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Time Management',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Can Accept Criticism',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Teamwork',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Manager',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Welder',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Mason',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Concrete Works',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Brick Laying',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Digging Holes',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Demolition',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Plastering',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Labouring',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Formwork Labouring',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Quick learner',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Work independently',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Team player',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Highly disciplined',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Good physical strength',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Flexible to work weekends',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Problem Solving',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Arithmetic',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Communication',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Organisational',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Planning',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Supervision',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Can do mindset',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Project Management',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Site Management',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Client Management',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Project Scheduling',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Dispute Resolution',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Cost Reporting',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Contract Administration',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Carpentry',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Joinery',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Site Management Residential',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Project Manager Residential',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'OHS',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Excellent spoken and written-communications skills',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Excellent teamwork and interpersonal relations skills',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Ability to take initiative without supervision',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Attention to detail',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Extensive experience in designing, planning, and execution of programs and project goals',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Ability to work under pressure and strict deadlines',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'construction',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'painting',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'supervising',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'delivery driver',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Fast learner',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Team worker',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Pragmatic',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'getting the job done',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'punctuality',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Physically fit',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'surveying',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'AutoCad',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'primavera',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'MS projects',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Concrete',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Site Cleaning',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Grouting',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Scaffolding',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Hand-Tools',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Water-spraying equipment',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Measuring',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Estimates',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'IT',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Cleaning sites',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Helping hand',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Initiative',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Problem solver',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Carpentey',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'General Skilled Labouring',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Leadership',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Diligence',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Masoney',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Expert on execution',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Entrep',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Comm skills',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Civil',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Electrical',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Roofing',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Asbestos',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Skilled Labouring',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Sales',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Work ethic',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Analitic skills',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Hard work',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Fit',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'General labourer',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Working in a team',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Eager to work',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Reliable',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Meeting deadlines',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Skill 1',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Skill 2',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Using any kind of handtools',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Working quickly',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Working professional',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'OH&S',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Organisation time management communication skills',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Follow orders',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Very good on power tools as I have worked in construction back home in Ireland',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Organisation',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Physically',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Forklift',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Power tools',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Social skills',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Communication skill',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Hard worker',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Labourer',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Engineering',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Estimation',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Form work carpenter, stripping, stillfixing, farming, leveling and labour',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Skillful',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'MS office',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Site Supervision',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'CARPENTER',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Leading hand',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Foreman',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Formwork',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Estimator',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Drafter',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Floor Leveller',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Plumber',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Concrete Repairs',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Estimating',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Costing',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Procurement',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Build mate',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Financial Officer, Accounting, Insurance',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Work under pressures',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Team work',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => '•	Exceptional communication',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => '•	Leadership',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => '•	Dependability',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => '•	Resourcefulness',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => '•	Time management',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => '•	Working under pressure',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => '•	Attention to detail',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => '•	Taking on new challenges',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => '•	Work well in team or autonomously',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => '•	Awareness of OH&S standards',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Attention for detail',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Following instructions',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Professionalism',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Interpersonal skills',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Technical Documentation',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Working hard',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Read and interpreter  plans',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Time Management Skills',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Organisational Skills',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Analytical Skills',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Reading Construction Drawings',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'Ability to work in team',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'Scheduling',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Revit',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Civil 3D',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'MicroSoft Excel',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'MicroSoft Project',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Speaking and Writing Skills',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Assess Environmental Impact and Risks Assemble Project Deliverables Assist With Staging, Testing, and Shipping of Equipment Prior to Deployment Analyze Survey Reports, Maps, and Data to Plan ',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Traffic control',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Teloscopic handler',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'First aid',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Plan reading',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Hand tools',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'MS Project',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Autodesk Revit',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Tendering',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Critical thinking',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Hardworker',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Punctual',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Leader management',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Accuracy',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Reading Plans',
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Softwares',
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Cost planner',
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Cost X',
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Navisworks',
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Bricklayer',
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Building and construction',
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'Landscape',
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Hard working',
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Good communication',
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'Concret',
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Restoration',
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Floor laying',
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Modular building',
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Interpreting plans',
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'decision making',
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'customer service',
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'team leadership',
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'Managerial skills',
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'Primavera P6 planning',
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'Ms. Project -planning & scheduling',
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'written and verbal communication skills',
            ),
            199 => 
            array (
                'id' => 200,
            'name' => 'fluent in English (IELTS: 7.5 bands)',
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'Project coordination',
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'Project monitoring and control',
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'cost reconciliation',
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Great team player and very persistent with hard work',
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'Take off and Measure Quantities',
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'Keen to Learn',
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Power tooks',
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Responsible',
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'verbal and written communication',
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Multitask',
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'self motivated',
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Staad.pro',
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Microsoft Word',
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Powerpoint Presentatiom',
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Comminication Skill',
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Project Management skill',
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Leadership Skill',
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Time management skill',
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Problem solving skill',
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Decision making skill',
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Written & Verbal Communication',
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'PROBLEM TACKLING',
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'WRITING SKILLS',
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'STAAD',
            ),
            224 => 
            array (
                'id' => 225,
                'name' => '3DS MAX',
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'MS EXCEL',
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'MS WORD',
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'Excel',
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'Follow up',
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'Site experience',
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'Paper works',
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'Management',
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'Cabinet Making',
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'Building decking',
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'Landscaping',
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Management, good communication',
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'planswift',
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'xero',
            ),
            238 => 
            array (
                'id' => 239,
                'name' => 'sketchup',
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'lumion',
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'Tim management',
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'Adaptable',
            ),
            242 => 
            array (
                'id' => 243,
                'name' => 'Computer',
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'Active Listening. Adaptability. Communication. Creativity. Critical Thinking. Decision Making. Keen to Details',
            ),
            244 => 
            array (
                'id' => 245,
                'name' => 'CostX',
            ),
            245 => 
            array (
                'id' => 246,
                'name' => 'Excavator',
            ),
            246 => 
            array (
                'id' => 247,
                'name' => 'Loader',
            ),
            247 => 
            array (
                'id' => 248,
                'name' => 'Skidsteer',
            ),
            248 => 
            array (
                'id' => 249,
                'name' => 'Hr truck',
            ),
            249 => 
            array (
                'id' => 250,
                'name' => 'Confined space enterey',
            ),
            250 => 
            array (
                'id' => 251,
                'name' => 'Work at hieght',
            ),
            251 => 
            array (
                'id' => 252,
                'name' => 'Microsoft Office',
            ),
            252 => 
            array (
                'id' => 253,
                'name' => 'Microsoft Windows',
            ),
            253 => 
            array (
                'id' => 254,
                'name' => 'SAP2000',
            ),
            254 => 
            array (
                'id' => 255,
                'name' => 'Adobe Photoshop',
            ),
            255 => 
            array (
                'id' => 256,
                'name' => 'Mathematics',
            ),
            256 => 
            array (
                'id' => 257,
                'name' => 'Creativity',
            ),
            257 => 
            array (
                'id' => 258,
                'name' => 'Complex Problem Solving',
            ),
            258 => 
            array (
                'id' => 259,
                'name' => 'Visualization',
            ),
            259 => 
            array (
                'id' => 260,
                'name' => 'Labour',
            ),
            260 => 
            array (
                'id' => 261,
                'name' => 'Set building',
            ),
            261 => 
            array (
                'id' => 262,
                'name' => 'Fix outs',
            ),
            262 => 
            array (
                'id' => 263,
                'name' => 'Honesty',
            ),
            263 => 
            array (
                'id' => 264,
                'name' => 'Education',
            ),
            264 => 
            array (
                'id' => 265,
                'name' => 'Framing',
            ),
            265 => 
            array (
                'id' => 266,
                'name' => 'Door hanging',
            ),
            266 => 
            array (
                'id' => 267,
                'name' => 'Flooring',
            ),
            267 => 
            array (
                'id' => 268,
                'name' => 'Fire door building',
            ),
            268 => 
            array (
                'id' => 269,
                'name' => 'Finishing carpentry',
            ),
            269 => 
            array (
                'id' => 270,
                'name' => 'Shopfitting',
            ),
            270 => 
            array (
                'id' => 271,
                'name' => 'Fencing',
            ),
            271 => 
            array (
                'id' => 272,
                'name' => 'Kitchen fitting',
            ),
            272 => 
            array (
                'id' => 273,
                'name' => 'Decking',
            ),
            273 => 
            array (
                'id' => 274,
                'name' => 'Cladding',
            ),
            274 => 
            array (
                'id' => 275,
                'name' => 'Coordination',
            ),
            275 => 
            array (
                'id' => 276,
                'name' => 'Running a team',
            ),
            276 => 
            array (
                'id' => 277,
                'name' => 'Job planning',
            ),
            277 => 
            array (
                'id' => 278,
                'name' => 'Follow Instructions',
            ),
            278 => 
            array (
                'id' => 279,
                'name' => 'Reliability',
            ),
            279 => 
            array (
                'id' => 280,
                'name' => 'ssf',
            ),
            280 => 
            array (
                'id' => 281,
                'name' => 'saaas',
            ),
            281 => 
            array (
                'id' => 282,
                'name' => 'Business development',
            ),
            282 => 
            array (
                'id' => 283,
                'name' => 'Quality Management',
            ),
            283 => 
            array (
                'id' => 284,
                'name' => 'Safety awareness',
            ),
            284 => 
            array (
                'id' => 285,
                'name' => 'Documentation',
            ),
            285 => 
            array (
                'id' => 286,
                'name' => 'Tool handling',
            ),
            286 => 
            array (
                'id' => 287,
                'name' => 'Strong work ethic',
            ),
            287 => 
            array (
                'id' => 288,
                'name' => 'transferable skills',
            ),
            288 => 
            array (
                'id' => 289,
                'name' => 'problem-solving',
            ),
            289 => 
            array (
                'id' => 290,
                'name' => 'active learning',
            ),
            290 => 
            array (
                'id' => 291,
                'name' => 'Attention to detail / quality of work',
            ),
            291 => 
            array (
                'id' => 292,
            'name' => 'Industry knowledge (colour coding, use of equipment, OHS requirements etc)',
            ),
            292 => 
            array (
                'id' => 293,
                'name' => 'Oxy cutting',
            ),
            293 => 
            array (
                'id' => 294,
                'name' => 'Project manager',
            ),
            294 => 
            array (
                'id' => 295,
                'name' => 'OH&S inspector',
            ),
            295 => 
            array (
                'id' => 296,
                'name' => 'ATO responsibilities',
            ),
            296 => 
            array (
                'id' => 297,
                'name' => 'Motivator',
            ),
            297 => 
            array (
                'id' => 298,
                'name' => 'Reliable and conscientious team member',
            ),
            298 => 
            array (
                'id' => 299,
                'name' => 'To work autonomous',
            ),
            299 => 
            array (
                'id' => 300,
                'name' => 'willing to learn and try new tasks',
            ),
            300 => 
            array (
                'id' => 301,
                'name' => 'general labouring duties',
            ),
            301 => 
            array (
                'id' => 302,
                'name' => 'Excellent communication skills',
            ),
            302 => 
            array (
                'id' => 303,
                'name' => 'Willing too learn',
            ),
            303 => 
            array (
                'id' => 304,
                'name' => 'Administration',
            ),
            304 => 
            array (
                'id' => 305,
                'name' => 'Heavy Lifting',
            ),
            305 => 
            array (
                'id' => 306,
                'name' => 'OH & S',
            ),
            306 => 
            array (
                'id' => 307,
                'name' => 'Well organised time efficient. Manual handling lifting. Working in safe manner & work well in a team or independantly',
            ),
            307 => 
            array (
                'id' => 308,
                'name' => 'Hoist Operator',
            ),
            308 => 
            array (
                'id' => 309,
                'name' => 'Concreter',
            ),
            309 => 
            array (
                'id' => 310,
                'name' => 'Cabinet Maker',
            ),
            310 => 
            array (
                'id' => 311,
                'name' => 'Storeperson',
            ),
            311 => 
            array (
                'id' => 312,
                'name' => 'Adapting to different environments',
            ),
            312 => 
            array (
                'id' => 313,
                'name' => 'Computer Skills',
            ),
            313 => 
            array (
                'id' => 314,
                'name' => 'read and interpret plans',
            ),
            314 => 
            array (
                'id' => 315,
                'name' => 'people skills',
            ),
            315 => 
            array (
                'id' => 316,
                'name' => 'working efficiently, working within OH&S regulations, good communication skills, works well within a time frame, reliable, punctual',
            ),
            316 => 
            array (
                'id' => 317,
                'name' => 'ass',
            ),
            317 => 
            array (
                'id' => 318,
                'name' => 'Laying refractory bricks',
            ),
            318 => 
            array (
                'id' => 319,
                'name' => 'Working at heights from mobile scaffold',
            ),
            319 => 
            array (
                'id' => 320,
                'name' => 'Drystack brickwork',
            ),
            320 => 
            array (
                'id' => 321,
                'name' => 'Commercial Fencing',
            ),
            321 => 
            array (
                'id' => 322,
                'name' => 'Solid Plastering',
            ),
            322 => 
            array (
                'id' => 323,
                'name' => 'Intiative',
            ),
            323 => 
            array (
                'id' => 324,
                'name' => 'Cleanliness',
            ),
            324 => 
            array (
                'id' => 325,
                'name' => 'Safety',
            ),
            325 => 
            array (
                'id' => 326,
                'name' => 'Communication skills, Time management, complete all work to an exceptional standard and on time',
            ),
            326 => 
            array (
                'id' => 327,
                'name' => 'Skilled Labourer',
            ),
            327 => 
            array (
                'id' => 328,
                'name' => 'GENERAL CONSTRUCTION',
            ),
            328 => 
            array (
                'id' => 329,
                'name' => 'Use of power tools',
            ),
            329 => 
            array (
                'id' => 330,
                'name' => 'organized',
            ),
            330 => 
            array (
                'id' => 331,
                'name' => 'Building, Carpentry,',
            ),
            331 => 
            array (
                'id' => 332,
                'name' => '10+',
            ),
            332 => 
            array (
                'id' => 333,
                'name' => 'time mangement',
            ),
            333 => 
            array (
                'id' => 334,
                'name' => 'fast pace',
            ),
            334 => 
            array (
                'id' => 335,
                'name' => 'all rounder',
            ),
            335 => 
            array (
                'id' => 336,
                'name' => 'All sort of work related to construction',
            ),
            336 => 
            array (
                'id' => 337,
                'name' => 'Efficient',
            ),
            337 => 
            array (
                'id' => 338,
                'name' => 'Hardworking',
            ),
            338 => 
            array (
                'id' => 339,
                'name' => 'management and waterproofing',
            ),
            339 => 
            array (
                'id' => 340,
                'name' => 'Wide experience in physical labour',
            ),
            340 => 
            array (
                'id' => 341,
                'name' => 'Robust physical stamina',
            ),
            341 => 
            array (
                'id' => 342,
                'name' => 'Ability to follow written/oral instructions',
            ),
            342 => 
            array (
                'id' => 343,
                'name' => 'Strong mathematical skills',
            ),
            343 => 
            array (
                'id' => 344,
                'name' => 'Great communication skills',
            ),
            344 => 
            array (
                'id' => 345,
                'name' => 'Dogging and Rigging',
            ),
            345 => 
            array (
                'id' => 346,
                'name' => 'Proficient with power tools',
            ),
            346 => 
            array (
                'id' => 347,
                'name' => 'Workflow Optimization',
            ),
            347 => 
            array (
                'id' => 348,
                'name' => 'Understanding of engineering principles',
            ),
            348 => 
            array (
                'id' => 349,
                'name' => 'Excellent grasp of safety guidelines',
            ),
            349 => 
            array (
                'id' => 350,
                'name' => 'Hard working and flexible to work in any conditions',
            ),
            350 => 
            array (
                'id' => 351,
                'name' => 'Whizz knife',
            ),
            351 => 
            array (
                'id' => 352,
                'name' => 'Building',
            ),
            352 => 
            array (
                'id' => 353,
                'name' => 'Microsoft Word/Excel/Power point',
            ),
            353 => 
            array (
                'id' => 354,
                'name' => 'Wardrobe builder',
            ),
            354 => 
            array (
                'id' => 355,
                'name' => 'Team Leader',
            ),
            355 => 
            array (
                'id' => 356,
                'name' => 'Negotiations',
            ),
            356 => 
            array (
                'id' => 357,
                'name' => 'Communications Skills',
            ),
            357 => 
            array (
                'id' => 358,
                'name' => 'BIM',
            ),
            358 => 
            array (
                'id' => 359,
                'name' => 'Architecture Drawings',
            ),
            359 => 
            array (
                'id' => 360,
                'name' => 'Machine operator',
            ),
            360 => 
            array (
                'id' => 361,
                'name' => 'Operating Tools',
            ),
            361 => 
            array (
                'id' => 362,
                'name' => 'rigging',
            ),
            362 => 
            array (
                'id' => 363,
                'name' => 'Microsoft',
            ),
            363 => 
            array (
                'id' => 364,
                'name' => 'Design',
            ),
            364 => 
            array (
                'id' => 365,
                'name' => 'Operational skills',
            ),
            365 => 
            array (
                'id' => 366,
                'name' => 'Landscapeing',
            ),
            366 => 
            array (
                'id' => 367,
                'name' => 'Waterproofing',
            ),
            367 => 
            array (
                'id' => 368,
                'name' => 'People management',
            ),
            368 => 
            array (
                'id' => 369,
                'name' => 'Budget skills',
            ),
            369 => 
            array (
                'id' => 370,
                'name' => 'Bricklaying',
            ),
            370 => 
            array (
                'id' => 371,
                'name' => 'OHS Officer',
            ),
            371 => 
            array (
                'id' => 372,
                'name' => 'Time Management, Customer Service, Estimations, Feasibility analysis, Communication skills',
            ),
            372 => 
            array (
                'id' => 373,
                'name' => 'Tester',
            ),
        ));
        
        
    }
}