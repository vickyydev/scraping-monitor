# Scraping Monitor Application

## Introduction

This is a Laravel application designed to monitor scraping jobs from various sources. It logs the process of scraping different sections (maps) of external websites and records the status and results in the database.

## Requirements

- PHP 8.3
- Composer
- MySQL or MariaDB
- Laravel 10

## Installation


composer install
cp .env.example .env

## Generate Key
php artisan key:generate

## Generate Necessary Tables
artisan queue:table

## Run Migrations
php artisan migrate

## Seed Database
php artisan db:seed

## Queue Job manually
php artisan scrape:queue

## Start queue worker
php artisan queue:work

## Notes

The application is set up to run the scraping jobs every 10 minutes via a cron job.

A globalscope is applied to the Source and Map models so only active entities are processed.