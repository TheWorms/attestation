# Générateur d'attestation de déplacement dérogatoire en PHP

Ce générateur vous permet de créer des attestations sans avoir à re-remplir à chaque fois toutes vos informations sur le
site du gouvernement.

## Configuration requise

Le projet nécessite PHP 7.4 ou ultérieur pour fonctionner.

## Installation

`git clone https://github.com/phpitou/attestation.git`

## Configuration

Le fichier `config.php` contient toutes les informations basiques dont le projet a besoin pour fonctionner.

- `JET_LAG` : La différence de temps (en heure) entre le temps client et le temps serveur (facultatif, laisser à 0 si
vous ne savez pas)
- `FIRSTNAME` : Votre prénom
- `LASTNAME` : Votre nom de famille
- `BIRTH_DATE` : Votre date de naissance
- `BIRTH_LOCATION` : Votre ville de naissance
- `FULL_STREET_ADDRESS` : Votre adresse postale complète
- `MADE_IN_DEFAULT` : La ville depuis laquelle les attestations seront par défaut éditées

## Utilisation

Le projet fonctionne tel quel en vous rendant sur http://localhost/attestation

### Le paramètre d'URL `reason`

Sans motif, l'attestation ne peut pas se générer. Voici les motifs valables:

- `travail` : Déplacements entre le domicile et le lieu d'exercice de l'activité professionnelle ou les déplacements
professionnels ne pouvant être différés
- `achats` : Déplacements pour effectuer des achats de fournitures nécessaires à l'activité professionnelle, des achats
de première nécessité dans des établissements dont les activités demeurent autorisées (liste sur gouvernement.fr) et les
livraisons à domicile
- `sante` : Consultations et soins ne pouvant être assurés à distance et ne pouvant être différés et l’achat de
médicaments
- `famille` : Déplacements pour motif familial impérieux, pour l'assistance aux personnes vulnérables et précaires ou la
garde d'enfants
- `handicap` : Déplacements des personnes en situation de handicap et de leur accompagnant
- `sport_animaux` : Déplacements brefs, dans la limite d'une heure quotidienne et dans un rayon maximal d'un kilomètre
autour du domicile, liés soit à l'activité physique individuelle des personnes, à l'exclusion de toute pratique sportive
collective et de toute proximité avec d'autres personnes, soit à la promenade avec les seules personnes regroupées dans
un même domicile, soit aux besoins des animaux de compagnie
- `convocation` : Convocation judiciaire ou administrative et rendez-vous dans un service public
- `missions` : Participation à des missions d'intérêt général sur demande de l'autorité administrative
- `enfants` : Déplacement pour chercher les enfants à l’école et à l’occasion de leurs activités périscolaires

### Le paramètre d'URL `made_in`

Par défaut, la ville où a été édité le document est celle renseignée dans le fichier `config.php` comme valeur de la clé
`MADE_IN_DEFAULT`, mais l'ajout de ce paramètre dans l'url permet de personnaliser la ville d'édition.

### Le paramètre d'URL `output`

Par défaut, l'attestation s'affiche dans le navigateur, mais il existe 2 autres moyens alternatifs de la générer:

- `download` permettant de générer une pop-up de téléchargement du PDF
- `save` permettant d'enregistrer le PDF dans le dossier `upload/`

## Exemple

Exemple d'URL permettant d'éditer une attestation pour motif familial, depuis Paris et proposée au téléchargement :
http://localhost/attestation/?reason=famille&made_in=Paris&output=download
