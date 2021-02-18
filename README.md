# Aplikasi Perpustakaan Sederhaan dan CRUD Generator#

## About : ##

Aplikasi perpusatkaan sederhana dengan menambahkan Pegawai, buku, kategori
Fitur simpan dan kembali buku

## Preparation before using this CRUD Generator (Important) : ##

* On application/config/autoload.php, load database library, session library and url helper.
* On application/config/config.php, set $config['base_url'] = 'http://localhost/yourprojectname', $config['index_page'] = '', $config['url_suffix'] = '.html' and $config['encryption_key'] = 'randomstring'
* On application/config/database.php, set hostname, username, password and database

## How to use this CRUD Generator : ##

watch video on https://www.youtube.com/watch?v=xh-xVW28DPk

## FAQ : ##

* Select table show no data. Make sure you have correct database configuration on application/config/database.php and load database library on autoload.
* Error chmod on mac and linux. Please change your application folder and harviacode folder chmod to 777
* Error 404 when click Create, Read, Update, Delete or Next Page. Make sure your mod_rewrite is active and you can access http://localhost/yourproject/welcome. The problem is on htaccess. Still have problem? please go to google and search how to remove index.php codeigniter.
* Error cannot Read, Update, Delete. Make sure your table have primary key.

## Thanks for Support Me ##
Buy me a cup of coffee.. paypal : hariprasetyo0212@gmail.com

## Update ##
V.1.4.1 - 1 Januari 2020
CRUD User

V.1.4 - 26 November 2016

* Change to serverside datatables using ignited datatables

V.1.3.1 - 05 April 2016

* Put view files into folde

**Copyright 2015 [harviacode.com](http://harviacode.com)**
