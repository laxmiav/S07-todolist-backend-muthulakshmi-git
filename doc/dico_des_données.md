# Dictionnaire de données

## status (`status`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|int|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|identification of the status|
|name|varchar|NOT NULL|status name|
|created_at|date avec heure minutes et secondes|NOT NULL, DEFAULT CURRENT_TIMESTAMP|creation date of the status|
|updated_at|date avec heure minutes et secondes|NOT NULL, DEFAULT CURRENT_TIMESTAMP|updation date of the status|

## Categories (`categorys`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|int|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|identification of the category|
|name|varchar|NOT NULL|Name of the category|
|created_at|date avec heure minutes et secondes|NOT NULL, DEFAULT CURRENT_TIMESTAMP|creation date of the category|
|updated_at|date avec heure minutes et secondes|NOT NULL, DEFAULT CURRENT_TIMESTAMP|updation date of the category|

## Tasks (`tasks`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|entier|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|identification of the task|
|title|varchar|NOT NULL|title of the task|
|completion|int|NULL|progress of the task|
|status_id|int|Forign KEY NOT NULL|identification of the status|
|category_id|int|Forign KEY  NULL, |identification of the category|
|created_at|date avec heure minutes et secondes|NOT NULL, DEFAULT CURRENT_TIMESTAMP|creation date of the task|
|updated_at|date avec heure minutes et secondes|NOT NULL, DEFAULT CURRENT_TIMESTAMP|updation date of the task|
