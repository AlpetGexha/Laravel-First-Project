---
commandas
---
#livewire
composer require livewire/livewire

#jetstream
composer require laravel/jetstream
php artisan jetstream:install livewire 
npm install && npm run dev

#jetstream with botstrap mode
composer require nascent-africa/jetstrap --dev
php artisan jetstrap:swap livewire
npm install && npm run dev


#migrate databases
php  artisan migrate --seed# Laravel-Projet
