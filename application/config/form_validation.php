<?
$config = array(
    // LOGIN, SIGNIN
    'login/connexion' => array(
        array(
            'field' => 'pseudo',
            'label' => 'Pseudo',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    ),

    'login/userChangePwd' => array(
        array(
            'field' => 'pseudo',
            'label' => 'Pseudo',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    ),

    'signin/inscription' => array(
        array(
            'field' => 'pseudo',
            'label' => 'Pseudo',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    ),

    // USER
    'user/mod_infos' => array(
        array(
            'field' => 'pseudo',
            'label' => 'Pseudo',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'prenom',
            'label' => 'Prenom',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'pays',
            'label' => 'Pays',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'adresse',
            'label' => 'Adresse',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'CP',
            'label' => 'CP',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'ville',
            'label' => 'Ville',
            'rules' => 'trim|required'
        )
    ),

    // COLLECTION
    'user/mod_collection' => array(
        array(
            'field' => 'jet_have',
            'label' => 'Jet_have',
            'rules' => 'trim'
        ),
        array(
            'field' => 'ww2_have',
            'label' => 'Ww2_have',
            'rules' => 'trim'
        )
    ),

    'user/sel_all' => array(
        array(
            'field' => 'jet_have',
            'label' => 'Jet_have',
            'rules' => 'trim'
        ),
        array(
            'field' => 'ww2_have',
            'label' => 'Ww2_have',
            'rules' => 'trim'
        )
    ),

    'user/add_double' => array(
        array(
            'field' => 'jet_double',
            'label' => 'Jet_double',
            'rules' => 'trim'
        ),
        array(
            'field' => 'ww2_double',
            'label' => 'Ww2_double',
            'rules' => 'trim'
        )
    ),

    // ANNONCE USER
    'user/add_annonce' => array(
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'trim|required|numeric'
        ),
        array(
            'field' => 'text',
            'label' => 'Text',
            'rules' => 'trim'
        )
    ),

    'user/mod_annonce' => array(
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'trim|numeric'
        ),
        array(
            'field' => 'text',
            'label' => 'Text',
            'rules' => 'trim'
        )
    ),
);