<?
class Jet_Model extends MY_Model {

    public function getJetCollection()
	{
        $query = $this->db->query('SELECT * FROM jet_fighters');
        return $query->result();
    }

    public function getModel($id)
	{
        $this->db->from('jet_fighters');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getJetBuilders()
	{
        $query = $this->db->query('SELECT * FROM builders');
        return $query->result();
    }

    public function getJetBuilder($id)
	{
        $this->db->from('jet_fighters');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function validUser($userId,$hash)
	{
        $auth = array('id' => $userId, 'password' => $hash);
        
        $this->db->from('user');
        $this->db->where($auth);
        $query = $this->db->get();
        $user = $query->row();

        if($query->num_rows() != 0){
            // user/pwd valide
            return TRUE;
        } else {
            // user/pwd non valide
            return FALSE;
        }
    }
    
    public function checkUserExist($pseudo,$pwd)
	{   
        $this->db->from('user');
        $this->db->where('pseudo', $pseudo);
        $query = $this->db->get();
        $user = $query->row();

        if($query->num_rows() != 0 && password_verify($pwd, $user->password)){
            // user existant
            return $user;
        } else {
            // user à créer
            return FALSE;
        } 
    }
    
    public function setSession($userId)
	{
		$user = $this->User_Model->getUser($userId);
		$this->session->email = $user->email;
		$this->session->pseudo = $user->pseudo;
		$this->session->id = $user->id;
    }

    public function verifPseudoMail($pseudo, $email){
        $auth = array('pseudo' => $pseudo, 'email' => $email);
        
        $this->db->from('user');
        $this->db->where($auth);
        $query = $this->db->get();
        $user = $query->row();

        if($query->num_rows() != 0){
            // user/pwd valide
            return $user;
        } else {
            // user/pwd non valide
            return FALSE;
        }
    }

    /* Fonction génériques ajoutées à MY_Model
    public function addUser($data)
    {
        return $this->db->insert('user', $data);
    }

    public function modifUser($userId, $data)
    {
        $this->db->where('id', $userId);
        return $this->db->update('user', $data);
    }

    public function delUser($userId)
    {
        return $this->db->delete('user', $userId);
    }
    */
}