# Gallery

Overview:
==========
This is gallery application where visitor can see all the images uploaded by admin in the album format. LightBox library is used in this aplication. Admin can create albums by login in the application and images can be uploaded in the respective album by admin

make sure you have internet connection for jquery and botstrap cdn.

Admin login details username:- admin password:-admin123

Author:
==========
Deepak Walkar

Used Tools:
============
Xampp
Notepad++(Editor)

Application Structure:
====================

Home.php
-------------
This page displays the images slide show and the Available alubms in navigation bar.
click on navigation bar menu to see the respective album images.

header.php
----------
this file includes all required cdn and externel files for the differnt pages

login.php
--------
Admin can login by using username and pssword

uploads.php
-----------
admin can upload the images by selecting the perticular album using radio button

createAlbum.php
--------------
Admin creates the new album by entering album name and submitting the same.

Auth.php
-------------
this file used to check or authenticating the user or user session.

Folders:
========
images
-----
this folder contains the images for Carousel. (slide show)

Uploads
------
This folder contains the images uploaded by admin.

css & JS
------
css and java script file and LightBox libraries..

Database Tables:
===============
album:
-------
Columns:- album_id (primary key) , album_name(unique)

imagesinfo:
-------------
columns:- album_id(foreign key(albumtable)),imgname,img_id(primary key)

login:
-----
columns:- username, pswd
