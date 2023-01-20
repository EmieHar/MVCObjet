<?php
namespace Emili\MvcObjet\MvcObjet2\Models\Daos;

use Emili\MvcObjet\MvcObjet2\Models\Entities\Movie;

class MovieDao extends BaseDao{

    public function findAll(){
        $stmt = $this->db->prepare(" SELECT * FROM movie ");
        $res = $stmt->execute();

        if ($res) {
            $movies = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $movies[] = $this->creerObjetFromSql($row);
            }
            return $movies;

        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }


    public function creerObjetFromSql($r){
        
    
        $movie = new Movie();
        $movie->setId($r['id'])
              ->setTitle($r['title'])
              ->setDescription($r['description'])
              ->setDuration($r['duration'])
              ->setDate($r['date'])
           
              ->setGenre($r['genre'])
              ->setDirector($r['director']);
              return $movie;
    }

   
    public function findById($id){
        $stmt = $this->db->prepare(" SELECT * FROM movie WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();

         
        return $this->creerObjetFromSql($res);
    }

    public function recordMovie(Movie $movie,$actors,$file){
        
        try{
    
            $this->db->beginTransaction();
    
            $stmt = $this->db->prepare("INSERT INTO movie ( title, description, coverimage, duration, date, id_director, id_genre) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$movie->getTitle(), $movie->getDescription(), $movie->getCoverImage(), $movie->getDuration(), $movie->getDate(), $movie->getDirector(), $movie->getGenre()]);
            
            $movieId = $this->db->lastInsertId();
            
                foreach($actors as $actor){
                    $sql = $this->db->prepare("INSERT INTO joue (id_acteur, id_movie) VALUES (?,?)");
                    $sql->execute([$actor, $movieId]);
                }

            $this->db->commit();
    
        }  catch(\Exception $e){
            $this->db->rollBack();
            die($e->getMessage());
        }
    
        if(isset($file['coverimage'])) {
            $dossier = 'televersement/'; // non du fichier ou on va copier le fichier
            $fichier = $file['coverimage']['name'];
    
            $extensions = array('png', 'gif', 'jpg', 'jpeg');
            $extension = pathinfo($file['coverimage']['name'], PATHINFO_EXTENSION);
    
            if(in_array(strtolower($extension), $extensions)) {
    
                if(move_uploaded_file($file['coverimage']['tmp_name'], $dossier.$fichier)) {
                        echo 'Upload effectué avec succès !';
                }
                else {
                    echo 'Echec de l\'upload !';
                }
            } else {
                echo "mauvais type de fichier, seuls sont autorisés .png, .gif, .jpg, .jpeg";
            }
        }
    
    }
}



?>