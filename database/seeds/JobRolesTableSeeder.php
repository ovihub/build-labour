<?php

use Illuminate\Database\Seeder;

class JobRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_roles')->delete();
        
        \DB::table('job_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'job_role_name' => 'Master Carpenter',
            ),
            1 => 
            array (
                'id' => 2,
                'job_role_name' => 'Plumber',
            ),
            2 => 
            array (
                'id' => 3,
                'job_role_name' => 'Project Manager',
            ),
            3 => 
            array (
                'id' => 4,
                'job_role_name' => 'Carpenter and Joiner',
            ),
            4 => 
            array (
                'id' => 5,
                'job_role_name' => 'Multi-Skilled Plant Operators',
            ),
            5 => 
            array (
                'id' => 6,
                'job_role_name' => 'Carpenter / Restorer',
            ),
            6 => 
            array (
                'id' => 7,
                'job_role_name' => 'Carpenter',
            ),
            7 => 
            array (
                'id' => 8,
                'job_role_name' => 'Architectural Draftsperson',
            ),
            8 => 
            array (
                'id' => 9,
                'job_role_name' => 'Engineering Surveyor',
            ),
            9 => 
            array (
                'id' => 10,
                'job_role_name' => 'Civil Foreman',
            ),
            10 => 
            array (
                'id' => 11,
                'job_role_name' => 'Machinery Operator',
            ),
            11 => 
            array (
                'id' => 12,
                'job_role_name' => 'Senior Quantity Surveyor',
            ),
            12 => 
            array (
                'id' => 13,
                'job_role_name' => 'Quantity Surveyor',
            ),
            13 => 
            array (
                'id' => 14,
                'job_role_name' => 'Transport Delivery Driver / Labourer Plasterboard Delivery',
            ),
            14 => 
            array (
                'id' => 15,
                'job_role_name' => 'Mobile Plant Operator',
            ),
            15 => 
            array (
                'id' => 16,
                'job_role_name' => 'Slate Roofer',
            ),
            16 => 
            array (
                'id' => 17,
                'job_role_name' => 'Construction Foreman',
            ),
            17 => 
            array (
                'id' => 18,
                'job_role_name' => 'Drainers',
            ),
            18 => 
            array (
                'id' => 19,
                'job_role_name' => 'Glazier',
            ),
            19 => 
            array (
                'id' => 20,
                'job_role_name' => 'General Labourer',
            ),
            20 => 
            array (
                'id' => 21,
                'job_role_name' => 'Scraper Operator',
            ),
            21 => 
            array (
                'id' => 22,
                'job_role_name' => 'Grader Operator',
            ),
            22 => 
            array (
                'id' => 23,
                'job_role_name' => 'Project Engineer',
            ),
            23 => 
            array (
                'id' => 24,
                'job_role_name' => 'Commercial Estimator Project Manager',
            ),
            24 => 
            array (
                'id' => 25,
                'job_role_name' => 'Structural Drafter',
            ),
            25 => 
            array (
                'id' => 26,
                'job_role_name' => 'Fabricator',
            ),
            26 => 
            array (
                'id' => 27,
                'job_role_name' => 'Drainer',
            ),
            27 => 
            array (
                'id' => 28,
                'job_role_name' => 'Bricklayer',
            ),
            28 => 
            array (
                'id' => 29,
                'job_role_name' => 'Track Maintainers',
            ),
            29 => 
            array (
                'id' => 30,
                'job_role_name' => 'Carpenter / Formworker',
            ),
            30 => 
            array (
                'id' => 31,
                'job_role_name' => 'Forklift Driver',
            ),
            31 => 
            array (
                'id' => 32,
            'job_role_name' => 'Bobcat / Excavator (Combo) Operator',
            ),
            32 => 
            array (
                'id' => 33,
                'job_role_name' => 'Commercial Electrician',
            ),
            33 => 
            array (
                'id' => 34,
                'job_role_name' => 'Loader / Excavator',
            ),
            34 => 
            array (
                'id' => 35,
                'job_role_name' => 'Quantity Surveyor',
            ),
            35 => 
            array (
                'id' => 36,
                'job_role_name' => 'Site Engineer',
            ),
            36 => 
            array (
                'id' => 37,
                'job_role_name' => 'Skilled Plasterer',
            ),
            37 => 
            array (
                'id' => 38,
                'job_role_name' => 'Boilermaker',
            ),
            38 => 
            array (
                'id' => 39,
                'job_role_name' => 'Basic Scaffolder',
            ),
            39 => 
            array (
                'id' => 40,
                'job_role_name' => 'Cost Planner / Estimator',
            ),
            40 => 
            array (
                'id' => 41,
                'job_role_name' => 'Backhoe Operator with HR License',
            ),
            41 => 
            array (
                'id' => 42,
                'job_role_name' => 'Track Machine / Tamper Operators',
            ),
            42 => 
            array (
                'id' => 43,
                'job_role_name' => 'Electrical Estimator',
            ),
            43 => 
            array (
                'id' => 44,
                'job_role_name' => 'Leading Hand / Sub Foreman',
            ),
            44 => 
            array (
                'id' => 45,
                'job_role_name' => 'Roller Operator',
            ),
            45 => 
            array (
                'id' => 46,
                'job_role_name' => 'Riggers',
            ),
            46 => 
            array (
                'id' => 47,
                'job_role_name' => 'Dozer',
            ),
            47 => 
            array (
                'id' => 48,
                'job_role_name' => 'Grader',
            ),
            48 => 
            array (
                'id' => 49,
                'job_role_name' => 'Loader Operators',
            ),
            49 => 
            array (
                'id' => 50,
                'job_role_name' => 'Infrastructure Estimator',
            ),
            50 => 
            array (
                'id' => 51,
                'job_role_name' => 'Junior Estimator',
            ),
            51 => 
            array (
                'id' => 52,
                'job_role_name' => 'Crane Operator',
            ),
            52 => 
            array (
                'id' => 53,
                'job_role_name' => 'Municipal Building Surveyor',
            ),
            53 => 
            array (
                'id' => 54,
                'job_role_name' => 'Civil Excavator Operators',
            ),
            54 => 
            array (
                'id' => 55,
                'job_role_name' => 'Working Concrete Foreman',
            ),
            55 => 
            array (
                'id' => 56,
                'job_role_name' => 'Commercial Estimator',
            ),
            56 => 
            array (
                'id' => 57,
                'job_role_name' => 'Light Gauge Steel Fixer',
            ),
            57 => 
            array (
                'id' => 58,
                'job_role_name' => 'Production Estimator',
            ),
            58 => 
            array (
                'id' => 59,
                'job_role_name' => 'Sales Loader Operator',
            ),
            59 => 
            array (
                'id' => 60,
                'job_role_name' => 'Assessor Estimator',
            ),
            60 => 
            array (
                'id' => 61,
                'job_role_name' => 'Scraper Operator',
            ),
            61 => 
            array (
                'id' => 62,
                'job_role_name' => 'Plumbing Estimator',
            ),
            62 => 
            array (
                'id' => 63,
                'job_role_name' => 'Workplace Health & Safety Inspector',
            ),
            63 => 
            array (
                'id' => 64,
                'job_role_name' => 'Fork lift Operator / Yardman',
            ),
            64 => 
            array (
                'id' => 65,
                'job_role_name' => 'Joinery Estimator',
            ),
            65 => 
            array (
                'id' => 66,
                'job_role_name' => 'Building Surveyor',
            ),
            66 => 
            array (
                'id' => 67,
                'job_role_name' => 'Scheduler',
            ),
            67 => 
            array (
                'id' => 68,
                'job_role_name' => 'Implementation / Construction Coordinator',
            ),
            68 => 
            array (
                'id' => 69,
                'job_role_name' => 'Hoist Operator',
            ),
            69 => 
            array (
                'id' => 70,
                'job_role_name' => 'Basic Scaffolders',
            ),
            70 => 
            array (
                'id' => 71,
                'job_role_name' => 'Trade Assistants',
            ),
            71 => 
            array (
                'id' => 72,
                'job_role_name' => 'Building Certifier',
            ),
            72 => 
            array (
                'id' => 73,
                'job_role_name' => 'Concreter/Steel Fixer',
            ),
            73 => 
            array (
                'id' => 74,
                'job_role_name' => 'Workshop Controller / Supervisor',
            ),
            74 => 
            array (
                'id' => 75,
                'job_role_name' => 'Excavator Operator',
            ),
            75 => 
            array (
                'id' => 76,
                'job_role_name' => 'Sales Loader',
            ),
            76 => 
            array (
                'id' => 77,
                'job_role_name' => 'Pipe Service Layer',
            ),
            77 => 
            array (
                'id' => 78,
                'job_role_name' => 'Boilermaker Welder',
            ),
            78 => 
            array (
                'id' => 79,
                'job_role_name' => 'Final Trim Grader Operators - Road Construction',
            ),
            79 => 
            array (
                'id' => 80,
                'job_role_name' => 'Defects Foreman - Tier 2 Builder',
            ),
            80 => 
            array (
                'id' => 81,
                'job_role_name' => 'Civil Engineer',
            ),
            81 => 
            array (
                'id' => 82,
                'job_role_name' => 'Safety Director',
            ),
            82 => 
            array (
                'id' => 83,
                'job_role_name' => 'Construction Engineer',
            ),
            83 => 
            array (
                'id' => 84,
                'job_role_name' => 'Building Services Director',
            ),
            84 => 
            array (
                'id' => 85,
                'job_role_name' => 'Senior Manager – Construction',
            ),
            85 => 
            array (
                'id' => 86,
                'job_role_name' => 'Chief Construction Officer',
            ),
            86 => 
            array (
                'id' => 87,
                'job_role_name' => 'Quantity Surveyor',
            ),
            87 => 
            array (
                'id' => 88,
                'job_role_name' => 'Project Manager',
            ),
            88 => 
            array (
                'id' => 89,
                'job_role_name' => 'Architect',
            ),
            89 => 
            array (
                'id' => 90,
                'job_role_name' => 'Building Services Engineer',
            ),
            90 => 
            array (
                'id' => 91,
                'job_role_name' => 'Construction Assistant',
            ),
            91 => 
            array (
                'id' => 92,
                'job_role_name' => 'Structural Engineer',
            ),
            92 => 
            array (
                'id' => 93,
                'job_role_name' => 'Assistant Project Manager',
            ),
            93 => 
            array (
                'id' => 94,
                'job_role_name' => 'Building Inspector',
            ),
            94 => 
            array (
                'id' => 95,
                'job_role_name' => 'Purchasing Coordinator',
            ),
            95 => 
            array (
                'id' => 96,
                'job_role_name' => 'Construction Coordinator',
            ),
            96 => 
            array (
                'id' => 97,
                'job_role_name' => 'Project Assistant',
            ),
            97 => 
            array (
                'id' => 98,
                'job_role_name' => 'Project Manager',
            ),
            98 => 
            array (
                'id' => 99,
                'job_role_name' => 'Site Manager',
            ),
            99 => 
            array (
                'id' => 100,
                'job_role_name' => 'Superintendent',
            ),
            100 => 
            array (
                'id' => 101,
                'job_role_name' => 'Safety Manager',
            ),
            101 => 
            array (
                'id' => 102,
                'job_role_name' => 'Apprentice',
            ),
            102 => 
            array (
                'id' => 103,
                'job_role_name' => 'Carpenter',
            ),
            103 => 
            array (
                'id' => 104,
                'job_role_name' => 'Concrete Labour',
            ),
            104 => 
            array (
                'id' => 105,
                'job_role_name' => 'Contract Manager',
            ),
            105 => 
            array (
                'id' => 106,
                'job_role_name' => 'Construction Manager',
            ),
            106 => 
            array (
                'id' => 107,
                'job_role_name' => 'Construction Foreman',
            ),
            107 => 
            array (
                'id' => 108,
                'job_role_name' => 'Construction Worker',
            ),
            108 => 
            array (
                'id' => 109,
                'job_role_name' => 'Construction Supervisor',
            ),
            109 => 
            array (
                'id' => 110,
                'job_role_name' => 'Crane Operator',
            ),
            110 => 
            array (
                'id' => 111,
                'job_role_name' => 'Contract Administrator',
            ),
            111 => 
            array (
                'id' => 112,
                'job_role_name' => 'Dry Wall Finisher',
            ),
            112 => 
            array (
                'id' => 113,
                'job_role_name' => 'Estimator',
            ),
            113 => 
            array (
                'id' => 114,
                'job_role_name' => 'Dry Wall Installer',
            ),
            114 => 
            array (
                'id' => 115,
                'job_role_name' => 'Electrician',
            ),
            115 => 
            array (
                'id' => 116,
                'job_role_name' => 'Field Engineer',
            ),
            116 => 
            array (
                'id' => 117,
                'job_role_name' => 'Equipment Operator',
            ),
            117 => 
            array (
                'id' => 118,
                'job_role_name' => 'Framing Carpenter',
            ),
            118 => 
            array (
                'id' => 119,
                'job_role_name' => 'Inspector',
            ),
            119 => 
            array (
                'id' => 120,
                'job_role_name' => 'Iron Worker',
            ),
            120 => 
            array (
                'id' => 121,
                'job_role_name' => 'Labourer',
            ),
            121 => 
            array (
                'id' => 122,
                'job_role_name' => 'Joiner',
            ),
            122 => 
            array (
                'id' => 123,
                'job_role_name' => 'Master Plumber',
            ),
            123 => 
            array (
                'id' => 124,
                'job_role_name' => 'Master Electrician',
            ),
            124 => 
            array (
                'id' => 125,
                'job_role_name' => 'Painter',
            ),
            125 => 
            array (
                'id' => 126,
                'job_role_name' => 'Planner',
            ),
            126 => 
            array (
                'id' => 127,
                'job_role_name' => 'Pipe Fitter',
            ),
            127 => 
            array (
                'id' => 128,
                'job_role_name' => 'Signal Worker',
            ),
            128 => 
            array (
                'id' => 129,
                'job_role_name' => 'Roofer',
            ),
            129 => 
            array (
                'id' => 130,
                'job_role_name' => 'Surveyor',
            ),
            130 => 
            array (
                'id' => 131,
                'job_role_name' => 'Welder',
            ),
            131 => 
            array (
                'id' => 132,
                'job_role_name' => 'Health and Safety Advisor',
            ),
            132 => 
            array (
                'id' => 133,
                'job_role_name' => 'Carpenter',
            ),
            133 => 
            array (
                'id' => 134,
                'job_role_name' => 'Concreter',
            ),
            134 => 
            array (
                'id' => 135,
                'job_role_name' => 'Maintenance Trades Assistant',
            ),
            135 => 
            array (
                'id' => 136,
                'job_role_name' => 'Site Supervisor',
            ),
            136 => 
            array (
                'id' => 137,
                'job_role_name' => 'Foreman',
            ),
            137 => 
            array (
                'id' => 138,
                'job_role_name' => 'Quarry Plant Operator',
            ),
            138 => 
            array (
                'id' => 139,
                'job_role_name' => 'Civil Construction Labourer',
            ),
            139 => 
            array (
                'id' => 140,
                'job_role_name' => 'Construction Project Coordinator',
            ),
            140 => 
            array (
                'id' => 141,
                'job_role_name' => 'Safety and Environmental / WHSE Officer',
            ),
            141 => 
            array (
                'id' => 142,
                'job_role_name' => 'Plant Operator',
            ),
            142 => 
            array (
                'id' => 143,
                'job_role_name' => 'Traffic Controller',
            ),
            143 => 
            array (
                'id' => 144,
                'job_role_name' => 'Project Contracts Administrator',
            ),
            144 => 
            array (
                'id' => 145,
                'job_role_name' => 'Truck Driver',
            ),
            145 => 
            array (
                'id' => 146,
                'job_role_name' => 'Assistant Development Manager',
            ),
            146 => 
            array (
                'id' => 147,
                'job_role_name' => 'Field Supervisor',
            ),
            147 => 
            array (
                'id' => 148,
                'job_role_name' => 'Construction Cadet',
            ),
            148 => 
            array (
                'id' => 149,
                'job_role_name' => 'Civil Labourer',
            ),
            149 => 
            array (
                'id' => 150,
                'job_role_name' => 'Assistant Quantity Surveyor',
            ),
            150 => 
            array (
                'id' => 151,
                'job_role_name' => 'Building Insurance Assessor',
            ),
            151 => 
            array (
                'id' => 152,
                'job_role_name' => 'Quarry Operator',
            ),
            152 => 
            array (
                'id' => 153,
                'job_role_name' => 'Junior Project Manager',
            ),
            153 => 
            array (
                'id' => 154,
                'job_role_name' => 'Junior Technical Consultant',
            ),
            154 => 
            array (
                'id' => 155,
                'job_role_name' => 'Civil Construction Personnel',
            ),
            155 => 
            array (
                'id' => 156,
                'job_role_name' => 'Commercial Site Manager',
            ),
            156 => 
            array (
                'id' => 157,
                'job_role_name' => 'Minor Works Coordinator',
            ),
            157 => 
            array (
                'id' => 158,
                'job_role_name' => 'Asset Management Analyst',
            ),
            158 => 
            array (
                'id' => 159,
                'job_role_name' => 'Inspection Scheduler',
            ),
            159 => 
            array (
                'id' => 160,
                'job_role_name' => 'Building Supervisor',
            ),
            160 => 
            array (
                'id' => 161,
                'job_role_name' => 'Junior Contract Administrator',
            ),
            161 => 
            array (
                'id' => 162,
                'job_role_name' => 'Safety Assistant',
            ),
            162 => 
            array (
                'id' => 163,
                'job_role_name' => 'Site Measurer',
            ),
            163 => 
            array (
                'id' => 164,
                'job_role_name' => 'Multi Skilled Operator',
            ),
            164 => 
            array (
                'id' => 165,
                'job_role_name' => 'HR Driver',
            ),
            165 => 
            array (
                'id' => 166,
                'job_role_name' => 'Development Manager - Construction',
            ),
            166 => 
            array (
                'id' => 167,
                'job_role_name' => 'Civil Operators',
            ),
            167 => 
            array (
                'id' => 168,
                'job_role_name' => 'Concrete Labourer',
            ),
            168 => 
            array (
                'id' => 169,
                'job_role_name' => 'Concrete Tester - Construction',
            ),
            169 => 
            array (
                'id' => 170,
                'job_role_name' => 'Road Safety Barrier Construction',
            ),
            170 => 
            array (
                'id' => 171,
                'job_role_name' => 'Supervisor Repair Builder',
            ),
            171 => 
            array (
                'id' => 172,
                'job_role_name' => 'Civil Construction Pipe Layers',
            ),
            172 => 
            array (
                'id' => 173,
                'job_role_name' => 'Construction Office Administrator',
            ),
            173 => 
            array (
                'id' => 174,
                'job_role_name' => 'Sustainability Project Officer',
            ),
            174 => 
            array (
                'id' => 175,
                'job_role_name' => 'General Manager',
            ),
            175 => 
            array (
                'id' => 176,
                'job_role_name' => 'Concrete Finisher',
            ),
            176 => 
            array (
                'id' => 177,
                'job_role_name' => 'Facilities Manager',
            ),
            177 => 
            array (
                'id' => 178,
                'job_role_name' => 'WHS & Compliance Coordinator',
            ),
            178 => 
            array (
                'id' => 179,
                'job_role_name' => 'WHSEQ Administrator',
            ),
            179 => 
            array (
                'id' => 180,
                'job_role_name' => 'Trade Counter Salesperson',
            ),
            180 => 
            array (
                'id' => 181,
                'job_role_name' => 'Concrete Pumping',
            ),
            181 => 
            array (
                'id' => 182,
                'job_role_name' => 'Senior Project Engineer',
            ),
            182 => 
            array (
                'id' => 183,
                'job_role_name' => 'Demolition Labourers',
            ),
            183 => 
            array (
                'id' => 184,
                'job_role_name' => 'Project Supervisor',
            ),
            184 => 
            array (
                'id' => 185,
                'job_role_name' => 'Asphalt Labourer',
            ),
            185 => 
            array (
                'id' => 186,
                'job_role_name' => 'Machine Operator',
            ),
            186 => 
            array (
                'id' => 187,
                'job_role_name' => 'Height Safety Installer',
            ),
            187 => 
            array (
                'id' => 188,
                'job_role_name' => 'Site Safety Advisor Cadet',
            ),
            188 => 
            array (
                'id' => 189,
                'job_role_name' => 'Building Administrator',
            ),
            189 => 
            array (
                'id' => 190,
                'job_role_name' => 'Underground Truck Driver',
            ),
            190 => 
            array (
                'id' => 191,
                'job_role_name' => 'Junior Operations Scheduler',
            ),
            191 => 
            array (
                'id' => 192,
                'job_role_name' => 'Building Certifier',
            ),
            192 => 
            array (
                'id' => 193,
                'job_role_name' => 'Assistant Contract Admin',
            ),
            193 => 
            array (
                'id' => 194,
                'job_role_name' => 'Crew Leader',
            ),
            194 => 
            array (
                'id' => 195,
                'job_role_name' => 'Mobile Plant Operators',
            ),
            195 => 
            array (
                'id' => 196,
                'job_role_name' => 'Bobcat Operator',
            ),
            196 => 
            array (
                'id' => 197,
                'job_role_name' => 'Property Inspector',
            ),
            197 => 
            array (
                'id' => 198,
                'job_role_name' => 'Concrete Batcher',
            ),
            198 => 
            array (
                'id' => 199,
                'job_role_name' => 'Yardsperson',
            ),
            199 => 
            array (
                'id' => 200,
                'job_role_name' => 'Finishing Foreman',
            ),
            200 => 
            array (
                'id' => 201,
                'job_role_name' => 'Soil Nailing',
            ),
            201 => 
            array (
                'id' => 202,
                'job_role_name' => 'Shotcreting',
            ),
            202 => 
            array (
                'id' => 203,
                'job_role_name' => 'Truss Detailer',
            ),
            203 => 
            array (
                'id' => 204,
                'job_role_name' => 'Client Contracts and Procurement Officer',
            ),
            204 => 
            array (
                'id' => 205,
                'job_role_name' => 'Project Site Controller',
            ),
            205 => 
            array (
                'id' => 206,
                'job_role_name' => 'Insurance Services Manager',
            ),
            206 => 
            array (
                'id' => 207,
                'job_role_name' => 'Maintenance Supervisor',
            ),
            207 => 
            array (
                'id' => 208,
                'job_role_name' => 'Supervisor',
            ),
            208 => 
            array (
                'id' => 209,
                'job_role_name' => 'Formworker',
            ),
            209 => 
            array (
                'id' => 210,
                'job_role_name' => 'Contracts Delivery Manager',
            ),
            210 => 
            array (
                'id' => 211,
                'job_role_name' => 'Asset Information Manager',
            ),
            211 => 
            array (
                'id' => 212,
                'job_role_name' => 'HR - Tip Truck | Chipper Driver',
            ),
            212 => 
            array (
                'id' => 213,
                'job_role_name' => 'Cadet',
            ),
            213 => 
            array (
                'id' => 214,
                'job_role_name' => 'Construction Liaison Officer',
            ),
            214 => 
            array (
                'id' => 215,
                'job_role_name' => 'Heavy Plant Operators',
            ),
            215 => 
            array (
                'id' => 216,
                'job_role_name' => 'Water Damage Restoration Technician',
            ),
            216 => 
            array (
                'id' => 217,
                'job_role_name' => 'Plant Superintendent',
            ),
            217 => 
            array (
                'id' => 218,
                'job_role_name' => 'Metal Roofers Tradesmen',
            ),
            218 => 
            array (
                'id' => 219,
                'job_role_name' => 'Building Auditors',
            ),
            219 => 
            array (
                'id' => 220,
                'job_role_name' => 'Operations Support Manager',
            ),
            220 => 
            array (
                'id' => 221,
                'job_role_name' => 'Moxy Dump Truck Operator',
            ),
            221 => 
            array (
                'id' => 222,
                'job_role_name' => 'Civil Works Supervisor',
            ),
            222 => 
            array (
                'id' => 223,
                'job_role_name' => 'Forwarder Operator',
            ),
            223 => 
            array (
                'id' => 224,
                'job_role_name' => 'Watercart Roller',
            ),
            224 => 
            array (
                'id' => 225,
                'job_role_name' => 'Civil Pipe Layers',
            ),
            225 => 
            array (
                'id' => 226,
                'job_role_name' => 'Installation Manager',
            ),
            226 => 
            array (
                'id' => 227,
                'job_role_name' => 'Capital Works Manager',
            ),
            227 => 
            array (
                'id' => 228,
                'job_role_name' => 'Permit Coordinator',
            ),
            228 => 
            array (
                'id' => 229,
                'job_role_name' => 'Asphalt Crew Member',
            ),
        ));
        
        
    }
}