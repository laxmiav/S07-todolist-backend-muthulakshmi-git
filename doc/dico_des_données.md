# Dictionnaire de données

## Status (`status`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|identification of the status|
|name|VARCHAR(64)|NOT NULL|status name|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|creation date of the status|
|updated_at|TIMESTAMP| NULL, DEFAULT CURRENT_TIMESTAMP|updation date of the status|

## Categories (`categorys`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|identification of the category|
|name|VARCHAR(64)|NOT NULL|Name of the category|
|status|TINYINT|NOT NULL|status of the category (active or not active)|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|creation date of the category|
|updated_at|TIMESTAMP|NULL, DEFAULT CURRENT_TIMESTAMP|updation date of the category|

## Tasks (`tasks`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|identification of the task|
|title|VARCHAR(64)|NOT NULL|title of the task|
|completion|INT|NULL|progress of the task|
|status_id|INT|Forign KEY NOT NULL|identification of the status|
|category_id|INT|Forign KEY  NULL, |identification of the category|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|creation date of the task|
|updated_at|TIMESTAMP| NULL, DEFAULT CURRENT_TIMESTAMP|updation date of the task|
