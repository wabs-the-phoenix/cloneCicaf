<?php
namespace App\Model;
use App\Core\Database;


class Model extends Database
{
    protected $table;
    private $db;

    /**éation de notre CRUD
     * cr
     * @method mixed findBy()
     */

    public function findBy($criteres)
    {
        $champs=[];
        $valeurs=[];
        foreach($criteres as $champ => $valeur){
            $champs[]="$champ=?";
            $valeurs[]=$valeur;
        }
        $liste_champs=implode(" AND ", $champs);
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '.$liste_champs, $valeurs)->fetchAll();
    }
    public function findByNotNull($criteres) {
        $champs=[];
        $valeurs=[];
        foreach($criteres as $champ => $valeur){
            $champs[]="$champ IS $valeur";
        }
        $liste_champs=implode(" AND ", $champs);
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '.$liste_champs." ORDER BY id".$this->table. " DESC")->fetchAll();
    }
    public function findByNull($criteres) {
        $champs=[];
        $valeurs=[];
        foreach($criteres as $champ => $valeur){
            $champs[]="$champ IS $valeur";
        }
        $liste_champs=implode(" AND ", $champs);
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '.$liste_champs." ORDER BY id".$this->table. " DESC")->fetchAll();
        
    }
    public function findLike($criteres)
    {
        $champs=[];
        $valeurs=[];
        foreach($criteres as $champ => $valeur){
            $champs[]="$champ LIKE ?";
            $valeurs[]=$valeur."%";
        }
        $liste_champs=implode(" AND ", $champs);
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '.$liste_champs, $valeurs)->fetchAll();
    }

    public function findAll(int $limit=null){

        $nbre=" LIMIT ".$limit;
        $sql="SELECT * FROM ".$this->table." ORDER BY id".$this->table. " DESC";
        if($limit!=null){
            $sql.=$nbre;
        }
        $query=$this->requete($sql);
        return $query->fetchAll();
    }
    public function countBy ($criteres) {
        $champs=[];
        $valeurs=[];
        foreach($criteres as $champ => $valeur){
            $champs[]="$champ=?";
            $valeurs[]=$valeur;
        }
        $liste_champs=implode(" AND ", $champs);
        return $this->requete('SELECT COUNT(*) AS lignes FROM '.$this->table.' WHERE '.$liste_champs, $valeurs)->fetch();
    }
    public function countNull($criteres) {
        $champs=[];
        $valeurs=[];
        foreach($criteres as $champ => $valeur){
            $champs[]="$champ IS ".$valeur;
        }
        $liste_champs=implode(" AND ", $champs);
        return $this->requete('SELECT COUNT(*) AS lignes FROM '.$this->table.' WHERE '.$liste_champs)->fetch();
    }
    public function count() {
        $sql="SELECT COUNT(*) AS lignes FROM ".$this->table;
        $query=$this->requete($sql);
        return $query->fetch();
    }

    /**
     * Trouver ue valeur dans la base des données par Id
     *
     * @param [int] $id
     * @return void
     */
    public function find($id){
        //$table=(substr($this->table,0,2)=="V_")? ucfirst(str_replace('V_','',$this->table)):$this->table;
        return $this->requete('SELECT * FROM '.$this->table.' WHERE id'. $this->table.'=?', [$id])->fetch();
    }

    /**
     * Trouver le dernier enregistrement de la collection
     *
     * @return id
     */
    public function findLast(){
        return $this->requete('SELECT LAST_INSERT_ID() as id FROM '.$this->table.' ')->fetch();
    }

    /**
     * public create
     * @method mixed Create()
     */
    public function Create($model){
        //initialisation des champs
        $champs=[];
        $inters=[];
        $valeurs=[];
        foreach($model as $champ => $valeur){
            if($valeur!=null && $champ!='db' && $champ!='table'){
                $champs[]=$champ;
                $inters[]='?';
                $valeurs[]=$valeur;
            }
        }
        $liste_champs=implode(", ", $champs);
        $liste_inters=implode(", ", $inters);
        return $this->requete('INSERT INTO '.$this->table.' ('.$liste_champs.') VALUES ('.$liste_inters.')', $valeurs);
    }
    public function update($id, $model)
    {
        $champs=[];
        $valeurs=[];
        foreach($model as $champ => $valeur){
            if($valeur!=null && $champ!='db' && $champ!='table'){
                $champs[]="$champ=?";
                $valeurs[]=$valeur;
            }
        }
        $liste_champs=implode(", ", $champs);
        return $this->requete('UPDATE '.$this->table.' SET '.$liste_champs.' WHERE id'.$this->table.'='.$id.'' , $valeurs);
    }
    public function Supprimer($id){
        return $this->requete('DELETE FROM '.$this->table.' WHERE id'.$this->table.'=?', [$id]);
    }


    public function requete($sql, $attributs=array()){
        $this->db=Database::getInstance();
        if ($attributs!==null) {
            $query=$this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        }else {
            return $this->db->query($sql);
        }
    }
    /**
     * Fonction de l'hydratation (pour la récupération des données du formulaire)
     *
     * @param [array] $dataTable
     * @return objet
     */
    public function hydrated($dataTable){
        //répupération des données du tableau
        foreach ($dataTable as $key => $value) {
            //création de la valeur du setter exemple setNom
            $setter='set'.ucfirst($key);
            //vérification de l'existance de la méthode
            if (method_exists($this, $setter)) {
                //application de la méthode dans l'hydratation
                $this->$setter($value);
            }
        }
        //retour de l'objet
        return $this;

    }
}