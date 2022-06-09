# Clone Pastebin

## Outils utilisés

  - PHPMyAdmin
  - MySQL

  - HTML
  - PHP
  - CSS

## Étapes pour utilisation

  - Dans le fichier de configuration, changer la donnée "testmonsite" par le nom de votre dossier racine (souvent "localhost"). En cas de doute, faire un <?php echo $_SERVER['DOCUMENT_ROOT'] ?> tout en bas du fichier form.php, c'est le dernier nom qui apparait.

  - Créer une base de données avec (idéalement) les identifiants de connexion proposés dans le fichier de configuration, sinon ne pas oublier de les modifier manuellement

  - Importer la base de données, comportant deux tests, stockée dans le dossier data/db

  - Le questionnaire, contenu dans le fichier form.php, est prérempli pour tester au plus vite la fonctionnalité. Effacer le contenu entre les balises <textarea></textarea> ainsi que l'attribut value de l'input de nom "name_of_paste_sharing" pour un remplissage manuel des champs.
