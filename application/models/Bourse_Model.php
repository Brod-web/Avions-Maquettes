<?
class Bourse_Model extends MY_Model {

    /* ANNONCES PAR USER(S) */

    public function getUsersAds()
	{
        $query = $this->db->query('SELECT * FROM annonces');
        return $query->result();
    }

    public function getUserAds($userId)
	{
        $this->db->from('annonces');
        $this->db->where('user_id', $userId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getUserAd($adId)
	{
        $this->db->from('annonces');
        $this->db->where('id', $adId);
        $query = $this->db->get();
        return $query->row();
    }

    /* REQUETE ANNONCES SITE */

    public function getCollectionAds($collection)
	{
        $this->db->from('annonces');
        $this->db->where('collection', $collection);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCollectionAdsByDept($collection,$dept)
	{
        $this->db->from('annonces');
        $this->db->where('collection', $collection);
        $this->db->where('dept', $dept);
        $query = $this->db->get();
        return $query->result();
    }

    public function getModelAds($model)
	{
        $this->db->from('annonces');
        $this->db->where('model_id', $model);
        $query = $this->db->get();
        return $query->result();
    }

    public function getModelAdsByDept($model,$dept)
	{
        $this->db->from('annonces');
        $this->db->where('model_id', $model);
        $this->db->where('dept', $dept);
        $query = $this->db->get();
        return $query->result();
    }

    /* GET ANNONCES FAVORITES */

    public function getFavorisAds()
	{
        $this->db->from('annonces');
        $this->db->where('favoris', 'site');
        $query = $this->db->get();
        return $query->result();
    }
}