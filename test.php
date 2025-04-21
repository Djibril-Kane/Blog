<?php
    // $chiffre = 8;
    // $chiffre = 12;
    // $chiffre = "YOOOO";
    // $tableau_article = ["valeur 1", 1, 'valeur 2'];
    // echo $chiffre;
    /*echo $tableau_article[1];
    echo"Le chiffre est: $chiffre";
    echo 'Le chiffre est : $chiffre';
    echo 'Le chiffre est : ' .  $chiffre . 'feuribou';
    echo'J\'ai faim';
    echo"infoprog dit : \"le web c bien \"";
    */
    // echo 'Votre nom est : ' . $_GET["nom"] . ' et votre pseudo est : ' . $_GET["pseudo"];
    // define("CHIFFRE", 2); //constante et on peut pas la modifier
    // echo CHIFFRE; 
    // $chaine = "yoooooo utt rrr " . "fffff";
    // $chaine = "Bonjour ";
    // $chaine1 = "Dio";
    // $chaine .= $chaine1; // au lieu de $chaine = $chaine . $chaine1
    // echo $chaine;

    // $nombre = 2;
    // $nombre ++;
    // echo $nombre;
    // $ert = 3;
    // $ort = 4;
    // echo $ert!=$ort;
    // if ($ert == 3 && $ort == 5) {
    //     echo"YOOO steve"; 
    // }
    // else {
    //     echo "Oshinoko";
    // }
    // $nombre = 2;
    // ($nombre > 8) ? $nombre++ : $nombre+= 5;
    // echo $nombre;

    // switch ($ert) {
    //     case 3 : echo "Bjr"; break;
    //     case 4: echo "YOOOO"; break;
    //     default: echo "FRT";  break;
    // }

    // $x = 4;
    // $i = 1;
    // // while ($i <= 4) {
    // //     echo $i;
    // //     $i++;
    // // }

    // do {
    //     echo $i;
    //     $i++;
    // } while ($i <= 10);

    // for ($i=1; $i < 6 ; $i++) { 
    //     echo "Bonjour Joeur $i <br>";
    // }

    // $articles = [
    //     [
    //         "id"=> 1,
    //         "title"=> "Article 1",
    //         "accroche"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae sequi eius eos.",
    //         "publication"=> "2015-11-10 18:25",
    //         "image"=> "https://picsum.photos/640/480",
    //     ],
    //     [
    //         "id"=> 2,
    //         "title"=> "Article 2",
    //         "accroche"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto atque incidunt porro ad quae sint.",
    //         "publication"=> "2015-11-10 18:35",
    //         "image"=> "https://picsum.photos/640/480",
    //     ],
    //     [
    //         "id"=> 3,
    //         "title"=> "Article 3",
    //         "accroche"=> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto porro ad quae sint, doloremque molestiae qui recusandae repudiandae sequi eius eos.",
    //         "publication"=> "2015-11-10 18:20",
    //         "image"=> "https://picsum.photos/640/480",
    //     ]
    // ];

    // foreach ($articles as $produit) {
    //     if ($produit["id"] == 2) {
    //         continue;
    //     }
    //     echo $produit["title"] . "<br>";     
    // }
    // include("index.php");
    // include("index.php"); // ca le met deux fois
    // include_once("index.php");
    // $heure =  date("Y-m-d H:i");
    // echo"Il est $heure";

    // $dsn = 'mysql:dbname=blog;host=localhost';
    // $user = 'root';
    // $password = '';

    // try {
    //     $bdd = new PDO($dsn, $user, $password);
    // }
    // catch(PDOException $e) {
    //     echo 'Connexion echoue : ' . $e->getMessage();
    // }

    // $articles = $bdd->query('SELECT * FROM articles');
    // print_r($articles->fetchAll());
    // print_r($articles->fetch());

    // while($article = $articles->fetch()) {
    //     echo $article["image"] . "<br>";
    // }

    // $articles = $articles->fetchAll();
    // // foreach ($articles as $article) {
    // echo $articles;
        
    // }

    // $id = 1;
    // $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    // $article->execute([$id]);

    // $article = $article->fetch();
    // echo $article["titre"];

    echo(password_hash("xene", PASSWORD_DEFAULT));
    

    

