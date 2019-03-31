<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

//J'utilise une table user avec 3 colonnes --> id (clé primaire) / identifiant (varchar 255) / mdp (varchar 255)

class DataBase{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query($sql){
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

$container = $app -> getContainer();
$container['pdo'] = function (){
    $pdo = new PDO('mysql:dbname=tp5web;host=localhost','root','1234');
    $pdo-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
};
$container['db'] = function($container){
    return new DataBase($container->pdo);
};

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/getToken', function (Request $request, Response $response, array $args) {
    $this->logger->info("Slim-Skeleton '/' route");
    $token = sha1(date('Y-m-d'));
    $retour=['token'=>$token];
    return $response->withJson($retour);
});

$app->post('/login',function (Request $request,Response $response, array $args){
    $tok = sha1(date('Y-m-d'));

    $param = $request->getParsedBody();
    $token = $param['token'];
    if($token != $tok){
        $retour = ['verif' => 'pasOK', 'verif2' => $verif];
        return $response->withJson($retour);
    }
    $sql = "UPDATE partie SET etat = 'finie' WHERE etat = 'en cours'";
    $this->pdo->exec($sql);
    $id = $param['identifiant'];
    $mdp = $param['mdp'];
    $verif = $this->db->query("SELECT * FROM user WHERE identifiant = '$id' AND mdp = '$mdp'");
    if($verif['0']['mdp'] == $mdp){
        $retour = ['verif' => 'OK', 'verif2' => $verif];
        return $response->withJson($retour);
    }else{
        $retour = ['verif' => 'pasOK', 'verif2' => $verif];
        return $response->withJson($retour);
    }
});



$app->post('/register',function (Request $request,Response $response, array $args){
    $param = $request->getParsedBody();

    $tok = sha1(date('Y-m-d'));
    $token = $param['token'];
    $user = $this->db->query('SELECT * FROM user');
    if($token != $tok){
        $retour=['id'=>$user];
        return $response->withJson($retour);
    }

    $id = $param['identifiant'];
    $mdp = $param['mdp'];
    $sql = "INSERT INTO user (id, identifiant, mdp) VALUES (NULL, '$id', '$mdp');";
    $this->pdo->exec($sql);
    $retour=['id'=>$user];
    return $response->withJson($retour);
});

$app->post('/play/games',function (Request $request,Response $response, array $args) {
    $param = $request->getParsedBody();
    $pseudo = $param['pseudo'];
    $sql = "INSERT INTO partie (id, utilisateur, ville, score, etat) VALUES (NULL, '$pseudo', 'Belfort', 0, 'en cours');";
    $this->pdo->exec($sql);
    $sql = "SELECT id FROM partie WHERE utilisateur ='$pseudo' and etat = 'en cours'";
    $retour = $this->db->query($sql);
    return $response->withJson($retour);
});

$app->get('/play/{id}/games',function (Request $request,Response $response, array $args) {
    $sql = "SELECT ville FROM partie WHERE etat = 'en cours'";
    $ville = $this->db->query($sql);
    $ville2 = $ville['0']['ville'];
    $sql = "SELECT * FROM images WHERE ville = '$ville2'";
    $retour = $this->db->query($sql);
    return $response->withJson($retour);
});

$app->post('/play/games/fin',function (Request $request,Response $response, array $args) {
    $param = $request->getParsedBody();
    $score = $param['score'];
    $id = $param['id'];
    $sql = 'UPDATE partie SET score = '.$score.', etat = \'finie\' WHERE id = '.$id.';';
    $this->pdo->exec($sql);
    return $response ->withJson($param);
});

/*
$test = $request->getParsedBody();
    $id = $test['identifiant'];
    $mdp = $test['mdp'];
    $this->db->query('INSERT INTO user (id, identifiant, mdp) VALUES (NULL, '.$id.', '.$mdp.');');
    $retour = ['id'=>$test['identifiant']];
    return $response-> withJson($retour);
*/