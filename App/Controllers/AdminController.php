<?php


namespace App\Controllers;


class AdminController extends Controller
{

    protected $modelName = "App\Models\Post";
    protected $viewpath = "Views/Admin";

    public function index()
    {
        $pageTitle = "Todos os posts";

        $posts = $this->model->findAll();

        $this->render('index', compact('pageTitle', 'posts'));
    }

    public function create()
    {

        if(isset($_POST['title'])) {
            /**
             * 1. On vérifie que les données ont bien été envoyées en POST
             * D'abord, on récupère les informations à partir du POST
             * Ensuite, on vérifie qu'elles ne sont pas nulles
             */
            // On commence par l'author
            $title = null;
            if (!empty($_POST['title'])) {
                $title = $_POST['title'];
            }

            // Ensuite le contenu
            $content = null;
            if (!empty($_POST['content'])) {
                // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
                $content = htmlspecialchars($_POST['content']);
            }

            // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
            // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
            if (!$title || !$content) {
                die("Votre formulaire a été mal rempli !");
            }

            /**
             * 2. Vérification que l'id de l'article pointe bien vers un article qui existe
             * Ca nécessite une connexion à la base de données puis une requête qui va aller chercher l'article en question
             * Si rien ne revient, la personne se fout de nous.
             *
             * Attention, on précise ici deux options :
             * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
             * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
             *
             * PS : Ca fait pas genre 3 fois qu'on écrit ces lignes pour se connecter ?!
             */


            if (isset($title) && isset($content)) {

                if ($this->model->insert([$_POST["title"], $_POST["introduction"], $_POST["content"]]))
                {
                    $this->redirect('index');
                }
            }
        }
        $pageTitle = "Novo post";

        $this->render('create', compact('pageTitle'));
    }

    public function edit($id = null)
    {

        $post_id = null;

        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (isset($id) && ctype_digit($id)) {
            $post_id = $id;
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$post_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }


        /**
         * 3. Récupération de l'article en question
         * On va ici utiliser une requête préparée car elle inclue une variable qui provient de l'utilisateur : Ne faites
         * jamais confiance à ce connard d'utilisateur ! :D
         */

        $post = $this->model->find($post_id);

        if (!$post) {
            die("Cet article ne semble pas exister dans notre base de données !");
        }


        if (isset($_POST["title"]))
        {
            if ($this->model->edit($id, $_POST["title"], $_POST["introduction"], $_POST["content"]))
            {
                $this->redirect('index');
            }
        }

        $pageTitle = "Editar post";

        $this->render('edit', compact('pageTitle', 'post', 'post_id'));

    }

}