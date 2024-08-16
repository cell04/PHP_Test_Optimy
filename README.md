# PHP test

## 1. Installation

  - create an empty database named "phptest" on your MySQL server
  - import the dbdump.sql in the "phptest" database
  - put your MySQL server credentials in the constructor of DB class
  - you can test the demo script in your shell: "php index.php"

## 2. Expectations

This simple application works, but with very old-style monolithic codebase, so do anything you want with it, to make it:

  - easier to work with
  - more maintainable


1. Identify as much as possible bad practices used in the code and explain why.
    - Need to implement the proper namespace - It's easier to import the classes with a namespace if you are building a large projects.
    - Need to utilize the proper uses of the constructor - This is very helpful when you are passing a lot of class on the constructor.


2. Refactor the application to have a cleaner codebase and easier to maintain / evolve (meaning: use OOP and its design patterns well).
    - Implement the namespace of every classes
    - Implement the best approach on using the contructor
    - Added Repository to make the function reusable
    - Changed the function name to make it simple
