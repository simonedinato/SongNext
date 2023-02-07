# <div class><img src="https://raw.githubusercontent.com/simonedinato/SongNext/main/Logo.png" width="200px" align="left"></div><br><br>

## Features

- Discover new music
- Personalize music preferences
- Connect with other music enthusiasts
- Publish and promote songs
- Gain exposure and connect with industry professionals

## Description

SongNext is a platform for music lovers and emerging musicians. It is developed using PHP and has a relational database. It offers features for discovering new music, personalizing music preferences, and connecting with other music enthusiasts. Musicians can use SongNext to showcase and promote their work, gain exposure, and connect with industry professionals. The customization options allow users to create their own playlists, follow favorite artists, and receive personalized recommendations based on their listening habits.

Join the growing community of music lovers and connect with like-minded people who share the same music taste. 



## Getting started 


## DB STRUCTURE

<div align="center">
 <table>
   <tr>
<td><img src="https://raw.githubusercontent.com/simonedinato/SongNext/main/ErDiagram.png" width="500" height="350" /><br>
  <em>ER Diagram</em></td> 
   </tr>
  </table>
</div>
<br>


## PROJECT STRUCTURE
````bash
SongNext
├── Database
│   └── songnext.sql
├── LICENSE
├── README.md
└── Songnext
    ├── accesso.php
    ├── caricamento.php
    ├── commenti.php
    ├── connessione.php
    ├── css
    │   ├── bootstrap.min.css
    │   └── style.css
    ├── deleteaccount.php
    ├── footer.php
    ├── funzioni.php
    ├── header.php
    ├── home.php
    ├── img
    │   └── track.png
    ├── index.php
    ├── logout.php
    ├── profilo.php
    ├── registrazione.php
    └── song
        ├── 1
        ├── AUD-20210520-WA0000.mp3
        ├── yt1s.com - MarMar Oso  Ruthless Lyrics  nice guys always finish last should know that.mp3
        └── yt1s.com - Topic  Breaking Me Lyrics ft A7S.mp3
````

## Getting started

To get started with SongNext, follow these steps:

1. Clone the repository: `git clone https://github.com/<your-username>/SongNext.git`
2. Change into the repository directory: `cd SongNext`
3. Install the dependencies: `composer install`
4. Set up the database: `php bin/console doctrine:database:create`
5. Run the migrations: `php bin/console doctrine:migrations:migrate`
6. Start the development server: `php bin/console server:run`

Remember to config the file [here]!(https://github.com/simonedinato/SongNext/blob/59bd03928e6e1ec063dc303ae12c37ae1076e233/Songnext/connessione.php)

## DOCUMENTATION
You can find the complete documentation [here](https://simonedinato.github.io/Songnext-documentation/)

## Usage

To use SongNext, simply sign up for an account and start exploring the world of music.

