<?php
namespace Emili\MvcObjet\MvcObjet1\Models\Daos;

use Emili\MvcObjet\MvcObjet1\Models\Entities\Actor;

class ActorDao extends BaseDao{

    public function findAll(){
        $stmt = $this->db->prepare(" SELECT * FROM actor ");
        $res = $stmt->execute();

        if ($res) {
            $actors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $actors[] = $this->creerObjetFromSql($row);
            }
            return $actors;

        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }


    public function creerObjetFromSql($r){
        $actor = new Actor();
        $actor->setId($r['id'])->setFirstname($r['firstname'])->setLastname($r['lastname']);

        return $actor;
    }

    public function findOne($id){
        $stmt = $this->db->prepare(" SELECT * FROM actor WHERE id = ?");
        $stmt->execute([$id]);
        $res = $stmt->fetch();

        $acteur = new Actor();
        $acteur->setId($res['id'])->setFirstname($res['firstname'])->setLastname($res['lastname']);
        return $acteur;
    }
}


?>