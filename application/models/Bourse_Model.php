<?
class Bourse_Model extends MY_Model {

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
}