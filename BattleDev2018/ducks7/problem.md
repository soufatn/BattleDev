Objectif

Vous êtes directeur d'une clinique de réhabilitation pour anatidaephobes, vos patients ont une peur irrationnelle des canards. Tout allait pour le mieux dans votre établissement, la thérapie est lourde mais le rétablissement certain. Mais un jour (vous vous souviendrez toujours de ce jour), la catastrophe survient : plusieurs palmipèdes s'infiltrent dans la clinique.

Heureusement, tout a été prévu, la clinique est équipée de portes blindées. Pas de quoi casser trois pattes à un bipède, mais suffisant pour éviter le carnage. Vous allez donc enfermer tout le monde, patients et canards confondus, ensuite ce sera au GIGN de faire sauter les portes à l'explosif et d'appréhender ces oiseaux de malheur.

Les cris d'horreur de vos patients sont recouverts par des caquetages machiavéliques, le temps presse. Toutefois, une pensée vous traverse l'esprit : bien qu'indispensables, ces portes sont extrêmement onéreuses. Dans un élan d'avarice, vous cherchez à fermer le moins de portes possible, tout en isolant les patients des canards.

Le plan de la clinique est représenté par une grille sur laquelle les positions des patients et des canards sont indiquées. Ceux-ci ne peuvent pas se déplacer en diagonale. Combien de portes devez-vous sceller au minimum pour couper tous les passages reliant canards et patients ?

Données

Entrée

Ligne 1 : un entier N compris entre 3 et 20, représentant la hauteur de la carte, qui est égale à sa largeur.

Lignes 2 à N+1 : les lignes de la carte représentées par des chaînes de N caractères. Les caractères de la ligne sont :

- . une case traversable
- # un mur
- ? une porte blindée
- c une case traversable avec un canard dessus
- p une case traversable avec un patient dessus


Une porte blindée se comporte comme un mur si elle est scellée, comme une case traversable si elle n'est pas scellée.

Sortie

Un entier, indiquant le nombre minimal de portes blindées à sceller pour isoler les canards des patients. Si ce n'est pas possible, affichez -1.


Exemple

Pour l'entrée suivante :

7

.?.#.?.

p#.#.#c

.#.#.#.

##.?.##

.#.#.#.

p#.#.#c

.?.#.?.


Il vous suffit de sceller la porte blindée (?) au centre de la carte pour séparer les canards des patients, la réponse attendue est donc 1.
