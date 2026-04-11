<?php

namespace App\Repositories;

class AlexRepo
{
    public function getRepos(): array
    {
        return [


                [
                    'name' => 'CORSI – Workshop Management System',
                    'tag' => 'Laravel • Vue',
                    'icon' => 'fa-solid fa-graduation-cap',
                    'description' => 'A workshop management platform featuring an admin panel for creating and managing workshops, tracking available seats, and enabling workers to sign up based on capacity. Built with Laravel and Vue.js for a smooth, modern workflow.',
                    'url' => 'https://github.com/anxietyPotato/CORSI',
                    'image' => 'images/img.png'
                ],
                [
                    'name' => 'Redis25',
                    'tag' => 'PHP/Laravel • Redis',
                    'icon' => 'fa-solid fa-database',
                    'description' => 'Hands-on project exploring Redis as a caching and session layer within a PHP application. Covers queues and performance optimisation.',
                    'url' => 'https://github.com/anxietyPotato/Redis25',
                ],
                [
                    'name' => '26 Resources',
                    'tag' => 'PHP • Laravel',
                    'icon' => 'fa-solid fa-layer-group',
                    'description' => 'A deep-dive into Laravel resource controllers and RESTful routing — covering all seven resource methods with clean, structured code.',
                    'url' => 'https://github.com/anxietyPotato/26-resources',
                ],
                [
                    'name' => 'CRUD App – Products',
                    'tag' => 'PHP • MySQL',
                    'icon' => 'fa-solid fa-cart-shopping',
                    'description' => 'Full CRUD application with product management, database migrations, Eloquent models and form validation built in Laravel.',
                    'url' => 'https://github.com/anxietyPotato/cruds',
                    'image' => 'images/img_1.png'
                ],
                [
                    'name' => 'CRUD Edit Extension',
                    'tag' => 'PHP ',
                    'icon' => 'fa-solid fa-pen-to-square',
                    'description' => 'An extended CRUD application adding advanced edit functionality,and improved form handling.',
                    'url' => 'https://github.com/anxietyPotato/Cruds-edit',
                ],
                [
                    'name' => 'Validation & Data Insert',
                    'tag' => 'PHP • Laravel',
                    'icon' => 'fa-solid fa-circle-check',
                    'description' => 'Focused project on Laravel form validation rules, custom error messages and safe data insertion into MySQL — following security best practices.',
                    'url' => 'https://github.com/anxietyPotato/Validation-and-insert-of-data',
                    'image' => 'images/validation-screenshot.png',
                ],
                [
                    'name' => 'Controllers & Migrations',
                    'tag' => 'PHP • Eloquent',
                    'icon' => 'fa-solid fa-code-branch',
                    'description' => 'Practice project covering Laravel controller creation, database migration design and Eloquent model setup — including product model and migration.',
                    'url' => 'https://github.com/anxietyPotato/controllers',
                ],
                [
                    'name' => 'Controllers Part 2',
                    'tag' => 'PHP • Laravel',
                    'icon' => 'fa-solid fa-sitemap',
                    'description' => 'Second iteration of controller exercises diving deeper into resourceful controllers, middleware and request handling in Laravel.',
                    'url' => 'https://github.com/anxietyPotato/controllers2-',
                ],



        ];
        //If you ever want to add more screenshots to other repos in the future,
        // just add 'image' => 'images/your file .png' to that repo's entry in AlexRepo.php and
        // it will automatically get the same hover zoom effect. No extra code needed!
    }
}
