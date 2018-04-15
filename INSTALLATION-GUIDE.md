# MLH - Simple PHP Login System

**Current Installation Guide Version:** 1.0.1

## Installation Guide

This guide will help you with the installation of [MLH - Simple PHP Login System](https://github.com/marchershey/MLH-Simple-PHP-Login-System).

If you have any questions, comments, concerns, or suggestions, please [let me know](https://github.com/marchershey/MLH-Simple-PHP-Login-System/issues/new)!

#### Step 1: Install the Database Table

Open PHPMyAdmin, navigate to you're websites database, and select the `SQL` tab:

![Database](https://i.imgur.com/3iqnUhj.png)

Once inside the `SQL` tab, copy and paste the `sql.txt` file and press `go`.

![https://i.imgur.com/CFKv21W.png](https://i.imgur.com/CFKv21W.png)

If successful, continue to step 2.


#### Step 2:

- Upload the `app` project folder to the folder that holds your server's `public_html` folder, NOT INSIDE THE PUBLIC_HTML FOLDER.

Kind of a tongue twister, but let me explain better. If you're server's folder structure looks like this:

![Folder structure](https://i.imgur.com/uzVJ2ff.png)

Then you will want to upload the `app` folder inside the `filesand` folder, not the `public_html` folder.

If done correctly, the files in the project's `public_html` folder should insert into your servers `public_html` folder, and the project's `php` folder should be alongside the `public_html` folder on your server.

#### Step 3:

In a file editor (Notepad, Notepad++, Atom, etc), open `php/init.php` and go through the file and change any information or settings you'd like. I tried to document everything thoroughly but if you have any questions, [please ask](https://github.com/marchershey/MLH-Simple-PHP-Login-System/issues/new)!

#### You're done!

That's everything. Every file in the project is heavily documented so you should be able to read everything and figure it out. There's a lot of cool features inside. For example, Global Alerts. You can set `enabled` to *true* and have a site-wide message shown the login and register or your own pages if you just add the simple code.

#### Securing Pages

To secure a page, all you need to do is include the `php/init.php` file at the top of the page and then call the `securePage();` function. You can view it in action on the `secured-page.php` file.
