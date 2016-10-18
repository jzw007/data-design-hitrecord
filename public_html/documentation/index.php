<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<!--add CSS file-->
		<title>Data Design of Hitrecord</title>
	</head>

	<body>
		<header><h1>Persona</h1> </header>
		<ul>
			<li>Name: Ryan Kilgore</li>
			<li>Age: 22</li>
			<li>Proffesion: Works one job as a barista, the second job as a waiter and takes classes at the local community college.</li>
			<li>Technology: He has a nikon 5700 that he uses to record and edits his footage on his mac book pro.</li>
			<li> Frustration: He has tried to use youtube as a way to promote himself and gofundme to raise money for his projects and dreams with not much luck with either method.</li>
			<li>Goal: The ultimate goal for him is to be a working actor, weather from getting a roll through auditioning or writing his own  scene and or script that he gets to star in. With Hitrecord its more of a collaboration of artists working together for the bigger picture.</li>
		</ul>
		<!-- This is the Header-->
		<header>
			<h2>Use Case</h2>
		</header>
		<p>As an aspiring actor Ryan Kilgore cam across a challenge to create or improvise a scene. He has accepted the improve challenge issued by Wunder boy. So he sets up his Nikon D5700 to record his scene so he can upload it Hitrecord and hopefully it gets chosen to be used and then he might get paid.</p>
		<!-- this is the main page content-->
		<main>
			<h3> Interaction Flow</h3>
			<ol>
				<li>Ryan Kilgore is longing to act up or out and so he logs onto Hitrecord.com to try and find a new challeng that might suit his needs.</li>
				<li>He navigates through the page and locates an iprove/acting challeng that agrees with his inner demons that was issued by Wunder boy.</li>
				<li>Ryan sets up his Nikon and sets the lights as needed for his short scene and hits record. "yes puns intended" </li>
				<li>Lights, Camera, Improve, once Ryan is done filming his scene he will critique it to see if there is anything he can do to improve it.</li>
				<li>After the critiquing part, once he is satisfied as much as any artist can be with his own work, he will upload his scene in responce to the original challenge he accepted.</li>
				<li>Now if wunder boy decides to use Ryans submission for the challenge which is the ultimate goal, Ryan will get a paycheck and more importantly icrease his experience.</li>
			</ol>
			<!--begin section 3-->
			<header>
				<h4> Conceptual Model</h4>
			</header>
			<ul>
				<li> challenge
					<ul>
						<li>challengeId (Primary Key)</li>
						<li>challengeDateAndTime</li>
						<li>challengeAuthor(foriegn Key)</li>
						<li>N-to-M relationships with user</li>
					</ul>
				</li>
				<li>user
					<ul>
						<li>userId(Primary Key)</li>
						<li>userName</li>
						<li>userResponse</li>
						<li>userAvatar</li>
						<li>N-to-M relationships with challenge</li>
					</ul>
				</li>
				<li> response
					<ul>
						<li>responseId(foriegn key)</li>
						<li>responseDateTime</li>
						<li>responseData</li>
						<li>responseAuthor (foriegn key)</li>
					</ul>
			<img src="...Entities-and-Attributes-table.png" alt="diagram">;
			</ul>
		</main>
	</body>
</html>