<?php
namespace Emili\MvcObjet\MvcObjet2\Models\Daos;

use Emili\MvcObjet\MvcObjet2\Models\Entities\Realisateur;

class RealisateurDao extends BaseDao{

    public function findAll(){
        $stmt = $this->db->prepare(" SELECT * FROM director ");
        $res = $stmt->execute();

        if ($res) {
            $realisateurs = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $realisateurs[] = $this->creerObjetFromSql($row);
            }
            return $realisateurs;

        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function creerObjetFromSql($r){
        $realisateur = new Realisateur();
        $realisateur->setId($r['id'])->setPrenom($r['firstname'])->setNom($r['lastname']);

        return $realisateur;
    }

    public function findOne($id){
        $stmt = $this->db->prepare(" SELECT * FROM director WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();

        $real = new Realisateur();
        $real->setId($res['id'])->setPrenom($res['firstname'])->setNom($res['lastname']);
        return $real;
    }

    public function findByMovie($id){
        $stmt = $this->db->prepare(" SELECT * FROM director, movie WHERE director.id = movie.id_director AND movie.id = ? ");
        $stmt->execute([$id]);

        $res = $stmt->fetch();

        $real = new Realisateur();
        $real->setId($res['id'])->setPrenom($res['firstname'])->setNom($res['lastname']);
        return $real;
    }
}


?>