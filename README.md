Development Stets that was made
------------

1. Analysed system and defined algorithm
2. Wrote Unit tests for all Items
3. Updated code to be more readable
4. Separated Item process and moved to Product classes
5. Integrated Product classes to GildedRose class
6. Separated tests for each Product
7. Added new Product - Conjured
8. Added test for Conjured Product

Couple Notes
------------
- Item class was untouched 
- There was couple bugs in initial system:
     - quality with negative value, it returned negative value when it should be 0
     - quality with over max value for Aged Brie and Backstage passes  products, it did not updated to max value and showed over
     