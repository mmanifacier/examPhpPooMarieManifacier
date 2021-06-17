Donner 5 méthodes magiques que vous avez étudié en PHP OO. Expliquez les éléments 
déclencheurs de l’exécution de la méthode magique (0.5 point par méthode)

Pour chacune des méthodes ci-dessus proposez un exemple de script qui appellera la méthode de manière implicite 
(0.5 point par méthode)

class Moto
{
    private marque;
    private modele;

    public function __construct($marque, $modele)
    {
        $this->marque = $marque;
        $this->modele = $modele;
    }
    
    public function __isset()
    {
        
    }
}


__construct() : Est appelée lors de l'instanciation de leur objet courant.
                $moto = new Moto(marque, modele);

__destruct() : Est appelée lors de la destruction de l'objet courant. La méthode est implicitement appelée à la fin du script.


__isset() : Est appelée pour assigner une valeur à un attribut qui n'existe pas ou qui est inacessible.
                $moto->version = 1;

__serialize() : Est appelée lorque l'un appelle serialize() sur un objet pour le transformer en chaine de caractère.
                $string = serialize($moto);

__unserialize() : Est appelée lorsque l'on appelle unserialize sur une chaine de caractère pour le retransformer en objet.
                $moto = unserialize($moto);