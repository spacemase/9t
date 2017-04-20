CSS - 	body
	  id:container
	    id:content



Month	August
Year	2009


month	sign
1	Stray Dog
2	Cockroach
3	Rat
4	Spider
5	Ant
6	Pigeon
7	Seagull
8	Crow
9	Squirrel
10	Fly
11	Feral Cat
12	Worm


$arrSigns = array( "Stray Dog", "Cockroach", "Rat", "Spider", "Ant", "Pigeon", 
                   "Seagull", "Crow", "Squirrel", "Fly", "Feral Cat", "Worm" ) ;



string jdmonthname ( int $julianday , int $mode )
mode:	2 - abbreviated
	5 - French Revolutionary calender




admin.php:

$myMsg is set from _GET['msg'], an int
then it is changed to a string 
then $feedback has to be set anyways
then you switch on a _GET['msg'] again
  why not set $feedback in the first place and then use $feedback earlier?
then if $feedback not empty string
  why not if &mymsg not 0?

rte_test.php:

why do you include the rte_inc.php in each <?php ?> section?  Would a single include up in the header allow rte() to be called in each subsequent section?



also, why set up $access then use _SESSION['privilege']?
BECAUSE $access is the required access for the page, _SESSION has the granted privilege

