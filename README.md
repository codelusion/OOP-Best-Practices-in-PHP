# PHP-BDD-OOP-Sample
Sample PHP Cart application using BDD/OOP
  This is the code I used to illustrate the basics of OOP principles and best practices.
  Illustrates:
  - Encapsulation with Setters and Getters vs exposing Class internals
  - Self-validating Object instances, rather than validations sprinkled throughout code
  - Interfaces and type-hinting to reduce runtime exceptions
  - Writing classes with extension in mind
  
  
  ### Installation
  
  ```
  git clone https://github.com/codelusion/PHP-BDD-OOP-Sample
  composer update
  php Cart.php //old ways of doing things
  php App.php //good practices
  chmod +x ./runSpec.sh
  ./runSpec.sh //PHPSpec tests
  ```
  
  
