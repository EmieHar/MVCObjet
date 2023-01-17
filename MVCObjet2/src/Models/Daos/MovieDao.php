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
              ->setduration($r['duration'])
              ->setDate($r['date'])
              ->setCoverImage($r['coverimage']);
            //   ->setGenre($r['genre'])
            //   ->setRealisateur($r['realisateur'])
            //   ->setActors($r['actor']);

        return $movie;
    }

    public function findOne($id){
        $stmt = $this->db->prepare(" SELECT * FROM movie WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();

        $movie = new Movie();
        $movie->setId($res['id'])
              ->setTitle($res['title'])
              ->setDescription($res['description'])
              ->setduration($res['duration'])
              ->setDate($res['date'])
              ->setCoverImage($res['coverimage']);
            //   ->setGenre($res['genre'])
            //   ->setRealisateur($res['realisateur'])
            //   ->setActors($res['actor']);
        return $movie;
    }
}


?>