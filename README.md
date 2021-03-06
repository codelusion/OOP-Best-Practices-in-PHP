## Presentation: "Doing OOP/BDD in PHP"
Sample PHP Cart application using BDD/OOP

######This code was used to illustrate the basics of OOP principles and best practices.
  
  Illustrates:
  
  * Encapsulation with Setters and Getters vs exposing Class internals
  * Self-validating Object instances, rather than validations sprinkled throughout code
  * Interfaces and type-hinting to reduce runtime exceptions
  * Writing classes with extension in mind
 
  Also used the PHPSpec Behavior Driven Development tool vs. the more traditional PHPUnit testing framework.
  
  ### Install & Run
  
  ```bash
  git clone https://github.com/codelusion/PHP-BDD-OOP-Sample
  composer update
  php Cart.php //old ways of doing things
  php App.php //good practices
  chmod +x ./runSpec.sh
  ./runSpec.sh //PHPSpec tests
  ```
  
  
