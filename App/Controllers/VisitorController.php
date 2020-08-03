<?php


namespace App\Controllers;


class VisitorController extends Controller
{
    protected $modelName = \App\Models\Visitor::class;

    public function index()
    {

        $visitors = $this->model->findAll();

        $pageTitle = "Manage Visitors";
        /**
         * 2. Affichage
         */
        $this->render('visitors/index', compact('pageTitle', 'visitors'));
    }

    public function show($id = null)
    {
        /**
         * 1. Récupération du param "id" et vérification de celui-ci
         */
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (isset($id) && ctype_digit($id)) {
            $article_id = $id;
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        /**
         * 3. Récupération de l'article en question
         * On va ici utiliser une requête préparée car elle inclue une variable qui provient de l'utilisateur : Ne faites
         * jamais confiance à ce connard d'utilisateur ! :D
         */

        $article = $this->model->find($article_id);

        if (!$article) {
            die("Cet article ne semble pas exister dans notre base de données !");
        }

        /**
         * 4. Récupération des commentaires de l'article en question
         * Pareil, toujours une requête préparée pour sécuriser la donnée filée par l'utilisateur (cet enfoiré en puissance !)
         */

        $commentModel = new \App\Models\Comment();

        $commentaires = $commentModel->findAllByPost($article_id);


        /**
         * 5. On affiche
         */
        $pageTitle = $article->title;

        $this->render('posts/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));
    }
}