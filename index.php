<?php

// Muodosta tietokantayhteys
require_once('db.php'); // Ota db-php-tiedosto käyttöön
$conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota,
//joka avaa tietokantayhteyden

// Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
// Tarkistukset yms
// Aja kysely kantaan
// Tallenna vastaus muuttujaan
// Tulosta otsikko
// Avaa ul-elementti
 // Tulosta jokaiselle riville li-elementti

//////////////////////////////////////////////

$sql = "SELECT `primary_title`
FROM `titles` INNER JOIN title_genres
ON titles.title_id = title_genres.title_id
WHERE genre LIKE '%Comedy%' 
LIMIT 10;";

$prepare = $conn->prepare($sql);
$prepare->execute();

$rows = $prepare->fetchAll();

$html = '<h1>Komedioita</h1>';

$html .= '<ul>';
foreach($rows as $row) {
    $html .='<li>' .$row['primary_title'] . '</li>';
}
$html .= '</ul>';
echo $html;

///////////////////////

$sql = "SELECT `name_`
FROM `names_` 
WHERE birth_year LIKE '1950'
LIMIT 10";

$prepare = $conn->prepare($sql);
$prepare->execute();

$rows = $prepare->fetchAll();

$html = '<h1>Vuonna 1950-syntyneet näyttelijät</h1>';

$html .= '<ul>';
foreach($rows as $row) {
    $html .='<li>' .$row['name_'] . '</li>';
}
$html .= '</ul>';
echo $html;

/////////////////////////////////


$html = '<h3>Moi Meija! Mun kone meni ihan tilttiin  kun tein noita hakuja niin tuossa on vaan pari.
Pistän tähän pari hakulausetta lisää mutta en tiedä toimivatko ne. T. Suvi</h3>';

echo $html;

$html = '<p>SELECT `season_number`<br>
FROM `episode_belongs_to`INNER JOIN titles <br>
ON episode_belongs_to.season_number = titles.primary_title <br>
WHERE season_number LIKE 5 <br>
LIMIT 10;</p>';

echo $html;

$html = '<p>SELECT `average_rating` <br>
FROM `title_ratings`INNER JOIN titles <br>
ON title_ratings.average_rating = titles.primary_title <br>
WHERE average_rating BETWEEN 7 AND 10 <br>
LIMIT 10; </p>';

echo $html;

echo "<body style='background-color:#E9CEDF'>";

