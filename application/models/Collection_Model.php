<?
class Collection_Model extends MY_Model {

    public function getCollections()
	{
        $query = $this->db->query('SELECT * FROM collection');
        return $query->result();
    }

    public function getCollection($userId)
	{
        $this->db->from('collection');
        $this->db->where('user_id', $userId);
        $query = $this->db->get();
        return $query->row();
    }
}