<?
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fighter {
    
    public function __construct() {

	}
	
	public function copy_dataDouble_for_list($data)
	{
		for($i=51; $i<73; $i++){
			$jet = $data['jets'][$i];
			if($jet->copy_id > 0){
				$j = $jet->copy_id;
				$jet_copy = $data['jets'][$j-1];
				$jet->carrier_start = $jet_copy->carrier_start;
				$jet->carrier_end = $jet_copy->carrier_end;
				$jet->built_nb = $jet_copy->built_nb;
			}
		}

		return $data;
	}
	
	public function add_flags_on_list($data)
	{
		foreach($data['jets'] as $jet){
			foreach($data['builders'] as $builder){
				if($jet->builder_id == $builder->id){
					for($i=1;$i<5;$i++){
						$countryId = "country_id$i";
						if(!empty($builder->$countryId)){
							foreach($data['countries'] as $country){
								if($builder->$countryId == $country->id){
									$flagCode = "flag$i";
									$jet->$flagCode = $country->code;
								}
							}
						}
					}
				}
			}
		}

		return $data;
	}

	public function add_flags_on_card($data)
	{
		for($i=1;$i<5;$i++){
			$countryId = "country_id$i";
			if(!empty($data['builder']->$countryId)){
				foreach($data['countries'] as $country){
					if($data['builder']->$countryId == $country->id){
						$flagCode = "flag$i";
						$data['jet']->$flagCode = $country->code;
					}
				}
			}
		}
		
		return $data;
	}

	public function add_jet_builders($data) // Pas utilisé finalement
	{
		foreach($data['jet_data'] as $jet){
			foreach($data['builders'] as $builder){
				if($jet->builder_id == $builder->id){
					$jet->builder_name = $builder->name;
				}
			}
		}

		return $data;
	}
}

