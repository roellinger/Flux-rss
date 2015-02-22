<?php

session_start();

Class User
{
    
    
    private $_nbrArt;
    private $_perPage;
    private $_cPage;
    private $_nbPage;
    private $_db;
    
    public function __construct()
    {
        
        try {
            $this->_db = new PDO('mysql:host=localhost;dbname=flux_rss', 'root', '');
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
    }
    
    public function inscription($login, $firstname, $lastname, $mail, $password)
    {
        
        $login_entities     = addslashes(htmlentities($login));
        $firstname_entities = addslashes(htmlentities($firstname));
        $lastname_entities  = addslashes(htmlentities($lastname));
        $mail_entities      = addslashes(htmlentities($mail));
        $password_entities  = addslashes(htmlentities($password));
        
        if ($login && $firstname && $lastname && $mail && $password) {
            
            $dataInscription = "SELECT * from user WHERE mail ='$mail'";
            $reponse         = $this->_db->prepare($dataInscription);
            $reponse->execute();
            $value = $reponse->fetchAll();
            $rows  = $reponse->rowCount();
            
            if ($rows == 0) {
                
                $inscription = "INSERT INTO user (login, firstname, lastname, mail, password) VALUES (:login, :firstname, :lastname, :mail, :password)";
                $reussite    = $this->_db->prepare($inscription);
                $reussite->bindParam(':login', $login_entities, PDO::PARAM_STR);
                $reussite->bindParam(':firstname', $firstname_entities, PDO::PARAM_STR);
                $reussite->bindParam(':lastname', $lastname_entities, PDO::PARAM_STR);
                $reussite->bindParam(':mail', $mail_entities, PDO::PARAM_STR);
                $reussite->bindParam(':password', $password_entities, PDO::PARAM_STR);
                
                $reussite->execute();
                
                // var_dump($inscription);
                $value = $reussite->fetchAll();
                header("location: index.php");
                
                
            } else {
                
                echo "Email deja utilisé";
            }
        }
        
    }
    
    
    public function connexion($mail = "", $mdp = "")
    {
        
        if ($mail && $mdp) {
            
            $inscription = "SELECT * FROM user WHERE mail = :mail AND password = :password OR  login = :mail AND password = :password ";
            $reussite    = $this->_db->prepare($inscription);
            $reussite->bindParam(':mail', $mail, PDO::PARAM_STR);
            $reussite->bindParam(':password', $mdp, PDO::PARAM_STR);
            $reussite->execute();
            $reussite1 = $reussite->fetch();
            $rows      = $reussite->rowCount();
            
            if ($rows == 1) {
                
                $_SESSION['nom'] = $reussite1['login'];
                setcookie("userid", $reussite1['id_user']);
                header("location: accueil.php");
                
            } else {
                
                echo "Pas de resultat";
                
            }
            
        }
        
        
    }
    
    public function deconnexion($deco)
    {
        
        if ($deco) {
            session_start();
            session_destroy();
            setcookie('userid');
            header("location: index.php");
        }
    }
    
    
    public function updateUser($login, $localisation, $naissance, $description)
    {
        
        $dataUpdate = "UPDATE user set login = :login, localisation = :localisation, naissance = :naissance, description = :description";
        $reussite   = $this->_db->prepare($dataUpdate);
        $reussite->bindParam(':login', $login, PDO::PARAM_STR);
        $reussite->bindParam(':localisation', $localisation, PDO::PARAM_STR);
        $reussite->bindParam(':naissance', $naissance, PDO::PARAM_STR);
        $reussite->bindParam(':description', $description, PDO::PARAM_STR);
        $reussite->execute();
        
        header("location: profil.php");
        
    }
    
    
    public function getDescriptionUser($id)
    {
        
        
        $getDescriptionUser = "SELECT mail,lastname, firstname, login, localisation, naissance, description FROM `user` WHERE id_user = :id";
        $reussite           = $this->_db->prepare($getDescriptionUser);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return $reussite->fetchAll();
    }
    
    public function addFlux($id, $url)
    {
        
        $pos = strpos($url, "xml");
        
        if ($pos) {
            if (!empty($url)) {
                
                if (filter_var($url, FILTER_VALIDATE_URL)) {
                    
                    $file = $_POST['flux'];
                    $file = simplexml_load_file($file);
                    
                    foreach ($file->channel as $v) {
                        
                        $addFlux  = "INSERT INTO flux_rss (id_user, url, title, description, image) VALUES(:id, :url, :title, :description,  :image)";
                        $reussite = $this->_db->prepare($addFlux);
                        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
                        $reussite->bindParam(':url', $url, PDO::PARAM_STR);
                        $reussite->bindParam(':title', $v->title, PDO::PARAM_STR);
                        $reussite->bindParam(':description', $v->description, PDO::PARAM_STR);
                        $reussite->bindParam(':image', $v->image->url, PDO::PARAM_STR);
                        $reussite->execute();
                        
                        header("location: flux.php");
                    }
                    
                } else {
                    
                    $error = "Veuillez saisir une url valide !";
                }
            }
            
            return array(
                $error
            );
        }
    }
    
    
    public function getFlux($id)
    {
        
        $countFlux = "SELECT count('id_flux') as 'nbrArt' from flux_rss where id_user = :id and activate = 0 order by id_flux desc";
        $reussite  = $this->_db->prepare($countFlux);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        $data = $reussite->fetch();
        
        $this->_nbrArt  = $data[0];
        $this->_perPage = 4;
        $this->_cPage   = 1;
        $this->_nbPage  = ceil($this->_nbrArt / $this->_perPage);
        
        if (isset($_GET['p'])) {
            
            $this->_cPage = $_GET['p'];
            
        } else {
            
            $this->_cPage = 1;
        }
        $data  = "";
        $data1 = "";
        
        for ($i = 1; $i <= $this->_nbPage; $i++) {
            
            if ($i == $this->_cPage) {
                
                $data  = $data . " $i /";
                $data1 = $data1 . " $i /";
                
            } else {
                
                $data  = $data . " <a href=\"profil.php?p=$i\">$i</a> /";
                $data1 = $data1 . " <a href=\"flux.php?p=$i\">$i</a> /";
            }
        }
        
        $addFlux  = "SELECT * FROM flux_rss WHERE id_user = :id and activate = 0 limit  " . (($this->_cPage - 1)) * $this->_perPage . " ,$this->_perPage";
        $reussite = $this->_db->prepare($addFlux);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return array(
            $reussite->fetchAll(),
            $data,
            $data1
        );
        
    }
    
    public function getFlux1($id)
    {
        
        $addFlux  = "SELECT * FROM flux_rss WHERE id_user = :id and activate = 0 ";
        $reussite = $this->_db->prepare($addFlux);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return $reussite;
        
        
    }
    
    
    public function getFluxUser($id)
    {
        
        $addFlux  = "SELECT * FROM flux_rss WHERE id_flux = :id";
        $reussite = $this->_db->prepare($addFlux);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        
        foreach ($reussite as $v) {
            
            $file = simplexml_load_file($v['url']);
        }
        
        return $file;
        
    }
    
    
    public function deleteFlux($id)
    {
        
        $tabCheckbox = $_POST['checkbox'];
        foreach ($tabCheckbox as $v) {
            
            $addFlux  = "UPDATE flux_rss SET activate = 1 WHERE id_flux = :checkbox and id_user = :id";
            $reussite = $this->_db->prepare($addFlux);
            $reussite->bindParam(':id', $id, PDO::PARAM_INT);
            $reussite->bindParam(':checkbox', $v, PDO::PARAM_INT);
            $reussite->execute();
            
        }
        
    }
    
    public function countFluxAdd($id)
    {
        
        $countFluxAdd = "SELECT COUNT(id_flux) FROM flux_rss WHERE id_user = :id";
        $reussite     = $this->_db->prepare($countFluxAdd);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return $reussite;
    }
    
    public function countFluxSupp($id)
    {
        
        $countFluxSupp = "SELECT COUNT(id_flux) FROM flux_rss WHERE id_user = :id and activate = 1";
        $reussite      = $this->_db->prepare($countFluxSupp);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return $reussite;
    }
    
    public function countFluxAct($id)
    {
        
        $countFluxSupp = "SELECT COUNT(id_flux) FROM flux_rss WHERE id_user = :id and activate = 0";
        $reussite      = $this->_db->prepare($countFluxSupp);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return $reussite;
    }
    
    public function getFluxPersoUser($id)
    {
        
        $countFlux = "SELECT count('id_flux') as 'nbrArt' from flux_rss where id_user = :id";
        $reussite  = $this->_db->prepare($countFlux);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        $data = $reussite->fetch();
        
        $this->_nbrArt  = $data[0];
        $this->_perPage = 4;
        $this->_cPage   = 1;
        $this->_nbPage  = ceil($this->_nbrArt / $this->_perPage);
        
        if (isset($_GET['p'])) {
            
            $this->_cPage = $_GET['p'];
            
        } else {
            
            $this->_cPage = 1;
        }
        $data  = "";
        $data1 = "";
        
        for ($i = 1; $i <= $this->_nbPage; $i++) {
            
            if ($i == $this->_cPage) {
                
                $data = $data . " $i /";
                
            } else {
                
                $data = $data . " <a href=\"addFlux.php?p=$i\">$i</a> /";
            }
        }
        
        $getFluxPersoUser = "SELECT * FROM flux_rss WHERE id_user = :id limit " . (($this->_cPage - 1)) * $this->_perPage . " ,$this->_perPage";
        $reussite         = $this->_db->prepare($getFluxPersoUser);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return array(
            $reussite->fetchAll(),
            $data
        );
        
        
    }
    
    public function getFluxPersoSupp($id)
    {
        
        $countFlux = "SELECT count('id_flux') as 'nbrArt' from flux_rss where id_user = :id and activate = 1";
        $reussite  = $this->_db->prepare($countFlux);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        $data = $reussite->fetch();
        
        $this->_nbrArt  = $data[0];
        $this->_perPage = 4;
        $this->_cPage   = 1;
        $this->_nbPage  = ceil($this->_nbrArt / $this->_perPage);
        
        if (isset($_GET['p'])) {
            
            $this->_cPage = $_GET['p'];
            
        } else {
            
            $this->_cPage = 1;
        }
        $data  = "";
        $data1 = "";
        
        for ($i = 1; $i <= $this->_nbPage; $i++) {
            
            if ($i == $this->_cPage) {
                
                $data = $data . " $i /";
                
            } else {
                
                $data = $data . " <a href=\"delete_flux.php?p=$i\">$i</a> /";
            }
        }
        
        $getFluxPersoUser = "SELECT * FROM flux_rss WHERE id_user = :id and activate = 1 limit " . (($this->_cPage - 1)) * $this->_perPage . " ,$this->_perPage";
        $reussite         = $this->_db->prepare($getFluxPersoUser);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return array(
            $reussite->fetchAll(),
            $data
        );
        
        
    }
    
    public function modifParam($id, $login, $mail)
    {
        
        $modifParam = "UPDATE user set login = :login, mail = :mail where id_user = :id";
        $reussite   = $this->_db->prepare($modifParam);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->bindParam(':login', $login, PDO::PARAM_STR);
        $reussite->bindParam(':mail', $mail, PDO::PARAM_STR);
        $reussite->execute();
        
        header("location: settings.php");
    }
    
    public function getChoixSelect($id)
    {
        
        
        $dataSelect = "select * from flux_rss where id_user = :id and activate = 0";
        $reussite   = $this->_db->prepare($dataSelect);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return $reussite;
        
    }
    
    public function GetFLuxAccueil()
    {
        
        $countFlux = "SELECT count('id_suggest') as 'nbrArt' from suggest_flux";
        $reussite  = $this->_db->prepare($countFlux);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        $data = $reussite->fetch();
        
        $this->_nbrArt  = $data[0];
        $this->_perPage = 9;
        $this->_cPage   = 1;
        $this->_nbPage  = ceil($this->_nbrArt / $this->_perPage);
        
        if (isset($_GET['p'])) {
            
            $this->_cPage = $_GET['p'];
            
        } else {
            
            $this->_cPage = 1;
        }
        $data = "";
        
        for ($i = 1; $i <= $this->_nbPage; $i++) {
            
            if ($i == $this->_cPage) {
                
                $data = $data . " $i /";
                
            } else {
                
                $data = $data . " <a href=\"accueil.php?p=$i\">$i</a> /";
            }
        }
        
        $GetFLuxAccueil = "SELECT * from suggest_flux inner join user on user.id_user = suggest_flux.id_user limit " . (($this->_cPage - 1)) * $this->_perPage . " ,$this->_perPage";
        $reussite       = $this->_db->prepare($GetFLuxAccueil);
        $reussite->execute();
        return array(
            $reussite->fetchAll(),
            $data
        );
        
    }
    
    public function countFluxFavoris($id)
    {
        
        $countFluxFavoris = "UPDATE flux_rss SET count_flux = count_flux +1 WHERE id_flux = :id";
        $reussite         = $this->_db->prepare($countFluxFavoris);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        
    }
    
    public function getFluxFavoris($id)
    {
        
        $getFluxFavoris = "SELECT id_flux, max(count_flux), url FROM `flux_rss` WHERE id_user = :id";
        $reussite       = $this->_db->prepare($getFluxFavoris);
        $reussite->bindParam(':id', $id, PDO::PARAM_INT);
        $reussite->execute();
        return $reussite;
    }
    
    
}

?>