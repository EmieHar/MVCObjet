<?php
namespace Emili\MvcObjet\MvcObjet2\Models\Daos;

use Emili\MvcObjet\MvcObjet2\Models\Entities\Genre;

class GenreDao extends BaseDao{

    public function findAll(){
        $stmt = $this->db->prepare(" SELECT * FROM genre ");
        $res = $stmt->execute();

        if ($res) {
            $genres = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $genres[] = $this->creerObjetFromSql($row);
            }
            return $genres;

        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function creerObjetFromSql($r){
        $genre = new Genre();
        $genre->setId($r['id'])->setName($r['name']);

        return $genre;
    }

    public function findOne($id){
        $stmt = $this->db->prepare(" SELECT * FROM genre WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();

        $genre = new Genre();
        $genre->setId($res['id'])->setName($res['name']);
        
        return $genre;
    }

    public function findByMovie($id){
        $stmt = $this->db->prepare(" SELECT * FROM genre, movie WHERE genre.id = movie.id_genre AND movie.id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();

        $genre = new Genre();
        $genre->setId($res['id'])->setName($res['name']);

        return $genre;
    
    }
}


?>