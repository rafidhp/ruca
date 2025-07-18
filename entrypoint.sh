#!/bin/bash

# Jalankan migrasi
# php artisan migrate:fresh --force

# Jalankan seeder (opsional)
# php artisan db:seed --force

# php artisan storage:link

# Start apache
exec apache2-foreground
