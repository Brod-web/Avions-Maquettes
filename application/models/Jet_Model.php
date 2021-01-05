<?
class Jet_Model extends MY_Model {

    /* GENERAL */

    public function getJetCollection()
	{
        $query = $this->db->query('SELECT * FROM jet_fighters');
        return $query->result();
    }

    public function getJetsAndBuilders()
	{
        $query = $this->db->query
        ('SELECT jet_fighters.id, model, builder_id, builders.name as builder_name
        FROM jet_fighters, builders WHERE jet_fighters.builder_id = builders.id
        ORDER BY jet_fighters.id ASC');
        return $query->result();
    }

    public function getJetsList()
	{
        $query = $this->db->query
        ('SELECT jet_fighters.id, copy_id, model, carrier_start, carrier_end, built_nb, builder_id, builders.name as builder_name
        FROM jet_fighters, builders WHERE jet_fighters.builder_id = builders.id
        ORDER BY jet_fighters.id ASC');
        return $query->result();
    }

    public function getJetsListByBuilder()
	{
        $query = $this->db->query
        ('SELECT jet_fighters.id, copy_id, model, carrier_start, carrier_end, built_nb, builder_id, builders.name as builder_name
        FROM jet_fighters, builders WHERE jet_fighters.builder_id = builders.id AND copy_id IS NULL
        ORDER BY builder_name ASC');
        return $query->result();
    }

    public function getBuilders()
	{
        $query = $this->db->query('SELECT * FROM builders');
        return $query->result();
    }

    public function getCountries()
	{
        $query = $this->db->query('SELECT * FROM countries');
        return $query->result();
    }

    /* CARD */

    public function getModel($id)
	{
        $this->db->from('jet_fighters');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getBuilder($builderId)
	{
        $this->db->from('builders');
        $this->db->where('id', $builderId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getPhoto($id)
	{
        $this->db->from('photos');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    /* SORT BY */

    public function getFirst_items($field)
	{
        $query = $this->db->query
        ("SELECT jet_fighters.id, copy_id, model, builder_id, pilot, engine, $field, builders.name as builder_name
        FROM jet_fighters, builders WHERE jet_fighters.builder_id = builders.id AND copy_id IS NULL
        ORDER BY $field DESC"); // ASC pour ordre inversé
        /*LIMIT 6"); Dans le cas ou on afficherait seulement premiers résultats */
        return $query->result();
    }
}