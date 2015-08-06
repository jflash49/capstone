
**FunQ**
====
#_Student Evaluation System_

**What is FunQ?**
===
 FunQ is a student evaluation system developed to compliment the Jamaican Grade 4 literacy and numeracy examination.
 The FunQ System is an Intelligence Quotient that aims to cover more scope in the assessment of each child, namely their verbal, spatial, visualization, classification, logic
and pattern recognition skills. The result of each child is subjective to them and as such their teachers would then know how to best approach educating that child and what to
improve based on the results generated from the FunQ system. Accurate evaluation ofthe cognitive skills are vital to the success of our software as this is critical for us to
understand how a child learns as well as how best to improve them.

**Verbal** intelligence measures the child’s capacity to use language in order to express
themselves, it is how they interpret what is given to them as well as how efficiently they
can understand other people.

**Visual** intelligence measures the ability to process visual material and to employ both
physical and mental images in thinking.Visualization also facilitates the ability to form
associations between pieces of information something which helps improve long term
memory.

**Logical-thinking** is the ability to make deductions that lead rationally to a certain
conclusion.

**Pattern recognition** is the ability to see order in a chaotic environment.

**Classification** measures the ability to organize collections of items by finding
similarities and differences between them. These skills enable the student to interpret
relevant data and gain a better general understanding of the world.


How To Run FunQ
===

Fun Q was developed on the symfony php framework many of the systems features can be modified. 
Interacting with the system is the same process with many symfony2 applications.
To start the application

 - navigate to the *root* of the application folder
 - use this command to start the application server
 
 		app/console server:run

 This server will prompt the ip address and port number on which it is hosting
 - open your browser and navigate to the server
 
 	*example:* **http://localhost:8000/**

 - The FunQ homepage should become available
 - The default administrator login is:
 
 	**admin : admin123**

 - Once logged in you have access to all the system features.

Requirements
===

FunQ System has several dependencies that are essential to running the system

Known Issues
===

  The FunQ system has been in development for 22 days and is currently still in the development. As a result
  some of the systems features have yet to be fine tuned, however many of the basic features are operational.
  The follwing features will cause problems when being accessed.
  
 - User Create Page (user roles causing an issue)
 - Document Uploads and Edit Page (all documents retain the extension 'initial' regardless of document type)
 - The Quiz component
 - Downloading template to PDF (Images may not appear on document)
 These features are currently being developed and debugged.

















######A Symfony project created on July 22, 2015, 2:13 pm.

