
function searchAndDisplay(){
	findball();
	if(foundball >= 0){
		displayBall();
	}
	return false;
}


function findball(){
	let footballForm = document.getElementById("footballForm");
	
	let colour = footballForm.colour.value;
	
	let minprice = parseInt(footballForm.min_price.value); 
	
	let maxprice = parseInt(footballForm.max_price.value);
	
	
	for(i = 0 ; i < footballName.length;  i++){
		if(footballcolour[i] == colour){
			if(footballPrice[i] >= minprice  && footballPrice[i] <= maxprice )
			foundball = i 
		}
	}
}


function displayBall(){
	alert("You need: " + footballName[foundball]);
}


let foundball = -1; 



footballName = ["Nerf","Adidas", "Nike", "Puma", "Mitre", "Umbro", "Real", "Barca", "Vale", "Juve", "PSG"];

footballPrice = [5.00,16.99, 18.99, 22.00 , 25.50 , 27.00 , 30.50, 35.99, 45, 50, 55];

footballcolour = ["Red","Red", "Green", "Red", "Red", "Red", "Blue", "Red", "Blue", "Green", "Blue"];


footballPic = ["Beachball1.jfif", "fiveaside.jfif", "Football.jfif", "footballs.jfif", "futsal.jfif", "goalball.jfif"];


let btn;
btn = document.getElementById("find_Btn");

btn.addEventListener("click", searchAndDisplay); 




/*

//let foundItem = -1; // - 1 means we have not found a football

//parallel array of the footballs 


footballPrice = ["£19.99", "£25.00", "£30.00", "£18.00", "£22.00", "£28.00", "£15.00", "£20.00", "£25.00"];

footballSize = ["S", "M", "L", "S", "M", "L", "S", "M", "L"];

footballcolour = ["Nike", "Nike", "Nike", "Adidas", "Adidas", "Adidas", "Puma", "Puma", "Puma"];


let colour = prompt("What brand of football you are looking?"); 

let size = prompt("What size would you like?"); 

//let maxHeight = prompt("What is the maximum height of the hero?");


//loop through the heroes finding any that max
//why is the loop only finding one hero?
for(i = 0 ; i < footballPrice.length; i++){
	if(footballcolour[i] == colour){
		if(footballSize[i] == size ){
			foundItem = i;	 // assign the array index to foundItem
		}
	}
}


if(foundItem >= 0){
	alert("Your item Cost is: "+colour +" - "+ footballPrice[foundItem]);
}


*/
