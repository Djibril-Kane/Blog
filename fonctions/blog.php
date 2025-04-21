<?php
function articles() {
    global $bdd;
    $articles = $bdd->query("SELECT id, titre, accroche, publication, image FROM articles ORDER BY id DESC");
    $articles = $articles->fetchAll();
    
    return $articles;
}

function lire_article() {
    global $bdd;
    $id = (int)$_GET["id"];
    $article = $bdd->prepare("SELECT id, titre, accroche, publication, image FROM articles WHERE id = ?");
    $article->execute([$id]);
    $article = $article->fetch();

    if (empty($article)) {
        header("Location: index.php");
    } else {
        return $article;
    }
}

function formattage_date($publication) {
    $publication = explode(" ", $publication);
    $date = explode("-", $publication[0]);
    $heure = explode(":", $publication[1]);
    
    $mois = [" ", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    
    $resultat = $date[2] . ' ' . $mois[(int)$date[1]] . ' ' . $date[0] . ' à ' . $heure[0] . 'h' . $heure[1]; 
    
    return $resultat;
}

function nb_commentaires() {
    global $bdd;
    $id_article = (int)$_GET["id"];
    $nb_comment = $bdd->prepare("SELECT COUNT(*) FROM commentaires WHERE id_article = ?");
    $nb_comment->execute([$id_article]);
    $nb_comment = $nb_comment->fetch()[0];

    return $nb_comment;
} 

function comment() {
    global $bdd;
    $id_article = (int)$_GET["id"];
    $commentaire = $bdd->prepare("SELECT commentaires.*, membres.pseudo FROM commentaires INNER JOIN membres ON commentaires.id_membre = membres.id AND commentaires.id_article = ?");
    $commentaire->execute([$id_article]);
    $commentaire = $commentaire->fetchAll();

    return $commentaire;
}

function recherche() {
    global $bdd;
    extract($_POST);
    $recherche = $bdd->prepare("SELECT id, titre, accroche, contenu, publication, image FROM articles WHERE titre LIKE :query OR contenu LIKE :query ORDER by id DESC");
    $recherche->execute([
        "query" => '%' . $query . '%'
    ]);
    $recherche = $recherche->fetchAll();

    return $recherche;
}

function comment_user() {
    global $bdd;
    $commentaires = $bdd->prepare("SELECT commentaires.*, articles.titre FROM commentaires INNER JOIN articles ON commentaires.id_article = articles.id AND commentaires.id_membre = ?");
    $commentaires->execute([$_SESSION["membre"]]);
    $commentaires = $commentaires->fetchAll();

    return $commentaires;

}
function commenter() {
    if (isset($_SESSION["membre"])) {
        global $bdd;
        $erreur = "";
        extract($_POST);
        if (!empty($commentaire)) {
            $id_article = (int)$_GET["id"];
            $commentaries = $bdd->prepare("INSERT INTO commentaires(id_membre, id_article, commentaire) VALUES(:id_membre, :id_article, :commentaire)");
            $commentaries->execute([
                "id_membre"=> $_SESSION["membre"],
                "id_article"=> $id_article,
                "commentaire"=> nl2br(htmlentities($commentaire)),
            ]);
        }
        else {
            $erreur .= "Vous devez ecrire du texte";
        }

        return $erreur;
    }
    
}