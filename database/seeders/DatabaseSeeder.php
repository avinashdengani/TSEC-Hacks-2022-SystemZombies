<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Sandeep Ahuja',
            'email' => 'sandeepahuja@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'job_title' => 'Frontend Developer',
            'headline' => 'Student at TSEC',
            'phone' => '8282882222',
            'github_username' => 'avinashdengani'
        ]);

        User::factory()->count(20)->create();

        $languages = [
            "ABAP",
            "ActionScript",
            "Ada",
            "ALGOL",
            "Alice",
            "APL",
            "ASP / ASP.NET",
            "Assembly Language",
            "Awk",
            "BBC Basic",
            "C",
            "C++",
            "C#",
            "COBOL",
            "Cascading Style Sheets",
            "D",
            "Delphi",
            "Dreamweaver",
            "Erlang and Elixir",
            "F#",
            "FORTH",
            "FORTRAN",
            "Functional Programming",
            "Go",
            "Haskell",
            "HTML",
            "IDL",
            "INTERCAL",
            "Java",
            "Javascript",
            "jQuery",
            "LabVIEW",
            "Lisp",
            "Logo",
            "MetaQuotes Language",
            "ML",
            "Modula-3",
            "MS Access",
            "MySQL",
            "NXT-G",
            "Object-Oriented Programming",
            "Objective-C",
            "OCaml",
            "Pascal",
            "Perl",
            "PHP",
            "PL/I",
            "PL/SQL",
            "PostgreSQL",
            "PostScript",
            "PROLOG",
            "Pure Data",
            "Python",
            "R",
            "RapidWeaver",
            "RavenDB",
            "Rexx",
            "Ruby on Rails",
            "S-PLUS",
            "SAS",
            "Scala",
            "Sed",
            "SGML",
            "Simula",
            "Smalltalk",
            "SMIL",
            "SNOBOL",
            "SQL",
            "SQLite",
            "SSI",
            "Stata",
            "Swift",
            "Tcl/Tk",
            "TeX and LaTeX",
            "Unified Modeling Language",
            "Unix Shells",
            "Verilog",
            "VHDL",
            "Visual Basic",
            "Visual FoxPro",
            "VRML",
            "WAP/WML",
            "XML",
            "XSL",
            "ADO.NET",
            "AI Programming",
            "ASCII Encoding",
            "Backbone.js",
            "Books",
            "CakePHP",
            "CGI",
            "Cocoa",
            "CodeIgniter",
            "Cookies",
            "CORBA",
            "CVS",
            "DOM",
            "Extreme Programming",
            "FFmpeg",
            "GATE",
            "Git",
            "GNUstep",
            "ImageMagick",
            "JSON",
            "Laravel",
            "Linked Lists",
            "Machine Learning",
            "MantisBT",
            "MDN",
            "Mercurial",
            "MPI",
            "MSXML",
            "Ncurses",
            ".NET",
            "Network Programming",
            "NetCDF",
            "OAuth",
            "OpenCL",
            "OpenID",
            "OpenSSL",
            "OS Development",
            "PHProjekt",
            "Project Management",
            "RegEx",
            "Robots",
            "Sorting Algorithms",
            "SSH",
            "SOAP",
            "Subversion",
            "URL",
            "Vi",
            "WCF",
            "WebKit Web Inspector",
            "Web Standards",
            "WSDL",
            "WSGI",
            "YUI",
            "Zikula",
            "Chyrp",
            "Drupal Coding Standards",
            "Linux Programming",
            "Mandriva Linux",
            "MS-DOS",
            "MS-Windows",
            "Raspberry Pi",
            "Ubuntu",
            "Umbraco",
            "UNIX Programming",
            "Xaraya",
        ];

        $categories = ["Artificial intelligence", "Big Data", "Blockchain", "Web Development", "Machine Learning", "Data Science", "Cyber Security", "Virtual Reality", "REST", "CRUD", "Cryptography", "Compiler Design", "System Security", "Operating System", "Others"];

        foreach($languages as $lang) {
            Language::create([
                'name' => $lang
            ]);

            Tag::create([
                'name' => $lang
            ]);
        }

        foreach($categories as $categoryName) {
            Category::create([
                'name' => $categoryName
            ]);

            Tag::create([
                'name' => $categoryName
            ]);
        }
    }
}
