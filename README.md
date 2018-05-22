Installation
============
This was built on using Laravel/Homestead as the virtual
environment which is included as a dependency on the project.

* Clone this repository into C:\code\projects\gousto
  * If you wish to put it somewhere else, edit your Homestead.yaml to reflect this
* Ensure you have Vagrant, VirtualBox, PHP and Composer installed
* Run composer install from command line
* Add gousto.test to your hosts file 192.168.10.10
* Run Vagrant up
* Copy .env.example to .env

API Endpoints
=============
There are 5 endpoints defined:

* GET /recipes/{id}
  * This will return a single recipe if the id matches an id in the database

* GET /recipes
  * This will return a collection of recipes if supplied with a "cuisine" parameter
  * This will accept a page parameter (0 indexed, default:0)

* POST /rate/{recipe_id}/{rating}
  * This allows you to rate recipes

* POST /recipes
  * This allows you to add recipes to the database.
  * The expected parameter is a recipe array containing all of the following array indexes (N.B. MUST be supplied in this order)
    * id (will later be replaced with auto-increment, but must be supplied)
    * created_at (will later be replaced, but must be supplied)
    * updated_at (will later be replaced, but must be supplied)
    * box_type
    * title
    * slug
    * short_title
    * marketing_description
    * calories_kcal
    * protein_grams
    * fat_grams
    * carbs_grams
    * bulletpoint1
    * bulletpoint2
    * bulletpoint3
    * recipe_diet_type_id
    * season
    * base
    * protein_source
    * preparation_time_minutes
    * shelf_life_days
    * equipment_needed
    * origin_country
    * recipe_cuisine
    * in_your_box
    * gousto_reference

* PUT /recipes/{id}
  * This will update an existing recipe entry
  * As with new recipe, all fields must be supplied in the same order.
  * Parameters as with POST
      

Why Lumen?
==========      
An API requires fast response times and should be easy to define and extend.
Lumen offers all of these. It is a cut down version of the Laravel framework
specifically developed for fast microservices / API development.

API Consumers
=============
It is possible to have different target applications consume this API.
The standard web page / application would require all supplied data.

The addition of the Repository Layer for selection would allow for a simple 
Transformer implementation, in case less data were required. This could be 
called just before returning to the Controller to ensure that only relevant 
data is passed back.
      

Improvements
============
* Recipes should save correctly regardless of the order of the parameters supplied
* Better handling of errors and Exceptions (404 for missing recipes etc)
* Auto Handling of "slug"s
* Complete Validation (requires client requirements)