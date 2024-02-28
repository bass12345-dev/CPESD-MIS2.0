<!DOCTYPE html>
<html lang="en">

<head>
	<title>DTS Login</title>
<style>





@import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Protest+Strike&family=Varela+Round&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=M+PLUS+Rounded+1c&family=Protest+Strike&family=Varela+Round&display=swap');


*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body{
	margin: 0;
	padding: 0;
	box-sizing: border-box;


}

.top-header{
	height: 120px;
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	justify-content: center;


/*	justify-content: space-between;*/
}

.left {
	
	display: flex;
	justify-content: center;
	align-items: center;
	width: 300px;

}
img.right-l {
	margin-left: 7px;
}

.middle {
	
/*	flex:1;*/
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	width: 320px;
	line-height: 25px;
	
}
.right {
	
	width: 250px;
	display: flex;
	justify-content: center;
	align-items: center;
}

.bagong-image-card{
	margin-right: 160px;
	margin-bottom: 40px;
}

.left-logo{

	margin-left: 87px;
	margin-bottom: 30px;
}


img.top-logo {
	height: 85px;
	width: 85px;

}



.below-header {
	font-family: "Inter", sans-serif;
	text-align: center;
/*	display: flex;
	align-items: center;
	justify-content: center;*/

}

.office-city-mayor{
	text-transform: uppercase;
	font-weight: bold;
}
.oro{
	font-weight: bold;
}



.middle p {
	color: #000;
	font-size: 20px;
}


p.capital {
	color: maroon;
	font-family: "Inter", sans-serif;
	font-size: 19px;
}

.below-header h2{
	color: #000;
}

#content{
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;

}

.content-body {
	margin-top: 6rem;
	display: grid;
	grid-template-columns: 500px 500px;
	column-gap: 0;

}

.left-content {
	background-color: #fff; 
	border: 1px gray;
	filter: drop-shadow(3px 3px 2px gray);
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;

 }

 .left-content-text {
 	text-align: center;
 
 	line-height: 60px;
 }

 .left-content-text h1 {
 	font-family: "Protest Strike", sans-serif;
  	font-weight: 400;
  	font-style: normal;
 	font-size: 40px;
 	color: #0B8CD5;
 	filter: drop-shadow(3px 3px 2px #000);
 }

 .left-content-img img{
 	height: 300px;
 	width: 100%;
 }

.img-right-content-card {

	height: 550px;
	width: 550px;


}

.img-right-content-card img {
	height: 100%;
	margin-right: 300px;

	filter: drop-shadow(3px 3px 2px #000);
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid ;
  text-align: left;
  padding: 8px;
}


tr:nth-child(1) {
  text-align: center;
  align-items: center;

}
  </style>
</head>

<body>

<section id="header" >
			<div class="top-header">
				<div class="left">
					<div class="left-logo">
						<img class="top-logo " src="{{ asset('assets/img/oroquieta_logo-300x300.png') }}">
						<img class="top-logo right-l" src=" {{ asset('assets/img/peso_logo.png') }} ">
					</div>
					
				</div>
				<div class="middle">
					<p>Republic of the Philippines</p>
					<p class="office-city-mayor">Office of the City Mayor</p>
					<p class="oro">Oroquieta City</p>
					<p class="oro capital">The Capital of Misamis Occidental</p>
				</div>
				<div class="right">
					<div class="bagong-image-card">
						<img class="top-logo"   src="{{ asset('assets/img/Bagong_Pilipinas_logo.png') }}">
					</div>
				</div>
			</div>
			<div class="below-header">
				<h2>Cooperative & Public Employment Service Division</h2>
			</div>
		</section>
<table>
  <tr>
    <th colspan="3">Document Routing Slip</th>
   
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>
</body>
</html>


