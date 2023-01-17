<?php
namespace Emili\MvcObjet\MvcObjet1\Models\Daos;

use Emili\MvcObjet\MvcObjet1\Models\Entities\Realisateur;

class RealisateurDao extends BaseDao{

    public function findAll(){
        $stmt = $this->db->prepare(" SELECT * FROM realisateur ");
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
        $realisateur->setId($r['id'])->setPrenom($r['prenom'])->setNom($r['nom']);

        return $realisateur;
    }

    public function findOne($id){
        $stmt = $this->db->prepare(" SELECT * FROM realisateur WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();

        $real = new Realisateur();
        $real->setId($res['id'])->setPrenom($res['prenom'])->setNom($res['nom']);
        return $real;
    }
}


?>