<!DOCTYPE html>
    <html>
        <head>
            <style>
                .header{
                    text-align:center;
                    background-color:blue;
                    padding:30px;
                    margin:0px;
                    font-size:40px;
                    color:white;
                }
                table{
                    width:20%;
                    background-color:white;
                }
                table ,th,td{
                   border:2px solid black;
                   border-collapse: collapse;
                   padding:15px;
                   margin:20px;
                }
                .main{
                   display: flex;
                   background-image:url('https://www.iitg.ac.in/storage/gallery/1/853616027.jpg');
                }
               .left{
                   font-size:x-large;
                   color:red; 
                  flex-direction:left;
                  padding:30px;
                }
               .right{
                   font-size:larger;
                   color:black;
                   flex-direction:right;
                   padding:60px;
                   margin:10px;
               }
               p{
                  background-color:white;
                  color:black;
                  padding:20px;
               }
            </style>
        </head>
        <body>
            <h1 class="header">Online Election System</h1>
            <div class="main">
            <div class="left">
                <table border='1' >
                    <tbody>
                        <tr><td><a href="./admin.php"> Admin </a></td></tr> 
                        <tr><td><a  href="./nomini.php"> Nominated</a></td></tr> 
                        <tr><td><a  href="./voter_login.php"> Voter</a></td></tr> 
                        <tr><td><a href="./show_nomini.php"> See Nomini </a></td></tr> 
                        <tr><td><a href="./print_time.php"> See timing </a></td></tr>
                        <tr><td><a href="./winner.php"> See winner </a></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="right">
                <p>
                Online Election System would have Candidate registration, document verification, auto-generated User ID and pass for candidate and Voters. Admin Login which will be handled by Election Commission .Candidate Login which will be handled By Candidate, Voters will get Unique ID and Password, Using which they can vote for a Candidate only once per Election. The project is beneficial for Election Commission, Voters as the can get to know the candidate background and choose wisely, and even for Candidate. The software system allows the Candidate to login in to their profiles and upload all their details including their previous milestone onto the system. The admin can check each Candidate details and verify the documents, only after verifying Candidates ID and Password will be generated, and can remove faulty accounts. The software system allows Voters to view a list of Candidates in their area. The admin has overall rights over the system and can moderate and delete any details not pertaining to Election Rules.
              </p>
            </div>
            <div>
        </body>
   </html>

